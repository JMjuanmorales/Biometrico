<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use WithFaker;
    /***@test*/
    public function testCargaPorRolEnElSistema()
    {
        $users = [
            ['email' => 'student@example.com', 'route' => '/dashboard'],
            ['email' => 'instructor@example.com', 'route' => '/instructor-dashboard'],
            ['email' => 'admin@example.com', 'route' => '/create-user'],
        ];

        $requestsPerUser = 1000;

        foreach ($users as $userDetails) {

            $user = User::where('email', $userDetails['email'])->first();

            $this->actingAs($user);


            for ($i = 0; $i < $requestsPerUser; $i++) {
                $response = $this->get($userDetails['route']);

                $response->assertStatus(200);
            }
        }
    }
}