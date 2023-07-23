<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    protected $queryString = ['search', 'perPage'];

    public $perPage = 15;
    public $search;

//    protected $listeners = ['productDeleted' => '$refresh'];
    protected $listeners = ['productDeleted' => 'reactList'];

    public function reactList()
    {
        session()->flash('success', 'Produto removido com sucesso!');
    }

    public function render(Product $product)
    {
        $products = $product->orderBy('id', 'DESC');

        $products->when($this->search, function($queryBuilder){
            return $queryBuilder->where('name', 'LIKE', '%' . $this->search . '%');
        });

        $products = $this->perPage === 'all'
                ? $products->get()
                : $products->paginate($this->perPage);

        return view('livewire.admin.products.product-list',
            [
                'products' => $products
            ]);
    }
}
