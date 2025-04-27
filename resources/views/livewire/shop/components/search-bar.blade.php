<div class="pr-10">
    <label class="block text-sm font-medium text-gray-700 mb-1">Search <span class="text-red-500">*</span></label>
    <div class="flex">
        <input type="text" wire:model.lazy="searchStr" wire:keydown.enter="handleSearchKeyPress"
            class="px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-lg"
            placeholder="Search...">
    </div>
</div>