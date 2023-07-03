<?php

declare(strict_types = 1);

namespace Impish\Core\Fields;

/**
 * A field with a copied value.
 */
class CopyField implements FieldInterface
{
    /**
     * Creates a new field from the given key in the source data.
     *
     * @param string $key The field key in the source data.
     */
    public function __construct(protected string $key) {}

    public function getValue(array $entry): mixed
    {
        if (str_contains($this->key, '.')) {
            return $this->getNestedValue($entry);
        } else {
            return $entry[$this->key] ?? null;
        }
    }

    /**
     * Returns the nested field value from the given entry in the source data.
     *
     * @param array $entry The entry in the source data.
     *
     * @return mixed The nested field value.
     */
    protected function getNestedValue(array $entry): mixed
    {
        $value = $entry;

        foreach (explode('.', $this->key) as $key) {
            if (!isset($value[$key])) {
                return null;
            }

            $value = $value[$key];
        }

        return $value;
    }
}
