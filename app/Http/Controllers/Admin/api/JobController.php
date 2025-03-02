<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/jobs",
     *     summary="Create a new job posting",
     *     description="Creates a new job posting with the provided details",
     *     operationId="storeJob",
     *     tags={"Jobs"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "description", "link", "company_name", "application_start_date", "application_end_date"},
     *             @OA\Property(property="title", type="string", example="Senior Full Stack Developer"),
     *             @OA\Property(property="description", type="string", example="We are looking for an experienced Full Stack Developer..."),
     *             @OA\Property(property="link", type="string", example="https://company.com/careers/senior-dev"),
     *             @OA\Property(property="company_name", type="string", example="Tech Corp Ltd"),
     *             @OA\Property(property="status", type="string", enum={"active", "inactive", "expired"}, example="active"),
     *             @OA\Property(property="application_start_date", type="string", format="date", example="2024-03-02"),
     *             @OA\Property(property="application_end_date", type="string", format="date", example="2024-04-02"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Job Created Successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Job Created Successfully"),
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="data", type="object")
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
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'company_name' => 'required|string|max:255',
            'status' => 'sometimes|in:active,inactive,expired',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after:application_start_date',
        ]);

        $job = Job::create($validated);

        return response()->json([
            'message' => 'Job Created Successfully',
            'status' => 201,
            'data' => $job
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/jobs",
     *     summary="Get all Jobs",
     *     description="Fetches a list of all available jobs",
     *     operationId="getJobs",
     *     tags={"Jobs"},
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         required=false,
     *         description="Filter jobs by status",
     *         @OA\Schema(type="string", enum={"active", "inactive", "expired"})
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Jobs Fetched Successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Jobs Fetched Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer"),
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="description", type="string"),
     *                     @OA\Property(property="link", type="string"),
     *                     @OA\Property(property="company_name", type="string"),
     *                     @OA\Property(property="status", type="string"),
     *                     @OA\Property(property="application_start_date", type="string", format="date"),
     *                     @OA\Property(property="application_end_date", type="string", format="date"),
     *                     @OA\Property(property="created_at", type="string", format="datetime"),
     *                     @OA\Property(property="updated_at", type="string", format="datetime")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $query = Job::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $jobs = $query->latest()->get();

        return response()->json([
            'message' => 'Jobs Fetched Successfully',
            'status' => 200,
            'data' => $jobs
        ], 200);
    }
} 