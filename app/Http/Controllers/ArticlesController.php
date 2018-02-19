<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('assets')->filter($request->all());

        if ($request->per_page)
            return $query->paginate($request->per_page);

        return ['data'=>$query->get()];
    }

    public function store(CreateArticleRequest $request)
    {
        $article = new Article($this->getFillingParams($request));
        $article->save();

        $article->assets()->sync(array_pluck($request->assets, 'id'));

        return ['data' => $article->load('assets')];
    }

    public function update(UpdateArticleRequest $request)
    {
        /** @var Article $article */
        $article = Article::findOrFail($request->id);

        $article->update($this->getFillingParams($request));

        $article->assets()->sync(array_pluck($request->assets, 'id'));

        return ['data' => $article->load('assets')];
    }

    public function destroy(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->assets()->detach();
        $article->delete();
    }
    private function getFillingParams(Request $request)
    {
        $params = array_merge($request->only([
            'en',
            'ru',
            'ge',
            'status',
        ]), $request->input(app()->getLocale()));

        return $params;
    }
}
