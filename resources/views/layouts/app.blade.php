<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .modal {
            display: flex;
            visibility: hidden;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 10;
            width: 100%;
            height: 100%;
        }

        .model-inner {
            background-color: white;
            border-radius: 0.5em;
            max-width: 600px;
            padding: 2em;
            margin: auto;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid black;
        }

        [x-cloak] {
            display: none !important;
        }

        .overlay {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: black;
            opacity: 0.75;
        }
    </style>
    
    @livewireStyles
</head>

<body class="font-sans">
    <nav class="bg-white shadow-lg">
		<div class="max-w-6xl mx-auto px-4">
			<div class="justify-between">
				<div class="flex space-x-40">
					<!-- Website Logo -->
					<div>
						<a href="{{ route('home') }}" class="flex items-center py-4 px-2">
						
							<span class="font-bold text-gray-500 text-lg"
								>Laravel Learning</span
							>
						</a>
					</div>
					<!-- Primary Navbar items -->
					<div class=" md:flex items-right space-x-1">
						<a
							href="{{ route('crud') }}"
							class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold "
							>LiveWire Crud Operation</a
						>
						<a
							href=""
							class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300"
							>Services</a
						>
						<a
							href=""
							class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300"
							>About</a
						>
						<a
							href=""
							class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300"
							>Contact Us</a
						>
					</div>
				</div>
			</div>
		</div>
	</nav>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
            @yield('content')
        </main>
    </div>


    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @yield('scripts')

</body>

</html>
