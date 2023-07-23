<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class ProductDelete extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function productConfirmDelete()
    {
        $this->dispatchBrowserEvent('sweet:open', ['id' => $this->product]);
    }

    public function productDelete($product)
    {
        if($product = Product::find($product)) {
           $product->delete();
           $this->emit('productDeleted');
        }
    }

    protected function getListeners()
    {
        return [
          'productDelete:' . $this->product => 'productDelete'
        ];
    }

    public function render()
    {
        return view('livewire.admin.products.product-delete');
    }
}
