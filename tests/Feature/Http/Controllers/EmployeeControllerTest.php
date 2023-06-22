<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Database\Factories\PositionFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_loads_the_position_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testUserCreation()
    {
        $user = new User([
            'name' => "Test User",
            'email' => "test@mail.com",
            'password' => bcrypt("testpassword")
        ]);

        $this->assertEquals('Test User', $user->name);
    }

    public function testEmployeeCreation()
    {
        $employee = new User([
            'name' => "Dan",
            'phone' => "123123123",
            'position_id' =>"2",
            'salary' =>"2",
            'head' =>"Tom",
            'email' => "test@mail.com",
            'password' => bcrypt("testpassword")
        ]);

        $this->assertEquals('Dan', $employee->name);
    }

    public function testPositionCreation()
    {
        $position = new Position([
            'title' => "New title",
        ]);

        $this->assertEquals('New title', $position->title);
    }

    public function test_it_loads_the_positions_index_page_with_links_to_the_positions()
    {
        $first_position = PositionFactory::new()->create();
        $second_position = PositionFactory::new()->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee($first_position->title);
        $response->assertSee($first_position->title);

    }
}
