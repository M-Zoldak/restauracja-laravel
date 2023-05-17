<?php

namespace App\Http\Controllers;

use App\Models\Waiter;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $waiters = Waiter::all();
        return view('waiters.index',['waiters'=>$waiters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('waiters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($this->isLoginFree($request->input("login")))
        {
            $waiter = new Waiter();
            $waiter->firstname = $request->input("firstname");
            $waiter->lastname = $request->input("lastname");
            $waiter->email = $request->input("email");
            $waiter->login = $request->input("login");
            $waiter->password = password_hash($request->input("password"), PASSWORD_DEFAULT);
            $waiter->save();
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Waiter $waiter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Waiter $waiter)
    {
        return view('waiters.edit', ['waiter'=>$waiter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Waiter $waiter)
    {
        if($request->input("password"))
        {
            $waiter->password = password_hash($request->input("password"), PASSWORD_DEFAULT);
        }

        $login = $request->input("login");
        if($this->isLoginFree($login) || $login == $waiter->login)
        {
            $waiter->firstname = $request->input("firstname");
            $waiter->lastname = $request->input("lastname");
            $waiter->email = $request->input("email");
            $waiter->login = $request->input("login");
            $waiter->save();
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Waiter $waiter)
    {
        $waiter->delete();
        return $this->index();
    }

    private function isLoginFree($login)
    {
        if(Waiter::where('login', $login)->exists())
        {
            return false;
        }
        return true;
    }
}
