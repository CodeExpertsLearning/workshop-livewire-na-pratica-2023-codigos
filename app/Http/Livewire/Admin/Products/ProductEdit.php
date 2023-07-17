<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public Product $product;
    public $photo;

    protected $rules = [
        'product.name' => 'required',
        'product.description' => 'required',
        'product.body' => 'required',
        'product.price' => 'required',
        'photo' => 'nullable|image'
    ];
    public function mount(Product $product)
    {
       $this->product = $product;
    }

    public function updateProduct()
    {
        $this->validate();

        $this->product->photo = $this->photo?->store('products', 'public') ?? $this->product->photo;

        $this->product->save();

        redirect()->route('admin.product.index');
    }
    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
