<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\payment;
use App\receivable;
use App\sp;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = payment::all();
        $receivable = receivable::get();
        $supplier = sp::all();

        return view ('admin.payment.index',compact('payment','receivable','supplier'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'receivable_id' => 'exists:receivables,id',
            'sp_id' => 'exists:sps,id',
            'date' => 'required|date',
            'image' => 'required',
            'pay' => 'required|string|max:1000',
            
        ]);
           
        if  ($request->hasfile('image')) {
            $imagePath = $request->file('image')->store('public/suppliers');
            $validatedData['image'] = $imagePath;
        }
        
        payment::create($validatedData);

        return redirect()->route('payment.index')->with('success','Anda Berhasil Menambahkan Data Hutang');
    }

    public function show($id)
    {
        $payment = payment::where('id', $id)->first();
        $receivable = receivable::get();
        $supplier = sp::all();

        return view ('admin.payment.edit',compact('payment','receivable','supplier'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'receivable_id' => 'exists:receivables,id',
            'sp_id' => 'exists:sps,id',
            'date' => 'required|date',
            'image' => 'required',
            'pay' => 'required|string|max:1000',
            
        ]);
           
        if  ($request->hasfile('image')) {
            $imagePath = $request->file('image')->store('public/suppliers');
            $validatedData['image'] = $imagePath;
        }
        payment::find($id)->update($validatedData);

        return redirect()->route('payment.index')->with('success','Anda Berhasil Menambahkan Data Hutang');
    }

    public function delete($id)
    {
        // Get the payment record by ID
        $payment = payment::find($id);
    
        if (!$payment) {
            return redirect()->route('payment.index')->with('error', 'Data not found');
        }
    
        // Delete the record from the database
        $payment->delete();
    
        // Delete the associated image from storage
        Storage::delete('imageproducts/' . $payment->image);
    
        return redirect()->route('payment.index')->with('success', 'Berhasil Menghapus Data');
    }
    
    
}
