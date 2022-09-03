<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(20),
            'content'=>$this->faker->text,
            'image'=>$this->faker->imageUrl(),
            'likes'=>1,
            'is_published'=>1,
            'category_id'=>Category::get()->random()->id
        ];
    }
}
