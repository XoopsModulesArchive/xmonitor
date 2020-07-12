<?
#######################################################
 /*
 x-monitor  1.0
  Coded by  Vinod S R
           contact : smartvinu@gmail.com ,psindia@gmail.com
           website : http://psindia.v33.org ,  http://busytalk.com
  */
#######################################################




function insertlog($message)
{         	global $xoopsDB, $xoopsUser,$xoopsModule;

if($xoopsModule)
	$mname=$xoopsModule->getVar("name");
else
	$mname = " -- ";

if ($xoopsUser)
	$uid=$xoopsUser->getVar("uid");
else
	$uid=0;


  $page = getenv("REQUEST_URI");
  $time = date("d/m/y")." - ".date("g:i a");

if (!$page) {
$page = "index.php";
}

		mysql_query("INSERT INTO ".$xoopsDB->prefix("user_log")." VALUES ('', '$uid', '$page', '$mname', '$message', '$time')");
 }
?>