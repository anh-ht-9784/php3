<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\InvoiceDetail;

class InvoiceController extends Controller
{
    public function index()
    {
        $list = Invoice::all();
        $list->load('users');
        return view('admin/invoices/index', ['list' => $list]);
    }

    public function create()
    {
        $list = User::all();
        return view('admin/invoices/create', ['list' => $list]);
    }
    public function store()
    {
        $data = request()->except("_token");
        $data['status'] = 1;
        Invoice::Create($data);

        return redirect()->route('admin.invoices.index');
    }
    public function edit($id)
    {
        $data = Invoice::find($id);
        $list = User::all();
        return view('admin/invoices/edit', ['data' => $data, 'list' => $list]);
    }
    public function update($id)
    {
        $invoices = Invoice::find($id);
        $data = request()->except("_token");
        // dd($data);
        $invoices->update($data);
        return redirect()->route('admin.invoices.index');
    }
    public function show($id)
    {
        $invoice = invoice::find($id);
        $invoice->load('users');
        $invoice_detail = InvoiceDetail::all()->where('invoice_id', $id);
        $invoice_detail->load('products');
        //   dd( $invoice_detail);
        return view('admin/invoices/show', ['invoice' => $invoice, 'invoice_detail' => $invoice_detail]);
    }
    public function delete($id)
    {
        $invoices = Invoice::find($id);
        $invoices->delete($id);
        return redirect()->route('admin.invoices.index');
    }
}
