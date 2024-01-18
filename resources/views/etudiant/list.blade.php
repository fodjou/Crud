<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testons</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="col s12">
        <h1>LARAVEL</h1>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->class }}</td>
                    <td>
                        <button class="btn btn-primary" onclick="window.location.href='/update/{{ $etudiant->id }}'">Update</button>
                        <button class="btn btn-danger" onclick="window.location.href='/delete/{{ $etudiant->id }}'">delete</button>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td colspan="5" class="text-center">
                    <a href="/ajouter" class="btn btn-primary">Add user</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
