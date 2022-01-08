<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable = [

        'product', 'description', 'image', 'image_thumbnail'
    ];

    public function storeProduct(array $request) :int
    {
        return $this->create($request)->id;
    }

    public function getProducts() :object
    {
        return $this->latest('created_at')->get();
    }

    public function findProduct(int $id) :object
    {
        return $this->findOrFail($id);
    }

    public function updateProduct(array $request, int $id) : int
    {
        return $this->where('id', $id)->update($request);
    }

    public function deleteProduct(int $id) : int
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
