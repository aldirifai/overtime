<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class OvertimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hour = rand(1, 20);
        $minute = rand(0, 59);

        $start_time = $hour . ':' . $minute . ':00';
        $end_time = $hour + rand(1, 3) . ':' . $minute . ':00';

        return [
            'employee_id' => Employee::factory()->create()->id,
            'date' => $this->faker->dateTimeBetween("-1 years", "now")->format('Y-m-d'),
            'time_started' => $start_time,
            'time_ended' => $end_time,
        ];
    }
}
