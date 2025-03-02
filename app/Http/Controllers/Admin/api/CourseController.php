<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stringable;

class CourseController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/courses",
     *     summary="Create a new course",
     *     description="Creates a new course with the provided details",
     *     operationId="storeCourse",
     *     tags={"Courses"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Full Stack Web Development"),
     *             @OA\Property(property="description", type="string", example="Learn full stack web development from scratch"),
     *             @OA\Property(property="price", type="number", format="float", example=99.99),
     *             @OA\Property(property="duration", type="string", example="6 months"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Course Created Successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Course Created Successfully"),
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Full Stack Web Development"),
     *                 @OA\Property(property="slug", type="string", example="full-stack-web-development"),
     *                 @OA\Property(property="created_at", type="string", format="datetime"),
     *                 @OA\Property(property="updated_at", type="string", format="datetime")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(CourseRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);

        $course = Course::create($validated);
        return response()->json([
            'message' => 'Course Created Successfully',
            'status' => 201,
            'data' => new CourseResource($course),
        ], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/courses/{id}",
     *     summary="Update an existing course",
     *     description="Updates a course with the provided details",
     *     operationId="updateCourse",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the course to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Updated Full Stack Web Development"),
     *             @OA\Property(property="description", type="string", example="Updated course description"),
     *             @OA\Property(property="price", type="number", format="float", example=149.99),
     *             @OA\Property(property="duration", type="string", example="8 months"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Course Updated Successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Course Updated Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Updated Full Stack Web Development"),
     *                 @OA\Property(property="slug", type="string", example="updated-full-stack-web-development"),
     *                 @OA\Property(property="created_at", type="string", format="datetime"),
     *                 @OA\Property(property="updated_at", type="string", format="datetime")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Course not found"),
     *             @OA\Property(property="status", type="integer", example=404)
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function update(CourseRequest $request, Course $course): JsonResponse
    {
        $validated = $request->validated();
        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        $course->update($validated);
        
        return response()->json([
            'message' => 'Course Updated Successfully',
            'status' => 200,
            'data' => $course
        ], 200);
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
