<x-app-layout>
    <div class="w-full flex flex-col justify-center items-center gap-4">
        <p class="text-lg text-lime-500">Payment Success!</p>
        <form action="{{ route('feed') }}" method="get">
            <x-primary-button class="gap-2 items-center">
                <span class="text-sm text-white">{{ __('Continue Shopping') }}</span>
                <i data-feather="shopping-cart" class="w-[18px] h-[18px] stroke-white"></i>
            </x-primary-button>
        </form>
    </div>
    <div class="w-1/2 mx-auto grid grid-cols-2 items-center gap-4">
        <p class="text-zinc-600">Payment Method</p>
        <p class="text-right">
            @foreach($session->payment_method_types as $payment)
                <span>{{ ucwords($payment) }}</span>
            @endforeach
        </p>
        <p class="text-zinc-600">Amount</p>
        <p class="text-right text-primary-orange">&#8369; {{ number_format($session->amount_total / 100, 2, '.', ',') }}</p>
        <p class="text-zinc-600">Name</p>
        <p class="text-right">{{ $session->customer_details->name }}</p>
        <p class="text-zinc-600">Email</p>
        <p class="text-right">{{ $session->customer_details->email }}</p>
    </div>

    <script>
        confetti({
            particleCount: 150,
            angle: -90,
            spread: 200,
            origin: { y: 0 },
            ticks: 100,
            gravity: 0.1,
            decay: 0.94,
            startVelocity: 20,
            });
    </script>
</x-app-layout>