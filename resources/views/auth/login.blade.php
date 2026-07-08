<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - MeScan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
        }
        h1 { font-size: 24px; color: #1a202c; margin-bottom: 8px; }
        p { color: #4a5568; font-size: 14px; margin-bottom: 24px; line-height: 1.6; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 14px; font-weight: 600; color: #2d3748; margin-bottom: 6px; }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.2s;
        }
        input:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #2b6cb0;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn:hover { background: #2c5282; }
        .alert-danger {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            background: #fed7d7;
            color: #9b2c2c;
            border: 1px solid #fc8181;
        }
        .forgot-link {
            text-align: center;
            margin-top: 16px;
        }
        .forgot-link a {
            color: #4299e1;
            text-decoration: none;
            font-size: 14px;
        }
        .forgot-link a:hover {
            text-decoration: underline;
        }
        .register-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #4a5568;
        }
        .register-link a {
            color: #4299e1;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Connexion</h1>
        <p>Connectez-vous à votre compte MeScan.</p>

        <!-- AFFICHAGE DES ERREURS DE CONNEXION -->
        @if ($errors->any())
            <div class="alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- TOKEN DE SÉCURITÉ -->

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">Se connecter</button>

            <!-- ============================================================
                 LIEN "MOT DE PASSE OUBLIÉ" - SUR LA MÊME PAGE
                 ============================================================ -->
            <div class="forgot-link">
                <a href="{{ route('password.request') }}">
                    🔑 Mot de passe oublié ?
                </a>
            </div>

            <!-- Lien vers l'inscription -->
            <div class="register-link">
                Pas encore de compte ? 
                <a href="{{ route('register') }}">Créer un compte</a>
            </div>
        </form>
    </div>
</body>
</html>