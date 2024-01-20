<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThingRequest;
use App\thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThingController extends Controller
{
    public function index()
    {
        $thing = thing::all();
        return view ('admin.barang.index',compact('thing'));
    }

    public function tambah()
    {

        return view('admin.product.tambah');
    }

    public function store(ThingRequest $request)
    {
        $data = thing::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'stok'          => $request->stok,
            'weigth'        => $request->weigth,
            'image'         => $request->image

        ]);
        if ($request->hasfile('image')) {
            $imagePath = $request->file('image')->store('public/imageproducts');
            $data->image = $imagePath;
            $data->save();
        }
        return redirect()->route('admin.thing')->with('success', 'Berhasil Menambah Produk Baru');
    }

    public function edit(thing $id)
    {
        return view('admin.barang.edit', [
            'thing'       => $id,
        ]);
    }

    public function update(thing $id, ThingRequest $request)
    {
        $thing = $id;

         // Menghapus file gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            Storage::delete($thing->image);
        }
        // $thing = Product::find($id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/imageproducts');
            $thing->image = $imagePath;
            $thing->update();
        }

        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->price = $request->price;
        $thing->weigth = $request->weigth;
        $thing->stok = $request->stok;

        $thing->update();

        return redirect()->route('admin.thing')->with('success', 'Berhasil Mengubah Produk');
    }

    public function delete(thing $id)
    {

        //mengahapus produk
        Storage::delete('imageproducts/' . $id->image);
        $id->delete();

        return redirect()->route('admin.thing')->with('success', 'Berhasil Menghapus Produk');
    }
}
