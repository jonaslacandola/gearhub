<x-guest-layout>
    <x-slot name="sideboard">
        <div class="absolute -top-12 rounded-3xl flex flex-col shadow-xl left-20 bg-background-light w-3/4 h-[86vh] overflow-hidden">
            <div class="h-full p-8">
                <x-application-logo class="text-3xl lg:text-4xl"/>
                <h1 class="text-xl font-medium mb-2">Welcome Back!</h1>
                <p class="text-zinc-600">A one ship solution for all offers</p>
                <p class="text-zinc-600">Find everything in less price</p>
            </div>
            <div class="self-end">
             <img src="{{asset('images/designlogin.png')}}" alt="" class="aspect-square object-cover object-center rounded-se-[50%]" >
            </div>
        </div>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="w-3/4 rounded-xl flex flex-col gap-4 ">
        @csrf
        <!-- Login Header Title -->
        <h1 class="font-medium text-xl">
            {{ __('Login') }}
        </h1>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="w-full" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" >
                <i data-feather="user" class="w-[18px] h-[18px]"></i>
            </x-text-input>
            <x-input-error :messages="$errors->get('email')" class="" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block  w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" >
                <i data-feather="lock" class="w-[18px] h-[18px]"></i>
            </x-text-input>

            <x-input-error :messages="$errors->get('password')" class="" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between"> 
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 accent-primary-orange shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange" name="remember">
                <span class="ms-2 text-sm text-zinc-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-zinc-600 hover:text-zinc-800 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <div class=" ">
            <x-primary-button class="w-full">
                {{ __('Login')}}
            </x-primary-button>
        </div>

        <div class="flex justify-center">
            <a href="{{ route('register') }}" class="text-center  text-sm rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange">
                <span class="text-zinc-500">New User?</span>
                <span class="text-primary-orange">Create an Account</span>
            </a>
        </div>
    </form>
</x-guest-layout>
