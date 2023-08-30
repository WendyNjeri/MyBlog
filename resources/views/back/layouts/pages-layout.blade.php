<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <base href="/">
    <link href="./back/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./back/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./back/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./back/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <!--sweet alert missing here-->
    <link rel="stylesheet" href="ijabo.min.css">
    <link rel="stylesheet" href="{{ asset('back/dist/ijabo/ijaboCropTool.min.css') }}">
    <!--sweet alert 2-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('stylesheets')
    @livewireStyles
    <link href="./back/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Navbar -->
        @include('back.layouts.inc.header')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('pageHeader')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            <!--footer-->
            @include('back.layouts.inc.footer')
        </div>
    </div>

    <!-- Libs JS -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--not working ijibo-->
    <script src="jquery.ijaboViewer.min.js"></script>
    <!--<script src="{ { asset('back/dist/libs/jquery/jquery-1.7.1.min.js') }}"></script>-->
    <script src="{{ asset('back/dist/ijabo/ijaboCropTool.min.js') }}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="./back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src=".back//dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="./back/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js?1684106062" defer></script>
    @stack('scripts')
    @livewireScripts

    <script>
        window.addEventListener('showToastr',function(event)
        {
            toastr.remove();
            if(event.detail.type === 'info')
            {
                toastr.info(event.detail.message);
            }else if(event.detail.type === 'success')
            {
                toastr.success(event.detail.message);
            }else if(event.detail.type === 'error')
            {
                toastr.error(event.detail.message);
            }else if(event.detail.type === 'warning')
            {
                toastr.warning(event.detail.message);
            }else{
                return false;
            }
        });

        /*
        if (typeof toastr !== 'undefined') {
            window.addEventListener('showToastr', event => {
                toastr.remove(); // Removes any existing toasts
                const {
                    type,
                    message
                } = event.detail;
                if (toastr[type]) {
                    toastr[type](message);
                } else {
                    console.error(`toastr[${type}] does not exist`);
                }
            });
        } else {
            console.log('Error: toastr library is not loaded.');
        }
        */
    </script>
    <script src="./back/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>
