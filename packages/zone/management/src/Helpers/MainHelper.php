<?php

namespace Zone\Management\Helpers;

class MainHelper 
{
    public static function formatFullName(array $arrParam)
    {
        $firstName = isset($arrParam['first_name']) && $arrParam['first_name'] ? $arrParam['first_name'] : '';
        $lastName  = isset($arrParam['last_name']) && $arrParam['last_name'] ? $arrParam['last_name'] : '';
        if($firstName && $lastName){
            $fullName = $firstName . ' ' . $lastName;
        }

        return $fullName ? $fullName : false;
    }
}