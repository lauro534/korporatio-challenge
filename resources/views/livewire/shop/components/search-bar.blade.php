<div class="w-full">
    <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-100">Search</label>
    <div class="flex">
        <input type="text" wire:model.lazy="searchStr" wire:keydown.enter="handleSearchKeyPress"
            class="w-full placeholder-gray-400 dark:placeholder-gray-300 px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-lg"
            placeholder="Search...">
    </div>
</div>