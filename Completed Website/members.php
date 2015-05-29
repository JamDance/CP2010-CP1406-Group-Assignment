<?php session_start();
    $pageTitle = "TCMC - Members";
    $current = "members";
    include("header.php");
    error_reporting(E_ALL);
?>
    
    <div class="content">
        <?php
        $sectionHeader = "Sign Up!";
        include("sectionHeader.php");
        ?>

        <h3>By registering an account you can add, edit, and remove bulletins</h3>

        <?php if(!isset($_SESSION['username'])) { ?>
            <form name="newUser" method="post" action="adminProcessing.php">
                <label src="email">Email: </label>
                <textarea name="email"></textarea>
                <label src="password">Password: </label>
                <textarea name="password"></textarea>
                <input type="submit" class="logInSubmit" value="Sign Up">
            </form>
            <h4>If you already have an account you can login <a href="admin.php" class="blueLink">HERE!</a></h4>
        <?php } else {
            echo '<h4>You are already Logged In</h4>';
        }

        $sectionHeader = "Membership";
        include("sectionHeader.php");
        ?>

        <h3>Membership grants you access to adding and editing registered musicians</h3>

        <?php if(!isset($_SESSION['username'])) {
            echo '<h4>You must <a  href="admin.php" class="blueLink">Log In</a> first!</h4>';
        } ?>


        <h4>Individual Membership - $25 Per Year <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="GCRJ28AFLXURQ" />
                <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_paynow_SM.gif" name="submit"/>
            </form> </h4>

        <h4>Make a Donation <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="67K2M93WVJM2L" />
                <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donate_SM.gif" name="submit"/>
        </form> </h4>
    </div>

<?php include("footer.php"); ?>