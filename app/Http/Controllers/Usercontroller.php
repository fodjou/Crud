<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use OpenApi\Annotations as OA;




class Usercontroller extends ApiController
{
//    protected $user;
//
//    public function __construct(User $user)
//    {
//        $this->user =$user;
//    }


    /**
     * @OA\Get(
     *     path="/user",
     *     summary="Get list of users",
     *     tags={"User"},
     *     @OA\Response(response=200, description="Successful operation"),
     * )
     */
    public function liste_users()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.list', compact('etudiants'));
    }

    /**
    @OA\Get(
    path="/ajouter",
    summary="View create user form",
    tags={"User"},
    @OA\Response(response=200, description="User form displayed")
    )
     */
    public function ajouter_users()
    {
        return view('etudiant.ajouter');
    }




    /**
    @OA\Post(
    path="/ajouter/traitement",
    summary="Create a new user",
    tags={"User"},
    @OA\RequestBody(
    @OA\MediaType(
    mediaType="application/json",
    @OA\Schema(
    type="object",
    @OA\Property(property="nom", type="string"),
    @OA\Property(property="prenom", type="string"),
    @OA\Property(property="class", type="string"),
    )
    )
    ),
    @OA\Response(response=200, description="User created")
    )
     */
    public function ajouter_users_traitement(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'class' => 'required',
            ]);

            $etudiant = new Etudiant();
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->class = $request->class;
            $etudiant->save();

            return redirect('/user')->with('status', 'L\'étudiant a bien été enregistré.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * @OA\Get(
     *   path="/update/{id}",
     *   summary="Get user by id",
     *   tags={"User"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="User ID",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       @OA\Property(property="id", type="integer"),
     *       @OA\Property(property="nom", type="string"),
     *       @OA\Property(property="prenom", type="string"),
     *       @OA\Property(property="class", type="string")
     *     )
     *   )
     * )
     */
    public function update_users($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiant.update', compact('etudiant'));
    }


    /**
    @OA\Post(
    path="/update/traitement",
    summary="Update existing user",
    tags={"User"},
    @OA\Parameter(
    name="id",
    in="path",
    description="User ID",
    required=true,
    @OA\Schema(type="integer")
    ),
    @OA\RequestBody(
    required=true,
    @OA\MediaType(
    mediaType="application/x-www-form-urlencoded",
    @OA\Schema(
    required={"id","nom","prenom","class"},
    @OA\Property(property="id", type="integer"),
    @OA\Property(property="nom", type="string"),
    @OA\Property(property="prenom", type="string"),
    @OA\Property(property="class", type="string")
    )
    )
    ),
    @OA\Response(response=200, description="User updated")
    )
     */

    public function update_users_traitement(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'class' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->class = $request->class;
        $etudiant->save();

        return redirect('/user/')->with('status', 'L\'étudiant a bien été modifié.');
    }
    /**

    @OA\Get(
    path="/delete/{id}",
    summary="Delete user",
    tags={"User"},
    @OA\Parameter(
    name="id",
    in="path",
    description="User ID",
    required=true,
    @OA\Schema(type="integer")
    ),
    @OA\Response(response=200, description="User deleted")
    )
     */
    public function delete_users($id)
    {
        $etudiant = Etudiant::find($id);

        if ($etudiant) {
            $etudiant->delete();
            return redirect('/user')->with('status', 'L\'étudiant a bien été supprimé.');
        } else {
            return redirect('/user')->with('status', 'Impossible de trouver l\'étudiant à supprimer.');
        }
    }

}
