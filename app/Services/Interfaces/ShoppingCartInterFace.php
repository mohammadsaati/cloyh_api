<?php

namespace App\Services\Interfaces;

interface ShoppingCartInterFace
{
    public function store($request);

    public function update($request);

    public function fetch();
}
