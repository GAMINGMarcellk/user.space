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

// tabs
$tab = 'components/managepagetabs/profile.php';
$tabTitle = 'Profile';

if (isset($_GET['profile'])) {
    $tab = 'components/managepagetabs/profile.php';
    $tabTitle = 'Profile';
}
if (isset($_GET['links'])) {
    $tab = 'components/managepagetabs/links.php';
    $tabTitle = 'Links';
}
if (isset($_GET['socials'])) {
    $tab = 'components/managepagetabs/socials.php';
    $tabTitle = 'Socials';
}
if (isset($_GET['stats'])) {
    $tab = 'components/managepagetabs/stats.php';
    $tabTitle = 'Stats';
}

// update avatar
$msg7 = "";
$classes7 = "";
if (isset($_POST["updateAvatarURL"])) {
    $avurl = $_POST["avatarurl"];

    mysqli_query($mysqli, "UPDATE `users` SET `avatar`='$avurl' WHERE id=" . $_SESSION["id"]);
    
    $msg7 = "Settings saved successfully!";
    $classes7 = "border-green-500 text-green-500";
}

// update banner
$msg8 = "";
$classes8 = "";
if (isset($_POST["updateBannerURL"])) {
    $banurl = $_POST["bannerurl"];

    mysqli_query($mysqli, "UPDATE `users` SET `banner`='$banurl' WHERE id=" . $_SESSION["id"]);
    
    $msg8 = "Settings saved successfully!";
    $classes8 = "border-green-500 text-green-500";
}

// update username
$msg6 = "";
$classes6 = "";
if (isset($_POST["updateUsername"])) {
    $newusername = $_POST["username"];

    $fdfdf = $newusername;
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$fdfdf]); 
    $isusertaken = $stmt->fetch();

    if ($isusertaken) {
        $msg6 = "User is already taken!";
        $classes6 = "border-red-500 text-red-500";
    } else {
        mysqli_query($mysqli, "UPDATE `users` SET `username`='$newusername' WHERE id=" . $_SESSION["id"]);

        $msg6 = "Settings saved successfully!";
        $classes6 = "border-green-500 text-green-500";
    }
}

// update page url
$msg5 = "";
$classes5 = "";
if (isset($_POST["updatePageURL"])) {
    $newpageurl = $_POST["pageurl"];

    $ddd = $newpageurl;
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE pageurl=?");
    $stmt->execute([$ddd]); 
    $isurltaken = $stmt->fetch();

    if ($isurltaken) {
        $msg5 = "URL already taken!";
        $classes5 = "border-red-500 text-red-500";
    } else {
        mysqli_query($mysqli, "UPDATE `users` SET `pageurl`='$newpageurl' WHERE id=" . $_SESSION["id"]);

        $msg5 = "Settings saved successfully!";
        $classes5 = "border-green-500 text-green-500";
    }
}

// update bio
$msg4 = "";
$classes4 = "";
if (isset($_POST["updateBio"])) {
    $biotext = $_POST["bio"];

    mysqli_query($mysqli, "UPDATE `users` SET `bio`='$biotext' WHERE id=" . $_SESSION["id"]);
    
    $msg4 = "Settings saved successfully!";
    $classes4 = "border-green-500 text-green-500";
}

// update discord id
$msg3 = "";
$classes3 = "";
if (isset($_POST["updateC99DiscordID"])) {
    $discorduid = $_POST["discordid"];

    mysqli_query($mysqli, "UPDATE `users` SET `c99discordid`='$discorduid' WHERE id=" . $_SESSION["id"]);
    
    $msg3 = "Settings saved successfully!";
    $classes3 = "border-green-500 text-green-500";
}

// update spotify id
$msg2 = "";
$classes2 = "";
if (isset($_POST["updateSpotifyTrackID"])) {
    $trackid = $_POST["spotifytrackid"];

    mysqli_query($mysqli, "UPDATE `users` SET `spotifytrackid`='$trackid' WHERE id=" . $_SESSION["id"]);
    
    $msg2 = "Settings saved successfully!";
    $classes2 = "border-green-500 text-green-500";
}

// update social links
$msg = "";
$classes = "";
if (isset($_POST["updateSocials"])) {
    $twitter = $_POST["twitter"];
    $youtube = $_POST["youtube"];
    $steam = $_POST["steam"];
    $discord = $_POST["discord"];
    $github = $_POST["github"];
    $telegram = $_POST["telegram"];
    $breachedforums = $_POST["breachedforums"];

    mysqli_query($mysqli, "UPDATE `users` SET `twitter`='$twitter' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `youtube`='$youtube' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `steam`='$steam' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `discord`='$discord' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `github`='$github' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `telegram`='$telegram' WHERE id=" . $_SESSION["id"]);
    mysqli_query($mysqli, "UPDATE `users` SET `breachedforums`='$breachedforums' WHERE id=" . $_SESSION["id"]);
    
    $msg = "Settings saved successfully!";
    $classes = "border-green-500 text-green-500";
}

// updatecustomlinks
$msgg = "";
$classess = "";
if (isset($_POST["updatecustomlinks"])) {
    $u = $_SESSION["id"];
    $lt = $_POST["insertcustomurltitle"];
    $l = $_POST["insertcustomurllink"];

    mysqli_query($mysqli, "INSERT INTO customlinks (userid, linktitle, link) VALUES ('{$u}', '{$lt}', '{$l}')");

    $msgg = "Created link successfully!";
    $classess = "border-green-500 text-green-500";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage</title>
</head>
<body class="bg-gray-800">
    <?php require_once('components/navbar.php'); ?>

    <main class="min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <p class="text-gray-400">Dashboard / Manage / <b><?php echo $tabTitle ?></b></p>
        </div>
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <nav class="nav nav-tabs flex flex-col md:flex-row flex-wrap gap-2" id="tabs-tab">
                <button onclick="window.location='?profile'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Profile') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Profile
                </button>
                <button onclick="window.location='?links'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Links') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Links
                </button>
                <button onclick="window.location='?socials'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Socials') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Socials
                </button>
                <button onclick="window.location='?stats'" class="group relative flex justify-center rounded-md border border-transparent <?php echo ($tabTitle == 'Stats') ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-indigo-600 hover:bg-indigo-700'; ?> py-2 px-4 text-sm font-medium text-white">
                    Stats
                </button>
            </nav>
        </div>
        <div class="w-7/12 mx-auto grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 pt-6 gap-8">
            <?php require_once($tab); ?>
        </div>
    </main>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>