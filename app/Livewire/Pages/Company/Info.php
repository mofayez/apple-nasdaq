<?php

namespace App\Livewire\Pages\Company;

use App\Application\CompanyService;
use Livewire\Component;

class Info extends Component
{

    public $company = null;
    public $stockValue = null;

    public function render(CompanyService $companyService)
    {

        $data = $companyService->getCompanyDetails(env('COMPANY_SYMBOL'));

        if ($data) {

            $this->company = $data['company'];
            $this->stockValue = $data['stock_value'];
        }

        // dd($this->company->symbol);

        return view('livewire.pages.company.info');
    }

    
}
