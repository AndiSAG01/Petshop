<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PelangganController;
use App\Http\Controllers\admin\PengaturanController;
use App\Http\Controllers\admin\PenginapanadmController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReceivableController;
use App\Http\Controllers\admin\RekeningController;
use App\Http\Controllers\admin\SpController;
use App\Http\Controllers\admin\SupplierController as AdminSupplierController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\user\AlamatController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\KeranjangController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\user\ProdukController;
use App\Http\Controllers\user\WelcomeController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/home', [WelcomeController::class, 'index'])->name('home2');
Route::get('/produk', [ProdukController::class, 'index'])->name('user.produk');
Route::get('/produk/cari', [ProdukController::class, 'cari'])->name('user.produk.cari');
Route::get('/kategori/{id}', [KategoriController::class, 'produkByKategori'])->name('user.kategori');
Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('user.produk.detail');

Route::group(['middleware' => ['auth','checkRole:admin,pemilik,supplier' ]], function () {
    Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');
    Route::put('/identity/{id}', [PengaturanController::class, 'identity']);
    Route::prefix('/pengaturan')->group(function () {
        Route::get('/alamat', [PengaturanController::class, 'aturalamat'])->name('admin.pengaturan.alamat');
        Route::get('/ubahalamat/{id}', [PengaturanController::class, 'ubahalamat'])->name('admin.pengaturan.ubahalamat');
        Route::get('/alamat/getcity/{id}', [PengaturanController::class, 'getCity'])->name('admin.pengaturan.getCity');
        Route::post('/simpanalamat', [PengaturanController::class, 'simpanalamat'])->name('admin.pengaturan.simpanalamat');
        Route::post('/updatealamat/{id}', [PengaturanController::class, 'updatealamat'])->name('admin.pengaturan.updatealamat');
    });

    #kategoriadm
    Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/tambah', [CategoriesController::class, 'tambah'])->name('admin.categories.tambah');
    Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::post('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::get('/admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');

    #produkadm
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/tambah', [ProductController::class, 'tambah'])->name('admin.product.tambah');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

    #traksaksiadm
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/transaksi/perludicek', [TransaksiController::class, 'perludicek'])->name('admin.transaksi.perludicek');
    Route::get('/admin/transaksi/perludikirim', [TransaksiController::class, 'perludikirim'])->name('admin.transaksi.perludikirim');
    Route::get('/admin/transaksi/dikirim', [TransaksiController::class, 'dikirim'])->name('admin.transaksi.dikirim');
    Route::get('/admin/transaksi/detail/{id}', [TransaksiController::class, 'detail'])->name('admin.transaksi.detail');
    Route::get('/admin/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi'])->name('admin.transaksi.konfirmasi');
    Route::post('/admin/transaksi/inputresi/{id}', [TransaksiController::class, 'inputresi'])->name('admin.transaksi.inputresi');
    Route::get('/admin/transaksi/selesai', [TransaksiController::class, 'selesai'])->name('admin.transaksi.selesai');
    Route::get('/admin/transaksi/dibatalkan', [TransaksiController::class, 'dibatalkan'])->name('admin.transaksi.dibatalkan');
    Route::get('/admin/transaksi/invoice/{id}', [TransaksiController::class, 'invoice'])->name('admin.transaksi.invoice');

    #laporan
    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
    Route::get('/admin/customer', [PelangganController::class, 'customer'])->name('admin.customer');
    Route::get('/admin/laporan', [LaporanController::class, 'index']);
    Route::get('/admin/laporanProduk',[LaporanController::class, 'produk'])->name('admin.laporanproduk');

    Route::get('/administrator', [AdminController::class, 'index']);
    Route::get('/administrator/create', [AdminController::class, 'create']);
    Route::post('/administrator/store', [AdminController::class, 'store']);
    Route::get('/administrator/{id}/edit', [AdminController::class, 'show']);
    Route::put('/administrator/{id}', [AdminController::class, 'update']);
    Route::delete('/administrator/{id}', [AdminController::class, 'destroy']);

    #rekening
    Route::get('/admin/rekening', [RekeningController::class, 'index'])->name('admin.rekening');
    Route::get('/admin/rekening/edit/{id}', [RekeningController::class, 'edit'])->name('admin.rekening.edit');
    Route::post('/admin/rekening/store', [RekeningController::class, 'store'])->name('admin.rekening.store');
    Route::get('/admin/rekening/delete/{id}', [RekeningController::class, 'delete'])->name('admin.rekening.delete');
    Route::post('/admin/rekening/update/{id}', [RekeningController::class, 'update'])->name('admin.rekening.update');

    #supplier
    Route::get('/supplier',[AdminSupplierController::class , 'index'])->name('supplier.index');
    Route::post('/supplier/store',[AdminSupplierController::class,'store'])->name('supplier.store');
    Route::get('/supplier/{id}/edit', [AdminSupplierController::class, 'show']);
    Route::post('/supplier/{id}', [AdminSupplierController::class, 'update']);
    Route::delete('/supplier/{id}', [AdminSupplierController::class, 'destroy']);

     #sp
     Route::get('/sp',[SpController::class , 'index'])->name('sp.index');
     Route::post('/sp/store',[SpController::class,'store'])->name('sp.store');
     Route::get('/sp/{id}/edit', [SpController::class, 'show']);
     Route::post('/sp/{id}', [SpController::class, 'update']);
     Route::delete('/sp/{id}', [SpController::class, 'destroy']);

    #piutang
    Route::get('/receivable',[ReceivableController::class ,'index'])->name('receivable.index');
    Route::post('/receivable/store',[ReceivableController::class,'store'])->name('receivable.store');
    Route::get('/receivable/{id}/edit', [ReceivableController::class, 'show']);
    Route::post('/receivable/{id}', [ReceivableController::class, 'update']);
    Route::delete('/receivable/{id}', [ReceivableController::class, 'destroy']);

    #payment
    Route::get('/payment',[PaymentController::class ,'index'])->name('payment.index');
    Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');
    Route::get('/payment/{id}/edit', [PaymentController::class, 'show']);
    Route::post('/payment/{id}', [PaymentController::class, 'update']);
    Route::delete('/payment/{id}', [PaymentController::class, 'delete']);

});

