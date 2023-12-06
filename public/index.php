<?php
/* using syntax 'use' to imported namespace(folder that hold file and class
 * name, this just name two of that to different same class name in other
 * folder, not value file itself, so must use
 * 'require_once' syntax*/
use core\App;

/*with application running, we just start one session and this for avoid session
 start multiple time, for session authentication we process in model Authorization*/
if (!session_id()) {
	session_start();
}

/* use require_once init.php to use value files that all imported inside
init.php, this called bootstrapping, but this not imported namespace*/
require_once("../app/init.php");

/*used to execute code App class with instance that hold our main code*/
$app = new App();