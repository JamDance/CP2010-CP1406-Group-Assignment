<?php
    include("dbconnect.php");
    $pageTitle = "TCMC - Artist Page";
    $current = "musicians";
    include("header.php");
?>
    <?php
        $sql = $dbh->prepare("SELECT * FROM musicians WHERE musicianID = '$_GET[musicianID]'");
        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $musicianName = ($result['musicianName']);
        $musicianImg = ($result['musicianImg']);
        $musicianDescription = ($result['musicianDescription']);
        $musicianContact = ($result['musicianContact']);

    ?>
    <?php
        $sectionHeader = "$musicianName";
        include("sectionHeader.php");
    ?>
     
    <div class="musicianPage">
        <img src="<?php echo $musicianImg?>" class="musicianImg"/>
        <p><?php echo $musicianDescription?></p>
        <p><?php echo $musicianContact?></p>
        <?php
        $sectionHeader = "<a href='musicians.php'>Back to Musicians Page<img src='images/arrow.ico'></a>";
        include("sectionHeader.php");
        ?>



    </div>
        
<?php include("footer.php"); ?>
