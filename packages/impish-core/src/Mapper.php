<?php

declare(strict_types = 1);

namespace Impish\Core;

use Impish\Core\Fields\FieldInterface;

/**
 * A data mapper.
 */
class Mapper
{
    /**
     * Creates a new data mapper from the given fields.
     *
     * @param FieldInterface[] $fields The mapped fields.
     */
    public function __construct(protected array $fields) {}

    /**
     * Returns the mapped field values from the given entry in the source data.
     *
     * @param array $entry The entry in the source data.
     *
     * @return array The mapped field values.
     */
    public function getFieldValues(array $entry): array
    {
        return $this->getValues($this->fields, $entry);
    }

    /**
     * Returns the mapped values from the given fields and entry in the source data.
     *
     * @param FieldInterface[] $fields The mapped fields.
     * @param array            $entry  The entry in the source data.
     *
     * @return array The mapped field values.
     */
    protected function getValues(array $fields, array $entry): array
    {
        $values = [];

        foreach ($fields as $key => $field) {
            $values[$key] = $field->getValue($entry);
        }

        return $values;
    }
}
