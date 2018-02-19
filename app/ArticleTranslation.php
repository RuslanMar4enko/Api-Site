<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ArticleTranslation
 *
 * @property int $id
 * @property int $article_id
 * @property string $locale
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property string $body
 * @property string $epilog
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereEpilog($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereSubTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ArticleTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class ArticleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'body',
        'epilog',
    ];
}
