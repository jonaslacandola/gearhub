<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    {   Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = $request->query('session_id');

        if ($sessionId) {
            $session = Session::retrieve($sessionId);
            Log::info('ad', [$session]);

            $paymentStatus = $session->payment_status;

            if ($paymentStatus === 'paid') {
                $cart = Auth::user()->cart;

                $cart->products()->detach();
                
                $request->merge(['session' => $session]);

                return $next($request);
            } else {
                return redirect()->route('cart.index');
            }
        } else {
            return back();
        }

    }
}
