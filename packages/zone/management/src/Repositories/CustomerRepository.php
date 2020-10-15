<?php

namespace Zone\Management\Repositories;

use Zone\Management\Models\Customer;

class CustomerRepository
{
    protected $modelCustomer;
    public function __construct(Customer $modelCustomer)
    {
        $this->modelCustomer = $modelCustomer;
    }

    public function getList(){
        $arrList = $this->modelCustomer->getList();
        return isset($arrList) ? $arrList : false;
    }

    public function getById($arrParam)
    {
        return $this->modelCustomer->getById($arrParam);
    }

    public function insert($arrParam){
        return $this->modelCustomer->insert($arrParam);
    }

    public function update($id, $arrParam)
    {
        return $this->modelCustomer->update($id, $arrParam);
    }
}