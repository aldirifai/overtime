<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     description="Dokumentasi API dari project Sistem Perhitungan Lembur (overtime)",
 *     version="1.0.0",
 *     title="Dokumentasi API Sistem Perhitungan Lembur",
 *     termsOfService="http://swagger.io/terms/",
 *     @OA\Contact(
 *         email="aldibogem@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
