<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array(
                'category'      => 'Electronics',
                'product_name'  => 'Infinix Note 12 G96 8GB/128GB Mobile Smartphone',
                'price'         => '20350',
                'qty'           => '5',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Electronics',
                'product_name'  => 'Oppo F21s Pro 8GB/128GB Smartphone',
                'price'         => '28999',
                'qty'           => '7',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Electronics',
                'product_name'  => 'WALTON Smartphone Primo HM7 (3GB/32GB)',
                'price'         => '10330',
                'qty'           => '1',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Electronics',
                'product_name'  => 'Samsung Galaxy A04s (4GB/128GB)',
                'price'         => '18308',
                'qty'           => '3',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Men Fashion',
                'product_name'  => 'Black Cotton Hoodie For Men',
                'price'         => '370',
                'qty'           => '8',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Men Fashion',
                'product_name'  => 'Bangladesh National  Jersey - Green',
                'price'         => '88',
                'qty'           => '16',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Women Fashion',
                'product_name'  => "TOP Women's Printed Sweatshirt",
                'price'         => '332',
                'qty'           => '7',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Women Fashion',
                'product_name'  => "Women Grey Self Design Cardigan Sweater",
                'price'         => '910',
                'qty'           => '11',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Women Fashion',
                'product_name'  => "Premium Ladies Poncho Shawl",
                'price'         => '713',
                'qty'           => '9',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
            array(
                'category'      => 'Women Fashion',
                'product_name'  => "Women Grey  Solid Hooded Sweaters",
                'price'         => '920',
                'qty'           => '7',
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ),
        );

        if (DB::table('products')->count() == 0) {
            DB::table('products')->insert($products);
        }
    }
}
