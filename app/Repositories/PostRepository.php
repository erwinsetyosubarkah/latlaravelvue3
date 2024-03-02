<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Log};

class PostRepository implements PostRepositoryInterface
{
  protected $post;

  public function __construct(Post $post)
  {
    $this->post = $post;
  }

  /**
   * Show post list by given term of search
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function list(Request $request): array
  {
    $error = null;
    $response = null;

    try {
      $response = $this->post->whereNull('dt_deleted_at')->get();
    } catch (\Throwable $th) {
      $error = 'Error saat mengambil data post';
      Log::error($error, [
        'payload' => $request->all(),
        'error' => [
          'message' => $th->getMessage()
        ]
      ]);
    }


    return [$response, $error];

  }

  /**
   * Store post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function store(Request $request): array
  {
    $error = null;
    $response = null;

    $data = [
      'v_title' => $request->title,
      'tx_content' => $request->content
    ];

    DB::beginTransaction();
    try {
      if (!$this->post->create($data))
      throw new \Exception("Error saat menyimpan data post", -99);


      DB::commit();
      $response = [];


    } catch (\Throwable $th) {
      $error = $th->getCode() == -99
      ? $th->getMessage()
      : 'Terjadi kesalahan pada server. Silakan hubungi Admin.';
      Log::error($error, [
        'payload' => $request->all(),
        'error' => [
          'message' => $th->getMessage()
        ]
      ]);
      DB::rollback();
    }


    return [$response, $error];
  }

      /**
   * Update post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function update(Request $request): array
  {
    $error = null;
    $response = null;

    $data = [
      'v_title' => $request->title,
      'tx_content' => $request->content
    ];

    DB::beginTransaction();
    $query = $this->post->where('i_id',$request->id)->first();
    try {
      if (!$query->update($data))
      throw new \Exception("Error saat mengedit data post", -99);


      DB::commit();
      $response = [];


    } catch (\Throwable $th) {
      $error = $th->getCode() == -99
      ? $th->getMessage()
      : 'Terjadi kesalahan pada server. Silakan hubungi Admin.';
      Log::error($error, [
        'payload' => $request->all(),
        'error' => [
          'message' => $th->getMessage()
        ]
      ]);
      DB::rollback();
    }


    return [$response, $error];
  }

    /**
   * Delete post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function delete(Request $request): array
  {
    $error = null;
    $response = null;

    $now = Carbon::now();
    $deleted = $now->format('Y-m-d H:i:s');

    $data = [
      'dt_deleted_at' => $deleted
    ];

    DB::beginTransaction();
    $query = $this->post->where('i_id',$request->id)->first();
    try {
      if (!$query->update($data))
      throw new \Exception("Error saat menghapus data post", -99);


      DB::commit();
      $response = [];


    } catch (\Throwable $th) {
      $error = $th->getCode() == -99
      ? $th->getMessage()
      : 'Terjadi kesalahan pada server. Silakan hubungi Admin.';
      Log::error($error, [
        'payload' => $request->all(),
        'error' => [
          'message' => $th->getMessage()
        ]
      ]);
      DB::rollback();
    }


    return [$response, $error];
  }

}
