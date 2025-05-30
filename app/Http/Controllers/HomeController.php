<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Member;

use App\Models\Payment;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {

          if (Auth::user()->role == 'organAdmin') {
            if(Auth::id()){
                $useriD = Auth::user()->id;
                $users = User::where('id', $useriD)->get();
                $userID = Auth::user()->organization_name;
                $members = Member::where('organ_name', $userID)->count();
                $payments = Payment::where('organ_name', $userID)->sum('amount');
                $events = Event::where('organ_name', $userID)->count();
                $blogs = Blog::where('organ_name', $userID)->count();
                return view('organAdmin.home', compact('users', 'members', 'payments', 'events', 'blogs'));
            }else{

                return redirect()->back();
             }

          } else {

            $organ = user::where('role', 'organAdmin')->count();
            $members = Member::count();
            $payments = Payment::sum('amount');
            return view('admin.home', compact('organ', 'members', 'payments'));
          }
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        return view('guest.index');
    }
    public function about()
    {
        return view('guest.about');
    }

    public function service()
    {
        return view('guest.service');
    }

    public function event()
    {
        $events = event::all();

        return view('guest.events', compact('events'));
    }
    public function blog()
    {

            $blogs = blog::all();
            return view('guest.blogs', compact('blogs'));





    }



    public function contact()
    {
        return view('guest.contact');
    }

}
