<?php
require_once('server/connect.php');
require_once('server/query.php');
// Initialize the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Check if the user is admin
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] == 0) {
    header( 'HTTP/1.0 403 Forbidden');
    exit;
}

// Check if user is banned
if ($_SESSION["banned"] == 1) {
    header("location: login.php");
    exit;
}

function initials($str) {
    $ret = '';
    foreach (explode(' ', $str) as $word)
        $ret .= strtoupper($word[0]);
    return $ret;
}

// tabs
$tab = 'components/admintabs/userlist.php';
$tabTitle = 'Users';

if (isset($_GET['users'])) {
    $tab = 'components/admintabs/userlist.php';
    $tabTitle = 'Users';
}
if (isset($_GET['invites'])) {
    $tab = 'components/admintabs/invites.php';
    $tabTitle = 'Invites';
}

// time ago
function timeago($dat3e) {
	$timestamp = $dat3e;
	   
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		    $diff = $diff / $length[$i];
	    }

		$diff = round($diff);
		return "" . $diff . " " . $strTime[$i] . "(s) ago";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
</head>
<body class="bg-gray-800">
    <?php require_once('components/navbar.php'); ?>

    <main class="min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <p class="text-gray-400">Dashboard / Admin panel / <b><?php echo $tabTitle ?></b></p>
        </div>
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <nav class="nav nav-tabs flex flex-col md:flex-row flex-wrap gap-2" id="tabs-tab">
                <button onclick="window.location='?users'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Users') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Users
                </button>
                <button onclick="window.location='?invites'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Invites') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Invites
                </button>
            </nav>
        </div>
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <?php require_once($tab); ?>
        </div>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>