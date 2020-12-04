<?php

namespace App\Imports;

//use App\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


class CategoryImport implements ToModel
{
    use Importable;
    public $one = [];


    public function model(array $row)
    {
//        dump($row);

        return $row[1];
//        echo '<pre>';
//        print_r($mainCategory);
//        echo '</pre>';
    }

}
