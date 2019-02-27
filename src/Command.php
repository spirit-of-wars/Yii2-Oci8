<?php

namespace neconix\yii2oci8;

use yii\db\Command as YiiCommand;

class Command extends YiiCommand
{
    protected $cursorName;

    public function setCursor($cursorName)
    {
        $this->cursorName = $cursorName;

        return $this;
    }

    public function prepare($forRead = null)
    {
        parent::prepare($forRead);
        if($this->cursorName) {
            $this->pdoStatement->setCursor($this->cursorName);
        }
    }
}
