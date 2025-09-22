<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register() {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test.png');

        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'photo' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('profile'));

        $this->assertDatabaseHas('users' ,[
            'name' => 'Test User',
        ]);
    }

    public function test_register_failed() {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test.png');

        $response = $this->post(route('register'), [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'photo' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }
    public function test_login() {
        $password = 'password123';
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('profile'));
    }

    public function test_login_failed() {
        $password = 'password123';
        $user = User::factory()->create([
            'password' => Hash::make($password)
        ]);

        $response = $this->post(route('login'), [
            'email' => 'fake-email',
            'password' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    public function test_logout() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);
        $response = $this->post(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
