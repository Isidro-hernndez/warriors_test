<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <title>{{ config('app.name', 'Warriors') }}</title>
  </head>
  <body>
    <!-- Start nav menu -->
    
    <!-- End Nav Menu -->

    <!-- start content -->
    <div class="">
            
</div>
    @yield('content')
    <!-- End Content -->

    <!-- Start footer -->
    <div class="row">
        <div class="col-md-12 py-4">
            <!-- Footer -->
            <footer class="page-footer p-3 mb-2 bg-dark text-white">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                ©2019 Copyright: 
                <a class="stretched-link" href="https://isidro.dev"> Isidro Hernandez Gregorio</a>
            </div>
            <!-- Copyright -->

            </footer>
        </div>
    </div>
    <!-- End Footer -->

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    @guest
            
        @else
    <script>
        
            var user = {!! Auth::user() !!};
            localStorage.setItem('user', JSON.stringify(user));
        
    </script>
    @endguest
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>