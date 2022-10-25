<!--The MIT License (MIT)

Copyright (c) 2017 www.netprogs.pl

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.-->
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Rezervado!</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://bootswatch.com/3/readable/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script>

          var base_url = '{{ url('/') }}'; 

        </script>
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">Strona główna</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  @auth
                    <ul class="nav navbar-nav">
                        <li><p class="navbar-text">Zalogowany jako:</p></li>
                        <li><p class="navbar-text">{{ Auth::user()->name }}</p></li>
                        <li><a href="{{ route('adminHome') }}">Admin</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>
                    </ul>
                    @endauth
                    @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('login') }}">Zaloguj</a></li>
                        <li><a href="{{ route('register') }}">Zarejestruj</a></li>
                    </ul>
                    @endguest
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="jumbotron">
            <div class="container">
                <h1>Rezervado!</h1>
                <p>Platforma dla turystów i właścicieli obiektów turystycznych. Znajdź oryginalne miejsce na wakacje!</p>
                 <p>Umieść swój dom na stronie i daj się znaleźć wielu turystom!</p>
                <form method="POST" action="{{ route('roomSearch') }}" class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="city">Miasto</label>
                        <input name="city" value="{{ old('city') }}" type="text" class="form-control autocomplete" id="city" placeholder="Miasto">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="day_in">Przyjazd</label>
                        <input name="day_in" value="{{ old('day_in') }}" type="text" class="form-control datepicker" id="day_in" placeholder="Przyjazd">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="day_out">Wyjazd</label>
                        <input name="day_out" value="{{ old('day_out') }}" type="text" class="form-control datepicker" id="day_out" placeholder="Wyjazd">
                    </div>
                    <div class="form-group">
                        <select name="room_size" class="form-control">
                            <option>Liczba osób</option>

                            @for($i=1;$i<=5;$i++)

                                @if( old('room_size') == $i )
                                <option selected value="{{ $i }}">{{ $i }}</option>
                                @else
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endif

                            @endfor()


                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Szukaj</button>
                    {{ csrf_field() }}
                </form>

            </div>
        </div>

        @yield('content')



              <hr>

              <footer>

                  <p class="text-center">&copy; Rezervado, Weronika Piotrowicz</p>

              </footer>

          </div>

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          <script src="{{ asset('js/app.js') }}"></script> <!-- Lecture 5 -->
          @stack('scripts') <!-- Lecture 20 -->
      </body>
  </html>
