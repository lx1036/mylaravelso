<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/31
 * Time: 20:45
 */

namespace App\Repositories;


interface CategoryRepositoryInterface
{
    public function listAll();

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc');

    public function findAllWithTrickCount();

    public function findById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function getMaxOrder();

    public function delete($id);

    public function arrange(array $data);
}