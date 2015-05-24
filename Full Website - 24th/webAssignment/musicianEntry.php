<?php include("dbconnect.php"); ?>
<a href="musicianPage.php?musicianID=<?php echo $musicianID?>" class="musicianLink"><div class="musicianEntry">
    <img src="<?php echo $musicianImg; ?>"/>
    <h2><?php echo $musicianName; ?></h2>
    <p><?php echo substr($musicianDescription, 0 ,249) ?>...</p>
    <p><?php echo $musicianLink; ?></p>
</div></a>