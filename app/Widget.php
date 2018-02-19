<?php

namespace App;

use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Widget
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Product $products
 * @method static \Illuminate\Database\Query\Builder|\App\Widget filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $images
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\WidgetTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Widget listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Widget translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Widget withTranslation()
 */
class Widget extends Model
{
    use HasLocales;
    protected $table = "widgets";

    protected $fillable = ['some'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'title',
        'description',
    ];
    public $translationModel = WidgetTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
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
        if ($id = array_get($params, 'id')) {
            $query = $query->where('id', '=', $id);
        }

        if ($title = array_get($params, 'title')) {
            $query = $query->where('title', '=', $title);
        }

        if ($product_id = array_get($params, 'product_id')) {
            $query = $query->where('product_id', '=', $product_id);
        }

        if ($description = array_get($params, 'description')) {
            $query = $query->where('description', '=', $description);
        }

        if ($description_like = array_get($params, 'description_like')) {
            $query = $query->where('description', 'like', ('%' . $description_like . '%'));
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
        if ($latest = array_get($params, 'latest')) {
            $query = $query->latest();
        }

        return $query;
    }
}
