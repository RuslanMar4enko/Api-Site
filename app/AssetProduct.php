<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AssetProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $asset_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\AssetProduct whereAssetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetProduct whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetProduct whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AssetProduct extends Model
{
    protected $table = 'asset_product';

    public $timestamps = true;
}
