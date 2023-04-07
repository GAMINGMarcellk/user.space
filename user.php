<?php
require_once('dashboard/server/connect.php');
require_once('dashboard/server/query.php');

// Initialize the session
session_start();

if (isset($_GET["pageurl"])) {
    if ($_GET["pageurl"] != isset($_SESSION["pageurl"])) {
        $uuuu = $_GET["pageurl"];
        mysqli_query($mysqli, "UPDATE users SET profileviewcount = profileviewcount + 1 WHERE pageurl = '{$uuuu}'");
    }

    $sql = "SELECT * FROM users WHERE pageurl = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $user);
        $user = $_GET['pageurl'];
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hash_password, $banner, $bio, $admin, $pageurl, $active, $banned, $created_at, $verified, $inject, $ip, $avatar, $profileviewcount, $twitter, $youtube, $steam, $discord, $github, $spotifytrackid, $c99discordid, $telegram, $breachedforums);
                $stmt->fetch();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
}

function initials($str) {
    $ret = '';
    foreach (explode(' ', $str) as $word)
        $ret .= strtoupper($word[0]);
    return $ret;
}

if (!$pageurl) {
    header("location: 404.php");
}

$custom_links = mysqli_query($mysqli, "SELECT * FROM `customlinks` WHERE userid='{$id}'");
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@<?php echo htmlspecialchars($pageurl); ?></title>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@<?php echo htmlspecialchars($pageurl); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($bio); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($avatar); ?>" />
</head>
<body class="bg-gray-800"
      <?php if ($banner != "") { ?>
        style="background: url(<?php echo htmlspecialchars($banner); ?>)!important;background-size:cover!important;background-position:center!important;"
      <?php } ?>
    >
    <?php if (isset($_SESSION["loggedin"]) == true && $_SESSION["username"] == $username) { ?>
        <div class="flex absolute bottom-4 left-4">
            <div class="flex items-center justify-center text-xs font-medium text-indigo-600 bg-black rounded-full bg-opacity-90">
                <a class="flex items-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" href="/dashboard/manage.php">
                    <span aria-hidden="true" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                        </svg>
                    </span>
                    Edit
                </a>
            </div>
        </div>
    <?php } ?>
    <div class="flex absolute bottom-4 right-4">
        <div class="flex items-center justify-center text-xs font-medium text-indigo-600 rounded-full bg-opacity-90">
            <a class="flex items-center z-20 justify-center max-w-lg px-3 py-2 rounded-full border border-indigo-600" href="/">
                Made with user.space
            </a>
        </div>
    </div>
    <main class="flex flex-col h-screen w-screen justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-900 p-3 my-20 w-11/12 max-w-lg rounded shadow mb-3">
            <div class="mb-3">
                <div class="flex flex-row">
                    <div class="relative">
                        <?php if ($avatar != "") { ?>
                            <img src="<?php echo $avatar; ?>" class="h-16 w-16 rounded-full object-cover shadow mr-5">
                        <?php } else { ?>
                            <div class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 shadow mr-3">
                                <span class="font-medium text-2xl text-gray-600 dark:text-gray-300"><?php echo initials(htmlspecialchars($username)); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                        <div class="relative flex w-full justify-between flex-row">
                            <div class="flex flex-col justfiy-center">
                                <div class="flex flex-row items-center">
                                    <span class="flex text-2xl leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                                        <?php echo htmlspecialchars($username); ?>
                                    </span>
                                    <?php if ($verified == 1) { ?>
                                        <div class="mt-2" data-tooltip-target="tooltip-top" data-tooltip-placement="top">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="ml-1 w-5 h-5 text-indigo-600">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div id="tooltip-top" role="tooltip" class="tooltip absolute z-10 inline-block bg-gray-700 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 invisible" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(918px, 449px, 0px);">
                                                Verified
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="flex text-gray-400">@<?php echo htmlspecialchars($pageurl); ?></div>
                            </div>
                            <?php if ($admin == 1) { ?>
                                <div class="flex flex-col max-w-[200px] items-end">
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <div class="flex select-none flex-row px-2 py-1 space-x-1 rounded-full justify-center items-center border border-indigo-600">
                                            <span class="w-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-indigo-600">
                                                    <path fill-rule="evenodd" d="M10.339 2.237a.532.532 0 00-.678 0 11.947 11.947 0 01-7.078 2.75.5.5 0 00-.479.425A12.11 12.11 0 002 7c0 5.163 3.26 9.564 7.834 11.257a.48.48 0 00.332 0C14.74 16.564 18 12.163 18 7.001c0-.54-.035-1.07-.104-1.59a.5.5 0 00-.48-.425 11.947 11.947 0 01-7.077-2.75zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="text-xs text-indigo-600">Admin</span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <div class="p-1.5">
                <p class="whitespace-pre-line text-gray-400"><?php echo htmlspecialchars($bio); ?></p>
                <div class="flex flex-row gap-2 mt-1.5 justify-center items-center">
                    <?php if ($twitter != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom5" data-tooltip-placement="bottom">
                                <a href="https://twitter.com/<?php echo htmlspecialchars($twitter); ?>/" target="_blank" class="mt-2">
                                    <svg class="h-6 transition-all text-blue-400 fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom5" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Twitter
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($youtube != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom6" data-tooltip-placement="bottom">
                                <a href="https://www.youtube.com/@<?php echo htmlspecialchars($youtube); ?>/" target="_blank" class="mt-2">
                                    <svg class="h-6 fill-current text-red-500" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom6" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    YouTube
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($steam != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom">
                                <a href="https://steamcommunity.com/id/<?php echo htmlspecialchars($steam); ?>/" target="_blank" class="mt-2">
                                    <svg class="h-6 text-black dark:text-gray-200 transition-all fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.979 0C5.678 0 .511 4.86.022 11.037l6.432 2.658c.545-.371 1.203-.59 1.912-.59.063 0 .125.004.188.006l2.861-4.142V8.91c0-2.495 2.028-4.524 4.524-4.524 2.494 0 4.524 2.031 4.524 4.527s-2.03 4.525-4.524 4.525h-.105l-4.076 2.911c0 .052.004.105.004.159 0 1.875-1.515 3.396-3.39 3.396-1.635 0-3.016-1.173-3.331-2.727L.436 15.27C1.862 20.307 6.486 24 11.979 24c6.627 0 11.999-5.373 11.999-12S18.605 0 11.979 0zM7.54 18.21l-1.473-.61c.262.543.714.999 1.314 1.25 1.297.539 2.793-.076 3.332-1.375.263-.63.264-1.319.005-1.949s-.75-1.121-1.377-1.383c-.624-.26-1.29-.249-1.878-.03l1.523.63c.956.4 1.409 1.5 1.009 2.455-.397.957-1.497 1.41-2.454 1.012H7.54zm11.415-9.303c0-1.662-1.353-3.015-3.015-3.015-1.665 0-3.015 1.353-3.015 3.015 0 1.665 1.35 3.015 3.015 3.015 1.663 0 3.015-1.35 3.015-3.015zm-5.273-.005c0-1.252 1.013-2.266 2.265-2.266 1.249 0 2.266 1.014 2.266 2.266 0 1.251-1.017 2.265-2.266 2.265-1.253 0-2.265-1.014-2.265-2.265z"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Steam
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($discord != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom2" data-tooltip-placement="bottom">
                                <a href="https://discord.gg/<?php echo htmlspecialchars($discord); ?>" target="_blank" class="mt-2">
                                    <svg class="fill-current text-indigo-500 h-6" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Discord
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($github != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom3" data-tooltip-placement="bottom">
                                <a href="https://github.com/<?php echo htmlspecialchars($github); ?>/" target="_blank" class="mt-2">
                                    <svg class="h-6 transition-all text-black dark:text-gray-200 fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom3" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Github
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($telegram != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom4" data-tooltip-placement="bottom">
                                <a href="https://t.me/<?php echo htmlspecialchars($telegram); ?>/" target="_blank" class="mt-2">
                                    <svg class="h-6 w-6" width="65" height="60" viewBox="0 0 240.1 240.1" enable-background="new 0 0 240.1 240.1">
                                        <g id="Artboard">
                                            <linearGradient id="Oval_1_" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="50" y2="50" gradientTransform="rotate(90) translate(-0.15, -0.5)">
                                                <stop offset="0" style="stop-color: rgb(42, 171, 238);"></stop>
                                                <stop offset="1" style="stop-color: rgb(34, 158, 217);"></stop>
                                            </linearGradient>
                                            <circle id="Oval" fill-rule="evenodd" clip-rule="evenodd" fill="url(#Oval_1_)" cx="120.1" cy="120.1" r="120.1"></circle>
                                            <path id="Path-3" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M54.3,118.8c35-15.2,58.3-25.3,70-30.2 c33.3-13.9,40.3-16.3,44.8-16.4c1,0,3.2,0.2,4.7,1.4c1.2,1,1.5,2.3,1.7,3.3s0.4,3.1,0.2,4.7c-1.8,19-9.6,65.1-13.6,86.3 c-1.7,9-5,12-8.2,12.3c-7,0.6-12.3-4.6-19-9c-10.6-6.9-16.5-11.2-26.8-18c-11.9-7.8-4.2-12.1,2.6-19.1c1.8-1.8,32.5-29.8,33.1-32.3 c0.1-0.3,0.1-1.5-0.6-2.1c-0.7-0.6-1.7-0.4-2.5-0.2c-1.1,0.2-17.9,11.4-50.6,33.5c-4.8,3.3-9.1,4.9-13,4.8 c-4.3-0.1-12.5-2.4-18.7-4.4c-7.5-2.4-13.5-3.7-13-7.9C45.7,123.3,48.7,121.1,54.3,118.8z"></path>
                                        </g>
                                    </svg>
                                </a>
                                <div id="tooltip-bottom4" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Telegram
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($breachedforums != "") { ?>
                        <div>
                            <div class="flex flex-row flex-wrap" data-tooltip-target="tooltip-bottom7" data-tooltip-placement="bottom">
                                <a href="https://breached.vc/User-<?php echo htmlspecialchars($breachedforums); ?>" target="_blank" class="mt-2">
                                    <img src="https://cdn.breached.vc/logo.png" class="h-6 w-6 select-none">
                                </a>
                                <div id="tooltip-bottom7" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    BreachedForums
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($c99discordid != "") { ?>
            <div class="bg-gray-900 p-3 w-11/12 max-w-lg rounded shadow mb-3">
                <div class="flex justify-center items-center">
                    <a href="https://discordid.netlify.app/?id=<?php echo htmlspecialchars($c99discordid); ?>" target="_blank">
                        <img src="https://discord.c99.nl/widget/theme-4/<?php echo htmlspecialchars($c99discordid); ?>.png" style="width: 100%;">
                    </a>
                </div>
            </div>
        <?php } ?>
        <?php if ($spotifytrackid != "") { ?>
            <div class="bg-gray-900 p-3 w-11/12 max-w-lg rounded shadow mb-3">
                <div class="flex justify-center items-center">
                    <iframe style="width: 100%;" class="rounded-md w-full sm:w-3/6" src="https://open.spotify.com/embed/track/<?php echo htmlspecialchars($spotifytrackid); ?>?utm_source=generator" height="80" frameborder="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture;">
                    </iframe>
                </div>
            </div>
        <?php } ?>
        <?php while ($r = mysqli_fetch_array($custom_links)) { ?>
            <div class="bg-gray-900 p-3 w-11/12 max-w-lg rounded shadow text-gray-400 mb-1 text-sm shadow cursor-pointer transition-all group">
                <a href="https://<?php echo htmlspecialchars($r["link"]) ?>" target="_blank" rel="noopener noreferrer nofollow" class="w-full transition-all">
                    <div>
                        <span class="relative flex flex-row justify-between items-center rounded bg-gray-900 w-full text-sm leading-tight">
                            <div class="flex items-center justify-center">
                                <div class="h-16 w-16 rounded bg-gray-800 bg-opacity-50 flex items-center justify-center">
                                    <img class="rounded" src="https://www.google.com/s2/favicons?domain=<?php echo htmlspecialchars($r["link"]) ?>&amp;sz=24">
                                </div>
                                <div class="flex flex-col mx-4">
                                    <span title="<?php echo htmlspecialchars($r["linktitle"]) ?>" class="text-[16px] text-gray-400"><?php echo htmlspecialchars($r["linktitle"]) ?></span>
                                    <span title="https://<?php echo htmlspecialchars($r["link"]) ?>" class="text-[14px] mt-1 text-gray-700 whitespace-nowrap truncate w-[175px] xs:w-[220px] sm:w-[275px] md:w-[340px] lg:w-[400px]"><?php echo htmlspecialchars($r["link"]) ?></span>
                                </div>
                            </div>
                            <span class="text-gray-600 transition-all absolute right-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-8 h-4">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>
                    </div>
                </a>
            </div>
        <?php } ?>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.bundle.js"></script>
</html>