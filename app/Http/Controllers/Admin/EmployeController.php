<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmploye;
use App\Model\Employe;
use App\Model\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = StoreImage::find(2);

        return view('admin.employes.index', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmploye $request)
    {
        // Si je veux récupérer tous les champs d'un formulaire
        $values = $request->validated();
//        dd($values);
        // Mécanique pour vérifier le type d'image + le stockage vers storage et l'insert du nom en base
        // On stock l'image
        $image = $request->file('image');
        // On crée un répertoire "images" si celui-ci n'est pas créé
        $folder = 'public/images/';
        // Je crée le repertoire
        Storage::makeDirectory($folder);
        $imageName = uniqid().'.'.$image->extension();
        $image->storeAs($folder, $imageName);

        //Autre dossier privé
        $privateFolder = 'prive/images/';
        Storage::makeDirectory($privateFolder);
        // Je copie l'image déjà présente dans public vers privé
        Storage::copy($folder.$imageName, $privateFolder.$imageName);

        // Sauvegarde en base de donnée de l'image
        $newImage = new StoreImage();
        $newImage->name = $imageName;
        $newImage->save();

        return redirect('admin/employes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }
}
