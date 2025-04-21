<?php

namespace App\Livewire\Shop;

use Livewire\Component; 
use Livewire\Attributes\On;
use App\Models\Product;
use App\Models\Order;
use function Livewire\dispatch;

class Products extends Component
{
    public $products = [];
    public $selectedCategories = [];
    public $sortOptions = [
        [
            'optionName' => 'Price: High to Low',
            'field' => 'price',
            'direction' => 'desc',
        ],
        [
            'optionName' => 'Price: Low to High',
            'field' => 'price',
            'direction' => 'asc',
        ],
        [
            'optionName' => 'Name: A to Z',
            'field' => 'name',
            'direction' => 'asc',
        ],
        [
            'optionName' => 'Name: Z to A',
            'field' => 'name',
            'direction' => 'desc',
        ],
        [
            'optionName' => 'Newest',
            'field' => 'created_at',
            'direction' => 'desc',
        ],
        [
            'optionName' => 'Latest',
            'field' => 'created_at',
            'direction' => 'asc',
        ],
    ];
    protected $listeners = ['addToCart' => 'addToCart', 'makeOrder'=>'makeOrder', 'search' => 'search', 'sort'=>'sort', 'filterByCategories' => 'filterByCategories'];

    public function mount($selected = [])
    {
        $this->products = Product::all();
        $this->selectedCategories = $selected ? : [];
    }

    public function addToCart($product){
        $this->dispatch('showAddToCartModal', $product);
    }

    public function sort($selectedOption){
        $sortOption = collect($this -> sortOptions)->firstWhere('optionName', $selectedOption);
        if($sortOption['direction'] === 'asc')
            $this->products = $this->products->sortBy($sortOption['field']);
        else if($sortOption['direction'] === 'desc')
            $this->products = $this->products->sortByDesc($sortOption['field']);
    }

    public function filterByCategories($selected){
        if($selected !== []){
            $this->products = Product::whereHas('categories', function ($query) use ($selected) {
                $query->whereIn('categories.id', $selected);
            })->get();
        }
        else
            $this->products = Product::all();
        $this->dispatch('search-clear');
    }

    public function search($search){
        $selected = $this->selectedCategories;
        if($selected !== []){
            $this->products = Product::whereHas('categories', function ($query) use ($selected) {
                $query->whereIn('categories.id', $selected);
            })->get();
        }
        else
            $this->products = Product::all();
        $this->products = collect($this->products)->filter(function ($product) use($search){
            return stripos($product['name'], $search) !== false;
        });
    }

    public function makeOrder($count, $productId){
        $order = Order::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->get()->first();
        if($order){
            $order->quantity += $count;
            $order->save();
        }
        else{
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId,
                'quantity' => $count,
            ]);
        }
        $this->dispatch('hideModal');
        $this->dispatch('notify', 'Product ordered successfully!');
    }

    public function render()
    {
        return view('livewire.shop.products', [
            'products' => $this->products,
        ]);
    }
}
