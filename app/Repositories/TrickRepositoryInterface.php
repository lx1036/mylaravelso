<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/30
 * Time: 15:56
 */

namespace App\Repositories;


use App\User;
use App\Trick;

interface TrickRepositoryInterface
{
    /**
     * find all the tricks for the given user by pagination
     * @param User $user
     * @param int $perPage
     * @return mixed
     */
    public function findAllForUser(User $user, $perPage = 9);

    /**find favorite trick
     * @param User $user
     * @param int $perPage
     * @return mixed
     */
    public function findAllFavorites(User $user, $perPage = 9);

    public function findBySlug($slug);

    public function findAllPaginated($perPage = 9);

    public function findMostRecent($perPage = 9);

    public function findMostCommented($perPage = 9);

    public function findMostPopular($perPage = 9);

    public function findForFeed();

    public function findAllForSitemap();

    public function searchByTermPaginated($term, $perPage = 9);

    public function findByCategory($slug, $perPage = 9);

    public function listTagsIdsForTrick(Trick $trick);

    public function listCategoriesIdsForTrick(Trick $trick);

    public function create(array $data);

    public function edit(Trick $trick, array $data);

    public function incrementViews(Trick $trick);

    public function findByTag($slug, $perPage = 9);

    public function findNextTrick(Trick $trick);

    public function findPreviousTrick(Trick $trick);

    public function isTrickOwnedByUser($slug, $userId);
}