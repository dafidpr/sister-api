<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::insert([
            [
                'employee_type_id' => 7,
                'nip' => '0918234234234',
                'nidn' => '0923849283942',
                'name' => 'Dimas Anggara',
                'gender' => 'L',
                'phone' => '0852534623423',
                'email' => 'dimas@poliwangi.ac.id',
                'birthplace' => 'Banyuwangi',
                'birthdate' => '1998-12-19',
                'religion' => 'Islam',
                'address' => 'Rogojampi, Banyuwangi',
                'city' => 'Banyuwangi',
                'district' => 'Rogojampi',
                'province' => 'Jawa Timur',
                'nationality' => 'ID',
                'postal_code' => '0673',
                'back_degree' => 'S.Kom.,M.Kom',
                'front_degree' => null,
            ]
        ]);
    }
}
