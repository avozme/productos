<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Mi App Laravel')</title>
    <style>
        /* Reset simple */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
            margin: 0; 
            padding: 20px;
            color: #333;
        }
        header {
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #ddd;
        }
        header h1 {
            margin: 0;
            font-weight: 700;
            color: #2c3e50;
        }
        nav a {
            text-decoration: none;
            color: #2980b9;
            margin-right: 15px;
            font-weight: 600;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            max-width: 900px;
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1.5rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f4f6f8;
            font-weight: 700;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        button, input[type="submit"], .btn {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        button:hover, input[type="submit"]:hover, .btn:hover {
            background-color: #1c5980;
        }
        form > div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 12px 18px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 12px 18px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .errors-list {
            list-style-type: none;
            padding-left: 0;
            margin: 0 0 1rem 0;
            color: #721c24;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <h1>Mi Tienda Laravel</h1>
        <nav>
            <a href="{{ route('products.index') }}">Productos</a>
            <a href="{{ route('products.create') }}">Crear Producto</a>
        </nav>
    </header>
    <main>
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
