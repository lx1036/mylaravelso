<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\TrickRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrowseController extends Controller
{
    protected $categories;

    protected $tags;

    protected $tricks;

    public function __construct(CategoryRepositoryInterface $categories, TagRepositoryInterface $tags, TrickRepositoryInterface $tricks)
    {
        $this->categories = $categories;
        $this->tags       = $tags;
        $this->tricks     = $tricks;
    }

    public function getBrowseRecent()
    {
        $tricks = $this->tricks->findMostRecent();
        $type = '最新';
        $pageTitle = '最新的 Laravel 技巧';
        return view('browse.index', compact('tricks', 'type', 'pageTitle'));
    }

    public function getBrowseCategory($category)
    {
        list($category, $tricks) = $this->tricks->findByCategory($category);
        $type = trans('browse.category', ['category'=>$category->name]);
        $pageTitle = trans('browse.browsing_category', ['category'=>$category->name]);

        return view('browse.index', compact('tricks', 'type', 'pageTitle'));
    }

    public function getBrowseTag($tag)
    {
        list($tag, $tricks) = $this->tricks->findByTag($tag);

        $type = trans('browse.tag', ['tag'=>$tag->name]);
        $pageTitle = trans('browse.browsing_tag', ['tag'=>$tag->name]);

        return view('browse.index', compact('tricks', 'type', 'pageTitle'));
    }


}
