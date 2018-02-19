<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CharacteristicProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $characteristic_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicProduct whereCharacteristicId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicProduct whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicProduct whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CharacteristicProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CharacteristicProduct extends Model
{
    protected $table = 'characteristic_product';

    public $timestamps = true;
}
