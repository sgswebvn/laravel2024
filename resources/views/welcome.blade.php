<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'E-commerce Website')</title>
    @vite('resources/css/app.css')
    <script src="../js/main.js"></script>
    <script src="../js/ajax.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="">
                    <img src="/path-to-logo.png" alt="Logo" class="w-32">
                </a>
                <div class="relative">
                    <input type="text" placeholder="Hôm nay bạn cần tìm gì?" class="border border-gray-300 rounded-lg px-4 py-2 w-96 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <svg xmlns="    " class="h-6 w-6 absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
            <div class="flex space-x-6 items-center">
                <a href="#" class="text-gray-700 hover:text-blue-600">Đăng nhập</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Giỏ hàng (0)</a>
            </div>
        </div>
    </header>

    <!-- Navbar -->
    <nav class="bg-green-800 py-3">
        <div class="container mx-auto flex space-x-6">
            <a href="#" class="text-white hover:text-gray-300">Điện Thoại</a>
            <a href="#" class="text-white hover:text-gray-300">Apple</a>
            <a href="#" class="text-white hover:text-gray-300">Laptop</a>
            <a href="#" class="text-white hover:text-gray-300">Tablet</a>
            <!-- Add more categories as needed -->
        </div>
    </nav>

    <!-- Main content -->
    <main class="container mx-auto my-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto flex justify-between items-center">
            <p>&copy; {{ date('Y') }} MyStore. All rights reserved.</p>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-gray-400">About Us</a></li>
                <li><a href="#" class="hover:text-gray-400">Contact</a></li>
                <li><a href="#" class="hover:text-gray-400">Privacy Policy</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
