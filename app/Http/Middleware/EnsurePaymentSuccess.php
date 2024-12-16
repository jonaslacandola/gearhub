<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Response;

class EnsurePaymentSuccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   Stripe::setApiKey(config('services.stripe.secret'));

        $sessionId = $request->query('session_id');

        if ($sessionId) {
            try {
                $session = Session::retrieve($sessionId);

                $isRecent = (time() - $session->created) <= 100000;

                if ($session->payment_status === 'paid' && $isRecent) {
                    $request->merge(['session' => $session]);
                    return $next($request);
                } else {
                    return redirect()->route('feed');
                }
            } catch (Exception $err) {
                return redirect()->route('feed')->with('error', 'This payment session does not exists!');
            }
        } else {
            return back();
        }

    }
}
