<?php

namespace App\Http\Services\Contracts;

interface DataParentContract
{
    public function dataParentWithStudent(): object;

    public function dataParentWithSPP(): object;

    public function dataParentWithConstruction(): object;
}
