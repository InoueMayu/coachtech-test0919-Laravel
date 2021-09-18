<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
  public function index()
  {
    $items = Tweet::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Tweet::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Tweet $tweet)
  {
    $item = Tweet::find($tweet);
    if ($item) {
      return response()->json([
        'data' => $item
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function update(Request $request, Tweet $tweet)
  {
    $update = [
      'tweet' => $request->tweet,
    ];
    $item = Tweet::where('id', $tweet->id)->update($update);
    if ($item) {
      return response()->json([
        'message' => 'Updated successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function destroy(Tweet $tweet)
  {
    $item = Tweet::where('id', $tweet->id)->delete();
    if ($item) {
      return response()->json([
        'message' => 'Deleted successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
}
