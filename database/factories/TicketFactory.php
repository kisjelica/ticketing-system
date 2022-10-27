<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word(),
            'ticket_id'=>$this->faker->asciify('**********'),
            'priority'=>$this->faker->randomElement($array = array ('Low','Medium','High')),
            'message'=>$this->faker->sentence(),
            'status'=>'Open',
            'user_id'=>User::factory(),
            'category_id'=>Category::factory()
        ];
    }
}
