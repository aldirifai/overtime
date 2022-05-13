<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OvertimePayTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_show_calculate_result_overtime_pay()
    {
        $this->get('api/overtime-pays/calculate?month=2022-01')->assertStatus(200);
    }

    /** @test */
    public function month_can_be_filled_using_spesific_format()
    {
        $this->get('api/overtime-pays/calculate?month=1 Bulan')->assertSessionHasErrors('month');
    }
}
