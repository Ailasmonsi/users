<?php

namespace App\Decorators;

class SkillDecorator
{
    protected $skills;

    public function __construct(array $skills)
    {
        $this->skills = $skills;
    }

    public function getDecoratedSkills()
    {
        return array_map(function ($skill) {
            $prefixes = ['Advanced', 'Intermediate', 'Basic'];
            $suffixes = ['Developer', 'Engineer', 'Expert'];
            return $prefixes[array_rand($prefixes)] . ' ' . $skill . ' ' . $suffixes[array_rand($suffixes)];
        }, $this->skills);
    }
}
