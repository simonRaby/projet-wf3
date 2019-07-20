<?php

namespace App\Http\Controllers;

use App\Model\User;
use Hash;
use Illuminate\Http\Request;
use Json;
use Redirect;
use Validator;

//Controller de traitement d'ajout/modification/suppression de partenaire
class AdminAddMemberController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('adminAddMember.index');
    }

    /**
     * Register new member in database
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $values = $request->all();

        //Je défini le type de donnée que j'attends et son importance
        $rules = [
            'firstName' => 'string|required|max:30',
            'lastName' => 'string|required|max:30',
            'email' => 'email|required',
            'passwordMember' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ];

        // J'initialise les messages corresponds à chaque types d'erreurs identifiées
        $validator = Validator::make($values, $rules, [

            'firstName.string' => 'Le prénom comporte des caractères spéciaux.',
            'firstName.required' => 'Champs requis',
            'firstName.max' => 'Le prénom comporte plus de 30 caractères',
            'lastName.max' => 'Le nom comporte plus de 30 caractères',
            'lastName.string' => 'Le nom comporte de caractères spéciaux',
            'lastName.required' => 'Champs requis',
            'email.required' => 'Champs requis',
            'email.email' => 'Format de l\'email est invalide',
            'passwordMember.required' => 'Champs requis',
            'passwordMember.min' => 'Le mot de passe doit comporter au minimum 6 caractères',
            'passwordMember.regex' => 'Merci d\'inclure 1 masjucule, 1 minuscule et un caractère spécial',

        ]);
        // Je retourne un message  d'erreur ainsi que les valeurs
        // précédemment rentré en cas d'echec de la validation

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $member = new User();
        $member->lastname = $request['lastName'];
        $member->firstname = $request['firstName'];
        $member->email = $request['email'];
        $member->password = Hash::make($request['passwordMember']);
        $member->role_id = 2;
        $member->save();

        return Redirect::back()->with('successMessage', 'Membre ajouté avec succès');
    }


    //Création de la méthode update des membres

    /**
     * register data update in database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {

        $values = $request->all();
        $rules = [
            'firstName' => 'string|required|max:30',
            'lastName' => 'string|required|max:30',
            'email' => 'email|required|unique:users',
            'passwordMember' => 'string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ];
        $validator = Validator::make($values, $rules, [

            'firstName.string' => 'Le prénom comporte des caractères spéciaux.',
            'firstName.required' => 'Champs requis',
            'firstName.max' => 'Le prénom comporte plus de 30 caractères',
            'lastName.max' => 'Le nom comporte plus de 30 caractères',
            'lastName.string' => 'Le nom comporte de caractères spéciaux',
            'lastName.required' => 'Champs requis',
            'email.required' => 'Champs requis',
            'email.email' => 'Format de l\'email est invalide',
            'email.unique' => 'Email déjà existant.',
            'passwordMember.min' => 'Le mot de passe doit comporter au minimum 6 caractères',
            'passwordMember.regex' => 'Merci d\'inclure 1 masjucule, 1 minuscule et un caractère spécial',

        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $update = User::find($request->id);
        $update->lastname = $request['lastName'];
        $update->firstname = $request['firstName'];
        $update->email = $request ['email'];
        if (isset($request['passwordMember'])) {
            $update->password = Hash::make($request['passwordMember']);
        }
        $update->update();


        $members = User::all()->where('role_id', '=', '2')->where('delete_at', '=', NULL);

        return view('listMember.index')->with('successMessage', 'Les données ont été modifiées avec succès')->with('members', $members);


    }

    /**
     * returns the view with the pre-filled information saved in database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $edit = User::find($request->id);

        return view('adminAddMember.index')->with('edit', $edit);
    }

    /**
     * Ajax request for delete member
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxDeleteAdminMember(Request $request)
    {
        $deleteMember = $request['id'];

        $deleteRow = User::find($deleteMember);

        $deleteRow->delete_at = now();
        $deleteRow->update();

        return response()->json(array('success' => true, 'id' => $deleteMember));

    }

}
