<div>
    <x-slot name="header">Criar Produto</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6">
                   @if(session()->has('success'))
                      <div class="px-4 rounded bg-green-500 border border-green-900 text-white font-bold">
                          {{session('success')}}
                      </div>
                   @endif

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
                               @if($product['photo'])
                                   <img src="{{$product['photo']->temporaryUrl()}}" alt="">
                               @endif
                           </div>

                           <div class="w-1/2 p-2">
                               <label class="w-full mb-4">Foto Produto</label>

                               <input type="file" wire:model="product.photo" class="w-full rounded border border-gray-400 p-2">
                               @error('product.photo')
                               <div class="w-full p-4 mt-4 rounded border border-red-900 bg-red-400 text-white font-bold">
                                   {{$message}}
                               </div>

                               @enderror</div>
                       </div>

                       <button wire:click.prevent="saveProduct"
                        class="px-4 py-2 text-white font-bold bg-green-800 border border-green-900
                                rounded hover:bg-green-400 transition ease-in-out duration-300"
                       >
                           Cadastrar
                       </button>
                   </form>
               </div>
            </div>
        </div>
    </div>
</div>
