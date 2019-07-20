<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\Verify;
use App\Model\Partner;
use App\Model\PasswordReset;
use App\Model\User;
use App\Model\VilleFrance;
use Hash;
use Illuminate\Http\Request;
use Json;
use Mail;
use Redirect;
use Validator;

//Controller de traitement d'ajout/modification/suppression de partenaire
class AdminAddPartnerController extends Controller
{

    public function construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Display view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('adminAddPartner.index');
    }

    /**
     * Ajax request display only the same postal code as entered in
     * postal code input
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxPostalCode(Request $request)
    {
        $postalCode = $request->partnerpc;

        $select = VilleFrance::select('ville_nom_reel', 'ville_code_commune')->where('ville_code_postal', 'like', '%' . intval($postalCode) . '%')->get();

        if (isset($select)) {
            return response()->json(array('success' => true, 'ville' => $select));
        } else {
            return response()->json(array('success' => false));
        }

    }

    /**
     * Register a new partner to Eos database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $values = $request->all();
        $values['partnerSiret'] = str_replace(' ', '', $request['partnerSiret']);

        //On défini le type de donnée que j'accepte dans mes champs de saisi

        $rules = [
            'partnerName' => 'string|max:30|required',
            'partnerDirectorFstNme' => 'string|max:30|required',
            'partnerDirectorLstNme' => 'string|max:30|required',
            'partnerAddress' => 'string|max:60|required',
            'selectCity' => 'required|regex:/[0-9]{5}/',
            'partnerMail' => 'email|required',
            'partnerSiret' => 'required|regex:/[0-9]{14}/|unique:partners,siret',
            'partnerPhone' => ['required', 'regex:/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/'],
        ];
        //On enregistre un message d'erreur pour chaque type de contrôle
        $validator = Validator::make($values, $rules, [
            'partnerName.string' => 'La raison sociale comporte des caractères spéciaux.',
            'partnerName.required' => 'Champs requis.',
            'partnerName.max' => 'La raison sociale comporte plus 30 caractères.',
            'partnerDirectorFstNme.max' => 'Le prénom de la directrice(teur) comporte plus de 30 caractères.',
            'partnerDirectorFstNme.string' => 'Le prénom de la directrice(teur) comporte des caractères spéciaux.',
            'partnerDirectorFstNme.required' => 'Champs requis.',
            'partnerDirectorLstNme.max' => 'Le nom de la directrice(teur) comporte plus de 30 caractères.',
            'partnerDirectorLstNme.string' => 'Le nom de la directrice(teur) comporte des caractères spéciaux.',
            'partnerDirectorLstNme.required' => 'Champs requis.',
            'partnerMail.required' => 'Champs requis.',
            'partnerMail.email' => 'Format de l\'email est invalide.',
            'selectCity.required' => 'Veuillez sélectionner une ville.',
            'selectCity.regex' => 'Veuillez sélectionner une ville',
            'partnerSiret.required' => 'Champs requis.',
            'partnerSiret.regex' => '14 caractères numériques requis.',
            'partnerSiret.unique' => 'Ce numéro de SIRET est déjà existant.',
            'partnerPhone.required' => 'Champs requis',
            'partnerPhone.regex' => '10 caractères numériques requis.',
        ]);

        // On retourne un message d'erreur ainsi que les valeurs
        // précedemment rentré en cas d'echec de la validation

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = $values;

        //Une fois tous les champs de saisis contrôlé j'insére les données la bdd
        $partner = new Partner();
        $partner->name = $values['partnerName'];
        $partner->tel = $values['partnerPhone'];
        $partner->address = $values['partnerAddress'];
        $partner->ville_insee = $values['selectCity'];
        $partner->siret = $values['partnerSiret'];
        $partner->save();

        //On réalise la même opération pour les données relative à la table users
        $partnerUser = new User();
        $partnerUser->firstname = $values['partnerDirectorFstNme'];
        $partnerUser->email = $values['partnerMail'];
        $partnerUser->password = Hash::make('eos1234test');
        $partnerUser->role_id = 3;
        $partnerUser->lastname = $values['partnerDirectorLstNme'];

        //Afin de lier les données enregistré dans la table partners au responsable stocké dans la table users,
        //On récupère l'id du partenaire et l'enregistre dans la colonne de la clé étrangère prévu à cette effet
        $partnerUser->partner_id = $partner->id;
        $partnerUser->save();

        //Création d'un token pour permettre au nouveau partenaire après contrôle de créer son mot de passe
        $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($partnerUser);

        //On le token et l'email associé dans la table password_resets
        $resetPassword = new PasswordReset();
        $resetPassword->email = $user['partnerMail'];
        $resetPassword->token = $token;
        $resetPassword->created_at = now();
        $resetPassword->save();


        $title = 'Mail de Validation';
        $name = 'Eos Association';
        $email = 'contact@eos.com';
        $chiefContact = 'M, Mme ' . $user['partnerDirectorLstNme'];

        $content = 'Nous avons le plaisir, de vous annoncer que suite à notre échange et votre souhait de nous soutenir dans notre démarche auprès des plus démunis, que notre administrateur(trice)à créé votre espace personnel sur notre plateforme Eos' . '<br>' .
            'Je vous invite donc dès à présent à créer votre mot de passe ' . '<a href="https://projet-wf3.test/password/reset/' . $token . '?email=' . $user['partnerMail'] . '">ici.</a>' . '<br>' .
            'Vous pourrez ainsi vous connecter avec l\'email que vous nous avez transmis et votre mot passe pour créer votre première collecte.' . '<br>' .
            'Cordialement Eos association .';

        //On envoi un mail personnalisé au partenaire nouvellement enregistré contenant le lien
        //avec le token lui permettant de créer son mot de passe personnel
        Mail::to($user['partnerMail'])->send(new Contact($title, $content, $email, $name, $chiefContact));


        return view('listPartner.index')->with('successMessage', 'Partenaire ajouté avec succès, un mail de confirmation lui a été transmis.');

    }

    /**
     * returns the view with the pre-filled information saved in the database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $id = $request['id'];
        $edit = User::with('partner', 'partner.villeFrance')->where('id', '=', intval($id))->first();
        return view('adminAddPartner.index')->with('edit', $edit);
    }

    /**
     * Save the new data in database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {

        $values = $request->all();
        $values['partnerSiret'] = str_replace(' ', '', $request['partnerSiret']);

        $rules = [
            'partnerName' => 'string|max:30|required',
            'partnerDirectorFstNme' => 'string|max:30|required',
            'partnerDirectorLstNme' => 'string|max:30|required',
            'partnerAddress' => 'string|max:60|required',
            'selectCity' => 'required|regex:/[0-9]{5}/',
            'partnerMail' => 'email|required',
            'partnerSiret' => 'required|regex:/[0-9]{14}/',
            'partnerPhone' => ['required', 'regex:/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/'],
        ];

        $validator = Validator::make($values, $rules, [
            'partnerName.string' => 'La raison sociale comporte des caractères spéciaux.',
            'partnerName.required' => 'Champs requis.',
            'partnerName.max' => 'La raison sociale comporte plus 30 caractères.',
            'partnerDirectorFstNme.max' => 'Le prénom comporte plus de 30 caractères.',
            'partnerDirectorFstNme.string' => 'Le prénom comporte des caractères spéciaux.',
            'partnerDirectorFstNme.required' => 'Champs requis.',
            'partnerDirectorLstNme.max' => 'Le nom de la directrice(teur) comporte plus de 30 caractères.',
            'partnerDirectorLstNme.string' => 'Le nom de la directrice(teur) comporte des caractères spéciaux.',
            'partnerDirectorLstNme.required' => 'Champs requis.',
            'partnerMail.required' => 'Champs requis.',
            'partnerMail.email' => 'Format de l\'email est invalide.',
            'selectCity.required' => 'Veuillez sélectionner une ville.',
            'selectCity.regex' => 'Veuillez sélectionner une ville',
            'partnerSiret.required' => 'Champs requis.',
            'partnerSiret.regex' => '14 caractères numériques requis.',
            'partnerPhone.required' => 'Champs requis',
            'partnerPhone.regex' => '10 caractères numériques requis.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $updateUser = User::find($request->id);
        $updateUser->firstname = $values['partnerDirectorFstNme'];
        $updateUser->email = $values['partnerMail'];
        $updateUser->lastname = $values['partnerDirectorLstNme'];
        $updateUser->update();

        $updatePartner = Partner::find($updateUser->partner_id);
        $updatePartner->name = $values['partnerName'];
        $updatePartner->tel = $values['partnerPhone'];
        $updatePartner->address = $values['partnerAddress'];
        $updatePartner->ville_insee = $values['selectCity'];
        $updatePartner->siret = $values['partnerSiret'];
        $updatePartner->update();


        return view('listPartner.index')->with('successMessage', 'Modification Partenaire réalisée avec succès');

    }

    /**
     * Delete partner with id get by url
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Request $request)
    {

        $deleteUser = User::find($request->id);
        $deleteUser->delete_at = now();
        $deleteUser->update();


        return view('listPartner.index')->with('successMessage', 'Partenaire supprimé avec succès');


    }


}
