<?php

namespace App\Base\traits;

trait HasRules
{
    public static function rules(array $appends = []): array
    {
        return array_merge(self::$rules, $appends);
    }
}