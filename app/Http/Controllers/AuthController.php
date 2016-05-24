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
        $credentials = $request->only(['username', 'password']);
        $remember    = $request->get('remember', false);

        if(str_contains($credentials['username'], '@')){
            $credentials['emails'] = $credentials['username'];
            unset($credentials['username']);
        }

        if($guard->attempt($credentials, $remember)){
           return $this->redirectIntended(route('user.index'));
        }
        return $this->redirectBack(['login_errors'=>true]);
    }

    public function getRegister()
    {
        return view('home.register');
    }

    public function postRegister(Guard $guard)
    {
        $form = $this->users->getRegistrationForm();
        if(! $form->isValid()){
            return $this->redirectBack(['errors' => $form->errors()]);
//            return redirect()->back()->with('errors', $form->errors());
        }
        
        if($user = $this->users->create($form->getInputData())){
            $guard->login($user, true);
            return $this->redirectRoute('user.index', [], ['first_use'=>true]);
        }

        return $this->redirectRoute('home');
    }


}