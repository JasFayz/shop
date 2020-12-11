<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class ShopCategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ShopCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ShopCategory::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(ShopProduct::class);
    }

    public static function getCategoryArray()
    {
        $categories = self::with('children')->get()->toArray();

        $parent = [];
        foreach ($categories as $category) {
            $parent[$category['parent_id']][] = $category;
        }
        $tree = self::createTree($parent, $parent[0]);

        return $tree;
    }

    public static function createTree(&$list, $parent)
    {
        $tree = array();
        foreach ($parent as $k => $l) {
            if (isset($list[$l['id']])) {
                $l['children'] = self::createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }

    public static function getCategoriesById($id)
    {

        $allCategories = self::all()->toArray();

        $result = self::getIdAllChildrenByParent($id, $allCategories);

        return $result;
    }

    static function getIdAllChildrenByParent($catId, $rsCategories)
    {

        // создаём массив для хранения айдишников дочерних категорий
        $arrIdChildCats = [];

        // сохраняем айдишники дочерних категорий в массив
        foreach ($rsCategories as $value) {
            if ($value['parent_id'] == $catId) {
                $arrIdChildCats[] = $value['id'];
            }
        }

        // найденные айдишники записываем в строку и проходимся
        // по каждому из них нашей функцией, чтобы найти ещё дочерние категории
        $result = array();
        foreach ($arrIdChildCats as $value) {
            $result [] = $value;
            $result = array_merge($result, self::getIdAllChildrenByParent($value, $rsCategories));
        }
        array_unshift($result, $catId);
        return $result;

    }

}
