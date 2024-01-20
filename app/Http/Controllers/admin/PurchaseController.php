<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\purchase;
use App\thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseController extends Controller
{
    public  function index()
    {
        return view('admin.pesanan.index',[
            'thing' => thing::all(),
            'purchase' => purchase::all(),
            'status' => 'menunggu konfirmasi'
        ]);
    }

    public function pesan(thing $id)
    {
        return view('admin.pesanan.tambah', [
            'thing'       => $id,
            'purchase' => purchase::all(),
            
        ]);

    }

    public function store(PurchaseRequest $request)
    {
        // Retrieve the Thing using the 'thing_id' from the request
        $thing = Thing::findOrFail($request->thing_id);

        // Ensure there is enough stock available
        if ($thing->stok < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        // Create a new Purchase record
        $purchase = Purchase::create([
            'thing_id' => $thing->id,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $thing->price,
            'status' => 'menunggu konfirmasi'
        ]);

        // Update the 'stok' attribute of the Thing
        $thing->update([
            'stok' => $thing->stok - $request->quantity,
        ]);

        // Redirect back with success message
        return redirect()->route('admin.purchase')->with('success', 'Berhasil Melakukan Pembelian');
    }

    public function tampilan()
    {
        $thing = thing::all();
        $purchase = Purchase::with('thing')->get();

        return view('admin.konfirmasi.index', compact('thing', 'purchase'));
    }

    public function confirm($id)
    {
        purchase::whereId($id)->update([
            'status' => 'Pesanan Sedang Di antar'
        ]);

        return back()->with('success','Berhasil Konfirmasi Pesanan');
    }
    public function end($id)
    {
        purchase::whereId($id)->update([
            'status' => 'Pesanan Telah Sampai'
        ]);

        return back()->with('success','Pesanan Telah Selesai');
    }
}
