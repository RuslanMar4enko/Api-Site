<?php

namespace App;

use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $assets
 * @method static \Illuminate\Database\Query\Builder|\App\Article filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereStatus($value)
 * @property string $sub_title
 * @property string $epilog
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereEpilog($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSubTitle($value)
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ArticleTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Article listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Article notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Article translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Article withTranslation()
 */
class Article extends Model
{
    use HasLocales;
    protected $table = 'articles';
    protected $fillable = ['status'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'title',
        'sub_title',
        'description',
        'body',
        'epilog',
    ];
    public $translationModel = ArticleTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function assets()
    {
        return $this->belongsToMany(Asset::class);
    }

    /**
     * @param self $query
     * @param $params
     * @return mixed
     */
    public function scopeFilter($query, $params)
    {
        if ($id = array_get($params, 'id')) {
            $query = $query->where('id', '=', $id);
        }

        if ($title = array_get($params, 'title')) {
            $query = $query->where('title', '=', $title);
        }

        if ($sort_title_asc = array_has($params, 'sort_title_asc')) {
            $query = $query->orderBy('title', 'asc');
        }

        if ($sort_title_desc = array_has($params, 'sort_title_desc')) {
            $query = $query->orderBy('title', 'desc');
        }

        if ($title_like = array_get($params, 'title_like')) {
            $query = $query->whereTranslationLike('title', ('%' . $title_like . '%'));
        }

        if ($description = array_get($params, 'description')) {
            $query = $query->where('description', 'like', ('%' . $description . '%'));
        }

        if ($sort_id_asc = array_get($params, 'sort_id_asc')) {
            $query = $query->orderBy('id', 'asc');
        }

        if ($sort_id_desc = array_get($params, 'sort_id_desc')) {
            $query = $query->orderBy('id', 'desc');
        }

        if ($latest = array_get($params, 'latest')) {
            $query = $query->latest();
        }

        if ($status = array_get($params, 'status')) {
            $query = $query->where('status', $status);
        }


        return $query;
    }
}
