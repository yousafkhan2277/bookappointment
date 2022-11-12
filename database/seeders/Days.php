<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Days extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert(
        [
            ['id' => 1, 'day'=>'Mon','comment'=>'','workingDayStatus'=>true,'employee_id'=> 1],
            ['id' => 2, 'day'=>'Tus','comment'=>'','workingDayStatus'=>true,'employee_id'=> 1],
            ['id' => 3, 'day'=>'Wed','comment'=>'','workingDayStatus'=>true,'employee_id'=> 1],
            ['id' => 4, 'day'=>'Thur','comment'=>'HollyDay','workingDayStatus'=>false,'employee_id'=> 1],
            ['id' => 5, 'day'=>'Fri','comment'=>'','workingDayStatus'=>true,'employee_id'=> 1],
            ['id' => 6, 'day'=>'Sat','comment'=>'','workingDayStatus'=>false,'employee_id'=> 1],
            ['id' => 7, 'day'=>'Sun','comment'=>'','workingDayStatus'=>false,'employee_id'=> 1],
        ]);
        
    }
}
