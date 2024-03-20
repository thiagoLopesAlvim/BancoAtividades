<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categoria;
use App\Services\ProdutoService;
use App\Models\endereco;
use App\Models\itensPedido;
use App\Models\pedido;
use App\Models\produto;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isNull;

class PedidoController extends Controller
{

    public function __construct(protected ProdutoService $service){

    }
    public function adicionarCarrihno(Request $request){
        $aux = pedido::where("usuario_id","=",auth()->user()->getAuthIdentifier())->latest();
        $aux2 = $aux->get("status")->toArray();
        $aux3 = produto::where("id","=",$request->input("produto_id"))->get(['id', 'valor']);
        $valor = $aux3->pluck("valor")->toArray();
        $idproduto = $aux3->pluck("id")->toArray();
        $pedidoid = $aux->pluck("id")->toArray();
        if(  $aux2 == [] || $aux2[0]["status"] == "closed"){
          $criapedido=      pedido::create([
                    "dt_pedido"=> Carbon::now()->format('d/m/Y'),
                    "status"=> 'open',
                    'usuario_id'=> auth()->user()->getAuthIdentifier(),
          ]);
            $criapedido->save();
            $itenspedido = itensPedido::create([
                "quantidade"=> 1,
                "valor"=>  $valor[0],
                "dt_item"=> Carbon::now()->format('d/m/Y'),
                'produto_id'=> $idproduto[0],
                "pedido_id"=> $criapedido->id,
            ]);
            $itenspedido->save();
        }else{

            $itenspedido = itensPedido::create([
                "quantidade"=> 1,
                "valor"=> $valor[0],
                "dt_item"=> Carbon::now()->format('d/m/Y'),
                'produto_id'=> $idproduto[0],
                "pedido_id"=> $pedidoid[0],
            ]);
            $itenspedido->save();
        }  

        //$produtos = produto::join('categorias','produtos.categoria_id','=','categorias.id')
       // ->select('produtos.id', 'produtos.nome', 'produtos.valor','produtos.descricao','produtos.fotop'
       // ,'categorias.categoria as categoria_id')->get(); 
        //$count= pedido::where('usuario_id','=',auth()->user()->getAuthIdentifier())->count('id');
        $search = $request->get("search");
        $produtos = $this->service->paginateC(
           page: $request->get("page",1),
            perPage: $request->get("per_page",20),
           filter: $search
       );

        $count= itensPedido::join('pedidos','itens_pedidos.pedido_id','=','pedidos.id')->where(
            'pedidos.usuario_id','=',auth()->user()->getAuthIdentifier(),'and'
        )->where('pedidos.status','=','open')->count('itens_pedidos.id');
        return view('dashboard',["produtos"=>$produtos,"ncar"=>$count,"sucesso"=>null]);
    }
   
    public function resumoPedido(){
        $produtos= itensPedido::join('pedidos','itens_pedidos.pedido_id','=','pedidos.id')->
        join('produtos','itens_pedidos.produto_id','=','produtos.id')->
        where(
            'pedidos.usuario_id','=',auth()->user()->getAuthIdentifier(),'and',)->where('pedidos.status','=','open')
            ->select(['itens_pedidos.valor as valor','produtos.nome as nome','itens_pedidos.quantidade as quantidade','produtos.fotop as fotop'])->get();
        $totalvalor =0;
        foreach ($produtos as $produto) {
           $totalvalor += $produto->valor;
        };
        $endereco= endereco::where('usuario_id','=',auth()->user()->getAuthIdentifier())->latest()->first();
 
        return view('resumopedido',['produtos'=>$produtos,'endereco'=>$endereco, 'total'=>$totalvalor]);    


    }

    public function finalizarPedido(Request $request){
        $sucesso = pedido::where("usuario_id","=",auth()->user()->getAuthIdentifier(),"and","status","=","open")->latest()
        ->first()->update(["status"=>"closed"]);

        $search = $request->get("search");
        $produtos = $this->service->paginateC(
           page: $request->get("page",1),
            perPage: $request->get("per_page",20),
           filter: $search
       );

        return view("dashboard",["sucesso"=> $sucesso,"ncar"=> 0,"produtos"=> $produtos]);
    }
}
