<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Models\Order;
use function Livewire\dispatch;

class Orders extends Component
{
    protected $listeners = ['deleteOrder' => 'deleteOrder', 'updateOrder' => 'updateOrder'];

    public function showConfirmModal($orderId) {
        $this->dispatch('showModal', [
            'orderId' => $orderId,
        ]);   
    }

    public function updateOrder($orderId, $quantity) {
        $order = Order::findOrFail($orderId);
        $order->quantity = $quantity;
        $order->save();
        $this->dispatch('notify',"Order updated successfully!");
    }

    public function deleteOrder($orderId) {
        Order::where('id', $orderId)->delete();
        $this->dispatch('hideModal');
        $this->dispatch('notify', 'Order withdrawn successfully!');
    }

    public function render() {
        return view('livewire.shop.orders', [
            'orders' => Order::where('user_id', auth()->user()->id)->get()->sortBy('product_id'),
        ]);
    }
}
