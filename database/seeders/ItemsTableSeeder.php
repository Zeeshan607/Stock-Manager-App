<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('items')->insert([
            'name' => 'huawei p9 lite',
            'amount'=>'88',
            'brand_id'=>'1',
            'modal_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'samsung j7 ',
            'amount'=>'88',
            'brand_id'=>'2',
            'modal_id'=>'2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'vivo note30 ',
            'amount'=>'88',
            'brand_id'=>'3',
            'modal_id'=>'3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
        'name' => 'nokia c3',
        'amount'=>'88',
        'brand_id'=>'4',
        'modal_id'=>'4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);

        \DB::table('items')->insert([
        'name' => 'itel 5',
        'amount'=>'88',
        'brand_id'=>'5',
        'modal_id'=>'5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);

    \DB::table('items')->insert([
        'name' => 'HTC c7',
        'amount'=>'88',
        'brand_id'=>'6',
        'modal_id'=>'6',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);

    \DB::table('items')->insert([
        'name' => 'redmi xaomi 1',
        'amount'=>'88',
        'brand_id'=>'7',
        'modal_id'=>'7',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);

    \DB::table('items')->insert([
            'name' => 'Qmobile e17',
            'amount'=>'88',
            'brand_id'=>'8',
            'modal_id'=>'8',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        \DB::table('items')->insert([
            'name' => 'Qmobile Z1',
            'amount'=>'88',
            'brand_id'=>'8',
            'modal_id'=>'9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'lenovo vibe 8',
            'amount'=>'88',
            'brand_id'=>'10',
            'modal_id'=>'10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'lonovo moto pro',
            'amount'=>'88',
            'brand_id'=>'10',
            'modal_id'=>'11',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'oppo k 12',
            'amount'=>'88',
            'brand_id'=>'9',
            'modal_id'=>'12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'Oppo A30',
            'amount'=>'88',
            'brand_id'=>'9',
            'modal_id'=>'13',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('items')->insert([
            'name' => 'Macromax bharat 2 plus',
            'amount'=>'88',
            'brand_id'=>'12',
            'modal_id'=>'14',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



    }
}
