<?php

namespace App\Decorators\Skills;

use App\Decorators\SkillDecoratorBase;

class GolangDeveloperDecorator extends SkillDecoratorBase
{
    public function getSkills(): string
    {
        return parent::getSkills() . ', Golang Developer';
    }
}
