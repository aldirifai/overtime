<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * @OA\Patch(
     *    path="/api/settings",
     *   tags={"Setting"},
     *  summary="Mengubah setting",
     * description="Mengubah setting",
     * @OA\Parameter(
     *         name="key",
     *         in="query",
     *         required=true,
     *        example="overtime_method",
     *        description="Hanya bisa diisi 'overtime_method'",
     *
     *      ),
     * @OA\Parameter(
     *         name="value",
     *         in="query",
     *         required=true,
     *       example="1",
     *      ),
     *  @OA\Response(
     *        response=200,
     *       description="Successful operation",
     *    @OA\JsonContent(
     *        type="object",
     *       @OA\Property(
     *        property="success",
     *       type="boolean",
     *      example=true
     *   ),
     *  @OA\Property(
     *       property="message",
     *     type="string",
     *   example="Setting berhasil diupdate."
     *  ),
     *  ),
     * ),
     * ),
     */
    public function update(SettingRequest $request)
    {
        $setting = Setting::where('key', $request->key)->first();

        $setting->update($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'Setting berhasil diupdate.',
            ]);
    }
}
