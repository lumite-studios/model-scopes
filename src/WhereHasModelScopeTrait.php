<?php
namespace LumiteStudios\WhereHasModelScope;

trait WhereHasModelScopeTrait
{
	/**
	 * Add a `whereHasModel` scope.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $relation
	 * @param object $model
	 * @param string $table
	 * @param string $column
	 * @return void
	 */
	public function scopeWhereHasModel(
		\Illuminate\Database\Eloquent\Builder $query,
		string $relation,
		object $model,
		string $table = null,
		string $column = null
	)
	{
		$attribute = $attribute ?? $model->getKeyName();
		$column = $column ?? $model->getKeyName();

		$query->whereHas($relation, function($q) use($column, $model, $table) {
			$q->where($table.'.'.$column, '=', $model[$column]);
		});
	}
}
