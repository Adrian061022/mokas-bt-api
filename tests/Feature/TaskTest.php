<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_tasks_index_returns_non_empty_list(): void
    {
        //arrange
        Task::factory()->count(5)->create();
        //act
        $response = $this->get('api/tasks');
        //assert
        $response->assertStatus(200);
        $this->assertGreaterThan(0, count($response->json()));
    }
}
