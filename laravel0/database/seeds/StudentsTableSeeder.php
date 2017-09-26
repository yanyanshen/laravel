<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
        ['name' => 'sean','age' => 18],
        ['name' => 'sean1','age' => 19]

    ]);
    }
}
