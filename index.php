<?php

require 'header.php';
//If config.php doesn't exist, probably not installed
if (!file_exists("config.php")) {
    require_once("install/install.php");
    $install = new install();
    exit();
}

//Now that the things are installed
global $db, $template;

//Check if config.php is readable if not then tell user to set the permissions manually
if (!is_readable("config.php")) {
    $template->header();
    $template->display("config.error.tpl");
    exit();
}



//Display the header and basic contents
$template->header();
$template->assign(array(
    'authenticated' => $user->is_authenticated(),
    'membername' => $_SESSION['membername']
));
$template->display("user.main.tpl");
$template->display("firsttimeinfo.tpl");
$template->display("infovis.tpl");
$template->assign(array(
    'authenticated' => $user->is_authenticated()
));
$template->display("right-container.tpl");
$template->display("login.form.tpl");
$template->display('search.form.tpl');
$template->display('operations.tpl');
if ($user->is_authenticated())
{
    $template->display('operations.add.form.tpl');
    $template->display('operations.remove.tpl');
}
?>
