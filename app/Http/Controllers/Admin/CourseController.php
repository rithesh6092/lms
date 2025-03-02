<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stringable;

class CourseController extends Controller
{
    public function store(CourseRequest $request): JsonResponse
    { 
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);
        
        $course = Course::create($validated);
        return response()->json([
            'message' => 'Course Created Successfully',
            'status' => 201,
            'data' => $course
        ], 201); 
    }

      /**
     * @OA\Get(
     *     path="/api/v1/courses",
     *     summary="Get all Courses",
     *     description="Fetches a list of all available courses",
     *     operationId="getCourses",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Products Fetched Successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Products Fetched Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Something went wrong"),
     *             @OA\Property(property="status", type="integer", example=500)
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Unauthenticated")
     *         )
     *     )
     * )
     */
    public function index() 
    {
        $query = Course::query()->get();

        return response()->json([
            'message' => 'Courses Fetched Successfully',
            'status' => 200,
            'data' => $query,
        ], 200);
    }
}
