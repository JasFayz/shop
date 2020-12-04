<?php


namespace App\Providers;


use App\Imports\CategoryImport;
use App\Models\ShopCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportCategoryFromFile
{

    public static $data = [];

    public static function parseDataToArray($filename)
    {
        $cat = [];
        $cat1 = [];
        $cat2 = [];
        $cat3 = [];
        $cat4 = [];

        $array = (new CategoryImport())->toArray($filename);

        foreach ($array[0] as $one) {
            $cat[$one[1]] = $one[1];
            if ($one[2]) {
                $cat1[$one[2]] = [$one[2], 'parent' => $one[1]];
            }
            if ($one[3]) {
                $cat2[$one[3]] = [$one[3], 'parent' => $one[2]];
            }
            if ($one[4]) {
                $cat3[$one[4]] = [$one[4], 'parent' => $one[3]];
            }
            if ($one[5]) {
                $cat4[$one[5]] = [$one[5], 'parent' => $one[4]];
            }
        }
        array_splice($cat, 0, 1);
        array_splice($cat1, 0, 1);
        array_splice($cat2, 0, 1);
        array_splice($cat3, 0, 1);
        array_splice($cat4, 0, 1);

        $data[] = $cat;
        $data[] = $cat1;
        $data[] = $cat2;
        $data[] = $cat3;
        $data[] = $cat4;

        return $data;
    }

    public static function recordImportCategoryToDB($record)
    {
        $flag = 0;
        $category = ShopCategory::with('parent')->get();
        foreach ($record as $key => $rec) {
            if ($key == 'main') {
                ShopCategory::insert($rec);
                $category = ShopCategory::with('parent')->get();
            } else {
                foreach ($rec as $r) {
                    $data = [];
                    $one['name'] = $r['name'];
                    $one['slug'] = $r['slug'];

                    foreach ($category as $k => $cat) {
                        if ($category[$k]->slug == $r['parent_id']) {
                            $one['parent_id'] = $category[$k]->id;
                        }
                    }
                    $data = $one;
                    ShopCategory::insert($data);
                }
                $category = ShopCategory::with('parent')->get();
            }
        }
        return true;
    }

    public static function prepareDataForDB($data)
    {
        $record = [];
        $category = ShopCategory::all();

        foreach (array_values($data) as $key => $item) {
            if ($key == 0) {
                foreach (array_values($item) as $k => $i) {
                    $record['main'][] = [
                        'name' => $i,
                        'parent_id' => 1,
                        'slug' => Str::slug($i)
                    ];
                }
            }
            if ($key > 0) {
                foreach (array_values($item) as $k => $i) {
                    $record['category_' . $key][] = [
                        'name' => $i[0],
                        'parent_id' => Str::slug($i['parent']),
                        'slug' => Str::slug($i[0])
                    ];
                }
            }
        }
        return $record;

//        Category::create($record);
    }

    public static function run($filename)
    {
        $data = self::parseDataToArray($filename);

        $record = self::prepareDataForDB($data);

        if (self::recordImportCategoryToDB($record)) {
            return true;
        }
        return false;
    }
}
