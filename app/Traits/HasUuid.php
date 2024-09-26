<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid {

    /**
     * Set an unique UUID string to the id attribute.
     */
    protected static function bootHasUuid()
    {
        static::creating(function($model){

            $model->keyType = "string";
            $model->incrementing = false;

            if (empty($model->{$model->getKeyName()})) $model->{$model->getKeyName()} = Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}