<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CategoryTranslation
 *
 * @property int $id
 * @property int $category_id
 * @property string $locale
 * @property string $title
 * @method static \Illuminate\Database\Query\Builder|\App\CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CategoryTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
    ];
}
