<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    /**
   * Show post list by given term of search
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function list(Request $request): array;

    /**
   * Store post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function store(Request $request): array;


    /**
   * Update post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function update(Request $request): array;

    /**
   * Delete post
   *
   * @param \Illuminate\Http\Request $request
   * @return array [response, error]
   */
  public function delete(Request $request): array;


}
