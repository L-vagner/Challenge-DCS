<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta lang="fr">

    @yield('title')

</head>
<nav>
    <ul>
        <li><a href="/topDix">Top 10 des applications</a></li>
        <li><a href="/topCinq">Evolution des 5 plus grands clients</a></li>
        <li><a href="/volumeProduit">Evolution volume produits</a></li>
    </ul>
</nav>
@yield('content')

</html>