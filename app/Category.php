<?php

namespace App;

use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \App\Type $type
 * @method static \Illuminate\Database\Query\Builder|\App\Category filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $images
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CategoryTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Category listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Category notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Category translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Category withTranslation()
 */
class Category extends Model
{
    use HasLocales;

    protected $table = "categories";
    protected $fillable = ['some'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'title',
    ];
    public $translationModel = CategoryTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function images()
    {
        return $this->belongsToMany(Asset::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * @param self $query
     * @param $params
     * @return mixed
     */
    public function scopeFilter($query, $params)
    {
        if ( $id = array_get($params, 'id') )
        {
            $query = $query->where('id', '=', $id);
        }

        if ( $title = array_get($params, 'title') )
        {
            $query = $query->where('title', '=', $title);
        }

        if ( $title_like = array_get($params, 'title_like') )
        {
            $query = $query->whereTranslationLike('title', ('%' . $title_like . '%'));
        }

        if ( $sort_title_asc = array_has($params, 'sort_title_asc') )
        {
            $query = $query->orderBy('title', 'asc');
        }

        if ( $sort_title_desc = array_has($params, 'sort_title_desc') )
        {
            $query = $query->orderBy('title', 'desc');
        }

        if ( $sort_id_asc = array_has($params, 'sort_id_asc') )
        {
            $query = $query->orderBy('id', 'asc');
        }

        if ( $sort_id_desc = array_has($params, 'sort_id_desc') )
        {
            $query = $query->orderBy('id', 'desc');
        }
        if ( $latest = array_has($params, 'latest') )
        {
            $query = $query->latest();
        }



        return $query;
    }
}
