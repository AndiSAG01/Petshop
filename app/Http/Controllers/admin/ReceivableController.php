<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\receivable;
use App\Supplier;
use Illuminate\Http\Request;

class ReceivableController extends Controller
{
    public function index()
    {
        $receivable = receivable::all();
        $supplier = Supplier::whereDoesntHave('receivables')->get();

        return view ('admin.piutang.index', compact('receivable','supplier'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_id' => 'required|string|exists:suppliers,id',
            'name_item' => 'required|string|max:100',
            'quantity' => 'required|string|max:10000', // Assuming 'quantity' is an integer
            'price' => 'required|string|max:10000', // Assuming 'price' is a numeric value
        ]);
    
        // Calculate the total
        $total = $validatedData['quantity'] * $validatedData['price'];
    
        // Add the calculated total to the validated data
        $validatedData['total'] = $total;
    
        // Create a new instance of the receivable model
        Receivable::create($validatedData);
    
        return redirect()->route('receivable.index')->with('success', 'Berhasil Menambahkan Data Piutang');
    }
    

    public function show($id)
    {
        return view('admin.piutang.edit', [
            'receivable' => receivable::where('id', $id)->first(),
            'supplier' => Supplier::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'supplier_id' => 'required|string|exists:suppliers,id',
            'name_item' => 'required|string|max:100',
            'quantity' => 'required|string|max:10000', // Assuming 'quantity' is an integer
            'price' => 'required|string|max:10000', // Assuming 'price' is a numeric value
        ]);
    
        // Calculate the total
        $total = $validatedData['quantity'] * $validatedData['price'];
    
        // Add the calculated total to the validated data
        $validatedData['total'] = $total;

        receivable::find($id)->update($validatedData);

        return redirect()->route('receivable.index')->with('succes','Berhasil Menambahkan Data piutang');
    
    }

    public function destroy($id)
    {
        receivable::where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus. Data yang Anda pilih tidak lagi tersedia pada sistem 😁');

    }
}
