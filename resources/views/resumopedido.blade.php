<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resumo pedido') }}
        </h2>

    </x-slot>

    
<table>
<thead>

</thead>
<body>
<div style="display:flex ;justify-content: space-between;flex-direction:column;" class="row container">
    @foreach($produtos as $produto)
            <div style="width: 70%; padding: 20px; border: 1px solid #ddd ; background-color:gray;border-radius: 10px;
            overflow:auto;display:flex;justify-content: space-between;">                          
                            <img style="height: 200px; width: 150px" src="{{asset('images/'.$produto->fotop)}}">
               
                            <label> Nome do produto: </label>
                            <span style="font-weight: bold;" id="titulo"> {{$produto->nome}}</span><br>
                            
                            <label>Valor do produto:</label>
                            <span style="font-weight: bold;" id="valor" name="valor">{{$produto->valor}}</span><br>
                            <label>Quantidade do produto:</label>
                            <span id="descricao">{{$produto->quantidade}}</span><br>
            </div>     
    @endforeach 
</div>
</body>
</table>
                <div style="background-color:lightgrey; width: 70%;padding: 20px; border: 1px solid #ddd ;border-radius: 10px;">
                    <h2 style="font-weight: bold;font-size:25px">Valor total dos produtos: {{$total}} R$</h2>
                    <br>
                  <div style="padding-bottom: 15px;">  
                    <h2 style="padding-bottom: 15px;">Endreço de envio: </h2>
                    
                    <label style="padding-bottom: 10px;font-weight:bold;">Logradouro: {{$endereco->logradouro}}</label>
                    <br>
                    <label style="padding-bottom: 10px;font-weight:bold;">Numero: {{$endereco->numero}}</label>
                    <br>
                    <label style="padding-bottom: 10px;font-weight:bold;">Complemento: {{$endereco->complemento}}</label>
                    <br>
                    <label style="padding-bottom: 10px;font-weight:bold;">Estado: {{$endereco->estado}}</label>
                    </div>
                </div>
           
            <Form action="{{route('finalizar.pedido')}}" method="post">
            @method('PUT');
            <input type="hidden" value="{{csrf_token()}}" name="_token"> 
                <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" type="submit">Comprar</button>
            </Form>
            
</x-app-layout>