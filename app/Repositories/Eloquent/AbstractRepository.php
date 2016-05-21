<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/21
 * Time: 20:00
 */

namespace App\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getNew(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }
}