<?php 

namespace App\Services;
use App\Repositories\PaginationInterface;
use App\Repositories\ProdutoRepositoryInterface;
use stdClass;


class ProdutoService{

    public function __construct(protected  ProdutoRepositoryInterface $repository){
        
    }
    public function getAll(string $filter = null): array|null{
       return $this->repository->getAll($filter);
    }

    public function paginateC(int $page=1, int $perPage=20, string $filter=null): PaginationInterface{
        return $this->repository->paginateC(
            page: $page,
            perPage: $perPage,
            filter: $filter
        );
     }

    public function findONE(string $id): stdClass|null{
        return $this->repository->findONE($id);
    }

}