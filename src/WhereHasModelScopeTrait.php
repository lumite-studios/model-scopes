<?php

namespace LumiteStudios\WhereHasModelScope;

use Illuminate\Database\Eloquent\Builder;

trait WhereHasModelScopeTrait
{
    /**
     * Add a `whereHasModel` scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $relation
     * @param object $model
     * @param string|null $table
     * @param string|null $localKey
     * @param string|null $foreignKey
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereHasModel(
        Builder $query,
        string $relation,
        object $model,
        ?string $table = null,
        ?string $localKey = null,
        ?string $foreignKey = null,
    ): Builder {
        $foreignKey = $foreignKey ?? $model->getKeyName();
        $localKey = $localKey ?? "{$relation}_{$foreignKey}";

        return $query->whereHas($relation, function ($q) use ($foreignKey, $localKey, $model, $table) {
            $q->where("{$table}.{$localKey}", '=', $model[$foreignKey]);
        });
    }
}
