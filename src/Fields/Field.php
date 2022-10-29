<?php

namespace Vespera\Fieldtize\Fields;

abstract class Field
{
    protected string $original;
    protected ?string $value = null;
    protected ?string $raw = null;
    protected bool $isValid = false;

    public function original(): string
    {
        return $this->original;
    }

    public function get(): ?string
    {
        return $this->value;
    }

    public function raw(): ?string
    {
        return $this->raw;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function __toString()
    {
        return $this->get() ?? '';
    }
}
