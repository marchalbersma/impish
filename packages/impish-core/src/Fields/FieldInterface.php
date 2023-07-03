<?php

declare(strict_types = 1);

namespace Impish\Core\Fields;

/**
 * A field with a value.
 */
interface FieldInterface
{
    /**
     * Returns the field value from the given entry in the source data.
     *
     * @param array $entry The entry in the source data.
     *
     * @return mixed The field value.
     */
    public function getValue(array $entry): mixed;
}
