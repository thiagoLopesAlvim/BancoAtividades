<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listagem das Categorias') }}
        </h2>
    </x-slot>

<div class="button-container">
<a href="{{route('categoria.create')}}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mb-4 pt-4" style="vertical-align: middle;">Criar nova Categoria</a>
</div>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead>
        <label style="font-weight: bold; text-align: center;"> Nome do Categoria</label>
    </thead>
    <tbody>
        @foreach($categorias as $teste)
            <tr>
                <td >{{$teste->categoria}}</td>
                <td>
                <a href="{{route('categoria.edit',$teste->id)}}">Editar</a>
                <form class="grid gap-6 mb-6 md:grid-cols-2" action ="{{route('categoria.destroy', $teste->id)}}" method="post" enctype="multipart/form-data">  
                <input type="hidden" value="{{csrf_token()}}" name="_token">
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" style="text-align: center;">Remover</a> 
                <input type="hidden" value="DELETE" name="_method">
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    table {
        max-width: 500px; /* Defina a largura máxima desejada */
        overflow-x: auto;
        margin: 0 auto; /* Centraliza a tabela horizontalmente */
        border-collapse: collapse;
    }


    table, th, td {
        border: 1px solid black;
    }

    td {
        padding: 10px; /* Ajuste conforme necessário */
    }

    .button-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    label{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>



</x-app-layout>