<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Validator;

class ContactController extends Controller
{
    public $select = [
        'Demande de renseignement concernant l\'association',
        'Devenir partenaire de l\'association',
        'Un probleme avec l\'un de nos article',
        'Envie de devenir bénévole'
    ];

    public function index()
    {
        return view('contact.index')->with('sujet', $this->select);
    }
    /**
     * Fonction de recuperation des donnée de contact et d'envoie de mail
     *
     * return view
     */
    public function store(Request $request)
    {

        $values = $request->all();
        // Regle des champs du formulaire de contact
        $rules = [
            'email' => 'email|required',
            'prenom' => 'string|required',
            'nom' => 'string|required',
            'message' => 'string|required',
            'sujet' => 'required'
        ];
        // Message correspoand au regle
        $validator = Validator::make($values, $rules, [
            'email.email' => 'Votre e-mail est invalide',
            'email.required' => 'Votre e-mail est obligatoire',
            'nom.string' => 'Votre nom ne doit pas comporter de caractère spécial',
            'nom.required' => 'Votre nom est obligatoire',
            'prenom.string' => 'Votre prénom ne doit pas comporter de caractère spécial',
            'prenom.required' => 'Votre prénom est obligatoire',
            'message.string' => 'Votre message ne doit pas comporter de caractère spécial',
            'message.required' => 'Votre message est obligatoire',
            'sujet.required' => 'Votre sujet est obligatoire',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('sujet', $this->select)
                ->withErrors($validator)
                ->withInput();
        }
        //parametrage et envoie du mail
        $title = $this->select[$values['sujet']];
        $content = $values['prenom'] . '-' . $values['nom'] . '<br>' . $values['message'];
        Mail::to('contact@eos.com')->send(new Contact($title, $content, $values['email'], $values['nom']));

        session()->flash('successMessage',  'Message envoyé');

        return  view('contact.index')->with('sujet', $this->select);
    }
}
