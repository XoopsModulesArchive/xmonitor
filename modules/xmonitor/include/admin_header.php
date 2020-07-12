<?php
include("../../../mainfile.php");
include(XOOPS_ROOT_PATH."/include/cp_functions.php");
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
if($xoopsUser &&  $xoopsUser->getVar('uid') == 1 ){
		$xoopsModule = XoopsModule::getByDirname("xmonitor");
	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
		redirect_header(XOOPS_URL."/",3,_NOPERM);
		exit();
	}
} else {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
}
?>