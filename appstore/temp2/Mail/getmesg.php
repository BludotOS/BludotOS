<?
    include('getbody.php');
   //$ServerName = "http://mail.bludot.tk:25/imap"; // For a IMAP connection    (PORT 143)
   $ServerName = $_GET['server']; // For a POP3 connection    (PORT 110)
   //$ServerName = "{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}Inbox";
   
   $UserName = $_GET['username'];
   $PassWord = $_GET['password'];
   
   $mbox = imap_open($ServerName, $UserName,$PassWord) or die("Could not open Mailbox - try again later!");
   
   if ($hdr = imap_check($mbox)) {
   	$msgCount = $hdr->Nmsgs;
   } else {
   	echo "failed";
   }
   $MN=$msgCount;
   $overview=imap_fetch_overview($mbox,"1:$MN",0);
   $size=sizeof($overview);
   
   echo "<table border=\"0\" cellspacing=\"0\" style=\"width:100%;height:100%;position:relative;top:0px;bottom:0px;overflow:hidden;\">";
   
   for($i=$size-1;$i>=0;$i--){
   	$val=$overview[$i];
		$msg=$val->msgno;
   	$from=$val->from;
  		$date=$val->date;
		$subj=$val->subject;
   	$seen=$val->seen;
        if(!$structure) {
   		$structure = imap_fetchstructure($mbox, $i+1);
   	}
        if($structure) {
            //if($mime_type == get_mime_type($structure)) {
   			if(!$part_number) {
   				$part_number = "1";
   			}
                    $msgBody = imap_fetchbody($mbox, $i+1, $part_number);
        if($structure->encoding == 3) {
   			$body = imap_base64($msgBody);
   	} else if($structure->encoding == 4) {
   			$body = imap_qprint($msgBody);
   	} else {
   			$body = $msgBody;
        }
        //}
        }
   
	   $from = ereg_replace("\"","",$from);
   
	   // MAKE DANISH DATE DISPLAY
   	list($dayName,$day,$month,$year,$time) = split(" ",$date); 
		$time = substr($time,0,5);
   	$date = $day ." ". $month ." ". $year . " ". $time;
   	if ($bgColor == "#F0F0F0") {
   		$bgColor = "#FFFFFF";
   	} else {
			$bgColor = "#F0F0F0";
		}
   
		if (strlen($subj) > 60) {
   		$subj = substr($subj,0,59) ."...";
		}
   	echo "<tr onclick=\"if(this.click != 1) {this.nextSibling.style.height=200+'px';this.click=1;} else if(this.click == 1) {this.nextSibling.style.height=0+'px';delete this.click;}\" bgcolor=\"$bgColor\" style=\"display:table;width:100%;text-align:left;\"><td colspan=\"2\">$from</td><td style=\"text-align:center;\" colspan=\"2\">$subj</td>
   		 <td style=\"float:right;\" class=\"tblContent\" colspan=\"2\">$date</td></tr><tr style=\"display:block;overflow:auto;height:0px;-webkit-transition: height .5s;\"><td style=\"width:100%;\"><font>$body</font></td></tr>\n";
   }
	echo "</table>";
   imap_close($mbox);
?>