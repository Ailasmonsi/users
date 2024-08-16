<?php

namespace App\Decorators\Skills;

use App\Decorators\SkillDecoratorBase;

class PHPDeveloperDecorator extends SkillDecoratorBase
{
    public function getSkills(): string
    {
        return parent::getSkills() . ', PHP Developer';
    }
}
