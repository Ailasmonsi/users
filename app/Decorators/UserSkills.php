<?php

namespace App\Decorators;

class UserSkills implements SkillDecorator
{
    public function getSkills(): string
    {
        return "Basic Skills";
    }
}
