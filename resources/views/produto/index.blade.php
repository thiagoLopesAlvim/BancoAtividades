<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listagem das Produtos') }}
        </h2>
    </x-slot>

<div class="button-container">
<a href="{{route('produto.create')}}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mb-4 pt-4" style="vertical-align: middle;">Criar novo produto</a>
</div>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
       <tr >
       <th scope="col" class="px-6 py-3" style="font-weight: bold;"> Nome do Produto</th>
       
       <th scope="col" class="px-6 py-3" style="font-weight: bold;"> Valor do produto</th>
     
       <th scope="col" class="px-6 py-3" style="font-weight: bold;"> Foto do produto</th>

       <th scope="col" class="px-6 py-3" style="font-weight: bold;"> Descrição do produto</th>

       <th scope="col" class="px-6 py-3" style="font-weight: bold;"> Categoria do produto</th>

       <th scope="col" class="px-6 py-3" style="font-weight: bold;">Opções pada remoção ou edição</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $teste)
            <tr >
                <td >{{$teste->nome}}</td>
                <td >{{$teste->valor}}</td>
                <td style="width: 1000px; height: 200px;">
                    <img src="{{ asset('images/'.$teste->fotop)}}" alt="Descrição da Imagem" class="w-60 h-38 rounded-lg shadow-md" id="fotop"></td>
                <td >{{$teste->descricao}}</td>
                <td >{{$teste->categoria_id}}</td>
                <td class="px-6 py-4">
                <a class="padding-bottom:20px font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('produto.edit',$teste->id)}}">Editar</a>
                
                <form class="grid gap-6 mb-6 md:grid-cols-2" action ="{{route('produto.destroy', $teste->id)}}" method="post" enctype="multipart/form-data">  
                <input type="hidden" value="{{csrf_token()}}" name="_token">
                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit">Remover</a> 
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