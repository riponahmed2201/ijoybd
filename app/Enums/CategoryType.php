<?php

namespace App\Enums;

// PHP Enum
enum CategoryType: string
{
    case MEN = 'men';
    case WOMEN = 'women';

    // Returns the human-readable label for each case
    public function label(): string
    {
        return match ($this) {
            self::MEN => 'Men',
            self::WOMEN => 'Women',
        };
    }

    // Returns all cases with their values and labels
    public static function options(): array
    {
        return array_map(
            fn($case) => ['value' => $case->value, 'label' => $case->label()],
            self::cases()
        );
    }
}
