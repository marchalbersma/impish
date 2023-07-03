<?php

declare(strict_types = 1);

namespace Impish\Core\Fields;

use Closure;

/**
 * A field with a computed value.
 */
class ComputeField implements FieldInterface
{
    /**
     * Creates a new field from the given closure which computes the field value.
     *
     * @param Closure $closure The closure which computes the field value.
     */
    public function __construct(protected Closure $closure) {}

    public function getValue(array $entry): mixed
    {
        return $this->closure->call($this, $entry);
    }
}
