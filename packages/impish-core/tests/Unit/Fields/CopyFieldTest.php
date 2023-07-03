<?php

declare(strict_types = 1);

use Impish\Core\Fields\CopyField;

it('can copy value', function (string $key, mixed $value) {
    $entry = [
        'title'      => 'The Number of the Beast',
        'performers' => ['Bruce Dickinson', 'Dave Murray', 'Adrian Smith', 'Steve Harris', 'Clive Burr'],
        'tracks'     => [
            ['length' => 200, 'title' => 'Invaders'],
            ['length' => 274, 'title' => 'Children of the Damned'],
            ['length' => 334, 'title' => 'The Prisoner'],
            ['length' => 394, 'title' => '22 Acacia Avenue'],
            ['length' => 265, 'title' => 'The Number of the Beast'],
            ['length' => 230, 'title' => 'Run to the Hills'],
            ['length' => 226, 'title' => 'Gangland'],
            ['length' => 428, 'title' => 'Hallowed Be Thy Name'],
        ],
    ];

    $field = new CopyField($key);

    expect($field->getValue($entry))->toBe($value);
})->with([
    'field'                       => ['title', 'The Number of the Beast'],
    'nested field'                => ['performers.0', 'Bruce Dickinson'],
    'deeply nested field'         => ['tracks.4.length', 265],
    'missing field'               => ['artist', null],
    'missing nested field'        => ['tracks.8', null],
    'missing deeply nested field' => ['tracks.7.number', null],
]);
