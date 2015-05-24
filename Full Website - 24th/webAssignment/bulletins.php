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
                $date = $row["date"];
                $name = $row["name"];
                $description = $row["description"];
                $footer = $row["footer"];
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