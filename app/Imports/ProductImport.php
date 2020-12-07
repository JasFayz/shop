<?php

namespace App\Imports;

use App\ShopProduct;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {

    }
}