Route::group(['middleware' => ['auth', 'checkRole:customer']], function () {

    #keranjang
    Route::post('/keranjang/simpan', [KeranjangController::class, 'simpan'])->name('user.keranjang.simpan');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('user.keranjang');
    Route::post('/keranjang/update', [KeranjangController::class, 'update'])->name('user.keranjang.update');
    Route::get('/keranjang/delete/{id}', [KeranjangController::class, 'delete'])->name('user.keranjang.delete');

    #alamat
    Route::get('/alamat', [AlamatController::class, 'index'])->name('user.alamat');
    Route::get('/getcity/{id}', [AlamatController::class, 'getCity'])->name('user.alamat.getCity');
    Route::post('/alamat/simpan', [AlamatController::class, 'simpan'])->name('user.alamat.simpan');
    Route::post('/alamat/update/{id}', [AlamatController::class, 'update'])->name('user.alamat.update');
    Route::get('/alamat/ubah/{id}', [AlamatController::class, 'ubah'])->name('user.alamat.ubah');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');

    #order
    Route::post('/order/simpan', [OrderController::class, 'simpan'])->name('user.order.simpan');
    Route::get('/order/sukses', [OrderController::class, 'sukses'])->name('user.order.sukses');
    Route::get('/order', [OrderController::class, 'index'])->name('user.order');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('user.order.detail');
    Route::get('/order/pesananditerima/{id}', [OrderController::class, 'pesananditerima'])->name('user.order.pesananditerima');
    Route::get('/order/pesanandibatalkan/{id}', [OrderController::class, 'pesanandibatalkan'])->name('user.order.pesanandibatalkan');
    Route::get('/order/pembayaran/{id}', [OrderController::class, 'pembayaran'])->name('user.order.pembayaran');
    Route::post('/order/kirimbukti/{id}', [OrderController::class, 'kirimbukti'])->name('user.order.kirimbukti');

    // #sewa dan transaksi
    // Route::get('/sewa/{id}', [SewaController::class, 'index'])->name('user.sewa');
    // Route::post('/sewa/store', [SewaController::class, 'store'])->name('user.sewa.store');
    // Route::get('/transaksi', [SewaController::class, 'transaksi'])->name('user.transaksi');
    // Route::get('/user/transaksi/{id}', [SewaController::class, 'confirmasi'])->name('user.transaksi.konfirmasi');

    // #hotel
    // Route::get('/penginapan', [PenginapanController::class, 'index'])->name('user.penginapan');
});

Route::prefix('contact')->group(function () {

    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
});

Route::prefix('admin/contact')->group(function () {
    Route::get('/', [ContactController::class, 'tables'])->name('contact');
    Route::get('/{id}', [ContactController::class, 'show'])->name('contact.show');
});




// ==============================================================
// Lanjut di bawah

Route::get('/grooming', [WelcomeController::class,'grooming'])->name('grooming');
Route::get('/booking',[WelcomeController::class, 'kirimPesan'])->name('booking');
Route::get('/grooming',[WelcomeController::class, 'seed'])->name('grooming');
