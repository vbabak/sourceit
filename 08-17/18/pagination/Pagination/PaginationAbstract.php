<?php

namespace Pagination;

use Pagination\PaginationInterface\PaginationParamsInterface;

abstract class PaginationAbstract implements PaginationParamsInterface
{
    protected $current_page = 1;
    protected $per_page = 10;
    protected $total_elements = 0;
    protected $num_links = 7;

    public function setCurrentPage(int $page)
    {
        $this->current_page = $page;
        return $this;
    }

    public function setPerPage(int $page)
    {
        $this->per_page = $page;
        return $this;
    }

    public function setTotalElements(int $total)
    {
        $this->total_elements = $total;
        return $this;
    }

    public function setNumLinks(int $links)
    {
        $this->num_links = $links;
        return $this;
    }
}