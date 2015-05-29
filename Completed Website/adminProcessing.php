<?php session_start();
error_reporting(E_ALL);
include("dbconnect.php");

/* ----- LOGGING IN ----- */

if(!isset($_SESSION['username'])){
    if(isset($_POST['username'])){
        $sql = "SELECT * FROM users WHERE username='$_POST[username]'";
        foreach ($dbh->query($sql) as $row) {
            $username = $row['username'];
            $password = $row['password'];
            $accessLvl = $row['accessLvl'];
            }
        } else {
            echo "Error<br>";
            echo '<a href="admin.php">Return</a>';
        }
        if($_POST['username'] == $username){
            if(isset($_POST['password'])) {
                if($_POST['password'] == $password){
                    $_SESSION['username'] = $username;
                    $_SESSION['accessLvl'] = $accessLvl;
                    session_regenerate_id();
                    header("Location: admin.php");
                    exit();
                }
            }
        }

} else {

    if ($_POST['submit'] == "Add User Bulletin") {
        $sql = "INSERT INTO bulletins (bulletinDate, bulletinTitle, bulletinDescription, bulletinFooter, bulletinCreator)
        VALUES ('$_POST[bulletinDate]','$_POST[bulletinTitle]', '$_POST[bulletinDescription]', '$_POST[bulletinFooter]', '$_SESSION[username]')";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Add Bulletin") {
        $sql = "INSERT INTO bulletins (bulletinDate, bulletinTitle, bulletinDescription, bulletinFooter)
        VALUES ('$_POST[bulletinDate]','$_POST[bulletinTitle]', '$_POST[bulletinDescription]', '$_POST[bulletinFooter]')";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Add Musician") {
        echo "test";
        $sql = "INSERT INTO musicians (musicianName, musicianImg, musicianDescription, musicianContact)
        VALUES ('$_POST[musicianName]','$_POST[musicianImg]', '$_POST[musicianDescription]', '$_POST[musicianContact]')";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Add Event") {
        $sql = "INSERT INTO events (eventDate, eventTitle, eventDescription, eventImg)
        VALUES ('$_POST[eventDate]','$_POST[eventTitle]', '$_POST[eventDescription]', '$_POST[eventImg]')";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Add User") {
        $sql = "INSERT INTO users (username, password, accessLvl)
        VALUES ('$_POST[username]','$_POST[password]', '$_POST[accessLvl]')";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Update Bulletin") {
        echo"test";
        $sql = "UPDATE bulletins SET bulletinDate = '$_POST[bulletinDate]', bulletinTitle = '$_POST[bulletinTitle]', bulletinDescription = '$_POST[bulletinDescription]', bulletinFooter = '$_POST[bulletinFooter]' WHERE bulletinID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Update Musician") {
        echo"test";
        $sql = "UPDATE musicians SET musicianName = '$_POST[musicianName]', musicianImg = '$_POST[musicianImg]', musicianDescription = '$_POST[musicianDescription]', musicianContact = '$_POST[musicianContact]' WHERE musicianID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Update Event") {
        echo"test";
        $sql = "UPDATE events SET eventDate = '$_POST[eventDate]', eventTitle = '$_POST[eventTitle]', eventDescription = '$_POST[eventDescription]', eventImg = '$_POST[eventImg]' WHERE eventID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Update User") {
        echo"test";
        $sql = "UPDATE users SET username = '$_POST[username]', password = '$_POST[password]', accessLvl = '$_POST[accessLvl]' WHERE id = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Delete Bulletin") {
        echo"test";
        $sql = "DELETE FROM bulletins WHERE bulletinID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Delete Musician") {
        echo"test";
        $sql = "DELETE FROM musicians WHERE musicianID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Delete Event") {
        echo"test";
        $sql = "DELETE FROM events WHERE eventID = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    } else if ($_POST['submit'] == "Delete User") {
        echo"test";
        $sql = "DELETE FROM users WHERE id = '$_POST[ID]'";
        if ($dbh->exec($sql)) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error";
            echo '<a href="admin.php">Return</a>';
        }
    }

    /* ---- Logging Out ----- */

    if(isset($_POST['logOut'])){
        unset($_SESSION['username']);
        session_destroy();
        header("Location: admin.php");
        exit();
    }



}





