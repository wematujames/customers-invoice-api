<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class FilterQuery {
    public function __construct($params, $columMap) {
        $this->allowedParams = $params;
        $this->columMap = $columMap;
    }
    
    protected $allowedParams;

    protected $columMap;

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "gt" => ">",
        "lte" => "<=",
        "gte" => ">=",
    ];

    public function transform (Request $request) {
        $eloQuery = [];

        foreach($this->allowedParams as $param => $operators){
            $query = $request->query($param);
            
            if (!isset($query)) continue;

            $column = $this->columMap[$param] ?? $param;

            foreach($operators as $operator){
                if (isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}