<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aData = [
            'Netherlands',
            'Germany',
            'Belgium',
        ];

        foreach ($aData as $sName) {
            $obj = new Country();
            $obj->name = $sName;
            $obj->save();
        }
    }
}
