<?php

namespace App\Http\Controllers;

use App\Charts\OrderChart;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Index dashboard - main app preview
     * @return \Illuminate\View\View
     */
    public function index()
{
    $orders = Order::where('status_order_id', 5)->oldest()->limit(10)->get();

    $data1 = []; // Initialize $data1 array
    $label1 = []; // Initialize $label1 array

    foreach ($orders as $item) {
        $data1[] = $item->subtotal;
        $label1[] = $item->created_at->format('D M Y');
    }

    $chart1 = new OrderChart;
    $chart1->labels($label1);
    $chart1->dataset('Total Pembelian', 'line', array_values($data1))->backgroundColor('#4e73df87')->color('#4e73df');

    // Rest of your code...
    
    $label2 = ['Belum dibayar', 'Perlu dicek', 'Telah dibayar', 'Barang Dikirim', 'Barang telah sampai', 'Pesanan dibatalkan'];
    // Inisialisasi array kosong untuk menampung data
    $data2 = array();

    // Loop untuk mengambil data untuk setiap status_order_id
    for ($i=1; $i<=6; $i++) {

        // Mengambil data count untuk status_order_id yang sedang di-loop
        $count = Order::where('status_order_id', $i)->count();

        // Menambahkan count ke dalam array data
        array_push($data2, $count);
    }

    // Membuat chart baru dan mengirimkan data
    $chart2 = new OrderChart;
    $chart2->labels($label2);
    $chart2->dataset('Order', 'pie', array_values($data2))->backgroundColor([
        'rgba(255, 99, 132, 0.5)',
        'rgba(153, 255, 153, 0.5)',
        'rgba(0, 0, 0, 0.5)',
        '#4e73df87',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)',
    ])->color([
        'rgba(255, 99, 132, 0.5)',
        'rgba(153, 255, 153, 0.5)',
        'rgba(0, 0, 0, 0.5)',
        '#4e73df87',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)',
    ]);

        
        return view('admin.dashboard', [
            'chart1' => $chart1,
            'chart2' => $chart2,
        ]);
    }
}
