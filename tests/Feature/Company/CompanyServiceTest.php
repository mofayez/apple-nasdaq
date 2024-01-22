<?php
namespace Tests\Feature\Company;

use App\Application\CompanyService;
use App\Domains\Company\Repositories\ICompanyRepository;
use App\Domains\Company\Services\IStockService;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_company()
    {
        // Mock the dependencies
        $companyRepository = $this->createMock(ICompanyRepository::class);
        $stockService = $this->createMock(IStockService::class);

        // Set up expectations for the repository
        $companyData = [
            'name' => 'Apple',
            'symbol' => 'AAPL',
            // Add other necessary data
        ];
        $companyRepository->expects($this->once())
            ->method('save')
            ->with($companyData)
            ->willReturn(new Company($companyData));

        // Create the CompanyService instance with mocked dependencies
        $companyService = new CompanyService($companyRepository, $stockService);

        $company = $companyService->createCompany($companyData);

        // Assertions
        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals('Apple', $company->name);
        $this->assertEquals('AAPL', $company->symbol);
    }

    /** @test */
    public function it_can_get_company_details()
    {
        // Mock the dependencies
        $companyRepository = $this->createMock(ICompanyRepository::class);
        $stockService = $this->createMock(IStockService::class);

        // Set up expectations for the repository
        $companySymbol = 'AAPL';
        $companyData = [
            'name' => 'Apple',
            'symbol' => $companySymbol,
        ];
        $company = Company::create($companyData);
        $companyRepository->expects($this->once())
            ->method('getBySymbol')
            ->with($companySymbol)
            ->willReturn($company);

        // Set up expectations for the stock service
        $stockValue = [
            'results' => [ /* Stock value data */ ],
        ];
        $stockService->expects($this->once())
            ->method('getStockValue')
            ->with($companySymbol)
            ->willReturn($stockValue);

        // Create the CompanyService instance with mocked dependencies
        $companyService = new CompanyService($companyRepository, $stockService);

        // Call the method being tested
        $result = $companyService->getCompanyDetails($companySymbol);

        // Assertions
        $this->assertNotNull($result);
        $this->assertArrayHasKey('company', $result);
        $this->assertArrayHasKey('stock_value', $result);
        $this->assertInstanceOf(Company::class, $result['company']);
    }


    /** @test */
    public function it_handles_exception_while_getting_company_details()
    {
        // Mock the dependencies
        $companyRepository = $this->createMock(ICompanyRepository::class);
        $stockService = $this->createMock(IStockService::class);

        // Set up expectations for the repository
        $companySymbol = 'AAPL';
        $companyRepository->expects($this->once())
            ->method('getBySymbol')
            ->with($companySymbol)
            ->willReturn(null);

        // Set up expectations for the stock service
        $stockService->expects($this->once())
            ->method('getStockValue')
            ->with($companySymbol)
            ->willReturn(null);

        // Create the CompanyService instance with mocked dependencies
        $companyService = new CompanyService($companyRepository, $stockService);

        $result = $companyService->getCompanyDetails($companySymbol);

        $this->assertEquals($result, ['company' => null, 'stock_value' => null]);
    }
}
