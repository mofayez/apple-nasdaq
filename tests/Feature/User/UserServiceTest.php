<?php
namespace Tests\Feature\User;

use Tests\TestCase;
use App\Application\UserService;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {

        $userService = app(UserService::class);

        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'image' => 'image-name',
            'address' => 'address...'
        ];

        $user = $userService->createUser($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
    }

    /** @test */
    public function it_hashes_user_password()
    {
        $userService = app(UserService::class);

        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $user = $userService->createUser($userData);

        // Ensure that the user's password is hashed
        $this->assertNotEquals('password123', $user->password);
    }

    /** @test */
    public function it_handles_invalid_user_data()
    {
        // Example: Missing email
        $userData = [
            'name' => 'John Doe',
            'password' => 'password123',
        ];

        // Ensure that an exception is thrown or appropriate validation is triggered
        $this->expectException(QueryException::class);

        $userService = app(UserService::class);
        $userService->createUser($userData);
    }

    /** @test */
    public function it_handles_existing_email()
    {
        // Create a user with a specific email
        User::factory()->create(['email' => 'existing@example.com']);

        // Attempt to create a user with the same email
        $userData = [
            'name' => 'John Doe',
            'email' => 'existing@example.com',
            'password' => 'password123',
        ];

        // Ensure that an exception is thrown or appropriate validation is triggered
        $this->expectException(UniqueConstraintViolationException::class);

        $userService = app(UserService::class);

        $userService->createUser($userData);
    }

        /** @test */
        public function it_handles_existing_phone()
        {
            // Create a user with a specific email
            User::factory()->create(['phone' => '+201000721394']);
    
            // Attempt to create a user with the same email
            $userData = [
                'name' => 'John Doe',
                'email' => 'existing@example.com',
                'password' => 'password123',
                'phone' => '+201000721394',
            ];
    
            // Ensure that an exception is thrown or appropriate validation is triggered
            $this->expectException(UniqueConstraintViolationException::class);
    
            $userService = app(UserService::class);
    
            $userService->createUser($userData);
        }
}
