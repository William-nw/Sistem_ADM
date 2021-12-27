<?php

namespace App\Http\Services;


use App\Http\Services\Contracts\AdministrationContracts;

class ReportAdministrationService implements AdministrationContracts
{

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function ConstructionAdministrationStudent()
    {
        return $this->user_service->dataParentWithConstruction();
    }

    public function BooksAdministrationStudent()
    {
        return $this->user_service->dataParentWithBooksAdministration();
    }

    public function ClothesAdministrationStudent()
    {
        return $this->user_service->dataParentWithClothesAdministration();
    }

    public function ConsumptionAdministrationStudent()
    {
        return $this->user_service->dataParentWithConsumptionAdministration();
    }
}
