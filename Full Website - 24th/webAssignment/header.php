<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
<div class="container">
    <div class="menuBar">
        <nav>
            <ul>
                <img src="images/headerLogos.gif" id="headerLogo1">
                <li <?php if($current == 'home') {echo 'class="current"';} ?>><a href="home.php">Home</a></li>
                <li <?php if($current == 'events') {echo 'class="current"';} ?>><a href="events.php">Events</a></li>
                <li <?php if($current == 'bulletins') {echo 'class="current"';} ?>><a href="bulletins.php">Bulletins</a></li>
                <li <?php if($current == 'musicians') {echo 'class="current"';} ?>><a href="musicians.php">Musicians</a></li>
                <li <?php if($current == 'members') {echo 'class="current"';} ?>><a href="members.php">Members</a></li>
                <li <?php if($current == 'aboutus') {echo 'class="current"';} ?>><a href="aboutus.php">About Us</a></li>
                <li <?php if($current == 'admin') {echo 'class="current"';} ?>><a href="admin.php">Admin</a></li>
            </ul>

        </nav>
    </div>