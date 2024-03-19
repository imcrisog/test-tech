<?php

namespace Database\Factories;

use App\Models\Event;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'test',
            'description' => 'test',
            'total_tickets' => 20,
            'date' => new DateTime(),
        ];
    }
}
