<nav class="w-full sticky top-0 p-4 bg-background-light border-b border-accent-gray shadow-md z-50">
    <ul class="flex justify-between items-center gap-8 max-w-[85%] mx-auto">
        <li>
           <a href="{{ route('feed') }}">
                <x-application-logo class="text-2xl pt-2"/>
           </a>
        </li>
        <li class="w-3/6">
            <form id="searchbar" method="get" action="" class="flex items-center gap-2 pl-4 border border-accent-gray rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-primary-orange focus-within:ring-offset-2">
                <input type="text" name="search" id="search" placeholder="Search a product" value="{{ request('search') }}" class="w-full border-none outline-none bg-transparent text-sm text-secondary-black placeholder:text-accent-gray placeholder:text-sm">
                <button type="submit" class="bg-primary-orange py-2 px-6 active:bg-amber-700">
                    <i data-feather="search" class="w-[18px] h-[18px] stroke-white"></i>
                </button>
            </form>
        </li>
        <li>
            <div class="flex flex-cols items-center gap-2">
                <x-nav-icon-link icon="bell" />
                <x-nav-icon-link icon="heart" />
                <x-nav-icon-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" icon="shopping-cart" :count="$itemsInCart" />
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
                            <div class="flex flex-col gap-2 text-sm px-4 py-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100">
                                    <!-- <i data-feather="user" class="w-[18px] h-[18px] stroke-zinc-700"></i> -->
                                    <span class="text-zinc-700">{{ __('Profile') }}</span>
                                </a>
                                <form method="post" action="{{ route('logout') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-zinc-100"> 
                                    @csrf
                                    <!-- <i data-feather="log-out" class="w-[18px] h-[18px] stroke-zinc-700"></i> -->
                                    <button type="submit" class="text-zinc-700">
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else 
                    <a href="{{ route('login') }}" class="text-sm text-center px-4 py-2 bg-primary-orange border border-transparent rounded-md text-white focus:outline-none focus:ring-2 focus:ring-primary-orange focus:ring-offset-2">
                        {{ __('Register / Login') }}
                    </a>
                @endif
            </div>
        </li>
    </ul>
</nav>