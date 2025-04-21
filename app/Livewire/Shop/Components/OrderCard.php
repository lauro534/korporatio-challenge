<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;

class OrderCard extends Component
{
    public $order;
    public $count, $original;

    public function showConfirmModal(){
        $this->dispatch('showModal', orderId: $this->order->id );
    }

    public function updateOrder(){
        $this->dispatch('updateOrder', orderId: $this->order->id ,quantity: $this->count);
        $this->order->quantity = $this->count;
    }

    public function minuseOne(){
        $this->count = max(1, $this->count-1);
    }

    public function pluseOne(){
        $this->count += 1;
    }

    public function mount($order){
        $this->order = $order;
        $this->count = $this->order->quantity;
        $this->original = $this->order->quantity;
    }
    
    public function render()
    {
        return view('livewire.shop.components.order-card');
    }
}
