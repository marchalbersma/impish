<?php

declare(strict_types = 1);

use Impish\Core\Fields\ComputeField;
use Impish\Core\Fields\CopyField;
use Impish\Core\Fields\SetField;
use Impish\Core\Mapper;

it('can map fields', function (array $entry, array $values) {
    $mapper = new Mapper([
        'type'        => new SetField('Movie'),
        'title'       => new CopyField('title'),
        'directed_by' => new ComputeField(fn (array $entry) => implode(' & ', $entry['directors'])),
    ]);

    expect($mapper->getFieldValues($entry))->toBe($values);
})->with([
    'No Country for Old Men' => [
        [
            'title'     => 'No Country for Old Men',
            'directors' => ['Ethan Coen', 'Joel Coen'],
        ],
        [
            'type'        => 'Movie',
            'title'       => 'No Country for Old Men',
            'directed_by' => 'Ethan Coen & Joel Coen',
        ],
    ],
    'The Dark Knight'        => [
        [
            'title'     => 'The Dark Knight',
            'directors' => ['Christopher Nolan'],
        ],
        [
            'type'        => 'Movie',
            'title'       => 'The Dark Knight',
            'directed_by' => 'Christopher Nolan',
        ],
    ],
]);
