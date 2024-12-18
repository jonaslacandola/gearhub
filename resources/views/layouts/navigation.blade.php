<nav class="w-full sticky top-0 p-6 bg-zinc-50 border-b border-zinc-100 shadow-md z-50">
    <ul class="flex justify-between items-center gap-8 max-w-[85%] mx-auto">
        <li>
           <a href="{{ route('feed') }}">
                <x-application-logo class="text-2xl pt-2"/>
           </a>
        </li>
        <li class="w-3/6">
            <form id="searchbar" method="get" action="{{ route('feed') }}" class="flex items-center gap-2 pl-4 border border-zinc-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-orange-500 focus-within:ring-offset-2">
                <input type="text" name="search" id="search" placeholder="Search a product" value="{{ request('search') }}" class="w-full border-none outline-none bg-transparent text-sm placeholder:text-zinc-300 placeholder:text-sm">
                <button type="submit" class="bg-gradient-to-r from-orange-500 to-orange-600 py-3 px-6 active:bg-amber-700">
                    <i data-feather="search" class="w-[18px] h-[18px] stroke-white"></i>
                </button>
            </form>
        </li>
        <li>
            <div class="flex flex-cols items-center gap-2">
                <x-nav-icon-link icon="bell" />
                <x-nav-icon-link icon="heart" />
                @isset (Auth::user()->cart)
                    <x-nav-icon-link icon="shopping-cart" :href="route('cart.show', ['cart' => Auth::user()->cart->id])" :active="request()->routeIs('cart.show', ['cart' => Auth::user()->cart->id])" >
                        <livewire:count/>
                    </x-nav-icon-link>
                @else
                    <x-nav-icon-link icon="shopping-cart" href="{{ route('login') }}" />
                @endisset
                </div>
        </li>
        <li class="justify-self-end flex flex-cols items-center gap-8">
            <div>
                @if (Auth::user())
                    <x-dropdown align="top">
                        <x-slot name="trigger">
                            <p class="text-sm text-zinc-600 cursor-pointer">{{Auth::user()->name}}</p>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex flex-col gap-1 text-sm px-4 py-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100">
                                    <span class="text-zinc-700">{{ __('Profile') }}</span>
                                </a>
                                <a href="{{ route('order.index') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100">
                                    <span class="text-zinc-700">{{ __('My Orders') }}</span>
                                </a>
                                <a href="{{ route('admin') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100">
                                    <span class="text-zinc-700">{{ __('Manage Products') }}</span>
                                </a>
                                <form method="post" action="{{ route('logout') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100"> 
                                    @csrf
                                    <button type="submit" class="text-zinc-700">
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else 
                    <a href="{{ route('login') }}" class="text-sm text-center px-4 py-2 bg-orange-500 border border-transparent rounded-md text-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        {{ __('Register / Login') }}
                    </a>
                @endif
            </div>
        </li>
    </ul>
</nav>