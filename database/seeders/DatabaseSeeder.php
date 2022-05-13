<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $references = [
            [
                'code' => 'overtime_method',
                'name' => 'Salary / 173',
                'expression' => '(salary / 173) * overtime_duration_total',
            ],

            [
                'code' => 'overtime_method',
                'name' => 'Fixed',
                'expression' => '10000 * overtime_duration_total',
            ],
        ];

        $setting = [
            'key' => 'overtime_method',
            'value' => '1',
        ];

        \App\Models\Reference::insert($references);
        \App\Models\Setting::create($setting);

        \App\Models\Overtime::factory(10)->create();
    }
}
