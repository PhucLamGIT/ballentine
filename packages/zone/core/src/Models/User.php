<?php

namespace Zone\Management\Models;

use Carbon\Carbon;
use DB;
use PDO;

class User
{
    public function __construct()
	{
		//DB::setFetchMode(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $query = DB::table('users');
        $result = $query->get();
        return $result ? $result : false;
    }

    public function getById(array $arrParam)
    {
        $query = DB::table('users')
                 ->whereId($arrParam['user_id']);
        if(isset($arrParam['status']) && is_integer($arrParam['status']))
        {
            $query = $query->whereStatus($arrParam['status']);
        }
        $result = $query->first();

        return $result;
    }

    public function insert(array $arrParam)
    {   
        $arrParam['created_at'] = $arrParam['updated_at'] = Carbon::now();
        $resultId = DB::table('users')
                  ->insertGetId($arrParam);

        return $resultId;
    }
}
