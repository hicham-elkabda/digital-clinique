<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>

    {{-- Bootstrap CSS local --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        body {
            background-image: url('{{ asset('images/background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 420px;
            margin: 10px auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            backdrop-filter: blur(6px);
        }

        img {
            display: inline-block;
            width: 200px !important;
            height: 200px !important;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: black;
            border-radius: 50% 50% 50% 50% !important;
            margin-bottom: 30px;
        }

        #titreCard {
            color: black;
            text-transform: uppercase;
        }

        /* ==============================
           RESPONSIVE MEDIA QUERIES
        =============================== */

        /* Tablette (écrans ≤ 992px) */
        @media (max-width: 992px) {
            .card {
                width: 90%;
                padding: 15px;
            }

            img {
                width: 160px !important;
                height: 160px !important;
            }

            #titreCard h5 {
                font-size: 18px;
            }
        }

        /* Téléphone (écrans ≤ 576px) */
        @media (max-width: 576px) {
            body {
                background-attachment: scroll;
                background-size: cover;
                padding: 10px;
            }

            .card {
                width: 100%;
                margin: 0 auto;
                padding: 15px;
            }

            img {
                width: 120px !important;
                height: 120px !important;
                margin-bottom: 20px;
            }

            #titreCard h5 {
                font-size: 16px;
            }

            #titreCard small {
                font-size: 13px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="card-img-top mx-auto d-block"
                        style="width: 250px; height: 200px; margin-top: 20px;">

                    <div class="text-center mb-3" id="titreCard">
                        <h5 class="mb-0 font-weight-bold">Réinitialiser le mot de passe</h5>
                        <small class="text-muted">Entrez vos nouvelles informations</small>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Jeton de réinitialisation -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email -->
                            <div class="mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $request->email) }}"
                                    placeholder="Entrez votre adresse e-mail" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Nouveau mot de passe" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation -->
                            <div class="mb-3">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Réinitialiser le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Bootstrap JS local --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
