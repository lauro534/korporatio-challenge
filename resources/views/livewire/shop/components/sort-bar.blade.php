<div class="md:w-[15%] content-end ">
    <div class="flex items-center">
        <div class="relative inline-block text-left">
            <button wire:click="toggleDropdown" type="button"
                class="w-full bg-gray-300 mx-2 p-1 border-black-500 border-2 rounded-md group inline-flex items-center justify-center text-lg font-medium text-gray-700 hover:text-gray-900 focus:outline-none"
                id="menu-button" aria-expanded="true" aria-haspopup="true">
                <span>{{ $selected }}</span>
                <svg class="ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            @if ($open)
                <div @click.away="open = false" x-transition
                    class="absolute z-20 left-0 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                    <div class="py-1" role="none">
                        @foreach ($options as $option)
                            <button wire:click="handleSort('{{$option}}')"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-left"
                                role="menuitem">{{ $option }}</button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
