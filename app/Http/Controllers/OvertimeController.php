<?php

namespace App\Http\Controllers;

use App\Http\Requests\OvertimePayRequest;
use App\Http\Requests\OvertimeRequest;
use App\Logic\CalculateOvertime;
use App\Models\Overtime;

class OvertimeController extends Controller
{
    /**
     * @OA\Post(
     *  path="/api/overtimes",
     * tags={"Overtime"},
     * summary="Menambahkan data lembur",
     * description="Menambahkan data lembur",
     * @OA\Parameter(
     *        name="employee_id",
     *       in="query",
     *      required=true,
     *     example="1",
     *    description="Isi dengan employee_id",
     * ),
     * @OA\Parameter(
     *       name="date",
     *      in="query",
     *     required=true,
     *   example="2020-01-01",
     * description="Isi dengan tanggal lembur format YYYY-MM-DD",
     * ),
     * @OA\Parameter(
     *      name="time_started",
     *    in="query",
     *  required=true,
     * example="08:00",
     * description="Isi dengan jam mulai lembur format HH:mm",
     * ),
     * @OA\Parameter(
     *     name="time_ended",
     *   in="query",
     * required=true,
     * example="10:00",
     * description="Isi dengan jam selesai lembur format HH:mm",
     * ),
     * @OA\Response(
     *       response=200,
     *     description="Successful operation",
     *   @OA\JsonContent(
     *      type="object",
     *    @OA\Property(
     *      property="success",
     *     type="boolean",
     *   example=true
     *  ),
     * @OA\Property(
     *     property="message",
     *   type="string",
     *  example="Data overtime berhasil ditambahkan."
     * ),
     * ),
     * ),
     * ),
     * ),
     */
    public function store(OvertimeRequest $request)
    {
        Overtime::create($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'Data overtime berhasil ditambahkan.',
            ]);
    }

    /**
     * @OA\Get(
     *     path="/api/overtime-pays/calculate",
     *     tags={"Overtime Pay"},
     *     summary="Menampilkan hasil perhitungan lembur",
     *     description="Menampilkan hasil perhitungan dari lembur yang ada pada setiap employees, berdasarkan bulan yang ditentukan, tanpa format pagination",
     *     @OA\Parameter(
     *          name="month",
     *          description="Bulan yang akan dihitung format YYYY-MM",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *    @OA\Response(
     *        response=200,
     *        description="Successful operation",
     *      @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="id",
     *                type="integer",
     *                example=6
     *              ),
     *             @OA\Property(
     *               property="name",
     *              type="string",
     *             example="John Doe"
     *           ),
     *          @OA\Property(
     *             property="salary",
     *            type="integer",
     *           example="3000000"
     *         ),
     *  @OA\Property(
     * property="overtimes",
     * type="array",
     * @OA\Items(
     *    type="object",
     *  @OA\Property(
     *                property="id",
     *                type="integer",
     *                example=1
     *              ),
     *   @OA\Property(
     *    property="employee_id",
     *  type="integer",
     * example=6
     * ),
     *
     * @OA\Property(
     *             property="date",
     *            type="string",
     *           example="2022-01-01"
     *         ),
     *        @OA\Property(
     *          property="time_started",
     *        type="string",
     *      example="09:00"
     *   ),
     *  @OA\Property(
     *     property="time_ended",
     *   type="string",
     * example="18:00"
     * ),
     *
     * ),
     *
     *             ),
     * @OA\Property(
     *             property="overtime_duration_total",
     *            type="integer",
     *           example="1"
     *         ),
     * @OA\Property(
     *             property="overtime_amount",
     *            type="integer",
     *           example="48555"
     *         ),
     *          ),
     *   ),
     * )
     */

    public function pays(OvertimePayRequest $request)
    {
        $logic = new CalculateOvertime();
        $data = $logic->data($request->month);

        return response()
            ->json($data);
    }
}
