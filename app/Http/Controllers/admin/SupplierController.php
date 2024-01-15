<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\supplier;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index ()
    {
        $supplier = supplier::all();
        return view('admin.supplier.index', compact('supplier'));
    }

    public function Store(Request $request)
    {
        $ValidateData = $request->validate([
         'name' => 'required|string|max : 100',
         'no_telp' => 'required|string|max:15',
         'address' => 'required|string|max : 100',
        ]);

        supplier::create($ValidateData);

        return redirect('/supplier')->with('success','Data Berhasil Di tambahkan');
    }

    public function show($id)
    {
        return view('admin.supplier.edit', [
            'supplier' => supplier::where('id', $id)->first()
        ]);
    }

    public function update(Request $request,$id)
    {
        $ValidateData = $request->validate([
            'name' => 'required|string|max : 100',
            'no_telp' => 'required|string|max:15',
            'address' => 'required|string|max : 100',
           ]);
   
           supplier::find($id)->update($ValidateData);
   
           return redirect('/supplier')->with('success','Data Berhasil Di tambahkan');
       
    }

    public function destroy($id)
    {
        supplier::where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus. Data yang Anda pilih tidak lagi tersedia pada sistem 😁');

    }
}
