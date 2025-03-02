<?php

namespace App\Traits;

/**
 * @OA\Schema(
 *     title="PaginationResource",
 *     description="Pagination meta info resource",
 *
 *     @OA\Xml(
 *         name="PaginationResource"
 *     )
 * )
 */
trait CustomPaginationTrait
{
    /**
     * @OA\Property(
     *     property="total",
     *     description="Total records count",
     *     type="integer",
     *     example="100"
     * )
     * @OA\Property(
     *     property="per_page",
     *     description="Records per page want to get from sever response",
     *     type="integer",
     *     example="10"
     * )
     * @OA\Property(
     *     property="current_page",
     *     description="Current page number",
     *     type="integer",
     *     example="1"
     * )
     * @OA\Property(
     *     property="last_page",
     *     description="Last page number",
     *     type="integer",
     *     example="8"
     * )
     * @OA\Property(
     *     property="next_page_url",
     *     description="Next page url",
     *     type="string",
     *     example="http://host.com/page-url?page=next-page-number"
     * )
     * @OA\Property(
     *     property="prev_page_url",
     *     description="Previous page url",
     *     type="string",
     *     example="http://host.com/page-url?page=prev-page-number"
     * )
     * @OA\Property(
     *      property="url",
     *      type="object",
     *      @OA\Property(
     *          property="path",
     *          description="Page url",
     *          type="string",
     *          example="http://host.com/page-url"
     *      ),
     *      @OA\Property(
     *          property="pageName",
     *          description="Name of page",
     *          type="string",
     *          example="Get students"
     *      )
     * )
     */
    public static function buildPagination($paginator)
    {
        return [
            'total' => $paginator->total(),
            'per_page' => $paginator->perPage(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
            'next_page_url' => $paginator->nextPageUrl(),
            'prev_page_url' => $paginator->previousPageUrl(),
            'url' => $paginator->getOptions(),
        ];
    }
}
