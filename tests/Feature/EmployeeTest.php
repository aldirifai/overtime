<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_create_data()
    {
        $this->post('api/employees', [
            'name' => 'John Doe',
            'salary' => 3000000,
        ])->assertSessionHasNoErrors();
    }

    /** @test */
    public function name_can_be_unique_and_at_least_two_characters()
    {
        // ketika data karyawan baru ditambahkan
        $this->post('api/employees', [
            'name' => 'Nama Sama',
            'salary' => 3000000,
        ])->assertSessionHasNoErrors('name');

        // ketika data karyawan disamakan
        $this->post('api/employees', [
            'name' => 'Nama Sama',
            'salary' => 3000000,
        ])->assertSessionHasErrors('name');

        // ketika data karyawan kurang dari 2 karakter
        $this->post('api/employees', [
            'name' => 'A',
            'salary' => 3000000,
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    public function salary_can_be_filled_using_spesific_range()
    {
        // ketika kurang dari 2 juta
        $this->post('api/employees', [
            'name' => 'Nama Sama',
            'salary' => 1000000,
        ])->assertSessionHasErrors('salary');

        // ketika lebih dari 10 juta
        $this->post('api/employees', [
            'name' => 'Nama Sama',
            'salary' => 11000000,
        ])->assertSessionHasErrors('salary');
    }
}
