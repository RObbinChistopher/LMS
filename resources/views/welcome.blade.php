<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vise Tech Management System</title>
    <!-- <link rel="icon" href="{{asset('/Images\ViceTech.png')}}"> -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        .swiper-button-prev,
        .swiper-button-next {
            color: white !important;
            width: 40px !important;
            height: 40px !important;
            border: 1px solid #391e6b;
            border-radius: 50%;
            background: #391e6b;
            box-shadow: inset rgba(17, 12, 46, 0.15) 0px 20px 20px 0px;
            z-index: 10;
            text-align: center;
        }

        .swiper-button-prev:after,
        .swiper-button-next:after {
            font-family: swiper-icons;
            text-transform: none !important;
            letter-spacing: 0;
            font-variant: initial;
            line-height: 1;
            color: white;
            font-size: 19px !important;
        }

        .custom-quill-editor .ql-container {
            height: 150px !important;
            /* Approximate height for 6 rows */
        }

        .ql-toolbar.ql-snow {
            border: 1px solid #e0e4e8 !important;
        }

        .ql-container.ql-snow {
            border: 1px solid #e0e4e8 !important;
            color: black !important;
        }

        .custom-quill-editor .ql-editor {
            min-height: 150px !important;
        }

        .Sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .Sidebar::-webkit-scrollbar-thumb {
            background-color: white;
            border-radius: 4px;
        }

        .Sidebar::-webkit-scrollbar-thumb:hover {
            background-color: var(--sBackground);
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        .main-container {
            height: 100vh;
            overflow-y: auto;
        }


        /* Hide scrollbar for Chrome, Safari and Edge */
        ::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 767px) {

            html,
            body {
                overflow: auto;
                /* Restore scrollbar for mobile screens */
            }
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 2rem;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #000000;
            background-color: #98e5db;
            border-color: #98e5db;
            border-radius: 4px;
        }

        .page-link {
            z-index: 3;
            color: #000000;
            background-color: white;
            border-color: #98e5db;
            border-radius: 4px;
        }

        .page-link:hover {
            z-index: 3;
            color: #000000;
            background-color: white;
            border-color: #98e5db;
            border-radius: 4px;
        }

        .flag-input {
            box-shadow: none !important;
            height: 40px !important;
            border-radius: 6px !important;
        }

        .tooltip-inner {
            background-color: white !important;
            color: black !important;
            border: 1px solid #ccc;
        }

        .v3ip__selected {
            background: #00bcd4 !important;
            color: white !important;
            border: 2px solid #00bcd4 !important;
        }

        .v3ip__custom-select .v3ip__selected:after {
            position: absolute;
            content: '';
            top: 17px;
            right: 1em;
            width: 0;
            height: 0;
            border: 5px solid transparent;
            border-color: white transparent transparent transparent !important;
            color: white !important;
        }

        .v3ip__custom-select .v3ip__selected::placeholder {
            color: black !important;
        }

        .v3ip__custom-select .v3ip__selected .placeholder {
            color: black !important;
        }

        .placeholder {
            background-color: rgb(0 0 0) !important;
        }
    </style>
</head>

<body>
    <div id="app"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap JavaScript and Popper.js -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('style')

</body>

</html>