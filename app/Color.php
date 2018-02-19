<?php

namespace App;

use App\Traits\HasLocales;
use App\Traits\THasFilters;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Color
 *
 * @property int $id
 * @property string $color
 * @property int $product_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $assets
 * @property-read \App\Product $products
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $value
 * @method static \Illuminate\Database\Query\Builder|\App\Color filtered($params)
 * @method static \Illuminate\Database\Query\Builder|\App\Color whereValue($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asset[] $images
 * @property-read \App\Product $product
 */
class Color extends Model
{

    use HasLocales;
    protected $table = 'colors';
    protected $fillable = ['value'];
    protected $with = ['translations'];
    public $translatedAttributes = [
        'color',
    ];
    public $translationModel = ColorTranslation::class;
    protected $appends = [
        'en',
        'ru',
        'ge',
    ];

    public function assets()
    {
        return $this->belongsToMany(Asset::class, 'color_asset', 'color_id', 'asset_id');
    }

    public function images()
    {
        return $this->belongsToMany(Asset::class, 'color_asset', 'color_id', 'asset_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @param self $query
     * @param $params
     * @return self
     */
    public function scopeFiltered($query, $params)
    {
        if ($id = array_get($params, 'id'))
            $query = $query->where('id', $id);

        if ($colorLike = array_get($params, 'color_like'))
            $query = $query->where('color', 'LIKE', "%$colorLike%");

        if ($latest = array_get($params, 'latest'))
            $query = $query->latest();

        if ($product = array_get($params, 'product'))
            $query = $query->whereHas('product', function ($q) use ($product) {
                /** @var Product $q */
                $q->filter($product);
            });

        return $query;
    }

}
