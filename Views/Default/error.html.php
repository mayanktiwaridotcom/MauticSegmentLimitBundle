<?php
$view->extend("MauticCoreBundle:Default:content.html.php");
$view['slots']->set('headerTitle',"Error");
?>
<div class="wrapper">
    <p>
        <?php echo $error; ?>
    </p>
</div>