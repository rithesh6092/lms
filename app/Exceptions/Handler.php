<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Handle ModuleNotFoundException
        // $this->renderable(function (NotFoundHttpException $e, $request) {
        //     $routeName = $request->route()->getName();
            
        //     if ($routeName === 'api.instructors.show') {
        //         $message = 'Instructor not found.';
        //     } elseif ($routeName === 'api.students.show') {
        //         $message = 'Student not found.';
        //     } else {
        //         $message = 'Resource not found.';
        //     }
        //     return response()->json([
        //         'message' => $message,
        //         'status' => 404
        //     ], 404);
        // });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
