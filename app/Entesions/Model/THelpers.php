<?php

namespace App\Entesions\Model;

/**
 * @mixin \Eloquent
 */
trait THelpers
{
    protected function setMoneyType($attribute, $value)
    {
        $this->attributes[$attribute] = $value * 100;
    }

    protected function getMoneyType($attribute)
    {
        return $this->attributes[$attribute] / 100;
    }
}