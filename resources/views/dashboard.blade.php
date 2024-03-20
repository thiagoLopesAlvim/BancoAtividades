<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    <a href="{{route('resumo.pedido')}}">Itens no carrinho: {{$ncar}}</a>
    </x-slot>
</div>
    <div style="display:flex ;justify-content: space-between;flex-wrap:wrap;" class="row container">
            @foreach($produtos->items() as $produto)
            <div style="width: 30%; padding: 20px; border: 1px solid #ddd ;border-radius: 10px;
            overflow:auto;display:flex;" class="bg-gray-200">
                    <form action="{{route('adicionar.car',$produto->id)}}" method="post" >
                    <input type="hidden" value="{{csrf_token()}}" name="_token"> 
                    <input type="hidden" name="produto_id" value="{{$produto->id}}">
                    <input type="hidden" name="valor" value="{{$produto->valor}}">
                    
                            <img style="height: 200px; width: 150px" src="{{asset('images/'.$produto->fotop)}}">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"></a>
                            <label> Nome do produto: </label>
                            <span style="font-weight: bold;" id="titulo">{{$produto->nome}}</span>
                            <br>
                            <label>Valor do produto:</label>
                            <span style="font-weight: bold;" id="valor" name="valor">{{$produto->valor.'R$'}}</span>
                            <br>
                            <label>Descrição do produto:</label>
                            <p id="descricao">{{$produto->descricao}}</p>
                            <br>
                            <button id="addcar" type="submit" style=" background-color: #007bff; 
                                color: #fff; 
                                border: none; 
                                padding: 10px 20px;
                                cursor: pointer; 
                                border-radius: 5px;
                                text-transform: uppercase;
                                font-weight: bold;">Adcionar produto ao carrinho</button>
                    
                </form>
            </div>
            @endforeach



    </div>


    <script>
        botao = document.getElementById('addcar');

    // Adiciona um event listener para o evento de clique
      botao.addEventListener('click', function() {
        alert("O seu pedido foi realizado com Sucesso");});
    </script>

    <style>
  .imagem {
    aspect-ratio: 4/ 3;
    object-fit: cover;
  }
  .titulo {
    aspect-ratio: 16 / 10;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .descricao {
    aspect-ratio: 16 / 8;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>  

<script>
const botao = document.getElementById('addCar');

botao.addEventListener('click',function(){
    alert("Seu produto foi adicionado!");
})
</script>
</x-app-layout>
