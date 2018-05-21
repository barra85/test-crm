<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aData = [
            'sales_manager',
            'account_manager',
        ];

        foreach ($aData as $sName) {
            $obj = new Role();
            $obj->name = $sName;
            $obj->save();
        }
    }
}
