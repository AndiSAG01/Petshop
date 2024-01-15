<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\sp;
use Illuminate\Http\Request;

class SpController extends Controller
{
    public function index ()
    {
        $supplier = sp::all();
        return view('admin.sp.index', compact('supplier'));
    }

    public function Store(Request $request)
    {
        $ValidateData = $request->validate([
         'name' => 'required|string|max : 100',
         'no_telp' => 'required|string|max:15',
         'address' => 'required|string|max : 100',
        ]);

        sp::create($ValidateData);

        return redirect('/sp')->with('success','Data Berhasil Di tambahkan');
    }

    public function show($id)
    {
        return view('admin.sp.edit', [
            'supplier' => sp::where('id', $id)->first()
        ]);
    }

    public function update(Request $request,$id)
    {
        $ValidateData = $request->validate([
            'name' => 'required|string|max : 100',
            'no_telp' => 'required|string|max:15',
            'address' => 'required|string|max : 100',
           ]);
   
           sp::find($id)->update($ValidateData);
   
           return redirect('/sp')->with('success','Data Berhasil Di tambahkan');
       
    }

    public function destroy($id)
    {
        sp::where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus. Data yang Anda pilih tidak lagi tersedia pada sistem 😁');

    }
}
