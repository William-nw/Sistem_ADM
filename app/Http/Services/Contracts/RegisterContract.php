<?php

namespace App\Http\Services\Contracts;

interface RegisterContract
{
    public function registerStudent(object $request): void;

    public function registerParentWithStudent(object $request): void;

}
