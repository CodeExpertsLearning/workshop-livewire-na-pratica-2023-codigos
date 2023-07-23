<div>
    <x-slot name="header">Gerenciar: Produto</x-slot>

    @if(session()->has('success'))
        {{session('success')}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="" enctype="multipart/form-data">
                        <div class="w-full mb-6">
                            <label class="w-full mb-4">Nome Produto</label>
                            <input type="text" wire:model="product.name" class="w-full rounded ">
                            @error('product.name')
                            <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div  class="w-full mb-6">
                            <label class="w-full mb-4">Descrição</label>
                            <input type="text" wire:model="product.description" class="w-full rounded ">
                            @error('product.description')
                            <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="w-full mb-6">
                            <label class="w-full mb-4">Conteúdo</label>
                            <textarea id="" cols="30" rows="10" wire:model="product.body" class="w-full rounded "></textarea>
                            @error('product.body')
                            <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="w-full mb-6">
                            <label class="w-full mb-4">Preço</label>
                            <input type="text" wire:model="product.price" class="w-full rounded ">
                            @error('product.price')
                            <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="w-full mb-6 flex justify-between">
                            <div class="w-1/2 p-2">
                                @if($photo)
                                    <img src="{{$photo->temporaryUrl()}}" alt="">
                                @elseif($product->photo)
                                    <img src="{{asset('storage/' . $product->photo)}}" alt="">
                                @endif
                            </div>

                            <div class="w-1/2 p-2">
                                <label class="w-full mb-4">Foto Produto</label>

                                <input type="file" wire:model="photo" class="w-full rounded border border-gray-400 p-2">
                                @error('product.photo')
                                <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                        </div>

                        <div class="w-full mb-6">
                            <label class="w-full mb-4">Categorias</label>

                            <div class="px-5 grid grid-cols-3">
                                @foreach($allCategories as $categoryId => $category)
                                    <div >
                                        <input  type="checkbox"
                                                wire:model="categories.{{$categoryId}}"
                                                value="1"> {{$category}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                </div>


                <button wire:click.prevent="syncProduct"
                        class="px-4 py-2 text-white font-bold bg-green-800 border border-green-900
                                rounded hover:bg-green-400 transition ease-in-out duration-300"
                >
                    Salvar
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
