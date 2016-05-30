<?php

namespace App\Http\Controllers;

use App\Repositories\TrickRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    protected $users;

    protected $tricks;

    protected $user;

    public function __construct(UserRepositoryInterface $userRepositoryInterface, TrickRepositoryInterface $trickRepositoryInterface)
    {
        $this->users = $userRepositoryInterface;
        $this->tricks = $trickRepositoryInterface;
        $this->user = Auth::user();
    }

    public function getIndex()
    {
        $tricks = $this->tricks->findAllForUser($this->user, 12);
        return view('user.profile', compact('tricks'));
//        return UserController::class.'::'.'getIndex()';
    }

    public function getSettings()
    {
        return view('user.settings');
    }

    public function getFavorites()
    {
        $tricks = $this->tricks->findAllFavorites($this->user);
        return view('user.favorites', compact('tricks'));
    }

    public function postSettings()
    {
        $form = $this->users->getSettingsForm();
        if(! $form->isValid()){
            return $this->redirectBack(['errors'=>$form->getErrors()]);
        }
        $this->users->updateSettings($this->user, Input::all());

        return $this->redirectRoute('user.settings', [], ['settings_updated'=>true]);
    }

    public function postAvatar()
    {
        if(isset($_SERVER['HTTP_ORGIN'])){

        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
