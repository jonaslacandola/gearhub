<div class="flex items-center gap-4">
    <button class="rounded-lg bg-zinc-200 px-2 text-xl text-zinc-600 active:bg-zinc-300 disabled:bg-opacity-50 disabled:cursor-not-allowed disabled:text-zinc-400" wire:click="decrement" @if($quantity == 1 || $quantity < 1) disabled @endif>
        &minus;
    </button>
    <span class="text-sm">{{ $quantity }}</span>
    <button class="rounded-lg bg-zinc-200 px-2 text-xl text-zinc-600 active:bg-zinc-300" wire:click="increment">
        &plus;
    </button>
</div>


