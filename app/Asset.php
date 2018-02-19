<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Asset
 *
 * @property int $id
 * @property string $name
 * @property string $size
 * @property string $type
 * @property string $url
 * @property string $thumbnail_url
 * @property string $width
 * @property string $height
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereWidth($value)
 * @mixin \Eloquent
 * @property-read mixed $thumbnail
 * @property string $product_large_thumbnail
 * @property string $product_little_thumbnail
 * @property string $widget_thumbnail
 * @property string $article_large_thumbnail
 * @property string $article_little_thumbnail
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereArticleLargeThumbnail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereArticleLittleThumbnail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereProductLargeThumbnail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereProductLittleThumbnail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Asset whereWidgetThumbnail($value)
 */
class Asset extends Model
{
    protected $table = 'assets';
    protected $fillable = [];
    protected $appends = ['thumbnail'];

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_asset', 'color_id', 'asset_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getThumbnailAttribute()
    {

        return $this->thumbnail_url;
    }

}
