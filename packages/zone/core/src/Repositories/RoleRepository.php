<?php
namespace Zone\Management\Repositories;

use Zone\Management\Models\Role;

class RoleRepository
{
    protected $modelRole;
    public function __construct(Role $modelRole)
    {
        $this->modelRole = $modelRole;
    }

    public function getStatus()
    {
        $arrStatus = array(
            Role::STATUS_ACTIVE => 'Active',
            Role::STATUS_INACTIVE => 'In-Active'
        );

        return $arrStatus;
    }

    public function getList($arrParam){
        $arrList = $this->modelRole->getList();
        return isset($arrList) ? $arrList : false;
    }

    public function getById($arrParam)
    {
        return $this->modelRole->getById($arrParam);
    }

    public function insert($arrParam){
        return $this->modelRole->insert($arrParam);
    }

    public function update($arrParam, $id)
    {
        $result = $this->modelRole->update($arrParam, $id);
        return $result ? $result : false;
    }
}
