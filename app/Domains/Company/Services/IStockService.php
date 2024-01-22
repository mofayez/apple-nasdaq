<?php
namespace App\Domains\Company\Services;

use Psr\Http\Message\ResponseInterface;

interface IStockService {
    public function getStockValue($symbol): ?array;
}