<?php

namespace App;

use App\Entesions\Model\THelpers;
use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int $type_id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $old_pice
 * @property string $body
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $assets
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Characteristic[] $characteristics
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read \App\Type $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Widget[] $widgets
 * @method static \Illuminate\Database\Query\Builder|\App\Product filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereOldPice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $image
 * @property-read mixed $similar_products
 * @property bool $is_sale
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereIsSale($value)
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $images
 * @property-write mixed $old_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Product listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Product notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Product translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Product withTranslation()
 */
class Product extends Model
{
    use HasLocales, THelpers;

    protected $table = "products";

    protected $fillable = [
        'type_id',
        'price',
        'old_pice',
        'old_price',
        'status',
        'is_sale',
    ];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'body',
        'title',
        'sub_title',
        'description'
    ];
    public $translationModel = ProductTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class);
    }

    public function widgets()
    {
        return $this->belongsToMany(Widget::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function images()
    {
        return $this->belongsToMany(Asset::class);
    }

    public function getOldPriceAttribute()
    {
        return $this->old_pice;
    }

    public function setOldPriceAttribute($v)
    {
        $this->old_pice = $v;
    }

    public function getOldPiceAttribute()
    {
        return $this->getMoneyType('old_pice');
    }

    public function setOldPiceAttribute($v)
    {
        $this->setMoneyType('old_pice', $v);
    }


    public function getPriceAttribute()
    {
        return $this->getMoneyType('price');
    }

    public function setPriceAttribute($v)
    {
        $this->setMoneyType('price', $v);
    }

    public function getImageAttribute()
    {
        if ($this->assets)
            return $this->assets->first();
    }

    public function getSimilarProductsAttribute()
    {
        return self::with('assets', 'type')->whereNotIn('id', [$this->id])->whereHas('type', function ($q) {
            if ($this->type)
                $q->where('id', $this->type->id);
        })->latest()->take(4)->get();
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

        if ($type = array_get($params, 'type_id')) {
            $query = $query->where('type_id', '=', $type);
        }

        if ($price = array_get($params, 'price')) {
            $query = $query->where('price', '=', $price);
        }
        $price_from = array_get($params, 'price_from');
        $price_to = array_get($params, 'price_to');
        if ($price_from && !$price_to) {
            $query = $query->where('price', '>=', $price_from);
        }

        if ($price_to && !$price_from) {
            $query = $query->where('price', '<=', trim($params['price_to']));
        }

        if ($price_from && $price_to) {
            $query = $query->whereBetween('price', [$price_from, $price_to]);
        }

        if ($sort_price_asc = array_get($params, 'sort_price_asc')) {
            $query = $query->orderBy('price', 'asc');
        }

        if ($sort_price_desc = array_get($params, 'sort_price_desc')) {
            $query = $query->orderBy('price', 'desc');
        }

        if ($sort_id_asc = array_get($params, 'sort_id_asc')) {
            $query = $query->orderBy('id', 'asc');
        }

        if ($sort_id_desc = array_get($params, 'sort_id_desc')) {
            $query = $query->orderBy('id', 'desc');
        }

        if ($status = array_get($params, 'status'))
            $query = $query->where('status', $status);

        if ($isSale = array_get($params, 'is_sale') === true)
            $query = $query->where('is_sale', true);

        if ($category = array_get($params, 'category'))
            $query = $query->whereHas('type', function ($q) use ($category) {
                $q->whereHas('category', function ($q) use ($category) {
                    $q->filter($category);
                });
            });

        return $query;
    }

}
