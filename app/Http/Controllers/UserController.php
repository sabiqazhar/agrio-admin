<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserServices $userServices){}

    public function index()
    {
        return view('pages.admin.index');
    }

    public function getById(int $id)
    {
        $result = $this->userServices->doGetUserById(id: $id);

        return $result->data;
    }

    public function tabulator(Request $request)
    {
        $result = $this->userServices->doGetTabulator($request);

        return $result->data;
    }

    public function addUser(UserRequest $request)
    {
        $result = $this->userServices->doAddUser($request);

        if ($result->code == 200){
            return redirect()->route('admin.index')->with('success-message', $result->message);
        }
        return redirect()->route('admin.index')->with('error-message', $result->message);
    }

    public function updateUser(int $id, Request $request)
    {
        $result = $this->userServices->doUpdateUser($id, $request);

        if ($result->code == 200){
            return redirect()->route('admin.index')->with('success-message', $result->message);
        }
        return redirect()->route('admin.index')->with('error-message', $result->message);
    }

    public function updatePassword(int $id, Request $request)
    {
        $result = $this->userServices->doUpdatePassword($id, $request);

        if ($result->code == 200){
            return redirect()->route('admin.index')->with('success-message', $result->message);
        }
        return redirect()->route('admin.index')->with('error-message', $result->message);
    }

    public function deleteUser(int $id)
    {
        $result = $this->userServices->doDeleteUser(id: $id);

        if ($result->code == 200){
            return redirect()->route('admin.index')->with('success-message', $result->message);
        }
        return redirect()->route('admin.index')->with('error-message', $result->message);
    }
}
