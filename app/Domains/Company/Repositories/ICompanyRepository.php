<?php

namespace App\Domains\Company\Repositories;

use App\Models\Company;

interface ICompanyRepository {

    public function save(array $companyData): Company;
    public function getBySymbol(string $companySymbol): ?Company;
}