<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OwnerServices;
use App\Http\Requests\OwnerRequest;

class OwnerController extends Controller
{
    public function __construct(protected OwnerServices $ownerServices){}

    public function index()
    {
        return view('pages.owner.index');
    }

    public function tabulator(Request $request)
    {
        $result = $this->ownerServices->doGetTabulator($request);

        return $result->data;
    }

    public function getByid(int $id)
    {
        $result = $this->ownerServices->doGetOwnerById($id);

        return $result->data;
    }

    public function addOwner(OwnerRequest $request)
    {
        $result = $this->ownerServices->doAddOwner($request);

        if ($result->code == 200){
            return redirect()->route('owner.index')->with('success-message', $result->message);
        }
        return redirect()->route('owner.index')->with('error-message', $result->message);
    }

    public function updateOwner(int $id, OwnerRequest $request)
    {
        $result = $this->ownerServices->doUpdateOwner($id, $request);

        if ($result->code == 200){
            return redirect()->route('owner.index')->with('success-message', $result->message);
        }
        return redirect()->route('owner.index')->with('error-message', $result->message);
    }

    public function deleteOwner(int $id)
    {
        $result = $this->ownerServices->doDeleteOwner($id);

        if ($result->code == 200){
            return redirect()->route('owner.index')->with('success-message', $result->message);
        }
        return redirect()->route('owner.index')->with('error-message', $result->message);
    }
}
