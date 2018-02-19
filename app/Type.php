<?php

namespace App;

use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Category $categories
 * @property-read \App\Product $products
 * @method static \Illuminate\Database\Query\Builder|\App\Type filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Category $category
 * @property string $description
 * @property-read mixed $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $images
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereDescription($value)
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TypeTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Type listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Type notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Type translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Type withTranslation()
 */
class Type extends Model
{
    use HasLocales;
    protected $table = 'types';

    protected $fillable = ['some'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'title',
        'description',
    ];
    public $translationModel = TypeTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->belongsToMany(Asset::class);
    }

    public function getImageAttribute()
    {
        if ($this->images)
            return $this->images->first();
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

        if ( $category_id = array_get($params, 'category_id') )
        {
            $query = $query->where('category_id', '=', $category_id);
        }

        if ( $sort_title_asc = array_get($params, 'sort_title_asc') )
        {
            $query = $query->orderBy('title', 'asc');
        }

        if ( $sort_title_desc = array_get($params, 'sort_title_desc') )
        {
            $query = $query->orderBy('title', 'desc');
        }

        if ( $sort_id_asc = array_get($params, 'sort_id_asc') )
        {
            $query = $query->orderBy('id', 'asc');
        }

        if ( $sort_id_desc = array_get($params, 'sort_id_desc') )
        {
            $query = $query->orderBy('id', 'desc');
        }
        if ( $latest = array_get($params, 'latest') )
        {
            $query = $query->latest();
        }


        if ( $category = array_get($params, 'category') )
        {
            $query = $query->whereHas('category', function ($q) use($category) {
                if($id = array_get($category, 'id'))
                $q->where('id', $id);
            });
        }

        return $query;
    }

}
