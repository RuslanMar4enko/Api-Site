<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    public function getMany(Request $request)
    {
        $query = Category::with('images')->filter($request->all());

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function create(CategoriesRequest $request)
    {
        $categories = new Category($this->getFillingParams($request));
        $categories->save();
        $categories->images()->sync(array_pluck($request->images, 'id'));
        return ['data' => $categories->load('images')];
    }

    public function update(CategoriesRequest $request)
    {
        $category = Category::findOrFail($request->id);
        $category->update($this->getFillingParams($request));
        $category->images()->sync(array_pluck($request->images, 'id'));
        return ['data' => $category->load('images')];
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $category->delete();
    }

    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
            'title',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}