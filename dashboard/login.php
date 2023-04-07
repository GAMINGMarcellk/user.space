<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /dashboard/");
    exit;
}

// Include config file
require_once('server/connect.php');

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {

                    // Bind result variables
                    $stmt->bind_result($id, $username, $hash_password, $banner, $bio, $admin, $pageurl, $active, $banned, $created_at, $verified, $inject, $ip, $avatar, $profileviewcount, $twitter, $youtube, $steam, $discord, $github, $spotifytrackid, $c99discordid, $telegram, $breachedforums);
                    if ($stmt->fetch()) {
                        //$decode = base64_decode($base64_password);
                        if (password_verify($password, $hash_password)) {

                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["banner"] = $banner;
                            $_SESSION["bio"] = $bio;
                            $_SESSION["admin"] = $admin;
                            $_SESSION["pageurl"] = $pageurl;
                            $_SESSION["active"] = $active;
                            $_SESSION["banned"] = $banned;
                            $_SESSION["created_at"] = $created_at;
                            $_SESSION["verified"] = $verified;
                            $_SESSION["inject"] = $inject;
                            $_SESSION["ip"] = $ip;
                            $_SESSION["avatar"] = $avatar;
                            $_SESSION["profileviewcount"] = $profileviewcount;
                            $_SESSION["steam"] = $steam;
                            $_SESSION["twitter"] = $twitter;
                            $_SESSION["youtube"] = $youtube;
                            $_SESSION["discord"] = $discord;
                            $_SESSION["github"] = $github;
                            $_SESSION["spotifytrackid"] = $spotifytrackid;
                            $_SESSION["c99discordid"] = $c99discordid;
                            $_SESSION["telegram"] = $telegram;
                            $_SESSION["breachedforums"] = $breachedforums;

                            // Redirect user to welcome page
                            header("location: /dashboard/");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body class="bg-gray-800">
    <div class="flex h-screen w-screen justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-left text-3xl font-bold tracking-tight text-white">Login</h2>
                <p class="mt-2 text-left text-sm text-gray-400">
                    Welcome back!
                </p>
            </div>
            <form class="mt-8 space-y-6" action="login.php" method="POST">
                <div class="-space-y-px rounded shadow-sm">
                    <div class="mb-2">
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="username" autocomplete="username" required class="bg-gray-900 relative block w-full appearance-none rounded rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Username">
                        <p class="text-red-500 text-xs"><?php echo htmlspecialchars($username_err); ?></p>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="password" required class="bg-gray-900 relative block w-full appearance-none rounded rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                        <p class="text-red-500 text-xs"><?php echo htmlspecialchars($password_err); ?></p>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 mr-2">
                            Don't have an account?
                        </p>
                        <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">Register</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>