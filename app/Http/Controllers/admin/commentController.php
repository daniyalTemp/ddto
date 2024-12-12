<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function list(Request $request)
    {
        $comments= comments::all();
        return view('dashboard.comment.list' , compact('comments'));

    }
    public function show(Request $request, int $id){
        $comment= comments::find($id);
        return view('dashboard.comment.show' , compact('comment'));
    }

    public function del(int $id)
    {
        comments::destroy([$id]);
        return redirect()->route('dashboard.comments.list')->with(['msg'=>'عملیات با موفیت انجام شد']);
    }
    public function seen(Request $request , int $id , string $status){
        $comment= comments::find($id);
        if ($status == -1 )
            $comment->seen=true;
        if ($status==0)
            $comment->seen=false;
        $comment->save();
        return redirect()->route('dashboard.comments.list')->with(['msg'=>'عملیات با موفیت انجام شد']);
    }
    public function showInWeb(Request $request , int $id , string $status){
        $comment= comments::find($id);
        if ($status == -1 )
            $comment->showInWebsite=true;
        if ($status==0)
            $comment->showInWebsite=false;
        $comment->save();
        return redirect()->route('dashboard.comments.list')->with(['msg'=>'عملیات با موفیت انجام شد']);
    }

    public function addNote(Request $request , int $id)
    {
        $comment= comments::find($id);
        $comment->adminNote = $request->adminNote?$request->adminNote:$comment->adminNote;
        $comment->save();
        return redirect()->route('dashboard.comments.list')->with(['msg'=>'عملیات با موفیت انجام شد']);

    }
}
