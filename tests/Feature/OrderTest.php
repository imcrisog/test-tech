<?php

namespace Tests\Feature;

use App\Models\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\WithEvents;
use Tests\WithUsers;

class OrderTest extends TestCase
{
    use RefreshDatabase, WithEvents, WithUsers;

    public function test_that_create_page_are_correct_with_admin_role(): void
    {
        $user = $this->createUser(UserRole::ADMIN);
        Auth::login($user);

        $event = $this->createEventOnly();

        $response = $this->get(route('events.orders.create', $event->id));

        $response->assertStatus(200);
    }
}
