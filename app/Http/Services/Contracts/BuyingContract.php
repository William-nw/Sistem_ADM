<?php

namespace App\Http\Services\Contracts;

interface BuyingContract
{

    public function buyClothes(object $request);

    public function buyBooks(object $request);

    public function buyConsumption(object $request);

}
