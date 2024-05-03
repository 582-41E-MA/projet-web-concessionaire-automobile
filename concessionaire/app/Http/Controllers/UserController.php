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
use Illuminate\Support\Facades\Auth;

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

        if (isset(Auth::user()->privilege_id) && Auth::user()->privilege_id == 3) {
            $privileges = Privilege::all();
            // return $privileges;
            return view('user.signupByAdmin', ["provinces" => $provinces, "privileges" => $privileges]);
        } else {
        return view('user.signup', ["provinces" => $provinces]);
        }
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
            'telephone' => 'required|string',
            'telephone_portable' => 'string',
            'password' => 'min:6|max:20' 
        ]);

        $password = Hash::make($request->password);

        // if (!Auth::check() && $request->privilege_id == "") {
        //     $request->privilege_id = 1;
        // }

        if ($request->privilege_id == "") {
            $request->privilege_id = 1;
        }
        // return $request;
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
            'privilege_id' => $request->privilege_id
        ]);
        

        // return redirect()->route('accueil')->with('success', 'user created with success');

        // return $user->type;
        if(Auth::user()->privilege_id == 3){
            return redirect(route('admin'))->withSuccess(__('lang.controllers.user_created_success'));
        }else{
            return redirect(route('login'))->withSuccess(__('lang.controllers.user_created_success'));
        }
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
        $provinces = Province::all();
        $privileges = Privilege::all();
        $villes = Ville::all();
        // return $user;
        return view('user.edit', ['user' => $user, "provinces" => $provinces, "privileges" => $privileges, "villes" => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        // return $request;
        $request->validate([
            'name' => 'required|max:50',
            'prenom' => 'required|max:50',
            'email' => 'required|email',
            'anniversaire' => 'required|date',
            'adresse' => 'required|string',
            'code_postal' => 'required|string',
            'province' => 'numeric',
            'ville' => 'numeric',
            'telephone' => 'required|numeric',
            'telephone_portable' => 'numeric',
        ]);

        $user->update([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'anniversaire' => $request->anniversaire,
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'province_id' => $request->province,
            'ville_id' => $request->ville,
            'telephone' => $request->telephone,
            'telephone_portable' => $request->telephone_portable,
            'privilege_id' => $request->privilege_id,
        ]);

        return redirect()->route('accueil')->with('success', __('user updated with success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('accueil')->with('success', __('user deleted with success'));
    }
    public function forgot(){
        return view('user.forgot');
    }
}
