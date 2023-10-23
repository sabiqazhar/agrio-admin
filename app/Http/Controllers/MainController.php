<?php

namespace App\Http\Controllers;

use App\Services\OwnerServices;
use App\Services\StoreServices;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(
        protected StoreServices $storeServices,
        protected OwnerServices $ownerServices
        ){}
    public function dashboardMain(): View
    {
        $stores = $this->storeServices->doCountStore();
        $owners = $this->ownerServices->doOwnerCount();
        return view('pages.dashboard-overview-1', $stores, $owners);
    }
}
