<?php

class img{
    public $width;
    public $height;
    public $newwidth = 0;
    public $newheight = 0;
    public $mime;
    public $file;
    public $img;
    public $newimg;
    public $error;
    function __construct($file)
    {
    	$this->file = $file;
    }

    /* * * * * * * * * * * * * * * *
	* Функция загрузки изображеня
	* $img - путь к файлу
	* * * * * * * * * * * * * * * */
    public function img_down()
    {
        $info = getimagesize($this->file);
        switch ($info['mime']) {
            case'image/wbmp': $this->img = imagecreatefromWBMP($this->file); break;
            case'image/xbm':  $this->img = imagecreatefromXBM($this->file);  break;
            case'image/xpm':  $this->img = imagecreatefromXPM($this->file);  break;
            case'image/jpeg': $this->img = imagecreatefromJPEG($this->file); break;
            case'image/gif':  $this->img = imagecreatefromGIF($this->file);  break;
            case'image/png':  $this->img = imagecreatefromPNG($this->file);  break;
            default:          $this->error = 'Формат не поддерживается';     break;
        }
        $this->width = $info[0];
        $this->height = $info[1];
        $this->mime = $info['mime'];
        return $this;
    }
    /* * * * * * * * * * * * * * * *
	* Функция коректной смены размера изображения
	* $width - ширина изображения
	* $height - высота если не указывать изображение будет менять размер с пропорциями
	* * * * * * * * * * * * * * * */
    public function resize($width, $height = 0)
    {
    	if($this->error) return $this;
        if ($height) {
            $this->newWidth = $width;
            $this->newHeight = $height;
        } else {
            $x_ratio = $width / $this->width;
            $y_ratio = $width / $this->height;
            if (($this->width <= $width) && ($this->height <= $width)) {
                $this->newWidth = $this->width;
                $this->newHeight = $this->height;
            } else if (($x_ratio * $this->height) < $width) {
                $this->newHeight = ceil($x_ratio * $this->height);
                $this->newWidth = $width;
            } else {
                $this->newWidth = ceil($y_ratio * $this->width);
                $this->newHeight = $width;
            }
        }

        if($this->width == $this->newWidth && $this->height == $this->newHeight){
                $this->newimg = $this->img;
                return $this;
        }
        $this->newimg = imagecreatetruecolor($this->newWidth, $this->newHeight);
        imagecopyresampled($this->newimg, $this->img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
        return $this;
    }
    /* * * * * * * * * * * * * * * *
	* Сохранение изображения
	* $img   - Зугруженая картинка
	* $patch - Имя я путь куда сохранить изображение
	* $type  - В каком формате сохранить
	* $compres  - Сжатие, от 0 до 100 (для jpeg)
	* * * * * * * * * * * * * * * */
    public function save($patch, $type = 'jpg', $compres = 75)
    {
    	if($this->error) return $this;
        if (!$this->newimg) $this->newimg = $this->img;
        if ($type == 'gif') imagegif($this->newimg, $patch);
        if ($type == 'jpg' || $type == 'jpeg') imagejpeg($this->newimg, $patch, $compres);
        if ($type == 'png') imagepng($this->newimg, $patch);
        @chmod($patch, 0666);
        return $this;
    }
    /* * * * * * * * * * * * * * * *
	* Вывод изображения
	* $type  - В каком формате выводить gif, jpg или png (по умолчанию jpg)
	* $compres  - Сжатие, от 0 до 100 (для jpeg)
	* * * * * * * * * * * * * * * */
    public function print_img($type = 'jpg', $compres = 75)
    {
    	if($this->error) return $this;
        if ($type == 'gif') {
            header("content-type: image/gif");
            imagegif($this->newimg);
        } elseif ($type == 'jpg' || $type == 'jpeg') {
            header("content-type: image/jpeg");
            imagejpeg($this->newimg, '', $compres);
        } elseif ($type == 'png') {
            header("content-type: image/png");
            imagepng($this->newimg);
        }else{
        	header("content-type: image/jpeg");
            imagejpeg($this->newimg, '', $compres);
        }
        return $this;
    }
    function __destruct()
    {
    	if(!$this->error){
	        ImageDestroy($this->img);
	        ImageDestroy($this->newimg);
	    }
    }
}


    function message($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' сообщений';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' сообщения';
        } else {
            return $num . ' сообщение';
        }
    }
	
	
	   function ending_age($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 == 1) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' лет';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' года';
        } else {
            return $num . ' год';
        }
    }
	
	   function ending($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 == 1) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' раз';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' раза';
        } else {
            return $num . ' разик';
        }
    }

    function minute($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' минут';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' минуты';
        } else {
            return $num . ' минута';
        }
    }

    function hour($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' часов';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' часа';
        } else {
            return $num . ' час';
        }
    }

    function day($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' дней';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' дня';
        } else {
            return $num . ' день';
        }
    }

    function month($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' месяцев';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' месяца';
        } else {
            return $num . ' месяц';
        }
    }

    function ending_user($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' пользователей';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' пользователя';
        } else {
            return $num . ' пользователь';
        }
    }

    function ending_quest($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' посетителей';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' посетителя';
        } else {
            return $num . ' посетитель';
        }
    }

    function ending_money($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' рублей';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' рубля';
        } else {
            return $num . ' рубль';
        }
    }

    function ending_second($num) {
        $num100 = $num % 100;
        $num10 = $num % 10;
        if (($num100 >= 5 && $num100 <= 20) || ($num10 == 0) || ($num10 >= 5 && $num10 <= 9)) {
            return $num . ' секунд';
        } else if ($num10 >= 2 && $num10 <= 4) {
            return $num . ' секунды';
        } else {
            return $num . ' секунда';
        }
    }
	
	
	    function fsize($path) {
        $fp = fopen($path, "r");
        $inf = stream_get_meta_data($fp);
        fclose($fp);
        foreach ($inf["wrapper_data"] as $v) {
            if (stristr($v, "content-length")) {
                $v = explode(":", $v);
                return trim($v[1]);
            }
        }
    }

?>