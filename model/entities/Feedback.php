<?php

namespace app\model\entities;

use app\model\Model;

class Feedback  extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $datefeedback;
    protected $idfeed;

    protected $prop = [
        'id' => false,
        'name' => false,
        'feedback' => false,
        'datefeedback' => false
    ];

    public function __construct($id = null, $name = null, $feedback = null, $datefeedback = null)
    {
        if (!is_null($id)) {
            $this->id = $id;
            $this->prop['id'] = true;
        }
        if (!is_null($name)) {
            $this->name = $name;
            $this->prop['name'] = true;
        }
        if (!is_null($feedback)) {
            $this->feedback = $feedback;
            $this->prop['feedback'] = true;
        }
        if (!is_null($datefeedback)) {
            $this->datefeedback = $datefeedback;
            $this->prop['datefeedback'] = true;
        }
    }
}
