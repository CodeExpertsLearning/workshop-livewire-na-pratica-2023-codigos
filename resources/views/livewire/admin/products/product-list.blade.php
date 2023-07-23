<div>
    <x-slot name="header">Produtos</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-10 flex justify-end">
                <a href="{{route('admin.product.create')}}"
                   class="px-4 py-2 text-white font-bold bg-green-800 border border-green-900
                                rounded hover:bg-green-400 transition ease-in-out duration-300"
                >
                    Criar Produto
                </a>
            </div>

            @if(session()->has('success'))
                <div class="px-4 py-2 mb-10 rounded bg-green-500 border border-green-900 text-white font-bold">
                    {{session('success')}}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="w-full flex justify-between px-5 my-10">
                    <div>
                        <label>Por Página</label>
                        <select wire:model="perPage" class="rounded" >
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="all">Todos</option>
                        </select>
                    </div>

                    <div>
                        <label>Buscar</label>
                        <input type="text" wire:model="search" class="rounded" placeholder="Buscar na tabela...">
                    </div>
                </form>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">#</th>
                            <th class="px-4 py-2 text-left w-2/4">Produto</th>
                            <th class="px-4 py-2 text-left">Criado Em</th>
                            <th class="px-4 py-2 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="px-4 py-2 text-left">{{$product->id}}</td>
                            <td class="px-4 py-2 text-left">{{$product->name}}</td>
                            <td class="px-4 py-2 text-left">{{$product->created_at->format('d/m/Y H:i')}}</td>
                            <td class="px-4 py-2 text-left flex gap-4">
                                <a href="{{route('admin.product.edit', $product)}}" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>

                                <livewire:admin.products.product-delete :product="$product->id" :key="$product->id"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h2>Sem produtos cadastrados...</h2></td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
            @php $isPaginator = $products instanceof \Illuminate\Pagination\LengthAwarePaginator; @endphp
            @if($isPaginator)
                <div class="mt-10 p-4">
                    {{$products->links()}}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          window.addEventListener('livewire:load', event => {
              window.addEventListener('sweet:open', event => {
                  Swal.fire({
                      title: 'Atenção!!',
                      text: 'Você deseja remover o produto?',
                      icon: 'error',
                      showCloseButton: true,
                      showCancelButton: true,
                      confirmButtonText: 'Remover',
                      cancelButtonText: `Cancelar`,
                  }).then(result => {
                      if(result.isConfirmed) {
                          Livewire.emit('productDelete', event.detail.id)
                          return;
                      }
                  })
              })
          });
        </script>
    @endpush
</div>
