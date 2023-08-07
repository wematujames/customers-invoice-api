<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceCollection;
use App\Http\Resources\V1\InvoiceResource;
use App\Services\V1\FilterQuery;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $params = [
            "customer_id" => ["eq", "gt", "gte", "lt", "lte"],
            "amount" => ["eq", "gt", "gte", "lt", "lte"],
            "status" => ["eq"],
            "billed_date" => ["eq", "gt", "gte", "lt", "lte"],
            "paid_date" => ["eq", "gt", "gte", "lt", "lte"],
        ];

        $columnMap = [
            "billedDate" =>  "billed_date",
            "paidDate" =>  "paid_date",
        ];


        $filter = new FilterQuery($params, $columnMap);
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0){
            return new InvoiceCollection(Invoice::paginate());
        }
        return new InvoiceCollection(Invoice::where($queryItems)->paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
