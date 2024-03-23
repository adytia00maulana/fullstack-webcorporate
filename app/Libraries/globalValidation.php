<?php

namespace App\Libraries;

class GlobalValidation
{

    public function success(): array
    {
        return array(
            'code' => '200',
            'message' => 'Success',
            'result' => 'Saved!'
        );
    }
    public function validation(): array
    {
        return array(
            'code' => '400',
            'message' => 'Failed',
            'result' => 'Max File Upload 8 Megabyte!'
        );
    }
    public function error(): array
    {
        return array(
            'code' => '500',
            'message' => 'Error',
            'result' => 'Error!'
        );
    }
}