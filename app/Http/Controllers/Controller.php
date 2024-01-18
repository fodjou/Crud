<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi (
 *      @OA\Info (
           version="1.0.0",
           title="mich_stage",
           description="etudiant",
 *     )
 * )
 */
class Controller extends BaseController
{




    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
