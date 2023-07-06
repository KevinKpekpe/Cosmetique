<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de confirmation de commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>

<body>
    <div class="ui container">
        @if (session('success'))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header">
                    Success
                </div>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <h1 class="ui header">Merci d'avoir effectué votre achat chez nous</h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>

</html>
