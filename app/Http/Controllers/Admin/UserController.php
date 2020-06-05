<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        // Je vais faire comme d'habitude mes contrôles
        // Mon stockage puis le renvois de la data vers la vue

        $values     = $request->all();
        $rules      = [
            'email'     => 'email|required',
            'name'      => 'string|nullable',
            'password'  => 'string'
        ];
        $messages   = [
            'email.email'       => 'Vous avez rentré un mauvais e-mail.',
            'email.required'    => 'Vous devez rentré un e-mail.',
            'name.string'       => 'Le nom doit être une chaine de caractère.',
            'password.string'   => 'Le password doit être une chaine de caractère.',
        ];

        $validator = Validator::make($values, $rules, $messages);

        if($validator->fails()){
            // au lieu de retourner une session
            // on retourne avec un tableau
            // je passe le mesage erreur en début de tableau
            $json = $validator->errors()->all();
            array_unshift($json, 'Errors');

            return json_encode($json);
        }

        $user = new User();
        $user->name = $values['name'];
        $user->email = $values['email'];
        $user->password = Hash::make($values['password']);

        $user->save();

        $json = [
          // Je récupère l'id qui vient d'être entré
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        return $json;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
