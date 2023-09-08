<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class pegawai extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = ['1','2','3','4','5','6','7','8','9','0'];
        $gender = ['L','P'];
        DB::table('pegawai')->insert([
            'first_name' => Str::random(7),
            'last_name' => Str::random(7),
            'email' => Str::random(10).'@gmail.com',
            'address' => 'Jl. '.Str::random(20),
            'phone' => implode('',Arr::random($array,9)),
            'gender' => Arr::random($gender),
            'create_by' => '1',
            'modify_by' => '1',
        ]);
    }
}
