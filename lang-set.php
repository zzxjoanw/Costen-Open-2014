<?php
/**
 * Created by PhpStorm.
 * User: Laura 5
 * Date: 4/10/2016
 * Time: 5:37 AM
 */

$_SESSION['lang'] = $_POST['lang'];
header("Location: ".$_POST['return']);