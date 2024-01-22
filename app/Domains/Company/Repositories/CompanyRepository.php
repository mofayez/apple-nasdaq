<?php 

namespace App\Domains\Company\Repositories;

use App\Models\Company;

class CompanyRepository implements ICompanyRepository {

    public function save(array $companyData): Company {
        return Company::create($companyData);
    }

    public function getBySymbol(string $companySymbol): ?Company
    {
        return Company::where('Symbol', $companySymbol)->first([
            'id', 'name', 'description', 'address', 'symbol', 'industry'
        ]);
        
    }
}