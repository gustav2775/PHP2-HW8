<?php

namespace app\model\repositories;

use app\model\Repository;
use app\model\enitities\Gallery;

class GalleryRepository extends Repository
{

    public function getTableName()
    {
        return 'gallery';
    }
}
