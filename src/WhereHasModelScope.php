<?php

namespace LumiteStudios\ModelScopes;

use Illuminate\Database\Eloquent\Builder;

trait WhereHasModelScope
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
        ?string $foreignKey = null
    ): Builder {
        $table = $table ?? $model->getTable();
        $foreignKey = $foreignKey ?? $model->getKeyName();

        return $query->whereHas($relation, function ($q) use ($foreignKey, $model, $table) {
            return $q->where("{$table}.{$foreignKey}", '=', $model[$foreignKey]);
        });
    }
}
