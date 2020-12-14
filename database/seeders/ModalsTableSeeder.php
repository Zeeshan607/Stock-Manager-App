<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('modals')->insert([
            'name' => 'p series',
            'brand_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('modals')->insert([
            'name' => 'j series',
            'brand_id'=>'2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('modals')->insert([
            'name' => 'Note series',
            'brand_id'=>'3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        \DB::table('modals')->insert([
            'name' => 'c series',
            'brand_id'=>'4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('modals')->insert([
            'name' => 'itel series',
            'brand_id'=>'5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \DB::table('modals')->insert([
            'name' => 'c series',
            'brand_id'=>'6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        \DB::table('modals')->insert([
            'name' => 'xaomi series',
            'brand_id'=>'7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        \DB::table('modals')->insert([
            'name' => 'E series',
            'brand_id'=>'8',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        \DB::table('modals')->insert([
            'name' => 'Z series',
            'brand_id'=>'8',
            'created_at' => Carbon::now(),
         'updated_at' => Carbon::now(),

        ]);

        \DB::table('modals')->insert([
            'name' => 'Vibe series',
            'brand_id'=>'10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        \DB::table('modals')->insert([
            'name' => 'Moto series',
            'brand_id'=>'10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        \DB::table('modals')->insert([
            'name' => 'k series',
            'brand_id'=>'9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        \DB::table('modals')->insert([
            'name' => 'A series',
            'brand_id'=>'9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        \DB::table('modals')->insert([
            'name' => 'bharat series',
            'brand_id'=>'12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        \DB::table('modals')->insert([
            'name' => 'canvas series',
            'brand_id'=>'12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

    }
}
