<?php

namespace App\Decorators;

class SkillDecoratorBase implements SkillDecorator
{
    protected $decorator;

    public function __construct(SkillDecorator $decorator)
    {
        $this->decorator = $decorator;
    }

    public function getSkills(): string
    {
        return $this->decorator->getSkills();
    }
}
