<!DOCTYPE html>
<html>
    <head>
        <title>{{$title or 'Curso de Laravel 5.3'}}</title>

        {{--Pode ser incluido dentro do body tbm... Está sendo chamado no home--}}
        @stack('scripts');
    </head>

    <body>
        @yield('content')
    </body>
</html>
