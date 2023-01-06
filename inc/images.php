<?php

class img {
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
            case 'image/wbmp': $this->img = imagecreatefromWBMP($this->file); break;
            case 'image/xbm':  $this->img = imagecreatefromXBM($this->file);  break;
            case 'image/xpm':  $this->img = imagecreatefromXPM($this->file);  break;
            case 'image/jpeg': $this->img = imagecreatefromJPEG($this->file); break;
            case 'image/gif':  $this->img = imagecreatefromGIF($this->file);  break;
            case 'image/png':  $this->img = imagecreatefromPNG($this->file);  break;
            default:           $this->error = 'Формат не поддерживается';     break;
        }
        $this->width = $info[0];
        $this->height = $info[1];
        $this->mime = $info['mime'];
        return $this;
    }

    /* * * * * * * * * * * * * * * *
	* Функция корректной смены размера изображения
	* $width - ширина изображения
	* $height - высота, если не указывать - изображение будет менять размер с пропорциями
	* * * * * * * * * * * * * * * */
    public function resize($width, $height = 0)
    {
    	if ($this->error) return $this;
        if ($height)
		{
            $this->newWidth = $width;
            $this->newHeight = $height;
        }
		else
		{
            $x_ratio = $width / $this->width;
            $y_ratio = $width / $this->height;
            if (($this->width <= $width) && ($this->height <= $width))
			{
                $this->newWidth = $this->width;
                $this->newHeight = $this->height;
            }
			elseif (($x_ratio * $this->height) < $width)
			{
                $this->newHeight = ceil($x_ratio * $this->height);
                $this->newWidth = $width;
            }
			else
			{
                $this->newWidth = ceil($y_ratio * $this->width);
                $this->newHeight = $width;
            }
        }

        if ($this->width == $this->newWidth && $this->height == $this->newHeight)
		{
                $this->newimg = $this->img;
                return $this;
        }

        $this->newimg = imagecreatetruecolor($this->newWidth, $this->newHeight);
		imagealphablending($this->newimg, false);
		imagesavealpha($this->newimg, true);

		imagecopyresampled($this->newimg, $this->img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
		return $this;
    }
    /* * * * * * * * * * * * * * * *
	* Сохранение изображения
	* $img   - Загруженая картинка
	* $patch - Имя я путь куда сохранить изображение
	* $type  - В каком формате сохранить
	* $compres  - Сжатие, от 0 до 100 (для jpeg)
	* * * * * * * * * * * * * * * */
    public function save($patch, $type = 'jpg', $compres = 75)
    {
		if ($this->error) return $this;
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
    	if ($this->error) return $this;
        if ($type == 'gif')
		{		
            header("content-type: image/gif");
            imagegif($this->newimg);
        }
		elseif ($type == 'jpg' || $type == 'jpeg')
		{
            header("content-type: image/jpeg");
            imagejpeg($this->newimg, '', $compres);
        }
		elseif ($type == 'png')
		{
            header("content-type: image/png");
            imagepng($this->newimg);
        }
		else
		{
        	header("content-type: image/jpeg");
            imagejpeg($this->newimg, '', $compres);
        }
        return $this;
    }

    function __destruct()
    {
    	if (!$this->error)
		{
	        ImageDestroy($this->img);
	        ImageDestroy($this->newimg);
	    }
    }
}

?>