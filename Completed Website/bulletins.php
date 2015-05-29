<?php
    include("dbconnect.php");
    $pageTitle = "TCMC - Bulletins";
    $current = "bulletins";
    include("header.php");
?>

    <div class="content">
        <?php
            $sql = "SELECT * FROM bulletins";
            $left = true;
            foreach ($dbh->query($sql) as $row){
                $date = $row["bulletinDate"];
                $name = $row["bulletinTitle"];
                $description = $row["bulletinDescription"];
                $footer = $row["bulletinFooter"];
                if ($left == true) {
                    include("bulletinEntryLeft.php");
                    $left = false;
                } else {
                    include("bulletinEntryRight.php");
                    $left = true;
                }
            }
        ?>
    </div>

<?php include("footer.php"); ?>