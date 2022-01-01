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

    public function storeProduct(object $request) :int
    {
        return $this->create($request->all())->id;
    }

    public function getProducts() :object
    {
        return $this->latest('created_at')->get();
    }

}