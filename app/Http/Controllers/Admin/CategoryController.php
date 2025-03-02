<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategoryStoreRequest;
use App\Models\CourseCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/admin/categories",
     *     summary="Get a list of course categories",
     *     tags={"Course - Categories"},
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
        $query = CourseCategory::query()->get();

        return response()->json([
            'message' => 'Categories Fetched Successfully',
            'status' => 200,
            'data' => $query,
        ], 200);
    }

    public function store(CourseCategoryStoreRequest $request) 
    {
            // $iconPath = file_upload($request->icon);
    
            $category = new CourseCategory();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            // $category->icon = $iconPath;
            $category->status = $request->status;
            $category->publish = $request->publish;
            $category->save();

            return response()->json([
                'message' => 'Categories Created Successfully',
                'status' => 200,
                'data' => $category,
            ], 200);
    }

    public function statusUpdate($id)
    {
        $category = CourseCategory::find($id);
        $status = $category->status == 1 ? 0 : 1;
        $category->update(['status' => $status]);

        $notification = __('Updated Successfully');

        return response()->json([
            'success' => true,
            'message' => $notification,
        ]);
    }
}
