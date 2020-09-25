<?php

namespace Database\Factories;

use App\Models\Seen;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
              return User::inRandomOrder()->first()->id;
          },
          'seenable_id' => function () {
            return Project::inRandomOrder()->first()->id;
        },
        'seenable_type' =>'App\Models\Project',
            "counter" =>$this->faker->numberBetween(1,19)
        ];
    }
}
