<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $products = [], $priceInput, $search;



    protected $queryString = [
        'priceInput' => ['except' => '', 'as' => 'price'],
        'search' => ['except' => '', 'as' => 'cari']
    ];


    public function render()
    {
        $this->products = Product::when($this->priceInput == 'high-to-low')->orderBy('price_product', 'DESC')->when($this->priceInput == 'low-to-high')->orderBy('price_product', 'ASC')->where('name_product', 'like', '%' . $this->search . '%')->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
        ]);
    }
}