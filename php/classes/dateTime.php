<?php
class dateTime {
		
	public static function formatDateTime($dateTime)
    {
        if(strlen($dateTime) == 10){$dateTime = date("d.m.Y", strtotime($dateTime));}
        elseif(strlen($dateTime) == 16){$dateTime = date("d.m.Y H:i", strtotime($dateTime));}
        
        return $dateTime;
    }

}
?>