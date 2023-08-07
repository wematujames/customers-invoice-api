<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

class FilterQuery {
    protected $allowedParams;
    protected $columMap;
    protected $operatorMap;

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