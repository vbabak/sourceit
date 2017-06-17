<?php

namespace Application\Model;

class Pagination
{
    protected $per_page = 10;
    protected $start_page = 1;
    protected $per_range = 5;
    protected $total = 0;
    protected $total_pages = 0;
    protected $links = array();

    public function __construct(int $total, int $per_page = null, int $start_page = null, int $per_range = null)
    {
        if ($total) {
            $this->total = $total;
        }
        if ($per_page) {
            $this->per_page = $per_page;
        }
        if ($start_page) {
            $this->start_page = $start_page;
        }
        if ($per_range) {
            $this->per_range = $per_range;
        }
        $this->processLinks();
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getTotalPages()
    {
        return $this->total_pages;
    }

    public function getStart()
    {
        return $this->start_page * $this->per_page;
    }

    public function getStartPage()
    {
        return $this->start_page;
    }

    public function getLimit()
    {
        return $this->per_page;
    }

    public function getTotalItems()
    {
        return $this->total;
    }

    protected function processLinks()
    {
        $this->total_pages = floor($this->total / $this->per_page);
        $center = max($this->start_page, ceil($this->per_range / 2));
        $first = (int) max(1, ceil($center - ($this->per_range / 2)));
        if ($this->total_pages >= $this->per_page && ($this->total_pages - $first) < $this->per_range) {
            $first = (int) $this->total_pages - $this->per_range + 1;
        }
        $add = (int) $first + min($this->per_range - 1, $this->total_pages - $first);
        for ($i = $first; $i <= $add; $i++) {
            $this->links[] = $i;
        }
    }
}