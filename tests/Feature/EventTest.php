<?php

namespace Tests\Feature;

use App\Models\Enums\UserRole;
use App\Repositories\Local\OrderRepository as LocalOrderRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\WithEvents;
use Tests\WithUsers;

class EventTest extends TestCase
{
    use RefreshDatabase, WithEvents, WithUsers;

    public function test_that_create_page_are_correct_with_admin_role(): void
    {
        $user = $this->createUser(UserRole::ADMIN);
        Auth::login($user);

        $response = $this->get(route('events.create'));

        $response->assertStatus(200);
    }

    public function test_that_create_page_are_incorrect_without_admin_role(): void
    {
        $user = $this->createUser(UserRole::USER);
        Auth::login($user);

        $response = $this->get(route('events.create'));

        $response->assertRedirect('unauthorized');
    }

    public function test_that_false_when_events_max_tickets_are_passed(): void
    {
        $event = $this->createEventsAndOrders();
        
        $final = (new LocalOrderRepository)->attempt_create($event, $event->orders, 10);

        $this->assertFalse($final);
        $this->deleteEventAndOrders($event, $event->orders);

    }

    public function test_that_true_when_events_max_tickets_are_not_passed(): void
    {
        $event = $this->createEventsAndOrders(1, 45);

        $final = (new LocalOrderRepository)->attempt_create($event, $event->orders, 10);

        $this->assertTrue($final);
        $this->deleteEventAndOrders($event, $event->orders);

    }
}
