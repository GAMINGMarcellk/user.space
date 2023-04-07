<?php
require_once('dashboard/server/connect.php');
require_once('dashboard/server/query.php');

// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user.space</title>
</head>
<body class="bg-gray-800 container">
    <main class="flex flex-col h-screen w-screen justify-center items-center bg-gray-800 py-24 px-6 sm:py-32 lg:px-8">
        <div class="w-1/3 items-center grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            <div class="text-left">
                <p class="text-base font-semibold text-gray-400"></p>
                <h1 class="text-3xl font-bold tracking-tight text-white sm:text-5xl">
                    user<span class="text-indigo-600">.space</span>
                </h1>
                <p class="mt-6 text-base leading-7 text-gray-400">
                    A private, user friendly profile website.<br>
                    Inspired by <a href="https://ayo.so/" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">ayo.so</a>
                    &amp;
                    <a href="https://feds.lol/" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">feds.lol</a>.
                </p>
                <div class="mt-5 flex items-center gap-x-6">
                    <?php if (isset($_SESSION["loggedin"]) == false) { ?>
                        <a href="/dashboard/login.php" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Login/Register
                        </a>
                    <?php } else { ?>
                        <a href="/dashboard/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Dashboard
                        </a>
                    <?php } ?>
                    <a href="https://discord.gg/KhuBwxnRsx" target="_blank" class="text-sm font-semibold text-white">
                        Discord server <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="float-right w-44 h-44 text-indigo-600">
                    <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 01-.134 1.051 2.494 2.494 0 00-.93 2.437 2.494 2.494 0 002.437-.93.75.75 0 111.186.918 3.995 3.995 0 01-4.482 1.332.75.75 0 01-.461-.461 3.994 3.994 0 011.332-4.482.75.75 0 011.052.134z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 008 14.248v4.002c0 .414.336.75.75.75a5 5 0 004.797-6.414 12.984 12.984 0 005.45-10.848.75.75 0 00-.735-.735 12.984 12.984 0 00-10.849 5.45A5 5 0 001 11.25c.001.414.337.75.751.75h4.002zM13 9a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="mt-10 w-1/3 mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
            <div class="bg-indigo-900/[.3] border border-indigo-600/75 p-3 rounded shadow">
                <h2 class="text-2xl font-medium leading-7 text-white sm:truncate sm:text-2xl sm:tracking-tight"><?php echo $user_num; ?></h2>
                <div class="mt-2 flex items-center text-sm text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400">
                        <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                    </svg>
                    Users
                </div>
            </div>
            <div class="bg-indigo-900/[.3] border border-indigo-600/75 p-3 rounded shadow">
                <h2 class="text-2xl font-medium leading-7 text-white sm:truncate sm:text-2xl sm:tracking-tight">
                    <?php
                    while ($row = mysqli_fetch_array($total_views)) { 
                        echo $row["profileviewcount"];
                    }
                    ?>
                </h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400">
                            <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                            <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        Total views
                    </div>
                </div>
            </div>
            <div class="bg-indigo-900/[.3] border border-indigo-600/75 p-3 rounded shadow">
                <h2 class="text-2xl font-medium leading-7 text-white sm:truncate sm:text-2xl sm:tracking-tight"><?php echo $latest_mem; ?></h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400">
                            <path d="M11 5a3 3 0 11-6 0 3 3 0 016 0zM2.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 018 18a9.953 9.953 0 01-5.385-1.572zM16.25 5.75a.75.75 0 00-1.5 0v2h-2a.75.75 0 000 1.5h2v2a.75.75 0 001.5 0v-2h2a.75.75 0 000-1.5h-2v-2z" />
                        </svg>
                        Recent user
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>