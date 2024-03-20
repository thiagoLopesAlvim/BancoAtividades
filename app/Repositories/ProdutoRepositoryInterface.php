<?php

namespace App\Repositories;

use App\Repositories\PaginationInterface;
use stdClass;

Interface ProdutoRepositoryInterface{
    public function paginateC(int $page=1, int $perPage=20, string $filter): PaginationInterface;
    public function getAll(string $filter = null): array ;
    public function findONE(string $id):  stdClass|null;
}