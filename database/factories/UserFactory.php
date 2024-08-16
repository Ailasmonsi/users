<?php

namespace Database\Factories;

use App\Decorators\Skills\GolangDeveloperDecorator;
use App\Decorators\Skills\JavaDeveloperDecorator;
use App\Decorators\Skills\JavaScriptDeveloperDecorator;
use App\Decorators\Skills\PHPDeveloperDecorator;
use App\Decorators\UserSkills;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        $skills = new UserSkills();

        $availableDecorators = [
            PHPDeveloperDecorator::class,
            JavaScriptDeveloperDecorator::class,
            GolangDeveloperDecorator::class,
            JavaDeveloperDecorator::class,
        ];

        shuffle($availableDecorators);
        $decoratorsToApply = array_slice($availableDecorators, 0, rand(1, count($availableDecorators)));

        foreach ($decoratorsToApply as $decorator) {
            $skills = new $decorator($skills);
        }

        $description = $skills->getSkills();

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'description' => $description,
        ];
    }
}
