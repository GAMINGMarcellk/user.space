<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
</head>
<body class="bg-gray-800 container">
    <main class="flex h-screen w-screen justify-center items-center bg-gray-800 py-24 px-6 sm:py-32 lg:px-8">
        <div class="text-left">
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-white sm:text-5xl">Page doesn't exist!</h1>
            <p class="mt-6 text-base leading-7 text-gray-400">Create your own profile with <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline"><?php echo $_SERVER['HTTP_HOST']; ?></a></p>
        </div>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>