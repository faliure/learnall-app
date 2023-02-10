<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

/******************************************************************************
 *** Miscellaneous Tools ******************************************************
 *****************************************************************************/

/**
 * Get the currently authenticated user, with proper type hint.
 */
function currentUser(): (Authenticatable & Arrayable) | null
{
    return auth()->user();
}

/**
 * Syntactic sugar for currentUser().
 */
function me(): (Authenticatable & Arrayable) | null
{
    return currentUser();
}

/**
 * Get a property of the currently authenticated user.
 */
function my(string $property): mixed
{
    return currentUser()->$property ?? null;
}

/**
 * TODO : remove and replace callers once Roles are implemented.
 */
function isAdmin(): bool
{
    return my('id') === 1;
}

/**
 * Get an instance of the identity function.
 */
function identity(): Closure
{
    return fn ($x) => $x;
}

/******************************************************************************
 *** String Tools *************************************************************
 *****************************************************************************/

/**
 * Convert a list into a natural-language list (e.g. '1, 2 and 3').
 *
 * @param array $items         The items to concatenate
 * @param string $conjunction  The conjunction word to use (defaults to "and")
 */
function concatenate(array $items, string $conjunction = ' and '): string
{
    return Arr::join($items, ', ', $conjunction);
}

/**
 * Concatenate items into a string list, as a conjunction (AND).
 */
function conjunction(array $items): string
{
    return concatenate($items, ' and ');
}

/**
 * Concatenate items into a string list, as a disjunction (OR).
 */
function disjunction(array $items): string
{
    return concatenate($items, ' or ');
}

/******************************************************************************
 *** Object/Class Tools *******************************************************
 *****************************************************************************/

/**
 * Whether a class or an object implements a given interface.
 *
 * @param object|string $class      Class name (fully-qualified) or object
 * @param string        $interface  Fully-qualified interface name
 *
 * @return bool
 * @throws InvalidArgumentException  If an invalid class name is passed
 */
function implementsInterface(object|string $class, string $interface): bool
{
    if (is_string($class) && ! class_exists($class)) {
        throw new InvalidArgumentException("Class $class not found");
    }

    return in_array($interface, class_implements($class));
}

/******************************************************************************
 *** Enum Tools ***************************************************************
 *****************************************************************************/

/**
 * Pick a random value from a native Enum.
 *
 * @param string $enumClass  FQN of an enum class
 *
 * @return UnitEnum|null  A random Enum item (null if the Enum is empty)
 * @throws InvalidArgumentException  If the Enum class is invalid
 */
function randEnumValue(string $enumClass): ?UnitEnum
{
    if (! enum_exists($enumClass)) {
        throw new InvalidArgumentException("$enumClass is not a valid Enum class name");
    }

    $values = $enumClass::cases();

    return $values ? $values[array_rand($values)] : null;
}
