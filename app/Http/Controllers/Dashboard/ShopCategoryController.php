<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Models\ShopCategory;
use App\Providers\ImportCategoryFromFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function React\Promise\reduce;


class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ShopCategory::all();
        $query = ShopCategory::orderBy('id', 'ASC');;

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('parent_name'))) {
            $one = ShopCategory::whereName($value)->first();
            $query->where('parent_id', $one->id);
        }
        if (!empty($value = $request->get('created_at'))) {
            $query->where('created_at', $value);
        }
        $pageCategories = $query->with('parent')->paginate(15);

        return view('dashboard.shop.categories.index', compact('pageCategories', 'categories'));
    }

    public function import()
    {
        $filename = \session('filename');

        if (ImportCategoryFromFile::run($filename)) {
            return redirect()->route('shop.categories.index')
                ->with('success', 'Данные успешно импортированы');
        }
        return redirect()->route('shop.categories.index')
            ->with('error', 'Ошибка при импорте файлов');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ShopCategory::all();
        return view('dashboard.shop.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'parent_id' => 'integer|min:1|nullable',
            'image' => 'image'
        ]);
        $data['slug'] = Str::slug($data['name']);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('uploads');
        }

        $category = ShopCategory::create($data);
        if ($category) {
            return redirect()->route('shop.categories.index')->with('success', 'Категория успешно обновлена');
        }
        return redirect()->route('shop..categories.index')->with('error', 'Не удалось добавить категорию');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShopCategory $category)
    {
        return view('dashboard.shop.categories.show', compact('category'));
    }

    public function edit(ShopCategory $category)
    {
        $allCategories = ShopCategory::all();
        return view('dashboard.shop.categories.edit', [
            'allCategories' => $allCategories,
            'editingCategory' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopCategory $shopCategory)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'parent_id' => 'integer|min:1|nullable',
            'image' => 'image'
        ]);
        if ($request->file('image')) {
            $image = $request->file('image')->store('uploads');
            $data['image'] = $image;
        }
        if ($shopCategory->update($data)) {
            return redirect()->route('shop.categories.edit', $shopCategory->id)->with('success', 'Категория успешно обновлена');
        }
        return redirect()->route('shop.categories.edit', $shopCategory->id)->with('error', 'не удалось одновить категорию');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopCategory $shopCategory)
    {
        if ($shopCategory->delete()) {
            return redirect()->route('shop.categories.index')->with('success', 'Категория успешно удалена');
        }
        return redirect()->route()->with('error', 'Не удалось удалить категорию');
    }
}
