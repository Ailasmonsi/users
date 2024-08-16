<?php

namespace App\Decorators\Skills;

use App\Decorators\SkillDecoratorBase;

class JavaScriptDeveloperDecorator extends SkillDecoratorBase
{
    public function getSkills(): string
    {
        return parent::getSkills() . ', JavaScript Developer';
    }
}
