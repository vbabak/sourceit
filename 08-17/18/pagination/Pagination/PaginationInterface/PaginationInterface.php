<?php

namespace Pagination\PaginationInterface;

interface PaginationInterface extends PaginationParamsInterface
{
    public function getLinksRange(): array;
}
