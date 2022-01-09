<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable = [

        'category', 'description', 'image', 'image_thumbnail'
    ];

    public function storeCategory(array $request) :int
    {
        return $this->create($request)->id;
    }

    public function getCategories() :object
    {
        return $this->latest('created_at')->get();
    }

    public function findCategory(int $id) :object
    {
        return $this->findOrFail($id);
    }

    public function updateCategory(array $request, int $id) : int
    {
        return $this->where('id', $id)->update($request);
    }

    public function deleteCategory(int $id) : int
    {
        return $this->where('id', $id)->delete();
    }

    public function getTrashed() :object
    {
        return $this->onlyTrashed()->latest('created_at')->get();
    }

    public function findTrashed(int $id) :object
    {
        return $this->onlyTrashed()->findOrFail($id);
    }

}
