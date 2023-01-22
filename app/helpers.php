<?php

function randEnumValue(string $enumClass): ?UnitEnum
{
    if (! enum_exists($enumClass)) {
        throw new InvalidArgumentException("$enumClass is not a valid Enum class name");
    }

    $values = $enumClass::cases();

    return $values ? $values[array_rand($values)] : null;
}