<?php
    include("dbconnect.php");
    $pageTitle = "TCMC - Musicians";
    $current = "musicians";
    include("header.php");
?>
    
    <div class="content">
        <?php
            $sql = "SELECT * FROM musicians";
            foreach ($dbh->query($sql) as $row){
                $musicianID = $row["musicianID"];
                $musicianName = $row["musicianName"];
                $musicianImg = $row["musicianImg"];
                $musicianDescription = $row["musicianDescription"];
                $musicianContact = $row["musicianContact"];
                $musicianLink = $row["musicianLink"];
                include("musicianEntry.php");
            }
        ?>
    </div>

<?php include("footer.php"); ?>