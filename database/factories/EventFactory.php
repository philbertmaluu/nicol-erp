<?php

namespace Database\Factories;

use App\Models\Event;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'eventDate' => $this->faker->date(),
            'startTime' => $this->faker->time()
        ];
    }
}
