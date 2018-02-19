<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function getMany(Request $request)
    {
        return ['data'=>Color::with('images')->filtered($request->all())->get()];
    }

    public function create(ColorRequest $request)
    {
        $color = new Color($this->getFillingParams($request));

        $color->product()->associate(Product::findOrFail($request->input('product.id')));

        $color->save();

        $color->assets()->detach();
        $color->assets()->attach(array_pluck($request->images, 'id'));

        return ['data' => $color->load('images')];
    }

    public function update(ColorRequest $request)
    {
        $color = Color::findOrFail($request->id);

        $color->product()->associate(Product::findOrFail($request->input('product.id')));
        $color->update($this->getFillingParams($request));



        $color->assets()->detach();
        $color->assets()->attach(array_pluck($request->images, 'id'));

        return ['data' => $color->load('images')];
    }

    public function delete(Request $request)
    {
        $color = Color::findOrFail($request->id);
        $color->assets()->detach();

        $color->delete();
    }

    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
            'value',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}
