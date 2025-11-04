<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS local -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

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

            #titreCard {
                font-size: 18px;
            }

            .btn {
                font-size: 15px;
                padding: 10px 16px;
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

            #titreCard {
                font-size: 16px;
            }

            small {
                font-size: 13px;
                text-align: justify;
            }

            .btn {
                width: 100%;
                font-size: 14px;
            }

            .d-flex {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="card-img-top mx-auto d-block">

                    <div class="card-header text-center fw-bold" id="titreCard">
                        {{ __('Réinitialiser le mot de passe') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <small class="d-block mb-2"
                                    style="color:black;margin:15px 5px 15px 5px !important;text-align:justify">
                                    {{ __('Mot de passe oublié ? Pas de souci. Indique ton adresse email et tu recevras un lien pour en choisir un nouveau.') }}
                                </small>
                                <input type="email" required name="email" id="email"
                                    style="border:1px solid black"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Entrez votre adresse e-mail" value="{{ old('email') }}" required
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer le lien de réinitialisation') }}
                                </button>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success mt-3" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS local -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
