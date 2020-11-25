<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.pages.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function updateJurisdiction(Request $request)
    {
        $user = User::find($request->id);
        $user->jurisdiction = $request->jurisdiction;
        $user->save();
    }

    public function destroy($id)
    {
        //
        User::find($id)->delete();

        return redirect()->route('users.index'); 
    }
}
