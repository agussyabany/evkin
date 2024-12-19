{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Perumdam Tirta Kencana</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                    }
                }
                </style>
                <!-- Custom styles for this template -->
                <link href="{{asset('assets/dist/css/signin.css')}}" rel="stylesheet">
            </head>
            <body class="text-center" style="background-image: url('{{asset('assets/dist/img/bg.jpg')}}');background-size: cover; background-repeat: no-repeat;font-family: 'Bahnschrift-SemiLight', sans-serif; width:100%; height:100%">

            <main class="form-signin">
           <div class="container">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <img class="mb-4" src="{{asset('assets/dist/img/logo.png')}}" alt="" width="300" height="300">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>                        
                            @endforeach
                        </ul>
                    </div>
                     @endif
                     
                <input class="form-control" placeholder="name@example.com" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
                <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                <input id="password"type="password" name="password" required autocomplete="current-password"  type="password" class="form-control" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>

               

                <div class="checkbox mb-3">
                <label>
                    <input id="remember_me"  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" type="checkbox" value="remember-me"> Remember me
                </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </div>
            </main>
         </body>
    </html> --}}
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Perumdam Tirta Kencana</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="{{asset('assets/dist/css/signin.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>                        
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Tambahkan gambar di atas input email -->
                <div class="image-container">
                    <img src="{{asset('assets/dist/img/logo.png')}}" width="100px" height="100px" alt="">
                </div>
                
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="name@example.com" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password"  name="password" required autocomplete="current-password" type="password" class="form-control" placeholder="Password">
				</div>
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				
				<div class="social-icons">
					
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1">
				
			</span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
