<?php

namespace App;

use App\Traits\HasLocales;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Characteristic
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property string $value
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Product $products
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic filter($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereValue($value)
 * @mixin \Eloquent
 * @property-read mixed $en
 * @property-read mixed $ge
 * @property-read mixed $ru
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CharacteristicTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic whereTranslationNotNull($key, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Characteristic withTranslation()
 */
class Characteristic extends Model
{
    use HasLocales;
    protected $table = "characteristics";

    protected $fillable = ['type'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'title',
        'value',
    ];
    public $translationModel = CharacteristicTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
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

        if ( $product_id = array_get($params, 'product_id') )
        {
            $query = $query->where('product_id', '=', $product_id);
        }

        if ( $value = array_get($params, 'value') )
        {
            $query = $query->where('value', '=', $value);
        }

        if ( $value_like = array_get($params, 'value_like') )
        {
            $query = $query->where('value_like', 'like', ('%' . $value_like . '%'));
        }

        if ( $title_like = array_get($params, 'title_like') )
        {
            $query = $query->whereTranslationLike('title', ('%' . $title_like . '%'));
        }

        if ( $type = array_get($params, 'type') )
        {
            $query = $query->where('type', '=' , $type);
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

        return $query;
    }
}
