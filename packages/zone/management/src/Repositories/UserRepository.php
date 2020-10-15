<?php

namespace Zone\Management\Repositories;

use Zone\Management\Models\User;

class UserRepository
{
    protected $modelUser;
    public function __construct(User $modelUser)
    {
        $this->modelUser = $modelUser;
    }

    public function getList(){
        $arrList = $this->modelUser->getList();
        return isset($arrList) ? $arrList : false;
    }

    public function getById($arrParam)
    {
        return $this->modelUser->getById($arrParam);
    }

    public function insert($arrParam){
        return $this->modelUser->insert($arrParam);
    }
}