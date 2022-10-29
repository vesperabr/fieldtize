<?php

namespace Vespera\Fieldtize\Fields;

use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class Phone extends Field
{
    public function __construct(string $value)
    {
        $this->original = $value;
        $this->process();
    }

    public static function make(string $value): self
    {
        return new self($value);
    }

    private function process(): void
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $phone = $phoneNumberUtil->parse($this->original, 'BR');

        $this->isValid = $phoneNumberUtil->isValidNumber($phone);

        if ($this->isValid) {
            $this->value = $phoneNumberUtil->format($phone, PhoneNumberFormat::NATIONAL);
            $this->raw = $phoneNumberUtil->format($phone, PhoneNumberFormat::E164);
            $this->type = $phoneNumberUtil->getNumberType($phone);
        }
    }
}
