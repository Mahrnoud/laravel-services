<?php
declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryRestoreDeletedService;

class RestoreDeletedController extends Controller
{
    private CategoryRestoreDeletedService $categoryRestoreDeletedService;

    public function __construct()
    {
        $this->categoryRestoreDeletedService = new CategoryRestoreDeletedService();
    }

    public function __invoke(int $id) :object
    {
        $restore = $this->categoryRestoreDeletedService->restore($id);

        if($restore){

            return response(['message' => 'Category restore successfully!'], 200);
        }
        return response(['message' => 'Error while restore category!'], 204);
    }
}
