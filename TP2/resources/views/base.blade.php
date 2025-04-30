<!doctype html>
<html lang="en">
    <!-- Inclusion du fichier head.blade.php (contient les métadonnées, les liens CSS, etc.) -->
    @include('head')
    </head>    
<body style="overflow: scroll;">
    <!-- Inclusion du fichier header.blade.php (contient la barre de navigation) -->
    @include('header')
    <!-- Corps principal du projet -->
    <main class="container-fluid px-5 mb-5">
        @yield('contenu')
    </main>
    <!-- Inclusion du fichier footer.blade.php (contient le pied de page) -->
    @include('footer')
     <!-- Inclusion du fichier java Script -->
    @include('sectionJavaScript')
   
</body>
</html>
