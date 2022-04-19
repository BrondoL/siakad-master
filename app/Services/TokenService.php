<?php

namespace App\Services;

use Siakad\Service;

class TokenService extends Service
{
    public function invalidate($token)
    {
        $new = $this->repo::store(['token' => $token], $this->validator::getFillable());
        return $new;
    }
}
