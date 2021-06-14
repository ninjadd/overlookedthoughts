<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Forum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::all()->pluck('id');
        $title = $this->faker->words('2', true);
        $slug = Str::slug($title);

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'title' => $title,
            'slug' => $slug.'-'.random_int(100000, 999999),
            'description' => $this->faker->paragraph(7)
        ];
    }
}
