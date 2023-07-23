<?php

namespace App\Http\Livewire\Admin\Products\Form;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories = [];

    public $allCategories;

    public $photo;

    protected $rules = [
        'product.name' => 'required',
        'product.description' => 'required',
        'product.body' => 'required',
        'product.price' => 'required',
        'photo' => 'nullable|image'
    ];
    public function mount(Product $product, Category $category)
    {
        $this->product = $product;
        $this->categories = $this->product->categories->pluck('id')->toArray();
        $this->categories = array_fill_keys($this->categories, 1);
        $this->allCategories = $category->all(['id', 'name'])->toArray();
    }

    public function syncProduct()
    {
        $this->validate();

        $this->product->photo = $this->photo?->store('products', 'public') ?? $this->product->photo;
        $this->product->save();
        $this->product->categories()->sync(array_keys($this->categories, 1));

        redirect()->route('admin.product.index');
    }

    public function render()
    {
        return view('livewire.admin.products.form.product-form');
    }
}
