@extends('layouts.master')

@section('content')


	<div class="container">
		<h4>Mon compte & mes données personnelles</h4>

		<div class="table-responsive">
			<table id="mytable" class="table table-bordred table-striped">
				<thead>
					<th></th>
					<th>prénom</th>
					<th>Nom</th>
					<th>Adresse</th>
					<th>Email</th>
					<th>Siret</th>
					<th>Téléphone</th>
					<th>Code Postale</th>
					<th>Création du compte</th>
					<th></th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->partner->address }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->partner->siret}}</td>
						<td>{{ $user->partner->tel }}</td>
						<td>{{ $user->partner->ville_insee }}</td>
						<td>{{ $user->partner->created_at }}</td>
						<td><a href="/AccountPartner/update"><i class="fas fa-pencil-alt">Modifier</i></a></td>
					</tr>
				</tbody>
            </table>
        </div>
	</div>
@endsection


