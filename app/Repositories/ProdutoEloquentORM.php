<?php 

namespace App\Repositories;
use App\Models\produto;
use App\Repositories\ProdutoRepositoryInterface;
use stdClass;
use App\Repositories\PaginationInterface;

class ProdutoEloquentORM implements ProdutoRepositoryInterface{

    public function __construct(protected produto $model){}
    public function paginateC(int $page=1, int $perPage=20,string $filter=null): PaginationInterface{
        $result =  $this->model
                        ->where(function($query) use ($filter){
                            if($filter){
                                $query->where('categoria_id',$filter);
                                $query->orWhere('nome','like',"%{$filter}%");
                            }
                        })
                        ->paginate($perPage,["*"],"page", $page);
                    
        return new PaginationPresenter($result);
                    
    }


    public function getAll(string $filter = null): array {
        return $this->model
                        ->where(function($query) use ($filter){
                            if($filter){
                                $query->where('nome',$filter);
                                $query->orWhere('descricao','like',"%{$filter}%");
                            }
                        })
                        ->get()
                        ->toArray();
    }
    
    public function findONE(string $id):  stdClass|null{
      $support = $this->model->find($id);
      if(!$support){
        return null;
      }
     return (object) $support->toArray();

    }

}