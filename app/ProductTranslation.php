<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string $locale
 * @property string $body
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'body',
        'title',
        'sub_title',
        'description'
    ];
}
