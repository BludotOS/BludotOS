<?
   function get_mime_type(&$structure) {
   $primary_mime_type = array("TEXT", "MULTIPART","MESSAGE", "APPLICATION", "AUDIO","IMAGE", "VIDEO", "OTHER");
   if($structure->subtype) {
   	return $primary_mime_type[(int) $structure->type] . '/' .$structure->subtype;
   }
   	return "TEXT/PLAIN";
   }
   function get_part($stream, $msg_number, $mime_type, $structure = false,$part_number    = false) {
   
   	if(!$structure) {
   		$structure = imap_fetchstructure($stream, $msg_number);
   	}
   	if($structure) {
   		if($mime_type == get_mime_type($structure)) {
   			if(!$part_number) {
   				$part_number = "1";
   			}
   			$text = imap_fetchbody($stream, $msg_number, $part_number);
   			if($structure->encoding == 3) {
   				return imap_base64($text);
   			} else if($structure->encoding == 4) {
   				return imap_qprint($text);
   			} else {
   			return $text;
   		}
   	}
   
		if($structure->type == 1) /* multipart */ {
   		while(list($index, $sub_structure) = each($structure->parts)) {
   			if($part_number) {
   				$prefix = $part_number . '.';
   			}
   			$data = get_part($stream, $msg_number, $mime_type, $sub_structure,$prefix .    ($index + 1));
   			if($data) {
   				return $data;
   			}
   		} // END OF WHILE
   		} // END OF MULTIPART
   	} // END OF STRUTURE
   	return false;
   } // END OF FUNCTION
   
?>