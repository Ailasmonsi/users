<?php

namespace App\Decorators\Skills;

use App\Decorators\SkillDecoratorBase;

class JavaDeveloperDecorator extends SkillDecoratorBase
{
    public function getSkills(): string
    {
        return parent::getSkills() . ', Java Developer';
    }
}
