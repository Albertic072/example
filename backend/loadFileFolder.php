<?php
$root_server = $_SERVER["DOCUMENT_ROOT"];
include (''.$root_server.'/includes/basic_php.php');
include (''.$root_server.'/php/classes/text.php');

$id = (int)$_POST['id'];

class Files {
	//Функция сжатия фото при загрузке
	public function resizeImg($image, $w_o = false, $h_o = false) {
		if (($w_o < 0) || ($h_o < 0)) {echo "Некорректные входные параметры";return false;}
		list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
		$types = array("", "gif", "jpeg", "png", "jpg"); // Массив с типами изображений
		$ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
		if ($ext) {
		  $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
		  $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
		} else {
		  echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
		  return false;
		}
		/* Если указать только 1 параметр, то второй подстроится пропорционально */
		if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
		if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
		$img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения

		imagealphablending($img_o, false); // Устанавливаем режим смешивания для изображения
		imagesavealpha($img_o,true); // Сохранять ли полную информацию альфа-канала при сохранении изображений PNG
		$transparent = imagecolorallocatealpha($tci, 255, 255, 255, 127); // добавляет к цвету параметр alpha, отвечающий за прозрачность.
		imagefilledrectangle($img_o, 0, 0, $w_i, $h_i, $transparent); // рисует заполненный прямоугольник

		imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); // Переносим изображение из исходного в выходное, масштабируя его
		//imagecharup 
		$func = 'image'.$ext; // Получаем функция для сохранения результата
		return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
	}
}
if (0 < $_FILES['file']['error']){echo 'Error';}
else
{
	$rand = rand(100, 9999); $data = date("ymd"); $time = (date("His")); // Определяем дату и время, для вставки в новое имя файла
	$file = $_FILES['file']['name']; // Принимаем в переменную загруженный файл
	$type = strtolower(substr($file, 1+strrpos($file,"."))); // Определяем расширение файла, переводим его в нижний регистр
	$file_new_name = $file.'-'.$data.'-'.$time.'-'.$rand.'.'.$type; // Определяем новое имя файла
	move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/uploads/files/'.$file_new_name);

	if($type == 'jpg' or $type == 'jpeg' or $type == 'png' or $type == 'gif')
	{
		Files::resizeImg($_SERVER['DOCUMENT_ROOT'].'/uploads/files/'.$file_new_name, 1200);
	}
}
if($file_new_name)
{
	mysqli_query ($db, "INSERT INTO files_project (
	id_folder,
	name_file
	)
	VALUES (
	'{$id}',
	'{$file_new_name}'
	)");
	
	echo '1';
} else {
	echo '99';
}

?>