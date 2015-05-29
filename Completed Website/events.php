<?php
    include("dbconnect.php");
    $pageTitle = "TCMC - Events";
    $current = "events";
    include("header.php");
?>
    
    <div class="content">
        <?php
            $sql = "SELECT * FROM events";
            $imgShow = false;
            $linkShow = false;
            foreach ($dbh->query($sql) as $row){
                $eventDate = $row["eventDate"];
                $eventTitle = $row["eventTitle"];
                $eventImg = $row["eventImg"];
                if ($row["eventImg"] != null) {
                    $imgShow = true;
                }
                if ($row["eventLink"] != null) {
                    $linkShow = true;   
                }
                $eventDescription = $row["eventDescription"];
                include("eventEntry.php");
            }
        ?>
    </div>

<?php include("footer.php"); ?>
