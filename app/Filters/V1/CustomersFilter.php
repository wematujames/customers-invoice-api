<?php

namespace App\Filters\V1;

use App\Filters\V1\FilterQuery;

class CustomersFilter extends FilterQuery {
    protected $allowedParams = [
        "name" => ["eq"], 
        "type" => ["eq"],  
        "email" => ["eq"],  
        "address" => ["eq"],  
        "city" => ["eq"],  
        "state" => ["eq"],  
        "postalCode" => ["eq", "gt", "lt"],  
    ];

    protected $columMap = [
        "postalCode" => "postal_code"
    ];

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "gt" => ">",
        "lte" => "<=",
        "gte" => ">=",
    ];
}