<?php

namespace Tests\Feature\Category;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    /**
     * @test
     */
    public function index() :void
    {
        $this->get('/api/categories')
            ->assertStatus(200);
    }

    /**
     * @test
     * @return integer
     */
    public function create() :int
    {

        return $this->post('/api/categories', [

            'category' => 'Test it!',
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
        return $this->get('/api/categories/'.$id)
            ->assertStatus(200)
            ->assertJsonPath('data.id', $id)
            ->original['image'];
    }

    /**
     * @test
     * @depends show
     * @param string $image
     * @return void
     */
    public function categoryImagePath(string $image) :void
    {
        $this->assertFileExists(public_path('images/category/'.$image));
    }

    /**
     * @test
     * @depends create
     */
    public function update(int $id) :void
    {
        $this->put('/api/categories/'.$id, [

            'category' => 'Test update!',
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
        $this->json('delete', '/api/categories/'.$id)
            ->assertStatus(200);
    }

    /**
     * @test
     * @depends create
     */
    public function trash(int $id) :void
    {
        $this->get('/api/categories/trash/all/')
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $id]);
    }

    /**
     * @test
     * @depends create
     */
    public function restore(int $id) :void
    {
        $this->json('patch', '/api/categories/restore/'.$id)
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
        $this->json('delete', '/api/categories/permanently/'.$id)
            ->assertStatus(200);
    }
}
