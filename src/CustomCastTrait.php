<?php namespace Sukohi\CustomCast;

use Carbon\Carbon;

trait CustomCastTrait {

    // Override

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        $value = parent::castAttribute($key, $value);

        if($this->isAlphaBooleanAttribute($key)) {

            $value = ($value) ? 'T' : 'F';

        } else if($this->isAlphaTernaryAttribute($key)) {

            if($value == 1) {

                $value = 'T';

            } else if($value == 2) {

                $value = 'F';

            } else {

                $value = 'U';   // unknown

            }

        } else if($this->isShortTimeAttribute($key)) {

            if(!empty($value)) {

                $dt = new Carbon($value);
                $value = $dt->format('H:i');

            }

            return $value;

        }

        return $value;

    }


    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if($this->isAlphaBooleanAttribute($key)) {

            $value = (strtoupper($value) === 'T');

        } else if($this->isAlphaTernaryAttribute($key)) {

            if($value == 'T') {

                $value = 1;

            } else if($value == 'F') {

                $value = 2;

            } else {

                $value = 0;

            }

        }

        parent::setAttribute($key, $value);
    }

    private function isAlphaBooleanAttribute($key) {

        return $this->hasCast($key, 'alpha_boolean');

    }

    private function isAlphaTernaryAttribute($key) {

        return $this->hasCast($key, 'alpha_ternary');

    }

    private function isShortTimeAttribute($key) {

        return $this->hasCast($key, 'short_time');

    }

}