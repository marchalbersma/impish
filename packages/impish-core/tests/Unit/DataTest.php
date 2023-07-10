<?php

declare(strict_types = 1);

use Impish\Core\Data;

it('can be created empty', function () {
    $data = new Data();

    expect($data->all())->toBe([]);
});

it('can be created from array', function (array $array) {
    $data = new Data($array);

    expect($data->all())->toBe($array);
})->with([
    'indexed'     => [['The Fellowship of the Ring', 'The Two Towers', 'The Return of the King']],
    'associative' => [['series' => 'The Lord of the Rings', 'director' => 'Peter Jackson']],
]);
