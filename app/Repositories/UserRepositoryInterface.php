<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/21
 * Time: 17:02
 */

namespace App\Repositories;


use App\User;
use Laravel\Socialite\AbstractUser as OAuthUser;

interface UserRepositoryInterface
{
    /**
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator | \User[]
     */
    public function findAllPaginated($perPage = 200);

    /**
     * find a user by username
     * @param $username
     * @return \App\User
     */
    public function findByUsername($username);

    /**
     * find a user by email
     * @param $email
     * @return \App\User
     */
    public function findByEmail($email);

    /**
     * Require a user by its username
     * @param $username
     * @return \App\User
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function requireByUsername($username);

    /**
     * Create a new user in the database
     * @param array $data
     * @return \App\User
     */
    public function create(array $data);

    /**
     * Create a new user into the database from github data
     * @param OAuthUser $authUser
     * @return \App\User
     */
    public function createFromGithubData(OAuthUser $authUser);

    /**
     * Update user's setting
     * @param User $user
     * @param array $data
     * @return \App\User
     */
    public function updateSettings(User $user, array $data);
}