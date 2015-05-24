<?php include("dbconnect.php"); ?>
<div class="eventEntry">
    <p><?php echo $eventDate ?></p>
    
    <?php if ($linkShow == true) {
        ?><a href="<?php echo $eventLink ?>"/><div class="eventLink">Musician Page<img src="images/arrow.ico"></div></a><?php $linkShow = false; }?>
    
    <?php if ($imgShow == true) {
        ?><img src="<?php echo $eventImg ?>"><?php }?>
    
    <h2 class="<?php if ($linkShow == true) { echo "eventWithLink"; $linkShow = false;} 
    else { echo "eventWithoutLink";} ?>"><?php echo $eventTitle ?></h2>
    
    <p class="<?php if ($imgShow == true) { echo "eventWithImage"; $imgShow = false;} 
    else { echo "eventWithoutImage";} ?>"><?php echo $eventDescription ?></p>
</div>