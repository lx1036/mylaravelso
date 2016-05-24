<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/5/24
 * Time: 20:49
 */

namespace App\Services\Form;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

abstract class AbstractForm
{
    protected $inputData;

    protected $validator;

    protected $rules = [];
    
    protected $messages = [];

    public function __construct()
    {
        $this->inputData = app('request')->all();
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function isValid()
    {
        $this->validator = Validator::make(
            $this->getInputData(),
            $this->getPreparedRules(),
            $this->getMessages()
        );

        return $this->validator->passes();
    }

    protected function getPreparedRules()
    {
        return $this->rules;
    }

    protected function getMessages()
    {
        return $this->messages;
    }

    public function getErrors()
    {
        return $this->validator->errors();
    }
}