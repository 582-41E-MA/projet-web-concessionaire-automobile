<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        // return $user;

        return view('admin.index', ['users' => $users]);
    }
    /**
     * Display a listing of the resource.
     */
    public function client()
    {
        //
        $users = User::where('privilege_id', 1)->get();;

        // return $user;

        return view('admin.client', ['users' => $users]);
    }
    
    public function voiture()
    {
        //
        $voitures = Voiture::all();

        // return $voiture;

        return view('admin.voitures', ['voitures' => $voitures]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
