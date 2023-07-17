<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class ProductDelete extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function productDelete()
    {
        $this->product->delete();

        $this->emit('productDeleted');
    }

    public function render()
    {
        return view('livewire.admin.products.product-delete');
    }
}
