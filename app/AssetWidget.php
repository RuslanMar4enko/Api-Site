<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AssetWidget
 *
 * @property int $id
 * @property int $asset_id
 * @property int $widget_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\AssetWidget whereAssetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetWidget whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetWidget whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetWidget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssetWidget whereWidgetId($value)
 * @mixin \Eloquent
 */
class AssetWidget extends Model
{
    protected $table = 'asset_widget';
}
