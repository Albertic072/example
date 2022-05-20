<?php
class Text {
		
	public function formatting($text) {
		$text = stripslashes($text); $text = trim($text); $text = htmlspecialchars($text, ENT_QUOTES); return $text;
	}
	
	public function format_tel($tel)
	{
		$f_tel = str_replace('+', '', $tel); //Убираем +
		$f_tel = str_replace(' ', '', $tel); //Убираем пробелы
		$f_tel = str_replace('(', '', $f_tel); $f_tel = str_replace(')', '', $f_tel); //Убираем скобки
		$f_tel = str_replace('-', '', $f_tel); //Убираем тире
		return $f_tel;
	}
	//добавляем форматирование к теоефрну, пример: +7(123) 123-12-12
	public function tel_clean_on($tel)
	{
		if($tel)
		{
			$t0 = substr($tel, 0, 1);
			$t1 = substr($tel, 1, 3);
			$t2 = substr($tel, 4, 3);
			$t3 = substr($tel, 7, 2);
			$t4 = substr($tel, 9, 2);
			$f_tel = '+'.$t0.'('.$t1.') '.$t2.'-'.$t3.'-'.$t4;
		}
		else {$f_tel = '';}
		
		return $f_tel;
	}
}
?>