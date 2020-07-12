<?
#######################################################
 /*
 x-monitor  1.0
  Coded by  Vinod S R
           contact : smartvinu@gmail.com ,psindia@gmail.com
           website : http://psindia.v33.org ,  http://busytalk.com
  */
#######################################################

include("../include/admin_header.php");
xoops_cp_header();
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}
		echo "<br />\n";

global $xoopsDB, $xoopsUser;

	            OpenTable();



function SupprM($visitname, $q)
{
global $xoopsDB;

if ($q == yes) {
$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("visit_user")." WHERE visitname = '$visitname'");
$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("visit_user_page")." WHERE nom = '$visitname'");

echo "<P><BR>"._MD_USERVISIT_ALLSTATS." <B>$visitname</B> "._MD_USERVISIT_DELETED."<P>";
 echo    "<CENTER>[ <A HREF=\"admin.php\">"._MD_USERVISIT_BACKLIST."</A> ]</CENTER>";
 } else {
echo "<P><BR>"._MD_USERVISIT_DELSTATS." <B>$visitname</B> ?<P>";
echo "<P><CENTER>[ <A HREF=\"suppr-visit.php?su=memb&visitname=$visitname&q=yes\">"._MD_USERVISIT_YES."</A> | <A HREF=\"admin.php?fct=uservisit\">"._MD_USERVISIT_NO."</A> ]</CENTER><P>";
}
}



function SupprD($id )
{
global $xoopsDB;

global $xoopsDB;

$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("user_log")." where id=".$_GET["id"]);
//$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("visit__page")."");
echo "<BR>Log Deleted : <P>";
 echo    "<CENTER>[ <A HREF=\"user-log.php\">Back to Log-Admin</A> ]</CENTER>";

}

function SupprAll( $q)
{
global $xoopsDB;

if ($q == yes) {
$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("user_log")."");
//$result = mysql_query("DELETE FROM ".$xoopsDB->prefix("visit_user_page")."");
echo "<BR>Logs Deleted : <P>";
 echo    "<CENTER>[ <A HREF=\"user-log.php\">Back to Log-Admin</A> ]</CENTER>";
 } else {
echo "<P><BR>Are You Sure To delete all logs ? <P>";
echo "<P><CENTER>[ <A HREF=\"log_delete.php?su=mems&q=yes\">Yes</A> | <A HREF=\"user-log.php\">No</A> ]</CENTER><P>";
}
}


    switch($su)
        {

        case "mems":
                      SupprAll($q);
                      break;

        case "memb":
                      SupprM($visitname, $q);
                      break;


        case "mdet":

                      SupprD($id);
                      break;

        }

include("../include/admin_footer.php");
?>