<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $dataDesignation = [
            ['name' => 'Manager'],
            ['name' => 'Accountant'],
            ['name' => 'Cashier'],
        ];

        $dataDepartment = [
            ['name' => 'Sales'],
            ['name' => 'Marketing'],
            ['name' => 'Finance'],
        ];

        Designation::insert($dataDesignation);
        Department::insert($dataDepartment);

        $designationIds = Designation::pluck('id')->toArray();
        $departmentIds = Department::pluck('id')->toArray();
        User::factory()->count(50)->create([
            'designation_id' => function() use ($designationIds) {
                return $designationIds[array_rand($designationIds)];
            },
            'department_id' => function() use ($departmentIds) {
                return $departmentIds[array_rand($departmentIds)];
            },
        ]);

        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
