<?php

namespace Zone\Management\Models;

use Carbon\Carbon;
use DB;
use PDO;

class Role
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    public function __construct()
	{
		//DB::setFetchMode(PDO::FETCH_ASSOC);
    }
    
    public function getList()
    {
        $query = DB::table('roles')
                 ->whereStatus(self::STATUS_ACTIVE);
        $result = $query->get();
        return $result ? $result : false;
    }

    public function getById(array $arrParam)
    {
        $query = DB::table('roles')
                 ->whereId($arrParam['role_id'])
                 ->whereStatus(self::STATUS_ACTIVE);

        $result = $query->first();

        return $result;
    }

    public function insert(array $arrParam)
    {   $arrParam['created_at'] = $arrParam['updated_at'] = Carbon::now();
        $resultId = DB::table('roles')
                 ->insertGetId($arrParam);

        return $resultId;
    }

    public function update(array $arrParam, $id)
    {
        $query = DB::table('roles')
                 ->whereId($id);

        $result = $query->update($arrParam);

        return true;
    }
}