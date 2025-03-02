<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorDetailResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/instructors",
     *     summary="Get a list of Instructors",
     *     tags={"Admin - Instructors"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Instructors Fetched Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="success"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/StudentResource")),
     *         ),
     *     )
     * )
     */
    public function index()
    {
        $users = User::instructors()->select('id', 'name', 'email', 'status')->get();

        return response()->json([
            'message' => 'Instructors Fetched Successfully',
            'status' => 200,
            'data' => ($users),
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/admin/instructors",
     *     summary="Create a new instructor",
     *     tags={"Admin - Instructors"},
     *     description="This API creates a new instructor with the provided details.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "password_confirmation"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="phone", type="string", example="9976532100"),
     *             @OA\Property(property="password", type="string", format="password", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Instructor Created Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Instructor Created Successfully"),
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="access_token", type="string", example="your-generated-token")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The email field is required."),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="email", type="array", @OA\Items(type="string", example="The email has already been taken."))
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'experience' => ['nullable', 'string', 'max:255'], // optional
            'job_type' => ['required', 'in:1,2'], // 1 = Full-time, 2 = Part-time
            'organization_name' => ['nullable', 'string', 'max:255'], // Optional
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' =>  'Email already exist',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Confirm password does not match',
            'password.min' => 'You have to provide minimum 4 character password',
        ]);

        $user = User::create([
            'role' => 'instructor',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'active',
            'password' => Hash::make($request->password),
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'organization_name' => $request->organization_name,
            // 'verification_token' => Str::random(100),
        ]);

        if (method_exists($user, 'assignRole')) {
            $user->assignRole('instructor');
        }

        // $token = $user->createToken($user->email ?? $user->phone)->plainTextToken;

        return response()->json([
            'message' => 'Instructor Created Successfully',
            'status' => 201
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/admin/instructors/{id}",
     *     summary="Get Instructor Details",
     *     description="Fetches the details of a specific instructor by ID.",
     *     operationId="getInstructorById",
     *     tags={"Admin - Instructors"},
     *     security={{ "sanctum": {} }},
     * 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the instructor",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     * 
     *     @OA\Response(
     *         response=200,
     *         description="Instructor Fetched Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Instructor Fetched Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/InstructorDetailResource")),
     *         )
     *     ),
     * 
     *     @OA\Response(
     *         response=404,
     *         description="No Instructor found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No Instructor found"),
     *             @OA\Property(property="status", type="integer", example=404)
     *         )
     *     ),
     *      
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated access",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated"),
     *             @OA\Property(property="status", type="integer", example="401")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $user = User::instructors()->findOrFail($id);
        return response()->json([
            'message' => 'Instructor Fetched Successfully',
            'status' => 200,
            'data' => new InstructorDetailResource($user),
        ], 200);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/admin/instructors/{id}",
     *     summary="Update an Instructor",
     *     description="Update an instructor's details. Only the provided fields will be updated.",
     *     tags={"Admin - Instructors"},
     *     security={{"bearerAuth": {}}},
     *     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Instructor ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Rajesh Sharma"),
     *             @OA\Property(property="email", type="string", example="rajesh.sharma@example.com"),
     *             @OA\Property(property="phone", type="string", example="+919876543210"),
     *             @OA\Property(property="experience", type="string", example="5 years"),
     *             @OA\Property(property="job_type", type="integer", example=1, enum={1,2}, description="1 = Full-time, 2 = Part-time"),
     *             @OA\Property(property="organization_name", type="string", example="Tech Institute"),
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=200,
     *         description="Instructor Updated Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Instructor Updated Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/InstructorDetailResource"
     *             )
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=404,
     *         description="Instructor Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Instructor not found"),
     *             @OA\Property(property="status", type="integer", example=404)
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The email field is required"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *             @OA\Property(property="status", type="integer", example=401)
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => ['sometimes', 'string', 'max:20'],
            'experience' => ['sometimes', 'string', 'max:50'],
            'job_type' => ['sometimes', 'integer', 'in:1,2'], // 1 = Full-time, 2 = Part-time
            'organization_name' => ['sometimes', 'string', 'max:255'],
            'city' => 'sometimes|string',
            'state' => 'sometimes|string',
            'country' => 'sometimes|string',
            'pincode' => 'sometimes|string',
        ]);

        $user = User::instructors()->findOrFail($id);

        // Update only provided fields
        $user->update($validatedData);

        return response()->json([
            'message' => 'Instructor Updated Successfully',
            'status' => 200,
            'data' => new InstructorDetailResource($user),
        ], 200);
    }
}
