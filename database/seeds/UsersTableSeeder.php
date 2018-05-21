<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        /* add sales managers */
        $iLimit = 2;
        for ($i = 0; $i < $iLimit; $i++) {
            $oUser = new User();
            $oUser->name = $faker->name;
            $oUser->email = $faker->unique()->email;
            $oUser->password = bcrypt('secret');
            $oUser->country_id = ($i == 1) ? 1 : 2;
            $oUser->sales_manager_id = 0;
            $oUser->save();
            $iGroupId = 1;
            $oUser->roles()->attach($iGroupId);
        }

        /* add account managers */
        $iLimit = 10;
        $iShopStart = 0;
        for ($i = 0; $i < $iLimit; $i++) {
            $oUser = new User();
            $oUser->name = $faker->name;
            $oUser->email = $faker->unique()->email;
            $oUser->password = bcrypt('secret');
            $iCountryId = ($i < 5) ? 1 : 2;
            $oUser->country_id = $iCountryId;
            $oUser->sales_manager_id = ($i < 5) ? 1 : 2;
            $oUser->save();
            $iGroupId = 2;
            $oUser->roles()->attach($iGroupId);
            $aShopIds = \App\Shop::where('visitor_country_id', $iCountryId)->skip($iShopStart)->take(10)->get()->pluck('id')->toArray();
            $oUser->shops()->attach($aShopIds);
            if($i == 4){
                $iShopStart = 0;
            } else {
                $iShopStart += 10;
            }
        }
    }
}
