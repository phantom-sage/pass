<?php

namespace Database\Factories;

use App\Models\PartnerRequest;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartnerRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PartnerRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
              "full_name"=>$this->faker->name,
              "organization"=>$this->faker->company,
              "organization_area"=>$this->faker->address,
              'email' => $this->faker->unique()->safeEmail,
              "proposal"=>$this->faker->paragraph(5),
              "partner_id"=> function () {
                return Partner::inRandomOrder()->first()->id;
            }
        ];
    }
}
