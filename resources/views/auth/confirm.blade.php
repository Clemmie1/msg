
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">
    <title>Мессенджер</title>
    <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">
    <link class="css-lt" rel="stylesheet" href="./assets/css/template.bundle.css" media="(prefers-color-scheme: light)">
    <link class="css-dk" rel="stylesheet" href="./assets/css/template.dark.bundle.css" media="(prefers-color-scheme: dark)">
    <script>
        if (localStorage.getItem('color-scheme')) {
            let scheme = localStorage.getItem('color-scheme');

            const LTCSS = document.querySelectorAll('link[class=css-lt]');
            const DKCSS = document.querySelectorAll('link[class=css-dk]');

            [...LTCSS].forEach((link) => {
                link.media = (scheme === 'light') ? 'all' : 'not all';
            });

            [...DKCSS].forEach((link) => {
                link.media = (scheme === 'dark') ? 'all' : 'not all';
            });
        }
    </script>
    @notifyCss
</head>

<body class="bg-light">

<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100 gx-0">

        <div class="col-12 col-md-5 col-lg-4">

            <div class="card card-shadow border-0">

                <div class="card-body">
                    <div class="row g-6">
                        <div class="col-12">
                            <div class="text-center">
                                <h4 class="fw-bold">Подтверждение</h4>
                                <p class="mt-4">Ваш аккаунт не подтвержден проверьте вашу почту</p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <!-- Text -->
            <div class="text-center mt-8">
                <a href="{{url('/logout')}}">Выйти</a>
            </div>

        </div>
    </div> <!-- / .row -->
</div>

<x:notify-messages />
@notifyJs
<script src="./assets/js/vendor.js"></script>
<script src="./assets/js/template.js"></script>
</body>
</html>
