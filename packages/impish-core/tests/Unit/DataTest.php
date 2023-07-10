<?php

declare(strict_types = 1);

use Impish\Core\Data;

it('can be created empty', function () {
    $data = new Data();

    expect($data->all())->toBe([]);
});
