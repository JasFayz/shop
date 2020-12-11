<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $categories;

    public function __construct()
    {
        $this->categories = ShopCategory::getCategoryArray();
    }
}
