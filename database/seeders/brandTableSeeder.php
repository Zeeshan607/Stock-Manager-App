<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class brandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('brands')->insert([
            'name' => 'huawei',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
            'name' => 'samsung',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
            'name' => 'vivo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
            'name' => 'nokia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
        'name' => 'itel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);

        \DB::table('brands')->insert([
        'name' => 'htc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);

        \DB::table('brands')->insert([
        'name' => 'redmi xaomi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);


    \DB::table('brands')->insert([
        'name' => 'Qmobile',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);

        \DB::table('brands')->insert([
            'name' => 'Oppo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
            'name' => 'lenovo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        \DB::table('brands')->insert([
            'name' => 'Nazro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('brands')->insert([
            'name' => 'Macromax',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);








    }
}
