<?php
$root = "/../../../../wp/wp-content/themes/chsp";
require_once(__DIR__ . $root . '/resources/misc.php');
require_once(__DIR__ . $root . '/resources/classes/View.php');

if( is_user_logged_in() ):
    $templates = array(
        'header',
        'hero',
        'inspire-and-connect',
        'further-info',
        'highlight',
        'well-be-there',
        'participation',
        'schedule',
        'contact',
        'footer'
    );
    foreach( $templates as $template )
    {
        include(__DIR__ . "/templates/" . $template . ".phtml");
    }
else: ?>
    <?php include(__DIR__ . "/templates/header.phtml"); ?>

    <div style="height:100%;
    height: 100vh;width:100%;position:relative;">
    <h1 style="position:relative;height:30px;line-height:30px;margin:0 auto;top:50%;
    -webkit-transform: translateY(-50%);-moz-transform: translateY(-50%);-ms-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);
    
    ">Stay tuned...</h1>
    </div>
    <?php include(__DIR__ . "/templates/footer.phtml"); ?>
<?php
endif;
?>