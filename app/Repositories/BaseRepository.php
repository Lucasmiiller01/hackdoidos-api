<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;
abstract class BaseRepository
{
    /**
     * Model class for repo.
     *
     * @var string
     */
    protected $modelClass;
    /**
     * @return EloquentQueryBuilder|QueryBuilder
     */
    protected function newQuery()
    {
        return app($this->modelClass)->newQuery();
    }
    /**
     * @param EloquentQueryBuilder|QueryBuilder $query
     * @param int $take
     * @param bool $paginate
     *
     * @return EloquentCollection|Paginator
     */
    protected function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (is_null($query)) {
            $query = $this->newQuery();
        }
        if (true == $paginate) {
            return $query->paginate($take);
        }
        if ($take > 0 || false !== $take) {
            $query->take($take);
        }
        return $query->get();
    }
    /**
     * Returns all records.
     * If $take is false then brings all records
     * If $paginate is true returns Paginator instance.
     *
     * @param int $take
     * @param bool $paginate
     *
     * @return EloquentCollection|Paginator
     */
    public function getAll($take = 15, $paginate = true)
    {
        return $this->doQuery(null, $take, $paginate);
    }
    public function delete($id)
    {
        $query = $this->newQuery();
        if (!empty($id)) {
            $query->where('id', $id);
            $query->delete();
        }
    }
    public function forceDelete($id)
    {
        $query = $this->newQuery();
        if (!empty($id)) {
            $query->where('id', $id);
            $query->forceDelete();
        }
    }
    /**
     * @param string $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection
     */
    public function lists($column, $key = null)
    {
        return $this->newQuery()->lists($column, $key);
    }
    /**
     * Retrieves a record by his id
     * If fail is true $ fires ModelNotFoundException.
     *
     * @param int $id
     * @param bool $fail
     *
     * @return Model
     */
    public function findByID($id, $fail = true)
    {
        if ($fail) {
            return $this->newQuery()->findOrFail($id);
        }
        return $this->newQuery()->find($id);
    }
    /**
     * Performs the save method of the model
     * The goal is to enable the implementation of your business logic before the command.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function save($model)
    {
        return $model->save();
    }
}