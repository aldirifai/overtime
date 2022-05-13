<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OvertimeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_create_data()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2017-01-01',
            'time_started' => '09:00',
            'time_ended' => '10:00',
        ])->assertSessionHasNoErrors();
    }

    /** @test */
    public function employee_id_can_be_filled_using_reference_table()
    {
        $this->post('api/overtimes', [
            'employee_id' => 99,
            'date' => '2017-03-01',
            'time_started' => '09:00',
            'time_ended' => '10:00',
        ])->assertSessionHasErrors('employee_id');
    }

    /** @test */
    public function date_can_be_unique()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2018-01-01',
            'time_started' => '09:00',
            'time_ended' => '10:00',
        ])->assertSessionHasNoErrors('date');

        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2018-01-01',
            'time_started' => '09:00',
            'time_ended' => '10:00',
        ])->assertSessionHasErrors('date');
    }

    /** @test */
    public function time_started_can_be_filled_using_spesific_format()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2000-01-01',
            'time_started' => 'jam 7',
            'time_ended' => '10:00',
        ])->assertSessionHasErrors('time_started');
    }

    /** @test */
    public function time_ended_can_be_filled_using_spesific_format()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2000-02-01',
            'time_started' => '09:00',
            'time_ended' => '3 jam',
        ])->assertSessionHasErrors('time_ended');
    }

    /** @test */
    public function time_started_can_be_greater_than_time_ended()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2000-03-01',
            'time_started' => '09:00',
            'time_ended' => '08:00',
        ])->assertSessionHasErrors('time_started');
    }

    /** @test */
    public function time_started_can_be_less_than_to_time_ended()
    {
        $this->post('api/overtimes', [
            'employee_id' => 1,
            'date' => '2000-03-02',
            'time_started' => '11:00',
            'time_ended' => '10:00',
        ])->assertSessionHasErrors('time_ended');
    }
}
