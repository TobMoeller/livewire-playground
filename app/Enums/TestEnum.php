<?php

namespace App\Enums;

enum TestEnum: string
{
    case TEST_1 = 'test 1';
    case TEST_2 = 'test 2';

    public function label(): string
    {
        return match($this) {
            self::TEST_1 => __('Test 1'),
            self::TEST_2 => __('Test 2'),
        };
    }
}
