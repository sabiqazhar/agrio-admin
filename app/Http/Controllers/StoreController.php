<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Services\StoreServices;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(protected StoreServices $storeService){}

    public function tabulator(Request $request)
    {
        $result = $this->storeService->getTabulator($request);

        return $result->data;
    }

    public function addStore(StoreRequest $request){
        $result = $this->storeService->doAddStore($request);

        if ($result->code == 200){
            return redirect()->route('store.list')->with('success-message', $result->message);
        }
        return redirect()->route('store.list')->with('error-message', $result->message);
    }

    public function updateStore($id, StoreRequest $request){
        $result = $this->storeService->doUpdateStore($id, $request);

        if ($result->code == 200){
            return redirect()->route('store.list')->with('success-message', $result->message);
        }
        return redirect()->route('store.list')->with('error-message', $result->message);
    }

    public function deleteStore($id){
        $result = $this->storeService->doDeleteStore($id);


        if ($result->code == 200){
            return redirect()->route('store.list')->with('success-message', $result->message);
        }
        return redirect()->route('store.list')->with('error-message', $result->message);
    }

    public function list()
    {
        $data = $this->storeService->doGetOwner();
        return view('pages.store.index', $data);
    }

    public function getById($id)
    {
        $result = $this->storeService->doGetStoreById($id);

        return $result->data;
    }
}
