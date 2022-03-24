<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repository\PostRepositoryInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->postRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(PostRequest $request)
    {
        return $this->postRepository->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->postRepository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(PostRequest $request, $id): bool|string
    {
        $model = $this->postRepository->find($id);
        if ($model)
            return $this->postRepository->update($model, $request->validated());
        else
            return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $model = $this->postRepository->find($id);
        if ($model)
            return $this->postRepository->delete($model);
        else
            return false;
    }
}
