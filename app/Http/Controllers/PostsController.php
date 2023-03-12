<?php

namespace App\Http\Controllers;
use App\Models\posts;
use App\Models\thread;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function newpost(Request $request){
        $user= auth()->user();
        $contributor=$request->input('contributor');
        $postcontent=$request->input('postcontent');
        $threadid = $request->threadid;
        if($user==null){
            if($contributor==null||$postcontent==null){
                return view('newpost',compact('threadid'));
            }
            $userid="0";
            posts::create(['name'=>$contributor,'threadid'=>$threadid,'userid'=>$userid,'posts'=>$postcontent]);
            return view('newpostcheck',compact('threadid'));
        }
        $userid= auth()->user()->id;
        if($contributor==null||$postcontent==null){
            return view('newpost',compact('threadid'));
        }
        posts::create(['name'=>$contributor,'threadid'=>$threadid,'userid'=>$userid,'posts'=>$postcontent]);
        return view('newpostcheck',compact('threadid'));
    }
}

