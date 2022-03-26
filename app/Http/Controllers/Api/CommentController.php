<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\CommentRepositoryInterface;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->commentRepository->all();
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
     * @param  CommentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request)
    {
        $model = $this->commentRepository->create($request->validated());
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
        $data = $this->commentRepository->find($id);
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
     * @param  CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CommentRequest $request, $id)
    {
        $data = $this->commentRepository->find($id);
        if ($data)
            return response()->json([
                'data' => $this->commentRepository->update($data, $request->validated()),
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
        $data = $this->commentRepository->find($id);
        if ($data)
            return response()->json([
                'is_delete' => $data->delete()
            ], 200);
        else
            return response()->json([], 404);

    }
}
