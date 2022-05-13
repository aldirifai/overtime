<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * @OA\Post(
     *   path="/api/employees",
     *  tags={"Employee"},
     * summary="Menambahkan data karyawan baru",
     * description="Menambahkan data karyawan baru",
     * @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=true,
     *        example="Nama 1",
     *        description="Isi dengan nama karyawan",
     *      ),
     * @OA\Parameter(
     *         name="salary",
     *         in="query",
     *         required=true,
     *        example="3000000",
     *        description="Isi dengan nama gaji karyawan rentang 3000000 - 10000000",
     *      ),
     * @OA\Response(
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
     *   example="Data karyawan berhasil ditambahkan."
     *  ),
     *  ),
     *  ),
     *  ),
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'Data karyawan berhasil ditambahkan.',
            ]);
    }
}
