<x-guest-layout>
    <x-slot name="sideboard">
        <div class="absolute -top-12 rounded-3xl flex flex-col shadow-xl left-20 bg-background-light w-3/4 h-[86vh] overflow-hidden">
            <div class="h-full p-8">
                <x-application-logo class=" text-4xl"/>
                <h1 class="text-xl font-medium ">Welcome Back!</h1>
                <p class="text-zinc-600">A one ship solution for all offers</p>
                <p class="text-zinc-600">Find everything in less price</p>
            </div>
            <div class="self-end">
             <img src="{{asset('images/designlogin.png')}}" alt="" class="aspect-square object-cover object-center rounded-se-[50%]" >
            </div>
        </div>
    </x-slot>

    <form method="POST" action="{{ route('register') }}" class="w-3/4 flex flex-col gap-4">
        @csrf
        <!-- Register Header Title -->
        <h1 class="font-medium text-xl ">{{ __('Register') }}</h1>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="w-full" type="text" name="name" :value="old('name')" placeholder="Username" required autofocus autocomplete="name" >
                <i data-feather="user" class="w-[18px] h-[18px]"></i>
            </x-text-input>
            <x-input-error :messages="$errors->get('name')"  />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" >
                <i data-feather="mail" class="w-[18px] h-[18px]"></i>   
            </x-text-input>
            <x-input-error :messages="$errors->get('email')"  />
        </div>

        <!-- Password -->
        <div >
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="w-full" type="password" name="password" placeholder="Password" required autocomplete="new-password" >
                <i data-feather="lock" class="w-[18px] h-[18px]"></i>   
            </x-text-input>

            <x-input-error :messages="$errors->get('password')"  />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" >
                <i data-feather="lock" class="w-[18px] h-[18px]"></i>
            </x-text-input>

            <x-input-error :messages="$errors->get('password_confirmation')"  />
        </div>

        <div class="flex items-center justify-end my-4">
            <a class="text-sm text-zinc-600 hover:text-zinc-800 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-orange" href="{{ route('login') }}">
                {{ __('Already Registered?') }}
            </a>    
        </div>

        <x-primary-button>
                {{ __('Register') }}
        </x-primary-button>
    </form>
</x-guest-layout>
