<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/21
 * Time: 19:59
 */

namespace App\Repositories\Eloquent;


use App\Repositories\UserRepositoryInterface;
use App\User;
use App\Exceptions\UserNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\AbstractUser as OAuthUser;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    
    public function findAllPaginated($perPage = 200)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }

    public function findByUsername($username)
    {
        return $this->model->whereUsername($username)->first();
    }

    public function requireByUsername($username)
    {
        if(! is_null($user = $this->findByUsername($username))){
            return $user;
        }
        throw new UserNotFoundException('the user'.$username.'does not exist!!!');
    }

    public function create(array $data)
    {
        $user           = $this->getNew();
        $user->username = e($data['username']);
        $user->email    = e($data['email']);
        $user->password = Hash::make($data['password']);
        $user->photo    = isset($data['image_url'])? $data['image_url'] :'';
        $user->save();

        return $user;
    }

    public function createFromGithubData(OAuthUser $authUser)
    {
        $user           = $this->getNew();
        $username       = $authUser->getNickname();
        $isAvailable    = is_null($this->findByUsername($username));
        $isAllowed      = $this->usernameIsAllowed($username);
        $user->username = $username;
        
        if(!$isAllowed | !$isAvailable){
            $user->username .= '_'.str_random(3);
            Session::flash('username_required', true);
        }

        $user->email = $authUser->getEmail();
        $user->photo = $authUser->getAvatar();
        $user->save();

        Session::flash('password_required', true);

        return $user;
    }

    protected function usernameIsAllowed($username)
    {
        return !in_array(strtolower($username), config('config.forbidden_usernames'));
    }

    public function updateSettings(User $user, array $data)
    {
        $user->username = $data['username'];
        if(!empty($data['password'])){
            $user->password = Hash::make($data['password']);
        }
        if(!empty($data['avatar'])){
            File::move(public_path().'/img/avatar/temp/'.$data['avatar'], '/img/avatar/'.$data['avatar']);
            if($user->photo != $data['avatar']){
                File::delete(public_path().'/img/avatar/'.$user->photo);
            }
            $user->photo = $data['avatar'];
        }

        $user->save();
    }

    /**
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function getRegistrationForm()
    {
        return app('App\Services\Forms\RegistrationForm');
    }
}