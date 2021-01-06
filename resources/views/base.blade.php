<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Consulvivo</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/globalStyles.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        @yield('scoped_styles')
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    </head>
    <body>
        @yield('content')
        <div class="svg-base-left">
            <svg width="786" height="432" viewBox="0 0 786 432" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M596.635 431.995C711.077 423.558 774.593 561.718 693.682 643.091L583.274 754.128C542.067 795.57 477.517 802.614 428.341 771.036L-128.015 413.766C-172.348 385.297 -193.85 331.922 -181.632 280.672L-141.528 112.445C-116.482 7.38204 21.5781 -17.6599 81.9282 71.9134L297.208 391.437C322.068 428.335 364.79 449.086 409.161 445.815L596.635 431.995Z" fill="#FFCA4F" fill-opacity="0.4"/>
            </svg>
        </div>
        <div class="svg-base-right">
            <svg width="764" height="669" viewBox="0 0 764 669" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M672.867 294.602C709.093 185.852 860.826 180.264 904.954 286.055L962.615 424.289C985.226 478.495 966.707 541.128 918.254 574.322L383.791 940.474C340.461 970.159 283.129 969.325 240.681 938.391L106.255 840.431C18.7604 776.67 49.2641 639.264 155.519 618.516L522.44 546.866C566.32 538.298 602.19 506.771 616.32 464.354L672.867 294.602Z" fill="#FFCA4F" fill-opacity="0.4"/>
            </svg>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
