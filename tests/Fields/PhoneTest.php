<?php

use PHPUnit\Framework\TestCase;
use Vespera\Fieldtize\Fields\Phone;

class PhoneTest extends TestCase
{
    /** @test */
    public function original_method_must_return_the_original_value()
    {
        $this->assertEquals('16981234567', Phone::make('16981234567')->original());
        $this->assertEquals('abc', Phone::make('abc')->original());
        $this->assertEquals('123', Phone::make('123')->original());
        $this->assertEquals(123, Phone::make('123')->original());
    }

    /**
     * @test
     * @dataProvider valid_phone_numbers
     */
    public function get_method_must_return_a_formatted_phone_number($number, $getValue)
    {
        $this->assertEquals($getValue, Phone::make($number)->get());
    }

    /**
     * @test
     * @dataProvider invalid_phone_numbers
     */
    public function get_method_must_return_null_for_invalid_phone_numbers($number)
    {
        $this->assertNull(Phone::make($number)->get());
    }

    /**
     * @test
     * @dataProvider valid_phone_numbers
     */
    public function raw_method_must_return_an_e164_phone_number($number, $getValue, $rawValue)
    {
        $this->assertEquals($rawValue, Phone::make($number)->raw());
    }

    /**
     * @test
     * @dataProvider valid_phone_numbers
     */
    public function is_valid_method_must_return_true_for_valid_phone_numbers($number)
    {
        $this->assertTrue(Phone::make($number)->isValid());
    }

    /**
     * @test
     * @dataProvider invalid_phone_numbers
     */
    public function is_valid_method_must_return_false_for_invalid_phone_numbers($number)
    {
        $this->assertFalse(Phone::make($number)->isValid());
    }

    /**
     * @test
     * @dataProvider valid_phone_numbers
     */
    public function printing_object_must_return_a_formatted_phone_number($number, $getValue)
    {
        $this->assertEquals($getValue, Phone::make($number)->__toString());
    }

    /**
     * @test
     * @dataProvider invalid_phone_numbers
     */
    public function printing_object_must_return_a_empty_string_for_invalid_numbers($number)
    {
        $this->assertEmpty(Phone::make($number)->__toString());
    }

    public function valid_phone_numbers()
    {
        return [
            ['11988884444',      '(11) 98888-4444', '+5511988884444'],
            ['5511988884444',    '(11) 98888-4444', '+5511988884444'],
            ['+5511988884444',   '(11) 98888-4444', '+5511988884444'],
            ['(11) 98888-4444',  '(11) 98888-4444', '+5511988884444'],
            ['(011) 98888-4444', '(11) 98888-4444', '+5511988884444'],
            ['+551144443333',    '(11) 4444-3333',  '+551144443333'],
            ['1144443333',       '(11) 4444-3333',  '+551144443333'],
        ];
    }

    public function invalid_phone_numbers()
    {
        return [
            ['abc'],
            ['123'],
            ['44441111'],
            ['email@domain.com'],
        ];
    }
}
