<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            overflow-y: hidden;
        }
    </style>
</head>

<body class="bg-zinc-900 h-screen">
    <?php require base_path("views/{$view}.view.php"); ?>
</body>

</html>