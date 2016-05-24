<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/24
 * Time: 20:59
 */

namespace App\Services\Form;


use Illuminate\Contracts\Config\Repository;

class RegistrationForm extends AbstractForm
{
    protected $config;

    protected $rules = [
        'usernames' => 'required|min:4|alpha_num|unique:users,usernames',
        'email' => 'required|email|min:5|unique',
        'password' => 'required|min:6|confirmed',
    ];

    public function __construct(Repository $repository)
    {
        parent::__construct();
        $this->config = $repository;
    }

    protected function getPreparedRules()
    {
        $forbidden = $this->config->get('config.forbidden_usernames', []);
        $forbidden = implode(',', $forbidden);

        $this->rules['usernames'] .= '|not_in:'.$forbidden;
        return $this->rules;
    }

}