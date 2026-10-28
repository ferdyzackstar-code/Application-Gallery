<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_creates_user_redirects_and_allows_login(): void
    {
        $response = $this->post('/register', [
            'username' => 'newuser',
            'email' => 'newuser@example.com',
            'nama_lengkap' => 'New User',
            'alamat' => 'Jalan Contoh',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('success', 'Registrasi berhasil! Silakan login.');

        $user = DB::table('users')->where('Email', 'newuser@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('newuser', $user->Username);
        $this->assertTrue(Hash::check('secret123', $user->Password));

        $this->post('/login', [
            'username' => 'newuser',
            'password' => 'secret123',
        ])->assertRedirect('/');

        $this->assertAuthenticated();
    }
}
