<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TypeTranslation
 *
 * @property int $id
 * @property int $type_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\TypeTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TypeTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TypeTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TypeTranslation whereTypeId($value)
 * @mixin \Eloquent
 */
class TypeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
    ];
}
