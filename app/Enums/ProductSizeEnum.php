<?php

namespace App\Enums;

enum ProductSizeEnum: string
{
    case S = 'S';
    case M = 'M';
    case L = 'L';
    case XL = 'XL';
    case XXL = 'XXL';
    case XXXL = 'XXXL';

    // Returns the human-readable label for each case
    public function label(): string
    {
        return match ($this) {
            self::S => 'S',
            self::M => 'M',
            self::L => 'L',
            self::XL => 'XL',
            self::XXL => 'XXL',
            self::XXXL => 'XXXL',
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
