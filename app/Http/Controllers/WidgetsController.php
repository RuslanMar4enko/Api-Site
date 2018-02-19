<?php

namespace App\Http\Controllers;

use App\Widget;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\WidgetRequest;

class WidgetsController extends Controller
{

    public function index(Request $request)
    {
        $query = Widget::with('images')->filter($request->all());

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function store(WidgetRequest $request)
    {
        $widget = new Widget($this->getFillingParams($request));
        $widget->save();

        $widget->images()->sync(array_pluck($request->images, 'id'));

        return ['data' => $widget->load('images')];
    }

    public function update(WidgetRequest $request)
    {
        $widget= Widget::findOrFail($request->id);
        $widget->update($this->getFillingParams($request));
        $widget->images()->sync(array_pluck($request->images, 'id'));
        return ['data' => $widget->load('images')];
    }


    public function destroy(Request $request)
    {
        $widget= Widget::findOrFail($request->id);
        $widget->delete();
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