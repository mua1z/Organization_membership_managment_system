<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Payment;
use App\Models\Plan;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MemberController extends Controller
{

     public function sidebar1()
    {

            return view('member.sidebar');
    }



    public function event12()
    {


      if(Auth::id()){
        $useriD = Auth::user()->id;
        $users = User::where('id', $useriD)->where('role', 'member')->get();
        $orgName = Auth::user()->organization_name;

        $events = Event::where('organ_name', $orgName)->get();
        //$blogs = Blog::where('organ_name', $orgName)->count();
        // $events = Event::all();

        return view('member.event1', compact('events','users'));
         }else{

            return redirect()->back();
         }
    }

    public function profile()
    {


      if(Auth::id()){
        $useriD = Auth::user()->id;
        $users = User::where('id', $useriD)->where('role', 'member')->get();
        $orgName = Auth::user()->organization_name;

        //$events = Event::where('organ_name', $orgName)->get();
        $blogs = Blog::where('organ_name', $orgName)->get();
        // $events = Event::all();

        return view('member.profile', compact('blogs','users'));
         }else{

            return redirect()->back();
         }
    }





}
