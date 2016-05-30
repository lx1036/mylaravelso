<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/30
 * Time: 21:28
 */

namespace App\Services\Form;


use Illuminate\Auth\AuthManager;
use Illuminate\Config\Repository;

class SettingsForm extends AbstractForm
{
    protected $config;

    protected $auth;

    protected $rules = [
        'username' => 'required|min:4',
        'password' => 'confirmed|min:6',
    ];

    public function __construct(Repository $config, AuthManager $authManager)
    {
        parent::__construct();
        $this->config = $config;
        $this->auth   = $authManager;
    }

    protected function getPreparedRules()
    {
        $forbidden = implode(',', $this->config->get('config.forbidden_usernames', []));
        $userId = $this->auth->user()->id;
        $this->rules['username'] .= '|not_in:'.$forbidden;
        $this->rules['username'] .= '|unique:users, username,'.$userId;

        return $this->rules;
    }

    protected function getInputData()
    {
//        dd(array_only(['username'], ['username', 'password']));
        return array_only($this->inputData, ['username', 'password', 'password_confirmation']);
    }
}