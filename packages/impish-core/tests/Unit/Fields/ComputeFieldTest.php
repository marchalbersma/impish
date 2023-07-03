<?php

declare(strict_types = 1);

use Impish\Core\Fields\ComputeField;

it('can compute value', function (Closure $closure, mixed $value) {
    $entry = [
        'title'      => 'Paranoid',
        'performers' => ['Ozzy Osbourne', 'Tony Iommi', 'Geezer Butler', 'Bill Ward'],
        'tracks'     => [
            ['length' => 477, 'title' => 'War Pigs'],
            ['length' => 168, 'title' => 'Paranoid'],
            ['length' => 272, 'title' => 'Planet Caravan'],
            ['length' => 356, 'title' => 'Iron Man'],
            ['length' => 293, 'title' => 'Electric Funeral'],
            ['length' => 428, 'title' => 'Hand of Doom'],
            ['length' => 150, 'title' => 'Rat Salad'],
            ['length' => 375, 'title' => 'Fairies Wear Boots'],
        ],
    ];

    $field = new ComputeField($closure);

    expect($field->getValue($entry))->toBe($value);
})->with([
    'append' => [fn (array $entry) => "{$entry['title']} (Album)", 'Paranoid (Album)'],
    'count'  => [fn (array $entry) => count($entry['performers']), 4],
    'sum'    => [fn (array $entry) => array_sum(array_column($entry['tracks'], 'length')), 2519],
]);
