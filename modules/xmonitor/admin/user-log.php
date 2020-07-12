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


function convert($duree) {
$minute = 60;
$heure = 60*$minute;
$jour = 24*$heure;
$annee = 365*$jour;
$chaine .= floor($duree / $heure)."h ";
$reste = $duree % $heure;
$chaine .= floor($reste / $minute)."mn ";
$reste = $reste % $minute;
$chaine .= $reste."s";
return $chaine;
}

echo "<B>User Logs of :  ".$xoopsConfig['sitename']."</B><p>";
echo "<img src=../images/logging.gif align=\"right\"></a><p>";

 echo    "<CENTER>[ <A HREF=\"admin.php\">"._MD_USERVISIT_BACK."</A> | <A HREF=\"log_delete.php?su=mems\">Delete All Logs</A> ]</CENTER><P>";


    $user_log= mysql_query("SELECT * FROM ".$xoopsDB->prefix("user_log")." ORDER BY id DESC ");

    $log=mysql_NumRows($user_log);

if($log == 0) {
  echo ""._MD_USERVISIT_NOVISIT."<P>";
} else {
  echo " The Following are the Logs from .<p>";

  echo "<CENTER><TABLE BORDER=0 CELLPADDING=4 CELLSPACING=1 class='bg2'>
    <TR class='bg2'>
      <TD><CENTER><B>No</B></CENTER></TD>
        <TD><CENTER><B> Username </B></CENTER></TD>
      <TD><CENTER><B>Module</B></CENTER></TD>
      <TD><CENTER><B>Page</B></CENTER></TD>
      <TD><CENTER><B>Message</B></CENTER></TD>
      <TD><CENTER><B>Date - Time</B></CENTER></TD>
       <TD><CENTER><B>Options</B></CENTER></TD>
    </TR>";

     $member_handler =& xoops_gethandler('member');
  $i=0;
while ($i < $log) {
  $uid = mysql_result($user_log, $i, "uid");
  $id = mysql_result($user_log, $i, "id");
  $page = mysql_result($user_log, $i, "page");
  $message = mysql_result($user_log, $i, "message");
  $mname = mysql_result($user_log, $i, "mname");
  $time = mysql_result($user_log, $i, "time");

  if($uid>0)
  {
  	$thisUser =& $member_handler->getUser($uid);
   	$uname = $thisUser->getVar("uname");
    }
   else
     $uname="Anonymous";

$ii = ($i+1);

 echo "<tr class='bg1'><td><CENTER>$ii</CENTER></td><td><a href=\"".XOOPS_URL."/userinfo.php?uid=$uid\">$uname</a> </td><td><CENTER>$mname</CENTER></td><td><CENTER><FONT SIZE=1>$page</FONT></CENTER></td><td><CENTER><FONT SIZE=1>$message</FONT></CENTER></td><td><CENTER><FONT SIZE=1>$time</font></CENTER></td>";
  echo "<td><A HREF=\"log_delete.php?su=mdet&id=$id\">Delete</A> | <A HREF=\"user-visit.php?vm=$uname\">Visit Details</A>   </td> ";

  $i++;
  }
 echo    "</tr></TABLE></CENTER><P>";
// echo "<CENTER>[ <A HREF=\"suppr-visit.php?su=mdet&visitname=$nom&supip=termine\">"._MD_USERVISIT_DELSTATOF." $nom</A> ]<BR>"._MD_USERVISIT_DELSTATNOTE."</CENTER>";


 echo "<P><BR>";
}


                CloseTable();
	echo "<P>";
	            OpenTable();
echo "<DIV ALIGN=\"right\">"._MD_USERVISIT_CREDIT."  </br>"._MD_USERVISIT_AND." <A HREF=\"mailto:smartvinu@gmail.com\">Vinod S.R</A> ( <A HREF=\"http://www.busytalk.com\" TARGET=\"_blank\">www.busytalk.com</A> )</DIV>";
                CloseTable();


include("../include/admin_footer.php");
?>