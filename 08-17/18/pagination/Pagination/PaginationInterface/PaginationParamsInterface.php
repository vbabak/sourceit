<?php

namespace Pagination\PaginationInterface;

interface PaginationParamsInterface
{
    public function setCurrentPage(int $page);

    public function setPerPage(int $page);

    public function setTotalElements(int $total);

    public function setNumLinks(int $links);
}
