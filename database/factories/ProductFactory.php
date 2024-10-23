<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word, // Tạo tên sản phẩm ngẫu nhiên
            'price' => $this->faker->randomFloat(2, 10000, 100000), // Tạo giá sản phẩm ngẫu nhiên từ 10000 đến 100000
            'description' => $this->faker->sentence, // Tạo mô tả ngẫu nhiên
        ];
    }
}
