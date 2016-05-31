<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/31
 * Time: 20:45
 */

namespace App\Repositories;


interface TagRepositoryInterface
{
    public function listAll();

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc');

    public function findById($id);

    public function findAllWithTrickCount();

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

}