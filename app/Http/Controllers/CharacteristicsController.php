<?php

namespace App\Http\Controllers;

use App\Product;
use App\Characteristic;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCharacteristicsRequest;

class CharacteristicsController extends Controller
{
    public function index(Request $request)
    {
        $query = Characteristic::filter($request->all());

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function store(CreateCharacteristicsRequest $request)
    {
        $characteristic = new Characteristic($this->getFillingParams($request));
        $characteristic->save();

        return ['data' => $characteristic];
    }

    public function update(CreateCharacteristicsRequest $request)
    {
        /** @var Characteristic $characteristic */
        $characteristic = Characteristic::findOrFail($request->id);
        $characteristic->update($this->getFillingParams($request));

        return ['data' => $characteristic];
    }

    public function destroy(Request $request)
    {
        /** @var Characteristic $characteristic */
        $characteristic = Characteristic::findOrFail($request->id);
        $characteristic->delete();
    }

    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
            'type',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}