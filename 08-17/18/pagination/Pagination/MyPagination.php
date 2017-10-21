<?php

namespace Pagination;

use Pagination\PaginationInterface\PaginationInterface;

class MyPagination extends PaginationAbstract implements PaginationInterface
{
    protected $links_range = [];

    public function getLinksRange(): array
    {
        return $this->links_range;
    }
}