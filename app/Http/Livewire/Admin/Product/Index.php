<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $product = Product::latest()->paginate(10);
        return view('livewire.admin.product.index')->with([
            'title' => 'Product',
            'products' => $product,
            'i' => (request()->input('page', 1) - 1) * 10
        ]);
    }
}