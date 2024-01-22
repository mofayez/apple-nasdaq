<?php

namespace App\Application;

use Exception;
use App\Models\Company;
use App\Domains\Company\Services\IStockService;
use App\Domains\Company\Repositories\ICompanyRepository;

class CompanyService {


    public function __construct(private ICompanyRepository $companyRepository, private IStockService $stockService) { }


    function createCompany(array $companyData): Company {
        
        return $this->companyRepository->save($companyData);
    }


    public function getCompanyDetails(string $companySymbol): ?array {

        $company = $this->companyRepository->getBySymbol($companySymbol);
        $stock_value = $this->stockService->getStockValue($companySymbol);

        return compact('company', 'stock_value');
    }

}