<?php

namespace App\Http\Controllers;
use App\Models\posts;
use App\Models\thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function showwelcome(){
        $user= auth()->user();
        if($user==null){
            $user='ゲスト'; 
            return view('welcome',compact('user'));
        }
        $user= auth()->user()->name;
        return view('welcome',compact('user'));
    }
    public function showallthread(){
        $user= auth()->user();
        $threads = thread::orderBy('threadid', 'desc')->get();
        if($user==null){
            $user='ゲスト';
        return view('allthread',compact('threads','user'));
        }
        $user= auth()->user()->name;
        return view('allthread',compact('threads','user'));
    }
    public function shownewthread(){
        return view('newthread');
    }
    public function showthread($id){
        $user= auth()->user();
        $thread=thread::whereThreadid($id)->first();
        $posts=posts::whereThreadid($id)->orderBy('id', 'desc')->get();
        $threadname=$thread->thread;
        if($user==null){
            $user='ゲスト';
            return view('thread',compact('threadname','thread','posts','user')); 
        }
        $user= auth()->user()->name;
        return view('thread',compact('threadname','thread','posts','user'));
    }
    public function shownewpost($id){
        $user= auth()->user();
        $thread=thread::whereThreadid($id)->first();
        $threadid=$thread->threadid;
        if($user==null){
            $user='ゲスト'; 
            return view('newpost',compact('thread','user','threadid'));
        }
        $user= auth()->user()->name;
        return view('newpost',compact('thread','user','threadid'));
    }
    public function newthreadpost(Request $request){
        $threadname=$request->input('threadname');
            if($threadname==null){
                return view('newthread');
            }
            thread::create(['thread'=>$threadname]);
            return view('newthreadcheck');
    }
}
