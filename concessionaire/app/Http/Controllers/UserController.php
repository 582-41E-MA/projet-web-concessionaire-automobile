<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Province;
use App\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view('user.signup', ["provinces" => $provinces]);
    }
    

    public function getVilles(Request $request, $id)
    {
        $provinceId = $request->id;
        $villes = Ville::where('ville_province_id', $provinceId)->get();
        return response()->json($villes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'prenom' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'anniversaire' => 'required|date',
            'adresse' => 'required|string',
            'code_postal' => 'required|string',
            'province' => 'numeric',
            'ville' => 'numeric',
            'telephone' => 'required|numeric',
            'telephone_portable' => 'numeric',
            'password' => 'min:6|max:20' 
        ]);

        $password = Hash::make($request->password);

        // je crée privilege en premier pour pouvoir utiliser l'id du privilege dans user 
        $privilege = Privilege::create([
            'pri_role_en' => 'client',
            'pri_role_fr' => 'client'
        ]);
        $user_client = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $password,
            'anniversaire' => $request->anniversaire,
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'province_id' => $request->province,
            'ville_id' => $request->ville,
            'telephone' => $request->telephone,
            'telephone_portable' => $request->telephone_portable,
            'privilege_id' => $privilege->id,
        ]);
        
        // return $user->type;
        // if($user->type == "etudiant"){
            // return redirect(route('/'));
            // return redirect(route('user.login'))->withSuccess('Utilisateur enregistré comme etudiant');

        // }else{
            // return redirect(route('user.index'))->withSuccess('User created successfully!');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function forgot(){
        return view('user.forgot');
    }
}
