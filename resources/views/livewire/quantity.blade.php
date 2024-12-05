<div class="flex items-center gap-4">
    <button class="rounded bg-zinc-200 p-1 active:bg-zinc-300 disabled:bg-opacity-50" wire:click="decrement" :disabled="{{ $quantity == 1 }}">
        <i data-feather="minus" class="stroke-zinc-500 w-[16px] h-[16px]"></i>
    </button>
    <span class="text-sm">{{ $quantity }}</span>
    <button class="rounded bg-zinc-200 p-1 active:bg-zinc-300" wire:click="increment">
        <i data-feather="plus" class="stroke-zinc-500 w-[16px] h-[16px]"></i>
    </button>
</div>

