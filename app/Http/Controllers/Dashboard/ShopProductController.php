<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Providers\ImportCategoryFromFile;
use App\Providers\ImportProductsFromFile;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ShopProduct::orderBy('id', 'ASC');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('part_number'))) {
            $query->where('part_number', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('manufacturer_number'))) {
            $query->where('manufacturer_number', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('manufacturer'))) {
            $query->where('manufacturer', 'like', '%' . $value . '%');
        }
        if (!empty($value = $request->get('price'))) {
            $query->where('price', $value);
        }
        $products = $query->with('category')->paginate(15);

        return view('dashboard.shop.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ShopCategory::all();
        return view('dashboard.shop.products.create', compact('categories'));
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
            'category_id' => 'required|integer',
            'part_number' => 'required|string',
            'manufacturer_number' => 'required|string',
            'manufacturer' => 'string',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('uploads');
        }
        $category = ShopProduct::create($data);

        if ($category) {
            return redirect()->route('shop.products.index')->with('success', 'Товар успешно добавлен');
        }
        return redirect()->route('shop.products.index')->with('error', 'Не удалось добавить товар');
    }

    public function import()
    {
        $filename = \session('filename');

        if (ImportProductsFromFile::run($filename)) {
            return redirect()->route('shop.products.index')
                ->with('success', 'Данные успешно импортированы');
        }
        return redirect()->route('shop.products.index')
            ->with('error', 'Ошибка при импорте файлов');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShopProduct $product)
    {
        return view('dashboard.shop.products.show', compact('product'));
    }


    public function edit(ShopProduct $product)
    {
        $allCategories = ShopCategory::all();
        return view('dashboard.shop.products.edit',
            compact('product', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopProduct $product)
    {

        $data = $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required|integer',
            'part_number' => 'required|string',
            'manufacturer_number' => 'required|string',
            'manufacturer' => 'string',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('uploads');
        }

        if ($product->update($data)) {
            return redirect()->route('shop.products.index')->with('success', 'Товар успешно обновлен');
        }

        return redirect()->route('shop.products.index')->with('error', 'Не удалось обновить товар');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopProduct $product)
    {
        if ($product->delete()) {
            $product->delete();
            return redirect()->route('shop.products.index')->with('success', "Товар успешно удален");
        }

        return redirect()->route('shop.products.index')->with('success', 'Не удалось удалить товар');
    }
}
