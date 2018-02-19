<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ColorAsset
 *
 * @property int $id
 * @property int $color_id
 * @property int $asset_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ColorAsset whereAssetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ColorAsset whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ColorAsset whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ColorAsset whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ColorAsset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ColorAsset extends Model
{
    protected $table = 'color_asset';

    public $timestamps = true;
}
