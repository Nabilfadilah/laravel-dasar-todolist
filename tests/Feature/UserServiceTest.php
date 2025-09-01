<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    // hasilnya gak bisa ambil userService, karena blom di registrasikan
    public function testSample()
    {
        self::assertTrue(true);
    }

    // cek user login success
    public function testLoginSuccess()
    {
        // hasil yang diharapkan
        self::assertTrue($this->userService->login("abil", "rahasia"));
    }

    // cek login gagal
    public function testLoginUserNotFound()
    {
        // hasil yang diharapkan
        self::assertFalse($this->userService->login("elfo", "asasju"));
    }

    // cek login password salah
    public function testLoginWrongPassword()
    {
        // hasil yang diharapkan
        self::assertFalse($this->userService->login("abil", "salahPassword"));
    }
}
