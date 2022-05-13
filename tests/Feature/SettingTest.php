<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_update_data()
    {
        $this->patch('api/settings', [
            'key' => 'overtime_method',
            'value' => 1,
        ])->assertSessionHasNoErrors();
    }

    /** @test */
    public function key_can_only_filled_by_spesific_text()
    {
        $this->patch('api/settings', [
            'key' => 'others',
            'value' => 1,
        ])->assertSessionHasErrors('key');
    }

    /** @test */
    public function value_can_only_filled_by_reference_id()
    {
        $this->patch('api/settings', [
            'key' => 'overtime_method',
            'value' => 33,
        ])->assertSessionHasErrors('value');
    }
}
