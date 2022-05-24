<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Session;
use Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    // ================= START REVIEW STORE METHOD ================= //
    public function ReviewStore(Request $request){

        $product = $request->product_id;

        $this->validate($request,[
            'summary' => 'required',
            'comment' => 'required'

        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Review Will Approve By Admin');
        return redirect()->back();

    }
    // ================= START REVIEW STORE METHOD ================= //

    // ================= START ADMIN MANAGE REVIEW PENDING METHOD ================= //
    public function PendingReview(){

        $review = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('BackEnd.review.pending_review', compact('review'));
    }

    // ================= START ADMIN MANAGE REVIEW PENDING METHOD ================= //

    // ================= START ADMIN REVIEW APPROVE METHOD ================= //
    public function ReviewApprove($id){

        Review::where('id',$id)->update(['status' => 1]);

        Session::flash('success','Review Approve Successfully');
        return redirect()->back();

    }

    // ================= START ADMIN REVIEW APPROVE METHOD ================= //

    // ================= START ADMIN MANAGE PUBLISH METHOD ================= //
    public function PublishReview(){

        $review = Review::where('status',1)->orderBy('id','DESC')->get();
        return view('BackEnd.review.publish_review', compact('review'));
    }

    // ================= START ADMIN MANAGE PUBLISH METHOD ================= //

    // ================= START DELETE REVIEW METHOD ================= //
    public function DeleteReview($id){

        Review::findOrFail($id)->delete();

        Session::flash('info','Review Delete Successfully');
        return redirect()->back();

    }

    // ================= START DELETE REVIEW METHOD ================= //
}