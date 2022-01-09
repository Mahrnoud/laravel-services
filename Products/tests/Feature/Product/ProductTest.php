<?php
declare(strict_types=1);

namespace Product;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * @test
     */
    public function index() :void
    {
        $this->get('/api/products')
            ->assertStatus(200);
    }

    /**
     * @test
     * @return integer
     */
    public function create() :int
    {

        return $this->post('/api/products', [

            'product' => 'Test it!',
            'description' => 'Test description!',
            'picture' => UploadedFile::fake()->image('file.png', 600, 600)
        ])
            ->assertStatus(201)
            ->original['id'];
    }

    /**
     * @test
     * @depends create
     */
    public function show(int $id) :string
    {
        return $this->get('/api/products/'.$id)
            ->assertStatus(200)
            ->assertJsonPath('id', $id)
            ->original['image'];
    }

    /**
     * @test
     * @depends show
     * @param string $image
     * @return void
     */
    public function productImagePath(string $image) :void
    {
        $this->assertFileExists(public_path('images/product/'.$image));
    }

    /**
     * @test
     * @depends create
     */
    public function update(int $id) :void
    {
        $this->put('/api/products/'.$id, [

            'product' => 'Test update!',
            'description' => 'Test description!'
        ])
            ->assertStatus(200);
    }

    /**
     * @test
     * @depends create
     */
    public function destroy(int $id) :void
    {
        $this->json('delete', '/api/products/'.$id)
            ->assertStatus(200);
    }

    /**
     * @test
     * @depends create
     */
    public function trash(int $id) :void
    {
        $this->get('/api/products/trash/all/')
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $id]);
    }

    /**
     * @test
     * @depends create
     */
    public function restore(int $id) :void
    {
        $this->json('patch', '/api/products/restore/'.$id)
            ->assertStatus(200);

        // delete again to test permanently delete
        $this->destroy($id);
    }

    /**
     * @test
     * @depends create
     */
    public function permanentlyDelete(int $id) :void
    {
        $this->json('delete', '/api/products/permanently/'.$id)
            ->assertStatus(200);
    }

}
