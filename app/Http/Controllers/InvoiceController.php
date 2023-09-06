<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Requests\InvoiceRequest;
use App\Notifications\InvoicePaidNotification;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        if(!empty($invoices)){
            return response()->json(['status'=>'success', 'data'=>$invoices], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
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
    public function store(InvoiceRequest $request)
    {
        $validatedData = $request->validated();
        $invoice = Invoice::create($validatedData);
        return response()->json(['status'=>'success', 'message'=>'Invoice created successfully.', 'data'=>$invoice], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);
        if(!empty($invoice)){
            return response()->json(['status'=>'success', 'data'=>$invoice], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::find($id);
        if(!empty($invoice)){
            return response()->json(['status'=>'success', 'data'=>$invoice], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $validatedData = $request->validated();
        $invoice->update($validatedData);
        return response()->json(['status'=>'success', 'message'=>'Invoice updated successfully.', 'data'=>$invoice], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);
        if(!empty($invoice)){
            $invoice->delete();
            return response()->json(['status'=>'success', 'message'=>'Invoice deleted'], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
    }

    public function markAsPaid(string $id)
    {
        // Mark the specified invoice as paid and send a notification to the customer.
        $invoice = Invoice::find($id);
        if(!empty($invoice)){
            $invoice->update(['status'=>'pending']);
            return response()->json(['status'=>'success', 'message'=>'Invoice paid'], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
    }

    public function assignInvoiceToCustomers(string $id)
    {
        // Mark the specified invoice as paid and send a notification to the customer.
        $invoice = Invoice::find($id);
        if(!empty($invoice)){
            $invoice->update(['status'=>'pending']);
            $invoice->customer->notify(new InvoicePaidNotification($invoice));
            return response()->json(['status'=>'success', 'message'=>'Invoice paid'], 201);
        }else {
            return response()->json(['status'=>'failed', 'data'=>'Data not found'], 503);
        }
    }
}
