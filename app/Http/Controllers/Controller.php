<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function MongoDB\BSON\fromJSON;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
