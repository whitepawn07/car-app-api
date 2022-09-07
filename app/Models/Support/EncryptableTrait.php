<?php

namespace App\Models\Support;

trait EncryptableTrait
{
    public function toArray()
    {
        $arrayAttributes = parent::toArray();
        foreach ($arrayAttributes as $key => $value) {

            if (in_array($key, $this->encryptable) && (!is_null($value))) {
                $arrayAttributes[ $key ] = decrypt($value);
            }
            continue;
        }

        return $arrayAttributes;

    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable) && (!is_null($value))) {
            $value = decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            return parent::setAttribute($key, encrypt($value));
        }

        return parent::setAttribute($key, $value);
    }
}
