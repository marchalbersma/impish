<?php

declare(strict_types = 1);

namespace Impish\Core;

/**
 * An array wrapper with dot notation access.
 */
class Data
{
    /**
     * Creates a new wrapper around the given array.
     *
     * @param array $array The underlying array.
     */
    public function __construct(protected array $array = []) {}

    /**
     * Returns the underlying array.
     *
     * @return array The underlying array.
     */
    public function all(): array
    {
        return $this->array;
    }

    /**
     * Returns the value in the underlying array for the given key.
     *
     * @param int|string $key The key.
     *
     * @return mixed The value in the underlying array.
     */
    public function get(int|string $key): mixed
    {
        return $this->array[$key] ?? null;
    }

    /**
     * Checks if the given key exists in the underlying array.
     *
     * @param int|string $key The key.
     *
     * @return bool Whether the key exists in the underlying array.
     */
    public function has(int|string $key): bool
    {
        return array_key_exists($key, $this->array);
    }
}
