<div class="w-full h-full flex flex-col gap-8 px-10 py-8 border-r border-zinc-200">
    <div class="w-full flex justify-center">
        <x-application-logo/>
    </div>
    <div class="flex flex-col gap-2">
        <p class="uppercase text-zinc-400 text-sm mb-2">Menu</p>
        <x-nav-link href="{{ route('admin.overview') }}" :active="request()->routeIs('admin.overview')">
            <i data-feather="grid" class="w-[18px] h-[18px] stroke-orange-500"></i> 
            {{ __('Overview') }}
        </x-nav-link>
        <x-nav-link href="{{ route('admin.product.index') }}" :active="request()->routeIs('admin.product.index')">
            <i data-feather="shopping-bag" class="w-[18px] h-[18px] stroke-orange-500"></i> 
            {{ __('Products') }}
        </x-nav-link>
        <x-nav-link>
            <i data-feather="users" class="w-[18px] h-[18px] stroke-orange-500"></i>
            {{  __('Users') }}
        </x-nav-link>
        <x-nav-link>
            <i data-feather="trending-up" class="w-[18px] h-[18px] stroke-orange-500"></i>
            {{  __('Sales') }}
        </x-nav-link>
    </div>
    <div class="flex flex-col gap-2">
        <p class="uppercase text-zinc-400 text-sm mb-2">Others</p>
        <x-nav-link >
            <i data-feather="settings" class="w-[18px] h-[18px] stroke-orange-500"></i>
            {{ __('Settings') }}
        </x-nav-link>

    </div>
</div>