<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use App\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanSeeUserPage()
    {
        $user = factory(User::class)->create();
        $response = $this->get($user->username);
        $response->assertSee($user->name);
    }

    public function testCanLogin(){
        $user = factory(User::class)->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);
        $this->assertAuthenticatedAs($user);
    }

    public function testFollow()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        // el meotodo actingAs($user) loguea el usuario antes de hacer follow
        $response = $this->actingAs($user)->post($other->username.'/follow');

        // para hacer uso de este assert hay que importar InteractsWithDatabase
        $this->assertDatabaseHas('followers', [
            'user_id' => $user->id,
            'followed_id' => $other->id,
        ]);
    }
}
