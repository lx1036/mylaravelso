<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/21
 * Time: 16:05
 */

namespace App\Http\Controllers;


use Illuminate\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;

class AuthController extends BaseController
{
    use AuthenticatesAndRegistersUsers;

    /**
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var UserRepositoryInterface
     */
    protected $users;

    public function __construct(Request $request, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->request = $request;
        $this->users   = $userRepositoryInterface;
        $this->middleware('guest', ['except'=>'logout']);
    }

    public function getLogin()
    {
        return view('home.login');
    }

    public function postLogin(Request $request, Guard $guard)
    {

    }

    public function getRegister()
    {
        return view('home.register');
    }


}