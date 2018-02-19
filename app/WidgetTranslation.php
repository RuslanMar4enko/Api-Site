<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WidgetTranslation
 *
 * @property int $id
 * @property int $widget_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\WidgetTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WidgetTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WidgetTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WidgetTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\WidgetTranslation whereWidgetId($value)
 * @mixin \Eloquent
 */
class WidgetTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
    ];
}
