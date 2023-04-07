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
    <title>dashboard</title>
</head>
<body class="bg-gray-800">
    <?php require_once('components/navbar.php'); ?>

    <main class="min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pt-6 gap-8">
            <p class="text-gray-400">Dashboard / <b>Home</b></p>
        </div>
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <div class="bg-gray-900 p-3 rounded shadow">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Recent updates</h2>
            </div>
        </div>
        <?php while ($row = mysqli_fetch_array($recent_updates)) { ?>
            <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
                <div class="bg-gray-900 p-3 rounded shadow">
                    <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight"><?php echo htmlspecialchars($row["title"]); ?> <span class="text-gray-400">(v<?php echo htmlspecialchars($row["version"]); ?>)</span></h2>
                    <p class="mb-2 items-center text-xs text-gray-400">Posted <?php echo htmlspecialchars(timeago(strtotime($row["date"]))); ?> by <?php echo htmlspecialchars($row["user"]); ?></p>
                    <p class="mt-2 flex items-center text-sm text-gray-400">
                        <p class="whitespace-pre-line text-gray-400"><?php echo htmlspecialchars($row["message"]); ?></p>
                    </p>
                </div>
            </div>
        <?php } ?>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>