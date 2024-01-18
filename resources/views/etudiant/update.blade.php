<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un étudiant</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group .btn {
            width: auto;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .form-group .btn-secondary {
            background-color: #3a648a;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier un étudiant</h1>
    <hr>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="/update/traitement" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $etudiant->id }}">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="{{ $etudiant->prenom }}" required>
        </div>
        <div class="form-group">
            <label for="class">Classe:</label>
            <input type="text" id="class" name="class" value="{{ $etudiant->class }}" required>
        </div>
        <div class="form-group">
            <button class="btn" type="submit">Modifier</button>
            <a href="/user" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </form>
</div>
</body>
</html>
