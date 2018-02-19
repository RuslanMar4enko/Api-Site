<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Type;
use App\Widget;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('type.category', 'characteristics', 'widgets', 'colors.assets', 'images')
            ->filter($request->all())->latest();


        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function show(Request $request)
    {
        $query = new Product ();

        if (!Auth::user())
            $query = $query->where('status', 'PUBLISHED');

        $product = $query->findOrFail($request->id);

        $product->load('type.category', 'characteristics', 'widgets.images', 'colors.images', 'images');
        $product->widgets->each(function ($item, $key) {
            /** @var Widget $item */
            $item->append('image');
        });

        return [
            'data' => $product
        ];

    }

    public function store(ProductsRequest $request)
    {
        $product = new Product($this->getFillingParams($request));
        $product->type()->associate(Type::findOrFail($request->input('type.id')));
        $product->save();

        $product->widgets()->sync(array_pluck($request->widgets, 'id'));
        $product->characteristics()->sync(array_pluck($request->characteristics, 'id'));
        $product->images()->sync(array_pluck($request->images, 'id'));

        return ['data' => $product->load('widgets', 'characteristics', 'images')];
    }

    public function update(ProductsRequest $request)
    {

        /** @var Product $product */
        $product = Product::findOrFail($request->id);
        $product->type()->associate(Type::findOrFail($request->input('type.id')));
        $product->update($this->getFillingParams($request));

        $product->widgets()->sync(array_pluck($request->widgets, 'id'));
        $product->characteristics()->sync(array_pluck($request->characteristics, 'id'));
        $product->images()->sync(array_pluck($request->images, 'id'));


        return ['data' => $product->load('widgets', 'characteristics', 'images')];
    }

    public function destroy(Request $request)
    {
        /** @var Product $product */
        $product = Product::findOrFail($request->id);
        $product->images()->detach();
        $product->colors()->delete();
        $product->characteristics()->delete();
        $product->widgets()->delete();

        $product->delete();
    }

    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
            'price',
            'old_price',
            'status',
            'is_sale',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}
