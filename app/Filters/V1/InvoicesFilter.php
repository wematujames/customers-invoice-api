<?php

namespace App\Filters\V1;

use App\Filters\V1\FilterQuery;

class InvoicesFilter extends FilterQuery {    
    protected $allowedParams = [
        "customer_id" => ["eq", "gt", "gte", "lt", "lte"],
        "amount" => ["eq", "gt", "gte", "lt", "lte"],
        "status" => ["eq"],
        "billed_date" => ["eq", "gt", "gte", "lt", "lte"],
        "paid_date" => ["eq", "gt", "gte", "lt", "lte"],
    ];

    protected $columMap = [
        "billedDate" =>  "billed_date",
        "paidDate" =>  "paid_date",
    ];

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "gt" => ">",
        "lte" => "<=",
        "gte" => ">=",
    ];
}