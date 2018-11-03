<!DOCTYPE html>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    @yield('SOE')
    @if (Request::path() == '/')
        <title>KalimeroCMS</title>
        <meta name="robots" content="index, follow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link type="text/plain" rel="author" href="http://tge.mk/humans.txt"/>
        <meta property="og:title" content="МПЦ - ОА Европска епархија"/>
        <meta property="article:author" content="https://www.facebook.com/Sefot"/>
        <meta property="og:site_name" content="МПЦ - ОА Европска епархија"/>
        <meta property="fb:app_id" content="1192823797520220"/>
        <meta name="google-site-verification" content="tk0mLfz9VdFAzjzllTBY5jIFtMhVFoJM2HxUkLMidEM"/>
        <meta property="og:type" content="article"/>
        <meta property="og:image" content="http://tge.mk/assets/img/logo/logo.jpg"/>
        <meta property="article:tag"
              content="pravoslavna, crkva, православие, pravoslavie, црква, Бог, религија, bog, religija, manastir, gospodi, isus hristos, bogorodica"/>
        <meta property="og:description"
              content="Официјален веб портал на  Македонска правлславна црква Европска епархија">
        <meta name="description" content="Официјален веб портал на  Македонска правлславна црква Европска епархија"/>
        <meta name="keywords"
              content="pravoslavna, crkva, православие, pravoslavie, црква, Бог, религија, bog, religija, manastir, gospodi, isus hristos, bogorodica, виена, австрија, епархија, македонска, охридска, архиепископија"/>
        <meta name="author" content="Zoran Shefot Bogoevski">
    @endif
<!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{-- Dynamic RSS Feed Calls --}}
    @include('feed::links')

<!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">

    <!-- Favicon -->
    {{--<link rel="shortcut icon" href="/assets/img/favicon.ico">--}}

    <!-- Bootstrap core CSS -->

    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
        <!-- Theme core CSS -->

        <link href="/fonts/ionicons.css" rel="stylesheet">

    <link href="/css/styles.css" rel="stylesheet" media="screen">


</head>
<body>



    @yield('menu')

    @yield('content')

    <footer class="bg-191 color-ccc">

        <div class="container">
            <div class="pt-50 pb-20 pos-relative">
                <div class="abs-tblr pt-50 z--1 text-center">
                    <div class="h-80 pos-relative"><img class="opacty-1 h-100 w-auto" src="images/map.png" alt=""></div>
                </div>

            </div><!-- row -->
        </div><!-- ptb-50 -->

        <div class="brdr-ash-1 opacty-2"></div>

        <div class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5">

            <ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10">
                <li><a class="pl-0 pl-sm-10" href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Jobs advertising</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <ul class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
                <li><a class="pl-0 pl-sm-10" href="#"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                <li><a href="#"><i class="ion-social-google"></i></a></li>
                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                <li><a href="#"><i class="ion-social-bitcoin"></i></a></li>
            </ul>

        </div><!-- oflow-hidden -->
        </div><!-- container -->
    </footer>

    <!-- SCIPTS -->
    <script src="/js/jquery-3.2.1.min.js"></script>

    <script src="/js/tether.min.js"></script>

    <script src="/js/bootstrap.js"></script>

    <script src="/js/scripts.js"></script>


</body>
</html>
