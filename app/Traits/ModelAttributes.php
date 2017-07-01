<?php

namespace App\Traits;

use App\Traits\ThreadAttributes;
use App\Traits\TimeAttributes;
use App\Traits\UserAttributes;

trait ModelAttributes
{
    use ThreadAttributes, TimeAttributes, UserAttributes;
}