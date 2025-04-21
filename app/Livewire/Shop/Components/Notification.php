<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;

class Notification extends Component
{
    public $show = false;
    public $message;

    protected $listeners = ["notify" => "showNotification"];

    public function showNotification($message){
        $this->message = $message;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.shop.components.notification');
    }
}
