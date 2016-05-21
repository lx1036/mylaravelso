<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/16
 * Time: 21:03
 */

namespace App\Http\Controllers;


class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('csrf', ['on'=>'post']);
    }

}