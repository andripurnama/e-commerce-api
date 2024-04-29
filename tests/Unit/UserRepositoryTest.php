<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\UserRepository;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Mockery;

uses(RefreshDatabase::class);
test('user repository exists', function(){
    $this->assertTrue(class_exists(UserRepository::class), 'UserRepository class does not exist.');
});
test('create new user', function() {
    
    // arrange 
    $userData = [
        'first_name' => 'Zayn',
        'last_name' => 'Malik',
        'email' => 'zayn.malik@mail.com',
        'username' => 'zayn99',
        'password' => Hash::make('Coder'),
    ];

    // act 
    $user = Mockery::mock(User::class);
    $user->shouldReceive('create')->once()->andReturn(true);
    
    $userRepository = new UserRepository($user);
    $insert = $userRepository->create($userData);

    //assert
    expect($insert)->toBe(true);
    
});

test('Delete account', function () {
    $this->seed(UserSeeder::class);

    $user = Mockery::mock(User::class);
    $user->shouldReceive('where->first->delete')->once()->andReturn(true);

    $userRepository = new UserRepository($user);
    $userRepository->delete('id',1);

    $userExists = User::where('id', 1)->exists();
    expect($userExists)->toBe(false);
});


