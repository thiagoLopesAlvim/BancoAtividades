<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categoria;
use App\Models\itensPedido;
use App\Models\pedido;
use App\Models\produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class ProdutoController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index(Request $request){
        $produtos = produto::join('categorias','produtos.categoria_id','=','categorias.id')
        ->select('produtos.id', 'produtos.nome', 'produtos.valor','produtos.descricao','produtos.fotop'
        ,'categorias.categoria as categoria_id')->get(); 
        


        return view("produto/index", ["produtos"=>$produtos]);
    
    }

    public function dashboard(Request $request){
        $produtos = produto::join('categorias','produtos.categoria_id','=','categorias.id')
        ->select('produtos.id', 'produtos.nome', 'produtos.valor','produtos.descricao','produtos.fotop'
        ,'categorias.categoria as categoria_id')->get(); 
        
        $count= itensPedido::join('pedidos','itens_pedidos.pedido_id','=','pedidos.id')->where(
            'pedidos.usuario_id','=',auth()->user()->getAuthIdentifier(),'and'
        )->where('pedidos.status','=','open')->count('itens_pedidos.id');
    
        return view("dashboard", ["produtos"=>$produtos,"ncar"=>$count,"sucesso"=>null]);
    }

    public function create(){
        $categorias = Categoria::all();

      
        return view('produto/create', ["categorias"=>$categorias]);
    }
    public function store(Request $request){ 
        if($request->fotop){
            $caminho = 'images/fotoprodutos';
            $imagem = $request->file('imagem');
            $nomeImagem = uniqid().'.'.$imagem->getClientOriginalExtension();
            $imagem->move(public_path($caminho), $nomeImagem);
             //  $request->pathImg = $path
               
            }else{
                $path= 'null';
            }
        $produto = produto::create([
            "nome"=> $request->nomep,
            "valor"=> $request->valorp,
            "fotop"=> $caminho,
            "descricao"=> $request->descricaop,
            "categoria_id"=> $request->categoriap
        ]);


        

        $produto->save();

        $produtos = produto::join('categorias','produtos.categoria_id','=','categorias.id')
        ->select('produtos.id', 'produtos.nome', 'produtos.valor','produtos.descricao','produtos.fotop'
        ,'categorias.categoria as categoria_id')->get(); 
        

        return view("produto/index",["produtos"=>$produtos]);
    }
    public function edit(Request $request ,string $id): View
    {
        $produtos = produto::where("id",'=',$id )->first();
        $categoria = Categoria::where('id','=',$produtos->categoria_id)->first(); 
        $produtos->catnome = $categoria->categoria;  
        $categorias = Categoria::all();
        return view("produto.edit", ["produto"=>$produtos],["categorias"=>$categorias]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
      

       $categorias = produto::where("id",'=',$request->id )->first();
        
        $categorias->update([
            "nome"=> $request->nomep,
            "valor"=> $request->valorp,
            "descricao"=> $request->descricaop,
            "fotop"=> $request->fotop,
            "categoria_id"=> $request->categoriap
        ]);
       $categorias->save();

        return Redirect::route('produto.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, string $id)
    {
        $categoria = produto::where('id','=',$id );
        $categoria->delete();  

        return redirect()->route('produto.index');
    }
}
