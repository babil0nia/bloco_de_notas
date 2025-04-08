<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloco de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .formulario {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 250px;
            margin: 200px;
            overflow: hidden;
            height: 100%;
        }

        .imagem {
            width: 300px;
            height: 300px;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toggleSenha = document.getElementById('toggleSenha');
            var senhaInput = document.getElementById('exampleInputPassword1');

            if (toggleSenha && senhaInput) {
                toggleSenha.addEventListener('click', function() {
                    if (senhaInput.type === 'password') {
                        senhaInput.type = 'text';
                    } else {
                        senhaInput.type = 'password';
                    }
                });
            }
        });
    </script>

</body>

</html>
