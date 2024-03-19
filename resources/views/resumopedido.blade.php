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
    <div style="display:flex ;justify-content: space-between;" class="row container">
    @foreach($produtos as $produto)
            <div style="width: 50%; padding: 20px; border: 1px solid #ddd ; background-color:darksalmon">
                <div>
                            <li>
                            <img style="height: 400px; width: 300px" src="{{asset('images/'.$produto->fotop)}}">
                            </li>
                </div>
                <div>
                            <label> Nome do produto: </label>
                            <li style="font-weight: bold;" id="titulo"> {{$produto->nome}}</li>
                </div>
                            <br>
                <div>
                            <label>Valor do produto:</label>
                            <li style="font-weight: bold;" id="valor" name="valor">{{$produto->valor}}</li>
                            <br>
                </div>
                            <label>Quantidade do produto:</label>
                            <li id="descricao">{{$produto->quantidade}}</li>
                            <br>
            </div>     
    @endforeach 
</body>
</table>
                <div>
                    <h2>Valor total dos produtos: {{$total}},00</h2>
                    <br>
                    <h2>Endreço de envio: </h2>
                    <label>Logradouro: {{$endereco->logradouro}}</label>
                    <br>
                    <label>Numero: {{$endereco->numero}}</label>
                    <br>
                    <label>Complemento: {{$endereco->complemento}}</label>
                    <br>
                    <label>Estado: {{$endereco->estado}}</label>
                </div>
           
            <Form action="{{route('finalizar.pedido')}}" method="post">
            @method('PUT');
            <input type="hidden" value="{{csrf_token()}}" name="_token"> 
                <button type="submit">Comprar</button>
            </Form>
            
</x-app-layout>