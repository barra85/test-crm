<?php

use Illuminate\Database\Seeder;
use App\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $sName = str_random(10);
            $obj = new Shop();
            $obj->name = $sName;
            $obj->visitor_street = 'Visitorstreet';
            $obj->visitor_house_number = $i+1;
            $obj->visitor_zip = rand(1000, 9000).str_random(2);
            $obj->visitor_place = 'Ospel_'.$i;
            $obj->visitor_country_id = ($i % 2 == 0) ? 1 : 2;
            $obj->invoice_street = 'Invoicestreet';
            $obj->invoice_house_number = $i+10;
            $obj->invoice_zip = rand(1000, 9000).str_random(2);
            $obj->invoice_place = 'Ospel_'.$i*2;
            $obj->invoice_country_id = ($i % 2 == 0) ? 1 : 2;
            $obj->save();
        }
    }
}
