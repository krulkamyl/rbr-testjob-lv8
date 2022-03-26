<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\PostRepositoryInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->postRepository->all();
        if ($data)
            return response()->json([
                'data' => $data,
            ], 200);
        else
            return response()->json([], 204);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostRequest $request)
    {
        $model = $this->postRepository->create($request->validated());
        if ($model)
            return response()->json([
                'data' => $model,
            ], 200);
        else
            return response()->json([], 501);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->postRepository->find($id);
        if ($data)
            return response()->json([
                'data' => $data,
            ], 200);
        else
            return response()->json([], 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PostRequest $request, $id)
    {
        $data = $this->postRepository->find($id);
        if ($data)
            return response()->json([
                'data' => $this->postRepository->update($data, $request->validated()),
            ], 200);
        else
            return response()->json([], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $data = $this->postRepository->find($id);
        if ($data)
            return response()->json([
                'is_delete' => $data->delete()
            ], 200);
        else
            return response()->json([], 404);

    }
}
