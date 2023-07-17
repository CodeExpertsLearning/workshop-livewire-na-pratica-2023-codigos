<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $product = [
        'name' => null,
        'body' => null,
        'description' => null,
        'price' => null,
        'photo' => null
    ];

    protected $rules = [
        'product.name' => 'required',
        'product.description' => 'required',
        'product.body' => 'required',
        'product.price' => 'required',
        'product.photo' => 'nullable|image'
    ];

    public function saveProduct()
    {
        $this->validate();

        $this->product['slug'] = str()->slug($this->product['name']);
        $this->product['photo'] = $this->product['photo']?->store('products', 'public');

        Product::create($this->product);

        $this->reset('product');

        session()->flash('success', 'Produto criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
