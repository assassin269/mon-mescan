<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - MeScan</title>
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
        input[type="email"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.2s;
        }
        input[type="email"]:focus {
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
        .back-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #4299e1;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover { text-decoration: underline; }
        .alert-success {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            background: #c6f6d5;
            color: #22543d;
            border: 1px solid #9ae6b4;
        }
        .alert-danger {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            background: #fed7d7;
            color: #9b2c2c;
            border: 1px solid #fc8181;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Mot de passe oublié</h1>
        <p>Entrez votre adresse email, nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>

        @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <button type="submit" class="btn">Envoyer le lien</button>

            <a href="{{ route('login') }}" class="back-link">← Retour à la connexion</a>
        </form>
    </div>
</body>
</html>