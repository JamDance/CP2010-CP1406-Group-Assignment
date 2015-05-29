<?php session_start();
    include("dbconnect.php");
    $pageTitle = "TCMC - Admin";
    $current = "admin";
    include("header.php");
    error_reporting(E_ALL);
?>

    <div class="content">
        <?php

        if(!isset($_SESSION['username'])) {
            $sectionHeader = "Log In";
            include("sectionHeader.php");
            ?>
            <form name="logIn" method="post" action="adminProcessing.php">
                <label src="email">Email: </label>
                <textarea name="username" id="username"></textarea>
                <label src="password">Password: </label>
                <textarea name="password" id="password"></textarea>
                <input type="submit" class="logInSubmit">
            </form>
        <?php } else {

            if ($_SESSION['accessLvl'] > 0){
                $sectionHeader = "Edit Bulletins";
                include("sectionHeader.php");
                if ($_SESSION['accessLvl'] == 1) { ?>
                    <div class="adminTables">
                        <form name="addUserBulletin" id="addUserBulletin" method="post" action="adminProcessing.php">
                            <label for="bulletinDate">Date: </label><textarea name="bulletinDate" id="bulletinDate"></textarea>
                            <label for="bulletinTitle">Title: </label><textarea name="bulletinTitle" id="bulletinTitle"></textarea><br>
                            <label for="bulletinDescription">Description: </label><textarea class="descriptionBox" name="bulletinDescription" id="bulletinDescription"></textarea><br>
                            <label for="bulletinFooter">Footer: </label><textarea class="footerBox" name="bulletinFooter" id="bulletinFooter"></textarea>
                            <input type="submit" name="submit" value="Add User Bulletin">
                        </form>
                    </div>
                    <?php
                    $sql = "SELECT * FROM bulletins WHERE bulletinCreator='$_SESSION[username]'";
                    foreach ($dbh->query($sql) as $row){
                        if($row != null) { ?>
                            <div class="adminTables">
                                <form name="editBulletin" id="editBulletin" method="post" action="adminProcessing.php">
                                    <label for="bulletinDate">Date: </label><textarea name="bulletinDate" id="bulletinDate"><?php echo $row['bulletinDate']; ?></textarea>
                                    <label for="bulletinTitle">Title: </label><textarea name="bulletinTitle" id="bulletinTitle"><?php echo $row['bulletinTitle']; ?></textarea><br>
                                    <label for="bulletinDescription">Description: </label><textarea class="descriptionBox" name="bulletinDescription" id="bulletinDescription"><?php echo $row['bulletinDescription']; ?></textarea><br>
                                    <label for="bulletinFooter">Footer: </label><textarea class="footerBox" name="bulletinFooter" id="bulletinFooter"><?php echo $row['bulletinFooter']; ?></textarea>
                                    <input type="submit" name="submit" value="Update Bulletin">
                                    <input type="submit" name="submit" value="Delete Bulletin">
                                    <input type="hidden" name="ID" value="<?php echo $row['bulletinID']; ?>">
                                </form>
                            </div>

                        <?php }
                    }

                } else { ?>
                <div class="adminTables">
                        <form name="addBulletin" id="addBulletin" method="post" action="adminProcessing.php">
                            <label for="bulletinDate">Date: </label><textarea name="bulletinDate" id="bulletinDate"></textarea>
                            <label for="bulletinTitle">Title: </label><textarea name="bulletinTitle" id="bulletinTitle"></textarea><br>
                            <label for="bulletinDescription">Description: </label><textarea class="descriptionBox" name="bulletinDescription" id="bulletinDescription"></textarea><br>
                            <label for="bulletinFooter">Footer: </label><textarea class="footerBox" name="bulletinFooter" id="bulletinFooter"></textarea>
                            <input type="submit" name="submit" value="Add Bulletin">
                        </form>
                    </div>
                <?php
                $sql = "SELECT * FROM bulletins";
                foreach ($dbh->query($sql) as $row) { ?>
                    <div class="adminTables">
                        <form name="editBulletin" id="editBulletin" method="post" action="adminProcessing.php">
                            <label for="bulletinDate">Date: </label><textarea name="bulletinDate" id="bulletinDate"><?php echo $row['bulletinDate']; ?></textarea>
                            <label for="bulletinTitle">Title: </label><textarea name="bulletinTitle" id="bulletinTitle"><?php echo $row['bulletinTitle']; ?></textarea><br>
                            <label for="bulletinDescription">Description: </label><textarea class="descriptionBox" name="bulletinDescription" id="bulletinDescription"><?php echo $row['bulletinDescription']; ?></textarea><br>
                            <label for="bulletinFooter">Footer: </label><textarea class="footerBox" name="bulletinFooter" id="bulletinFooter"><?php echo $row['bulletinFooter']; ?></textarea>
                            <input type="submit" name="submit" value="Update Bulletin">
                            <input type="submit" name="submit" value="Delete Bulletin">
                            <input type="hidden" name="ID" value="<?php echo $row['bulletinID']; ?>">
                        </form>
                    </div>
                    <?php }
                }
            }

            if ($_SESSION['accessLvl'] > 1){
                $sectionHeader = "Edit Musicians";
                include("sectionHeader.php"); ?>
                <div class="adminTables">
                    <form name="addMusician" id="addMusician" method="post" action="adminProcessing.php">
                        <label for="musicianName">Name: </label><textarea name="musicianName" id="musicianName"></textarea>
                        <label for="musicianImg">Image: </label><textarea name="musicianImg" id="musicianImg"></textarea><br>
                        <label for="musicianDescription">Description: </label><textarea class="descriptionBox" name="musicianDescription" id="musicianDescription"></textarea><br>
                        <label for="musicianContact">Contact: </label><textarea class="footerBox" name="musicianContact" id="musicianContact"></textarea>
                        <input type="submit" name="submit" value="Add Musician">
                    </form>
                </div>

                <?php
                $sql = "SELECT * FROM musicians";
                foreach ($dbh->query($sql) as $row) { ?>
                    <div class="adminTables">
                        <form name="editMusicians" id="editMusicians" method="post" action="adminProcessing.php">
                            <label for="musicianName">Name: </label><textarea name="musicianName" id="musicianName"><?php echo $row['musicianName']; ?></textarea>
                            <label for="musicianImg">Image: </label><textarea name="musicianImg" id="musicianImg"><?php echo $row['musicianImg']; ?></textarea><br>
                            <label for="musicianDescription">Description: </label><textarea class="descriptionBox" name="musicianDescription" id="musicianDescription"><?php echo $row['musicianDescription']; ?></textarea><br>
                            <label for="musicianContact">Contact: </label><textarea class="footerBox" name="musicianContact" id="musicianContact"><?php echo $row['musicianContact']; ?></textarea>
                            <input type="submit" name="submit" value="Update Musician">
                            <input type="submit" name="submit" value="Delete Musician">
                            <input type="hidden" name="ID" value="<?php echo $row['musicianID']; ?>">
                        </form>
                    </div>
                <?php }

            }

            if ($_SESSION['accessLvl'] > 2){
                $sectionHeader = "Edit Events";
                include("sectionHeader.php"); ?>
                <div class="adminTables">
                    <form name="addEvent" id="addEvent" method="post" action="adminProcessing.php">
                        <label for="eventDate">Date: </label><textarea name="eventDate" id="eventDate"></textarea>
                        <label for="eventTitle">Title: </label><textarea name="eventTitle" id="eventTitle"></textarea><br>
                        <label for="eventDescription">Description: </label><textarea class="descriptionBox" name="eventDescription" id="eventDescription"></textarea><br>
                        <label for="eventImg">Image: </label><textarea class="footerBox" name="eventImg" id="eventImg"></textarea>
                        <input type="submit" name="submit" value="Add Event">
                    </form>
                </div>

                <?php
                $sql = "SELECT * FROM events";
                foreach ($dbh->query($sql) as $row) { ?>
                    <div class="adminTables">
                        <form name="editEvents" id="editEvents" method="post" action="adminProcessing.php">
                            <label for="eventDate">Date: </label><textarea name="eventDate" id="eventDate"><?php echo $row['eventDate']; ?></textarea>
                            <label for="eventTitle">Title: </label><textarea name="eventTitle" id="eventTitle"><?php echo $row['eventTitle']; ?></textarea><br>
                            <label for="eventDescription">Description: </label><textarea class="descriptionBox" name="eventDescription" id="eventDescription"><?php echo $row['eventDescription']; ?></textarea><br>
                            <label for="eventImg">Image: </label><textarea class="footerBox" name="eventImg" id="eventImg"><?php echo $row['eventImg']; ?></textarea>
                            <input type="submit" name="submit" value="Update Event">
                            <input type="submit" name="submit" value="Delete Event">
                            <input type="hidden" name="ID" value="<?php echo $row['eventID']; ?>">
                        </form>
                    </div>
                <?php }

                $sectionHeader = "Edit Users";
                include("sectionHeader.php"); ?>
                <div class="userTable">
                    <form name="addUser" id="addUser" method="post" action="adminProcessing.php">
                        <label for="username">Username: </label><textarea name="username" id="username"></textarea>
                        <label for="password">Password: </label><textarea name="password" id="password"></textarea><br>
                        <label for="accessLvl">Access Level: </label><textarea name="accessLvl" id="accessLvl"></textarea><br>
                        <input type="submit" name="submit" value="Add User">
                    </form>
                </div>
                <?php
                $sql = "SELECT * FROM users";
                foreach ($dbh->query($sql) as $row) { ?>
                    <div class="userTable">
                        <form name="editUsers" id="editUsers" method="post" action="adminProcessing.php">
                            <label for="username">Username: </label><textarea name="username" id="username"><?php echo $row['username']; ?></textarea>
                            <label for="password">Password: </label><textarea name="password" id="password"><?php echo $row['password']; ?></textarea><br>
                            <label for="accessLvl">Access Level: </label><textarea name="accessLvl" id="accessLvl"><?php echo $row['accessLvl']; ?></textarea><br>
                            <input type="submit" name="submit" value="Update User">
                            <input type="submit" name="submit" value="Delete User">
                            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                        </form>
                    </div>
                <?php }
            }

            $sectionHeader = '
            <form name="logOut" method="post" action="adminProcessing.php">
                <input type="submit" name="logOut" value="Log Out" class="logInSubmit">
            </form>';
            include("sectionHeader.php");
            } ?>

    </div>

<?php include("footer.php"); ?>