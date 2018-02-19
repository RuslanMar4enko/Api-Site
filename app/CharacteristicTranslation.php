<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CharacteristicTranslation
 *
 * @property int $id
 * @property int $characteristic_id
 * @property string $locale
 * @property string $title
 * @property string $value
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicTranslation whereCharacteristicId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicTranslation whereValue($value)
 * @mixin \Eloquent
 */
class CharacteristicTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'value',
    ];
}
