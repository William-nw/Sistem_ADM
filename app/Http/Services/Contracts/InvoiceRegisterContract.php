<?php

namespace App\Http\Services\Contracts;

interface InvoiceRegisterContract
{

    public function administrationConstruction(object $request): void;

    public function optionalAdministration(object $request): void;

}
