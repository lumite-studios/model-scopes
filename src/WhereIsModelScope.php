<?php

namespace LumiteStudios\ModelScopes;

use Illuminate\Database\Eloquent\Builder;

trait WhereIsModelScope
{
    /**
     * Add a `whereIsModel` scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param object $model
     */
    public function scopeWhereIsModel(
        Builder $query,
        object $model,
        string $localKey = null,
    ): Builder {
        $localKey = $localKey ?? $model->getKeyName();
        return $query->where($localKey, '=', $model[$localKey]);
    }
}
