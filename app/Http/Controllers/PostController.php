<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
  protected $post;
  public function __construct(PostRepositoryInterface $post)
  {
      $this->post = $post;
  }

  public function list(Request $request)
  {

    [$response, $error] = $this->post->list($request);

    if (!is_null($error)) {
      return response()->json([
        'status' => 'error',
        'message' => $error,
        'data' => []
      ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    return PostResource::collection($response)
      ->additional(['status' => 'success']);
  }

  public function store(PostRequest $request)
  {
    $request->validated();

    [$response, $error] = $this->post->store($request);

    if (!is_null($error)) {
      return response()->json([
        'status' => 'error',
        'message' => $error,
        'data' => []
      ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    return response()->json([
      'status' => 'success',
      'message' => 'Data berhasil disimpan',
      'data' => new PostResource($response[0])
    ]);

  }

  public function update(PostRequest $request)
  {
    $request->validated();

    [$response, $error] = $this->post->update($request);

    if (!is_null($error)) {
      return response()->json([
        'status' => 'error',
        'message' => $error,
        'data' => []
      ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    return response()->json([
      'status' => 'success',
      'message' => 'Data berhasil diubah',
      'data' => new PostResource($response[0])
    ]);

  }

  public function delete(Request $request)
  {

    [$response, $error] = $this->post->delete($request);

    if (!is_null($error)) {
      return response()->json([
        'status' => 'error',
        'message' => $error,
        'data' => []
      ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    return response()->json([
      'status' => 'success',
      'message' => 'Data berhasil dihapus',
      'data' => new PostResource($response[0])
    ]);

  }


}
