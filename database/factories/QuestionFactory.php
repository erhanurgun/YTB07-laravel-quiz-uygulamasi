<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quiz_id' => rand(1, 10),
            'question' => $this->faker->sentence(rand(7,21)),
            'answer1' => $this->faker->sentence(rand(1, 3)),
            'answer2' => $this->faker->sentence(rand(1, 3)),
            'answer3' => $this->faker->sentence(rand(1, 3)),
            'answer4' => $this->faker->sentence(rand(1, 3)),
            'correct_answer' => 'answer' . rand(1, 4)
        ];
    }
}
