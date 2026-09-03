<div class="flex flex-col items-center justify-center space-y-4">
    <div class="text-2xl font-bold p-6">
        {{ $counter }}
    </div>

    <div class="flex items-center justify-center gap-2 p-6">

        <button wire:click="increment"style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px;">
            Increment
        </button>

        <button wire:click="decrement"class="px-4 py-2 bg-red-600 text-white rounded">
            Decrement
        </button>

    </div>
</div>