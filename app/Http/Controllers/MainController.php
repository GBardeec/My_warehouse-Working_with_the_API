<?php

namespace App\Http\Controllers;

use App\Services\WarehouseService;


class MainController extends Controller
{
    public function __construct(private readonly WarehouseService $warehouseService)
    {

    }

    public function __invoke()
    {
        $data = $this->warehouseService->getServices();
        session(['data' => $data]);
        return view('welcome')->with('data', $data);
    }

}
