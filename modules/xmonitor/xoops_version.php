<?php

#######################################################
/*  X-monitor is adapted from uservisit created by solo

	Author : Vinod Sr
    Country : India
    Other works : Dhtml patch to xoops (http://busytalk.com/psindia_xoops_core_hack.zip)

	I simply added a logging feature in to it which enables
    tracking of user more simpler ..
    If you found any bug please report it at smartvinu@gmail.com'

    visit http://busytalk.com meet me (webspider)


    ** Tested on Xoops 2.0.13


    ** Free to copy and change
    */


#####################################################
#  Special Thanks to #
#   Pascal Le Boustouller		#
#   Solo ( www.wolfpackclan.com )	#
##################################################
#  Licence : GPL 							#
#######################################################


$modversion['name'] = _MI_xmonitor_NAME;
$modversion['version'] = 1.00;
$modversion['description'] = _MI_xmonitor_DESC;
$modversion['credits'] = "Vinod S.R";
$modversion['author'] = "Vinod S.R<br />( www.busytalk.com)";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/xmonitor_slogo.png";
$modversion['dirname'] = "xmonitor";

//sql tables
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "visit_user";
$modversion['tables'][1] = "visit_user_page";
$modversion['tables'][2] = "user_log";

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/admin.php";
$modversion['adminmenu'] = "admin/menu.php";

?>