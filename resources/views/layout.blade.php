<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script> tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#65b144",
                        },
                    },
                },
            };
        </script>
        <title>Find Jobs</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-0">
            <a href="/"
                ><img class="w-24" src="images/logo.png" alt="logo" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                {{-- if logged  --}}
                @auth

                    <span class="font-bold uppercase">
                        <i class="fa-solid fa-user"></i>
                        Welcome {{auth()->user()->name}}
                    </span>
                    <li>
                        <a href="/posts/manage" class="hover:text-laravel"
                            ><i class="fa-solid fa-gear"></i>
                            Manage Posts</a
                        >
                    </li>
                    <li>
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-laravel">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </li>
                    
                {{-- guest --}}
                @else
                
                    <li>
                        <a href="/register" class="hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> Register</a
                        >
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>
                    
                @endauth

            </ul>
        </nav>

        {{-- message component, used with session prop --}}
        <x-message />   

        <main>
            
            {{-- main content --}}
            @yield('content')

            {{-- {{$slot}}           second way to insert component with <x-layout> in components --}}

        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-20 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
            
           @if(Route::current()->uri() == 'company')
                <a href="/company/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5" >Post Company</a>
           @else
                <a href="/posts/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5" >Post Job</a>
            @endif
            

        </footer>
    </body>

</html>
