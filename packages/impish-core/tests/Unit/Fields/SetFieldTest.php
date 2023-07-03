<?php

declare(strict_types = 1);

use Impish\Core\Fields\SetField;

it('can set value', function (mixed $value) {
    $field = new SetField($value);

    expect($field->getValue([]))->toBe($value);
})->with([
    'string' => ['Master of Puppets'],
    'array'  => [['James Hetfield', 'Lars Ulrich', 'Cliff Burton', 'Kirk Hammett', 'Jason Newsted']],
    'bool'   => [true],
    'int'    => [1986],
]);
