<?php

declare(strict_types = 1);

namespace Impish\Core\Fields;

/**
 * A field with a set value.
 */
class SetField implements FieldInterface
{
    /**
     * Creates a new field from the given value.
     *
     * @param mixed $value The field value.
     */
    public function __construct(protected mixed $value) {}

    public function getValue(array $entry): mixed
    {
        return $this->value;
    }
}
