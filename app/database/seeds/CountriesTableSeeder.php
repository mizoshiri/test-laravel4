<?php

class CountriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array(
                'name'      => 'Australia',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'New Zealand ',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'Japan',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'      => 'USA',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
        );
        DB::table('countries')->insert( $countries );
    }

}
