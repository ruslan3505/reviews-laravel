<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Review;
use Auth;
use App\Http\Controllers\Controller;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $dataForReviews = [
            'comment' => $request->input('comment'),
            'grade'   => $request->input('grade'),
            'image'   => $request->file('image')
        ];

        $imageName = '';
        if(!empty($request->file('image'))){
            $imageName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public/images', $imageName
            );
        }

        $review = Review::create([
            'user_id' => Auth::user()->id,
            'comment' => $dataForReviews['comment'],
            'image' => $imageName,
            'grade' => $dataForReviews['grade']
        ]);

        if($review){
            return response()->json([
                'result' => 'done'
            ]);
        } else {
            return response('' , 403);
        }
    }

    public function getComments()
    {
        $review = Review::with('user')->get();

        return response()->json([
            'review' => $review
        ]);
    }
}
