<div class="w-full">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">Categories</label>
    <button wire:click="toggleDropdown" type="button"
        class="border border-gray-300 rounded-md shadow-sm px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
        @if (count($selected) === 0)
            <span class="text-gray-400 dark:text-gray-300">Select categories</span>
        @endif
        @foreach (array_slice($selected, 0, 2) as $item)
            <span class="inline-block text-xs bg-indigo-100 text-indigo-700 rounded px-2 py-0.5 mr-1">
                {{ $categories[$item - 1]->name }}
            </span>
        @endforeach

        @if (count($selected) > 2)
            <span class="text-xs text-gray-400 dark:text-gray-300">+{{ count($selected) - 2 }}</span>
        @endif
    </button>

    @if ($this->open)
        <div wire:click.away="toggleDropdown"
            class="absolute mt-1 bg-white dark:bg-zinc-800 border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto z-10">
            <div class="p-2">
                <input type="text" wire:model.lazy="search"
                    class="placeholder-gray-400 dark:placeholder-gray-300 w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search...">
            </div>
            <ul>
                @foreach ($this->filtered() as $category)
                    <li wire:click="toggleSelection({{ $category->id }})"
                        class="cursor-pointer px-4 py-2 hover:bg-indigo-100 dark:hover:bg-indigo-700 flex justify-between items-center">
                        <span>{{ $category->name }}</span>
                        @if ($this->isSelected($category->id))
                            <span class="text-indigo-600 font-bold">✓</span>
                        @endif
                    </li>
                @endforeach
                <li>
                    <button wire:click="toggleDropdown"
                        class="bg-blue-500 hover:bg-blue-700 cursor-pointer w-full text-white px-3 py-1 rounded">Close</button>
                </li>
            </ul>
        </div>
    @endif
</div>
