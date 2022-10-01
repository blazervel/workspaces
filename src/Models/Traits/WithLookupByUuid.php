<?php

namespace Blazervel\Workspaces\Models\Traits;

use Illuminate\Support\Str;

trait WithLookupByUuid
{
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->forceFill(['uuid' => (string) Str::orderedUuid()]);
        });
    }
}