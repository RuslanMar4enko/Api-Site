<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;

trait HasLocales
{
    use \Dimsav\Translatable\Translatable;

    public function getEnAttribute()
    {
        return $this->getTranslation('en');
    }
    public function getRuAttribute()
    {
        return $this->getTranslation('ru');
    }

    public function getGeAttribute()
    {
        return $this->getTranslation('ge');
    }


    public function scopeWhereTranslationNotNull(Builder $query, $key, $locale = null)
    {
        return $query->whereHas('translations', function (Builder $query) use ($key, $locale) {
            $query->whereNotNull($this->getTranslationsTable().'.'.$key);
            if ($locale) {
                $query->whereNotNull($this->getTranslationsTable().'.'.$this->getLocaleKey(), $locale);
            }
        });
    }
}