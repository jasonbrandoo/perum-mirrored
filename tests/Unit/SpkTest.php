<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class SpkTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'reference_group' => 1234,
            'reference_description' => 'test'
        ];

        $user = Auth::user();

        $test = $this->actingAs($user, 'api')->json('POST', '/referensi/store', $data);

        $test->assertStatus(200);
    }
}
