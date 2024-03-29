<?php

namespace Database\Factories\Shop;

use App\Models\Shop\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = OrderProduct::class;

    public function definition(): array
    {
        return [
            'qty' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->randomFloat(2, 100, 500),
        ];
    }
}
