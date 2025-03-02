<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentDetailResource;
use App\Http\Resources\StudentResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/students",
     *     summary="Get a list of Students",
     *     tags={"Admin - Students"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Students Fetched Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="success"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/StudentResource")),
     *         ),
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $users = User::select('id', 'name', 'email', 'status', 'role')->get();

        return response()->json([
            'message' => 'Students Fetched Successfully',
            'status' => 200,
            'data' => StudentResource::collection($users),
        ], 200);

        // $users = Cache::remember('users_list', now()->addMinutes(10), function () {
        //     return User::select('id', 'name', 'email')->get();
        // });
    }

    /**
     * @OA\Get(
     *     path="/api/v1/admin/students/{id}",
     *     summary="Get a student by ID",
     *     tags={"Admin - Students"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *       name="studentID",
     *       in="path",
     *       description="Student ID",
     *       required=true
     *     ),
     * 
     *     @OA\Response(
     *         response=200,
     *         description="Student Fetched Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="success"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/StudentDetailResource")),
     *         ),
     *     )
     * )
     */
    public function show($id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'No Student found', 'status' => 404], 404);
        }

        return response()->json([
            'message' => 'Student Fetched Successfully',
            'status' => 200,
            'data' => new StudentDetailResource($user),
        ], 200);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/admin/students/{id}",
     *     summary="Update Student",
     *     tags={"Admin - Students"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Student ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="phone", type="string", example="9876543210"),
     *             @OA\Property(property="city", type="string", example="New York"),
     *             @OA\Property(property="state", type="string", example="NY"),
     *             @OA\Property(property="country", type="string", example="USA"),
     *             @OA\Property(property="pincode", type="string", example="10001")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Student Updated Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Student Updated Successfully"),
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", ref="#/components/schemas/StudentDetailResource")
     *         )
     *     ),
     *      @OA\Response(
     *         response=401,
     *         description="Unauthenticated - No Bearer Token",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden - User does not have Admin Role",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="You do not have permission to perform this action.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Student Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No Student found with given ID"),
     *             @OA\Property(property="status", type="integer", example=404)
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="errors", type="object", example={"email": {"The email must be a valid email address."}})
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => 'sometimes|string|max:15',
            'city' => 'sometimes|string',
            'state' => 'sometimes|string',
            'country' => 'sometimes|string',
            'pincode' => 'sometimes|string',
        ];

        $customMessages = [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('Email is not valid'),
            'email.max' => __('Email must be a maximum of 255 characters'),
            'phone.max' => __('Phone number must be a maximum of 15 digits'),
            'age.integer' => __('Age must be a valid number'),
            'age.min' => __('Age must be at least 1 year'),
            'age.max' => __('Age cannot be more than 120 years'),
            'gender.in' => __('Gender must be male, female, or other'),
        ];

        $validatedData = $request->validate($rules, $customMessages);

        // Find the user
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'No Student found with given ID', 'status' => 404], 404);
        }

        // Update only provided fields
        $user->update($validatedData);

        return response()->json([
            'message' => 'Student Updated Successfully',
            'status' => 200,
            'data' => new StudentDetailResource($user),
        ], 200);
    }
}
