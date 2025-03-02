<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/student",
     *     summary="Add Student",
     *     tags={"Student"},
     *
     *     @OA\RequestBody(
     *
     *         @OA\JsonContent(
     *             required={"password", "email"},
     *
     *             @OA\Property(property="name", type="string", example="John"),
     *             @OA\Property(property="email", type="string", example="johndoe@example.com"),
     *             @OA\Property(property="password", type="string", example="password"),
     *             @OA\Property(property="phone", type="string", example="1234567890"),
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Get Properties successfully",
     *     ),
     *     security={{"bearerAuth":{}}},
     * )
     */
    public function store(Request $request): JsonResponse
    {
        // if (!$request()->user()->hasRole('admin')) {
        //     return response()->json(['message' => 'Forbidden'], 403);
        // }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:8', 'max:100']
        ], [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.unique' => __('Email already exist'),
            'password.required' => __('Password is required'),
            'password.confirmed' => __('Confirm password does not match'),
            'password.min' => __('You have to provide minimum 8 character password'),
        ]);

        $user = User::create([
            'role' => 'student',
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'active',
            'is_banned' => 'no',
            'password' => Hash::make($request->password),
            // 'verification_token' => Str::random(100),
        ]);
        $user->assignRole('student');

        // (new MailSenderService)->sendVerifyMailToUserFromTrait('single_user', $user);

        $token = $user->createToken($user->email ?? $user->phone)->plainTextToken;

        // $notification = __('A varification link has been send to your mail, please verify and enjoy our service');
        // $notification = ['messege' => $notification, 'alert-type' => 'success'];

        return response()->json([
            'message' => 'Student Created Successfully',
            'status' => 201,
            'data' => [
                'access_token' => $token,
            ],
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/login",
     *     tags={"Auth"},
     *     summary="Login",
     *     summary="Creates a access token to securely get application resources",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", example="sample@email.com"),
     *             @OA\Property(property="password", type="string", example="********")
     *         ),
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Login success.",
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Login success."),
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  @OA\Property(
     *                     property="access_token", type="string"
     *                  )
     *             )
     *         ),
     *     ),
     *
     *     @OA\Response(
     *         response=422,
     *         description="Invalid credentials.",
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Login success."),
     *             @OA\Property(
     *                  property="errors",
     *                  type="object",
     *                  @OA\Property(
     *                     property="email",
     *                     type="array",
     *
     *                     @OA\Items(type="string", example="The provided credentials are incorrect.")
     *                  )
     *             )
     *         ),
     *     )
     * )
     */
    public function login(Request $request): JsonResponse
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => __('Email is required'),
            'password.required' => __('Password is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        // Check if user exists and password match
        if (!$user || !Hash::check($request->password, $user->password)) {
            $notification = __('Invalid credentials please check your email and password');
            throw ValidationException::withMessages(['email' => $notification]);
        }

        // // Check if user is banned
        // if ($user->is_banned == UserStatus::BANNED->value) {
        //     $notification = __('Your account has been banned');
        //     $notification = ['messege' => $notification, 'alert-type' => 'error'];
        // }

        // Check if email is verified
        // if (!$user->email_verified_at) {
        //     $notification = __('Please verify your email');
        //     $notification = ['messege' => $notification, 'alert-type' => 'error'];

        //     return redirect()->back()->with($notification);
        // }

        $data = [
            'token' => $user->createToken($request->email)->plainTextToken,
            'is_student' => true
        ];

        return response()->json(['message' => 'Login success.', 'status' => 200, 'data' => $data], 200);
    }
}
