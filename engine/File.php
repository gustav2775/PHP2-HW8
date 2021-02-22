<?php

namespace app\engine;

class File
{
    protected $file_name;
    protected $file_type;
    protected $file_size;
    protected $result;

    public function __construct()
    {
        $this->get_file();
        $this->result = $this->save_file();
    }

    protected function get_file()
    {
        $this->file_name = $_FILES["img_prod"]["name"];
        $this->file_type = $_FILES["img_prod"]["type"];
        $this->file_size = $_FILES["img_prod"]["size"];
    }

    public function get_file_name()
    {
        return $this->file_name;
    }

    public function get_file_type()
    {
        return $this->file_type;
    }

    public function get_file_size()
    {
        return $this->file_size;
    }

    public function save_file()
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "\\img\\imgCatalog\\" . $_FILES["img_prod"]["name"];
        if ($this->size < 1024 * 1024 * 5) {
            if (move_uploaded_file($_FILES['img_prod']['tmp_name'],  $path)) {
                return 'Успешно добавлен';
            }else{
                return 'Ошибка загрузки';
            }
        } else {
            return 'файл превышает допустимый размер';
        }
    }
}
