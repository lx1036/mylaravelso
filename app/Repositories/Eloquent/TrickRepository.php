<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/30
 * Time: 17:41
 */

namespace App\Repositories\Eloquent;


use App\Category;
use App\Repositories\TrickRepositoryInterface;
use App\Tag;
use App\User;
use App\Trick;
use App\Exceptions\CategoryNotFoundException;
use App\Exceptions\TagNotFoundException;

class TrickRepository extends AbstractRepository implements TrickRepositoryInterface
{

    protected $category;

    protected $tag;

    const PAGE_SIZE = 11;

    public function __construct(Trick $trick, Category $category, Tag $tag)
    {
        $this->model = $trick;
        $this->category = $category;
        $this->tag = $tag;
    }
    /**
     * @inheritDoc
     */
    public function findAllForUser(User $user, $perPage = self::PAGE_SIZE)
    {
        // TODO: Implement findAllForUser() method.
        $tricks = $user->tricks()->orderBy('created_at', 'desc')->paginate($perPage);
        return $tricks;
    }

    /**
     * @inheritDoc
     */
    public function findAllFavorites(User $user, $perPage = self::PAGE_SIZE)
    {
        // TODO: Implement findAllFavorites() method.
        $tricks = $user->votes()->orderBy('created_at', 'desc')->paginate($perPage);
        return $tricks;
    }

    public function findBySlug($slug)
    {
        // TODO: Implement findBySlug() method.
        return $this->model->whereSlug($slug)->first();
    }

    public function findAllPaginated($perPage = self::PAGE_SIZE)
    {
        // TODO: Implement findAllPaginated() method.
        $tricks = $this->model->orderBy('created_at', 'desc')->paginate($perPage);
        return $tricks;
    }

    public function findMostRecent($perPage = self::PAGE_SIZE)
    {
        // TODO: Implement findMostRecent() method.
        return $this->findAllPaginated($perPage);
    }

    public function findMostCommented($perPage = self::PAGE_SIZE)
    {
        // TODO: Implement findMostCommented() method.

    }

    public function findMostPopular($perPage = 9)
    {
        // TODO: Implement findMostPopular() method.
    }

    /**
     * Find the last 15 tricks that were added
     */
    public function findForFeed()
    {
        // TODO: Implement findForFeed() method.
        return $this->model->orderBy('created_at', 'desc')->limit(15)->get();
    }

    /**
     * Find all tricks
     */
    public function findAllForSitemap()
    {
        // TODO: Implement findAllForSitemap() method.
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function searchByTermPaginated($term, $perPage = 9)
    {
        // TODO: Implement searchByTermPaginated() method.
    }

    public function findByCategory($slug, $perPage = 9)
    {
        // TODO: Implement findByCategory() method.
        $category = $this->category->whereSlug($slug)->first();

        if(is_null($category)){
            throw new CategoryNotFoundException('The category'.$slug.'does not exist!');
        }

        $tricks = $category->tricks()->orderBy('created_at', 'desc')->paginate($perPage);

        return [$category, $tricks];
    }

    public function findByTag($slug, $perPage = 9)
    {
        // TODO: Implement findByTag() method.
        $tag = $this->tag->whereSlug($slug)->first();
        if(is_null($tag)){
            throw new TagNotFoundException('The tag'.$tag.'does not exist!');
        }

        $tricks = $tag->tricks()->orderBy('created_at', 'desc')->paginate($perPage);

        return [$tag, $tricks];
    }

    public function listTagsIdsForTrick(Trick $trick)
    {
        // TODO: Implement listTagsIdsForTrick() method.
    }

    public function listCategoriesIdsForTrick(Trick $trick)
    {
        // TODO: Implement listCategoriesIdsForTrick() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
        $trick = $this->getNew();
        $trick->user_id = $data['user_id'];
        $trick->title   = $data['title'];
        $trick->content = $data['content'];

        $trick->save();

        $trick->tags()->sync($data['tags']);
        $trick->categories()->sync($data['categories']);

        return $trick;

    }

    public function edit(Trick $trick, array $data)
    {
        // TODO: Implement edit() method.
        $trick->title = $data['title'];
        $trick->content = $data['content'];
        $trick->save();

        $trick->tags()->sync($data['tags']);
        $trick->categories()->sync($data['categories']);

        return $trick;
    }

    public function incrementViews(Trick $trick)
    {
        // TODO: Implement incrementViews() method.
    }



    public function findNextTrick(Trick $trick)
    {
        // TODO: Implement findNextTrick() method.
    }

    public function findPreviousTrick(Trick $trick)
    {
        // TODO: Implement findPreviousTrick() method.
    }

    public function isTrickOwnedByUser($slug, $userId)
    {
        // TODO: Implement isTrickOwnedByUser() method.
    }
}