<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    public function test_even_time(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['time' => 2]);

        $response
        ->assertStatus(400)
        ->assertJsonStructure([
            'errors'
        ])
        ->assertJson([
            'errors'  => 'Time is wrong'
        ]);
    }

    public function test_odd_time(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['param1' => 2, 'param2' => 3]);

        $response
        ->assertStatus(200);
    }

    public function test_api_doesnt_exist(): void
    {
        $response = $this->postJson('/api/calculator/something');

        $response
        ->assertStatus(404)
        ->assertNotFound();
    }
    public function test_additon_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/addition');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_additon_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['param1' => true, 'param2' => 'hola']);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_additon_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['param1' => 2000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_additon_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['param1' => 54, 'param2' => 1]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 55
        ]);
    }

    public function test_additon_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/addition', ['param1' => 54.5, 'param2' => -1.5]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 53
        ]);
    }

    public function test_subtraction_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/subtraction');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_subtraction_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/subtraction', ['param1' => false, 'param2' => 'hola']);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_subtraction_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/subtraction', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_subtraction_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/subtraction', ['param1' => 54, 'param2' => 1]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 53
        ]);
    }

    public function test_subtraction_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/subtraction', ['param1' => 54.5, 'param2' => -1.5]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 56
        ]);
    }

    public function test_multiplication_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/multiplication');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_multiplication_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/multiplication', ['param1' => 'a', 'param2' => 'hola']);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_multiplication_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/multiplication', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_multiplication_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/multiplication', ['param1' => 54, 'param2' => 1]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 54
        ]);
    }

    public function test_multiplication_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/multiplication', ['param1' => 54.5, 'param2' => -1.5]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => -81.75
        ]);
    }

    public function test_division_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/division');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_division_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/division', ['param1' => 'a', 'param2' => false]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_division_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/division', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_division_route_second_parameter_is_zero(): void
    {
        $response = $this->postJson('/api/calculator/division', ['param1' => 90, 'param2' => 0]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param2' => ['Cannot divide by 0.']
        //     ]
        // ]);
    }

    public function test_division_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/division', ['param1' => 1000, 'param2' => 20]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 50
        ]);
    }

    public function test_division_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/division', ['param1' => 66.6, 'param2' => 66.6]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 1
        ]);
    }

    public function test_exponentiation_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_exponentiation_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation', ['param1' => 'a', 'param2' => false]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_exponentiation_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_exponentiation_route_second_parameter_is_decimal_if_first_one_is_negative(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation', ['param1' => -1, 'param2' => 0.5]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param2' => ['param2 must be an integer if param1 is negative.']
        //     ]
        // ]);
    }

    public function test_exponentiation_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation', ['param1' => 2, 'param2' => 10]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 1024
        ]);
    }

    public function test_exponentiation_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/exponentiation', ['param1' => 2, 'param2' => -10]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 0.0009765625
        ]);
    }

    public function test_root_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/root');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_root_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/root', ['param1' => 'a', 'param2' => false]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.'],
        //         'param2' => ['The param2 field must be a number.']
        //     ]
        // ]);
    }

    public function test_root_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/root', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_root_route_first_parameter_is_less_than_zero(): void
    {
        $response = $this->postJson('/api/calculator/root', ['param1' => -61, 'param2' => 2]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be at least 0.']
        //     ]
        // ]);
    }

    public function test_root_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/root', ['param1' => 100, 'param2' => 2]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 10
        ]);
    }

    public function test_root_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/root', ['param1' => 4444, 'param2' => 1]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 4444
        ]);
    }

    public function test_logarithm_route_without_parameters(): void
    {
        $response = $this->postJson('/api/calculator/logarithm');

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field is required.'],
        //         'param2' => ['The param2 field is required.']
        //     ]
        // ]);
    }

    public function test_logarithm_route_parameters_not_numerical_type(): void
    {
        $response = $this->postJson('/api/calculator/logarithm', ['param1' => 'a', 'param2' => false]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be a number.', 'The param1 field must be at least 2.'],
        //         'param2' => ['The param2 field must be a number.', 'The param2 field must be at least 1.']
        //     ]
        // ]);
    }

    public function test_logarithm_route_parameters_over_one_millon(): void
    {
        $response = $this->postJson('/api/calculator/logarithm', ['param1' => 1000000, 'param2' => 1000000]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1',
                'param2'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must not be greater than 999999.'],
        //         'param2' => ['The param2 field must not be greater than 999999.']
        //     ]
        // ]);
    }

    public function test_logarithm_route_parameter_are_less_than_2_and_1(): void
    {
        $response = $this->postJson('/api/calculator/logarithm', ['param1' => 1, 'param2' => 0]);

        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'errors' => [
                'param1'
            ]
            ]);
        // ->assertJson([
        //     'errors'  => [
        //         'param1' => ['The param1 field must be at least 2.'],
        //         'param2' => ['The param2 field must be at least 1.']
        //     ]
        // ]);
    }

    public function test_logarithm_route_with_correct_parameters1(): void
    {
        $response = $this->postJson('/api/calculator/logarithm', ['param1' => 4, 'param2' => 16]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 2
        ]);
    }

    public function test_logarithm_route_with_correct_parameters2(): void
    {
        $response = $this->postJson('/api/calculator/logarithm', ['param1' => 5, 'param2' => 625]);

        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'result'
        ])
        ->assertJson([
            'result' => 4
        ]);
    }

    // public function test_result(): void
    // {
    //     $response = $this->postJson('/api/calculator/result', ['param1' => 5, 'param2' => 10, 'param3' => 10, 'param4' => 5]);

    //     $response->assertJson([
    //         'result' => 0
    //     ]);
    // }
}
