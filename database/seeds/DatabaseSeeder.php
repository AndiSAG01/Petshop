<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CouriersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(RekeningTableSeeder::class);
        $this->call(Alamat_tokoSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(OrderSeeder::class);

        // factory(App\Order::class, 10)->create();
        // factory(App\Detailorder::class, 50)->create();

    }
}
