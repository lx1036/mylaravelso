<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/31
 * Time: 20:49
 */

namespace App\Repositories\Eloquent;


use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{

    public function listAll()
    {
        // TODO: Implement listAll() method.
    }

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        // TODO: Implement findAll() method.
    }

    public function findAllWithTrickCount()
    {
        // TODO: Implement findAllWithTrickCount() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function getMaxOrder()
    {
        // TODO: Implement getMaxOrder() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function arrange(array $data)
    {
        // TODO: Implement arrange() method.
    }
}