<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\Province;
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
        $provinceId = $request->input('province_id');
        $villes = Ville::where('province_id', $provinceId)->get();
        return response()->json($villes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'name' => 'required|max:50',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'min:6|max:20', 
        //     'adresse' => 'required|string',
        //     'telephone' => 'required|string',
        //     'date_de_naissance' => 'required|date'   
        // ]);

        // $user = new User;
        // $user->fill($request->all());
        // $user->password = Hash::make($request->password);
        // return $user;    
        // $user->save();
        // Pour changer la valeur de Etudiant selon le type de "type" choisi, on peut creer une variable et y mettre a valeur de type,ex: $type = $request->type.
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'anniversaire' => $request->anniversaire,
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'province_id' => $request->province_id,
            'ville_id' => 2,
            'email' => $request->email,
            'privilege_id' => 1,
            'password' => Hash::make($request->password)
        ]);
        // return $user;
        // if($user->type == "etudiant"){
            return redirect(route('login'))->withSuccess('Utilisateur enregistré comme client');
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
