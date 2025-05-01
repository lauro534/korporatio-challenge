<div>
    @if ($showModal)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500/75 dark:bg-zinc-900 opacity-80 " aria-hidden="true"></div>
            <div
                class="fixed inset-0 z-10 overflow-y-auto flex items-end justify-center p-4 text-center sm:items-center sm:p-0 z-0">
                <div wire:click.away="hideModal"
                    class="shadow-[0_15px_35px_rgba(0,0,0,0.6)] bg-white dark:bg-zinc-600 relative transform overflow-hidden rounded-lg text-left transition-all sm:my-8 sm:w-full sm:max-w-lg z-10">
                    <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg text-base font-semibold text-gray-900 dark:text-gray-300"
                                    id="modal-title">Withdraw this Order
                                </h3>
                                <div class="mt-2">
                                    Are you sure you would like to do this?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-zinc-500 px-4 py-3 sm:flex sm:justify-end sm:px-6">
                        <button type="button" wire:click="deleteOrder"
                            class="mx-0 sm:mx-2 inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Yes</button>
                        <button type="button"
                            class="mt-3 sm:mt-0 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer"
                            wire:click="hideModal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
