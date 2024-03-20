<x-app-layout>
<h1 class="text-3xl font-bold bg-white-300 p-4">Categoria {{ $categorias->categoria }}</h1>

<form class="grid gap-6 mb-6 md:grid-cols-2" action ="{{route('categoria.update', $categorias->id)}}" method="post" enctype="multipart/form-data">    
<input type="hidden" value="{{csrf_token()}}" name="_token"> 
    <input type="hidden" value="PUT" name="_method">

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div class="flex items-center">
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da Categoria:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="Nome da categoria" name="categoria" value="{{$categorias->categoria ?? old('categoria')}}">
        </div>
    </div>
<div>
<button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Enviar</button>
</div>
</form>
</x-app-layout>