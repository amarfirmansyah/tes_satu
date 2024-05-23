<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfessionResource;
use App\Models\Profession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $data = Profession::all();
        return response()->json([
            'status' => 'success',
            'data' => ProfessionResource::collection($data)
        ]);
    }
}
