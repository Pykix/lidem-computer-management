<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idem computer park</title>
</head>

<body>
    <h1>{{ $lend->user->name }} votre de demande de reservation</h1>
    <p>Votre demande pour l'ordinateur {{ $lend->computer->serial_number }} viens d'être validée</p>
    <p>Vous pourrez venir le récupérer le {{ $lend->start_date }} à l'idem du Le Soler</p>
    <p>L'idem computer park vous remercie de votre intérêt</p>
    <br>
    <hr>
    <br>
    <ul>
        <li class="item-list-mail"><a class="link-mail" href="https://lidem.eu">lidem.eu</a></li>
        <li class="item-list-mail">04 68 92 53 84</li>
        <li class="item-list-mail">legerantduparc@lidem.fr</li>
        <li class="item-list-mail"><a class="link-mail" href="https://goo.gl/maps/F2ddhsfqX5LDf9nLA">50 Rue Pierre
                Semard, 66270 Le Soler</a></li>

        <li class="item-list-mail"></li>
    </ul>
</body>

</html>
