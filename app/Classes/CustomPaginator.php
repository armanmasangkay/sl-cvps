<?php namespace App\Classes;

use Illuminate\Pagination\LengthAwarePaginator;


class CustomPaginator extends LengthAwarePaginator{

    public function __construct($items,$total)
    {
        $perPage=5;
        parent::__construct($items,$total,$perPage);
    }

}