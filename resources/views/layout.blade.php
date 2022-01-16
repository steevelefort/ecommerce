
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
</head>
<body class="flex flex-col justify-between h-screen">
<header class="flex justify-between p-4 text-xl text-white bg-blue-900">
    <h1><a href="/">LA BOUTIQUE</a></h1>
    <nav>
        <ul>
            <li>
                <a href="{{url('/')}}/cart"><i class="fas fa-shopping-cart"></i> <span class="text-2xl">{{ count(Session::get('cart',[])) }}</span></a>
            </li>
        </ul>
    </nav>
</header>

@yield("main")

<footer class="p-5 text-lg text-center text-white bg-gray-700">
    Copyright &copy; 202x Votre Nom
</footer>
</body>
</html>
