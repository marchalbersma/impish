<?php

declare(strict_types = 1);

use Impish\Core\Data;

it('can be created empty', function () {
    $data = new Data();

    expect($data->all())->toBe([]);
    expect($data->get(0))->toBe(null);
    expect($data->get('key'))->toBe(null);
});

it('can be created from indexed array', function () {
    $data = new Data(['The Fellowship of the Ring', 'The Two Towers', 'The Return of the King']);

    expect($data->all())->toBe(['The Fellowship of the Ring', 'The Two Towers', 'The Return of the King']);
    expect($data->get(0))->toBe('The Fellowship of the Ring');
    expect($data->get(1))->toBe('The Two Towers');
    expect($data->get(2))->toBe('The Return of the King');
    expect($data->get(3))->toBe(null);
});

it('can be created from associative array', function () {
    $data = new Data(['series' => 'The Lord of the Rings', 'director' => 'Peter Jackson']);

    expect($data->all())->toBe(['series' => 'The Lord of the Rings', 'director' => 'Peter Jackson']);
    expect($data->get('series'))->toBe('The Lord of the Rings');
    expect($data->get('director'))->toBe('Peter Jackson');
    expect($data->get('writers'))->toBe(null);
});
