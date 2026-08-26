<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Phòng Design', 'code' => 'DESIGN', 'description' => 'Bộ phận thiết kế đa phương tiện', 'status' => 'active'],
            ['name' => 'Phòng IT', 'code' => 'IT', 'description' => 'Phòng kỹ thuật, phát triển phần mềm', 'status' => 'active'],
            ['name' => 'Phòng kinh doanh', 'code' => 'SALES', 'description' => 'Bộ phận kinh doanh & phát triển thị trường', 'status' => 'active'],
            ['name' => 'Phòng kế toán', 'code' => 'ACC', 'description' => 'Bộ phận kế toán & tài chính', 'status' => 'active'],
            ['name' => 'Ban Giám đốc', 'code' => 'BOD', 'description' => 'Ban Giám đốc điều hành', 'status' => 'active'],
        ];

        foreach ($departments as $dept) {
            Department::updateOrCreate(
                ['code' => $dept['code']],
                $dept
            );
        }
    }
}
