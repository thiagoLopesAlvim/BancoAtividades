<x-app-layout>
<h1 class="text-3xl font-bold bg-white-300 p-4">Novo Produto</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        {{$$error}}
        <td></td>
    @endforeach
@endif

<form class="grid gap-6 mb-6 md:grid-cols-2" action ="{{route('produto.store')}}" method="post" enctype="multipart/form-data">
<input type="hidden" value="{{csrf_token()}}" name="_token"> 
<div class="grid gap-6 mb-6 md:grid-cols-2">
    <div class="flex items-center">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do produto:</label>
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="Nome ddo produto" name="nomep">
    </div>
    <div class="flex items-center">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor do produto:</label>
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="Valor do produto" name="valorp">
    </div>
    <div class="flex items-center">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto do produto:</label>
    <input type="file" id="fotop" name="fotop" class="from-control-file">
    </div>
    <div class="flex items-center">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do produto:</label>
    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="Descrição do Produto" name="descricaop">
    </div>
    <div class="flex items-center">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria do produto: </label>
    <select id="meu-dropdown" name="categoriap">
    @foreach($categorias as $categoria)
    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
    @endforeach
    </select>

    </div>
</div>
<div>
    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Enviar</button>     
    </div>

</form>



</x-app-layout>