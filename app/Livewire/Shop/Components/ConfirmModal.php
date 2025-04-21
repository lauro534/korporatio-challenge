<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;

class ConfirmModal extends Component
{
    public $showModal = false;
    public $orderId;

    protected $listeners = ['showModal' => 'showModal', 'hideModal' => 'hideModal'];

    public function showModal($orderId){
        $this->showModal = true;
        $this->orderId = $orderId;
    }

    public function hideModal(){
        $this->showModal = false;
    }

    public function deleteOrder(){
        $this->dispatch('deleteOrder', orderId: $this->orderId);
    }

    public function render()
    {
        return view('livewire.shop.components.confirm-modal');
    }
}
