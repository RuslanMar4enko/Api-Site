<?php

namespace App\Http\Controllers;

use App\Type;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTypesRequest;

class TypesController extends Controller
{
    public function getMany(Request $request)
    {
        $query = Type::with('category', 'images')->filter($request->all());

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data' => $query->get()];
    }

    public function create(CreateTypesRequest $request)
    {
        $type = new Type($this->getFillingParams($request));

        $type->category()->associate(Category::findOrFail($request->input('category.id')));
        $type->save();
        $type->images()->sync(array_pluck($request->images, 'id'));

        return ['data' => $type->load('images')];
    }

    public function update(CreateTypesRequest $request)
    {
        /** @var Type $type */
        $type = Type::findOrFail($request->id);
        $type->category()->associate(Category::findOrFail($request->input('category.id')));
        $type->update($this->getFillingParams($request));
        $type->images()->sync(array_pluck($request->images, 'id'));

        return ['data' => $type->load('images')];
    }

    public function delete(Request $request)
    {
        $type = Type::findOrFail($request->id);
        $type->delete();
    }

    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}
