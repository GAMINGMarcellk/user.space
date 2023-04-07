<?php
    // Get num of users
    $user_num_query = mysqli_query($mysqli, "SELECT count(1) FROM `users`");
    $user_num_row = mysqli_fetch_row($user_num_query);
    $user_num = $user_num_row[0];

    // Get toatal views
    $total_views = mysqli_query($mysqli, "SELECT sum(profileviewcount) `profileviewcount` FROM `users`");

    // Get latest member
    $latest_mem_query = mysqli_query($mysqli, "SELECT `username` FROM `users` WHERE id = (SELECT MAX(id) FROM `users`)");
    $latest_mem_row = mysqli_fetch_row($latest_mem_query);
    $latest_mem = $latest_mem_row[0];


    // Get recent updates
    $recent_updates = mysqli_query($mysqli, "SELECT * FROM `recentupdates` ORDER BY date DESC");
?>