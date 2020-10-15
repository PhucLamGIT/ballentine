<?php

namespace Zone\Management\Models;

use Carbon\Carbon;
use DB;
use PDO;

class Customer
{
    public function __construct()
	{
		//DB::setFetchMode(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $query = DB::table('customers');
        $result = $query->get();
        return $result ? $result : false;
    }

    public function getById(array $arrParam)
    {
        $query = DB::table('customers')
                 ->whereCustomerId($arrParam['customer_id']);
        if(isset($arrParam['customer_status']) && is_integer($arrParam['customer_status']))
        {
            $query = $query->whereStatus($arrParam['customer_status']);
        }
        $result = $query->first();

        return $result;
    }

    public function insert(array $arrParam)
    {   
       // $arrParam['created_at'] = $arrParam['updated_at'] = Carbon::now();
        $resultId = DB::table('customers')
                  ->insertGetId($arrParam);

        return $resultId;
    }

    public function update($id, array $arrParam)
    {
        $result = DB::table('customers')
                ->whereCustomerId((int)$id)
                ->update($arrParam);

        return true;
    }
}