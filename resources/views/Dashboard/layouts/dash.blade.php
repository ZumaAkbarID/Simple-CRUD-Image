<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <div class="vanila_container">
        @include('Dashboard.layouts.navbar')

        @yield('content')

        @include('Dashboard.layouts.sidebar')
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/vendor/fontawesome/js/all.min.js"></script>

    <script>
        var sidebarOpen = false;
        var sidebar = document.querySelector('#sidebar');

        function sidebarToggle() {
            if (!sidebarOpen) {
                sidebar.classList.add('sidebar_responsive');
                sidebarOpen = true;
            }
        }

        function closeSidebar() {
            if (sidebarOpen) {
                sidebar.classList.remove('sidebar_responsive');
                sidebarOpen = false;
            }
        }
    </script>

</body>

</html>