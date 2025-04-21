<div class="md:w-[40%] my-2 md:m-0">
    <label class="block text-sm font-medium text-gray-700 mb-1">Categories <span class="text-red-500">*</span></label>
    <button wire:click="toggleDropdown" type="button"
        class=" border border-gray-300 rounded-md shadow-sm px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm">
        @if (count($selected) === 0)
            <span class="text-gray-400">Select categories</span>
        @endif
        @foreach ($selected as $item)
            <span
                class="inline-block text-xs bg-indigo-100 text-indigo-700 rounded px-2 py-0.5 mr-1">{{ $categories[$item-1]->name }}</span>
        @endforeach
    </button>

    @if ($this->open)
        <div wire:click.away="filterByCategories()"
            class="absolute mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto z-10">
            <div class="p-2">
                <input type="text" wire:model.lazy="search"
                    class="w-full px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Search...">
            </div>
            <ul>
                @foreach ($this->filtered() as $category)
                    <li wire:click="toggleSelection({{ $category->id }})"
                        class="cursor-pointer px-4 py-2 hover:bg-indigo-100 flex justify-between items-center">
                        <span>{{ $category->name }}</span>
                        @if ($this->isSelected($category->id))
                            <span class="text-indigo-600 font-bold">✓</span>
                        @endif
                    </li>
                @endforeach
                <li>
                    <button @click="open = false" wire:click="filterByCategories(selected)"
                        class="bg-blue-500 hover:bg-blue-700 cursor-pointer w-full text-white px-3 py-1 rounded">Search</button>
                </li>
            </ul>
        </div>
    @endif
</div>
