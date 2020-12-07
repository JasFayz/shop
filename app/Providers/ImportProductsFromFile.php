<?php


namespace App\Providers;


use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use App\Models\ShopCategory;
use App\Models\ShopProduct;

class ImportProductsFromFile
{
    public static function parseDataToArray($filename)
    {
        $good = [];

        $array = (new ProductImport())->toArray($filename);

        foreach ($array[0] as $key => $one) {
            $good[$key] = [
                'name' => $one[6],
                'part_number' => $one[7] ?? null,
                'manufacturer_number' => $one[8] ?? null,
                'manufacturer' => $one[9] ?? null,
                'price' => $one[10],
                'category_name' => $one[5] ?? $one[4] ?? $one[3] ?? $one[2] ?? $one[1]
            ];
        }

        array_splice($good, 0, 1);

        return $good;
    }

    public static function prepareData($data)
    {
        $category = ShopCategory::all()->toArray();

        foreach ($data as $key => $item) {
            foreach ($category as $cat) {
                if ($cat['name'] == $item['category_name']) {
                    $data[$key]['category_id'] = $cat['id'];
                    unset($data[$key]['category_name']);
                }
            }
        }

        return $data;
    }

    public static function recordToDb($data)
    {
        ShopProduct::insert($data);
    }

    public static function run($filename)
    {
        $data = self::parseDataToArray($filename);

        $record = self::prepareData($data);

        if (self::recordToDb($record)) {
            return redirect()->route('shop.products.index');
        }
    }

}
