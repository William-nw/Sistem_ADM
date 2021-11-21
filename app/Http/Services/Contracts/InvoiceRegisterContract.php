<?php

namespace App\Http\Services\Contracts;

interface InvoiceRegisterContract
{
    public function registerStudent(object $request): void;

    public function administrationConstruction(object $request): void;

    public function optionalAdministration(object $request): void;

}
