{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@extends('layout.app')
@section('title', "S'enregistrer")
@section('contenu')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Creer un nouveau Utilisateur</h5>
                <!-- Multi Columns Form -->
                <form class="row g-3" method="POST" action="{{ route('register') }}"autocomplete="off">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="inputName5" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="inputEmail5" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Mot de passe:</label>
                        <input type="password" class="form-control" id="inputPassword5" name="password" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Confirmer le mot de passe:</label>
                        <input type="password" class="form-control" id="inputAddres5s" placeholder=""
                            name="password_confirmation" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Confirmer le mot de passe:</label>
                        <select class="form-select" name="poste_id" id="">
                            @foreach ($postes as $poste)
                                <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-12">
                        <label for="inputAddress2" class="form-label">Telephone:</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="+237 xxx xxx xxx"
                            name="telephone" required>
                    </div> --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
                        {{-- <a href="gererutilisateur.php" class="btn btn-secondary">Annuler</a> --}}
                    </div>
                </form><!-- End Multi Columns Form -->
            </div>
        </div>
        </div>
        </section>

    </main>
<! @endsection
