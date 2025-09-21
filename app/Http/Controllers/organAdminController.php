<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Payment;
use App\Models\Plan;


use Illuminate\Support\Facades\Auth;



class organAdminController extends Controller
{
    public function member()
    {

        if(Auth::id()){
            $userID = Auth::user()->organization_name;
            $useriD = Auth::user()->id;
            $member =User::where('organization_name', $userID)->where('role', 'member')->get();
            $users = User::where('id', $useriD)->get();
            return view('organAdmin.member1', compact('member', 'users'));
        }else{

            return redirect()->back();
         }



    }

    public function sidebar()
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            return view('organAdmin.sidebar nav', compact('users'));
        }else{

            return redirect()->back();
         }

    }

    public function editprofile($id)
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            $data= user::find($id);

            return view('organAdmin.edit_profile', compact('users','data'));
        }else{

            return redirect()->back();
         }
    }

    public function updateprofile(Request $request,$id)
    {
        $org =user::find($id);
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageorgan',$imagename);
          $org->profile_photo_path=$imagename;

        $org->organization_name=$request->organization_name;
        $org->name=$request->name;

        $org->email=$request->email;
        $org->password=$request->password;


        $org->organization_type=$request->organization_type;


        $org->save();
        return redirect()->back()->with('message', 'Profile changed successfully!');

    }


    public function addmember()
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            return view('organAdmin.addmember', compact('users'));
        }else{

            return redirect()->back();
         }
    }
    public function edit($id)
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            $data= member::find($id);
            return view('organAdmin.edit',compact('data', 'users') );
        }else{

            return redirect()->back();
         }

    }


    public function deletemember($id)
    {
        $data= member::find($id);
       $data->delete();

       return redirect()->back()->with('message', 'Member deleted successfully!');

    }


    public function editmember(Request $request, $id)
    {
        $member= member::find($id);

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imagemember',$imagename);
          $member->photo=$imagename;

        $member->name=$request->name;

       $member->email=$request->email;
       $member->role=$request->role;
       $member->status=$request->status;
       $member->join_date=$request->join_date;
       $member->password=$request->password;



    $member->save();
    return redirect()->back()->with('message', 'Member updated successfully!');

    }


public function upload(Request $request)
{
    $photoName = null;
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $photoName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('imagemember'), $photoName);
    }

$org =Auth::user() ;
$currentMembers = User::where('organization_name', $org->organization_name)->where('role', 'member')->count();
 if ($currentMembers >= $org->plan->max_members) {
    return back()->with('error', 'You reached your member limit. Upgrade your plan!');
}


      $defaultPlan = Plan::where('type', 'member')->where('name', 'Basic')->first();
    $expiry = now()->addDays($defaultPlan->duration_days);

    $member = User::create([
        'name' => $request->name,
        //'organization_name' => $request->organization_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'sex' => $request->sex,
        'join_date' => $request->join_date,
        'role' => 'member', // 🚀 forced automatically
        'organization_name' => Auth::user()->organization_name,
        'plan_id' => $defaultPlan->id,
        'plan_expiry' => $expiry,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        'photo' => $photoName,
    ]);



       $request->validate([

        'name' => 'required|string|max:255',
        'organ_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'sex' => 'nullable|in:male,female,other',
        'join_date' => 'nullable|date',
        'password' => 'required|string|min:8|confirmed', // needs password_confirmation
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        // other validations...
    ]);

    $member->save();

    return redirect()->back()->with('message', 'Member added successfully!');
        //return redirect()->back()->with('success', 'Member added successfully!');
    }



    public function event()
    {
     if(Auth::id()){
        $userID = Auth::user()->organization_name;
        $useriD = Auth::user()->id;
        $users = User::where('id', $useriD)->get();
        $events = Event::where('organ_name', $userID)->get();
        return view('organAdmin.event', compact('events', 'users'));
    }else{

        return redirect()->back()->with('message', 'Event did not create yet! ');
     }

    }

    public function uploadevent( Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:meeting,workshop,social,fundraiser,conference',
           /* 'description' => 'nullable|string',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'rsvp_deadline' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:draft,upcoming,published',
            'send_notifications' => 'boolean',*/
        ]);

        $event = new event;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageevent',$imagename);
          $event->image=$imagename;
        $event->title=$request->title;
        $event->type=$request->type;
        $event->description=$request->description;
        $event->start_date=$request->start_date;
        $event->start_time=$request->start_time;
        $event->end_date=$request->end_date;
        $event->end_time=$request->end_time;
        $event->location=$request->location;
        $event->capacity=$request->capacity;
        $event->rsvp_deadline=$request->rsvp_deadline;
        $event->status=$request->status;
        $event->organ_name=$request->organ_name;

        $event->save();
        return redirect()->back()->with('message', 'Event added successfully!');
        //return redirect()->back()->with('success', 'Event added successfully!');
    }

    public function editevent($id)
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            $data= event::find($id);

            return view('organAdmin.editevent', compact('users','data'));
        }else{

            return redirect()->back();
         }


    }

    public function updateevent(Request $request, $id)
    {
       $event = event::find($id);
       $image=$request->file;
       $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->file->move('imageevent',$imagename);
         $event->image=$imagename;
       $event->title=$request->title;
       $event->type=$request->type;
       $event->description=$request->description;
       $event->start_date=$request->start_date;
       $event->start_time=$request->start_time;
       $event->end_date=$request->end_date;
       $event->end_time=$request->end_time;
       $event->location=$request->location;
       $event->capacity=$request->capacity;
       $event->rsvp_deadline=$request->rsvp_deadline;
       $event->status=$request->status;
       $event->organ_name=$request->organ_name;

       $event->save();
       return redirect()->back()->with('message', 'Event updated successfully!');
       //return redirect()->back()->with('success', 'Event added successfully!');
    }


    public function deleteevent($id)
    {
        $data= event::find($id);
       $data->delete();

       return redirect()->back()->with('message', 'Event deleted successfully!');

    }



    public function blog()
    {
        if(Auth::id()){
            $userID = Auth::user()->organization_name;
            $useriD = Auth::user()->id;
            $blogs = Blog::where('organ_name', $userID)->get();
            $users = User::where('id', $useriD)->get();
            return view('organAdmin.blog', compact('blogs','users'));
        }else{

            return redirect()->back()->with('message', 'Blogs did not post yet! ');
         }

    }
    public function uploadblog( Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:general,update,urgent,other',
           /* 'description' => 'nullable|string',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'rsvp_deadline' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:draft,upcoming,published',
            'send_notifications' => 'boolean',*/
        ]);

        $blog = new blog;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageblog',$imagename);
          $blog->image=$imagename;
        $blog->title=$request->title;
        $blog->category=$request->category;
        $blog->content=$request->content;
        $blog->status=$request->status;
        $blog->organ_name=$request->organ_name;

        $blog->save();
        return redirect()->back()->with('message', 'Blog posted successfully!');
        //return redirect()->back()->with('success', 'Event added successfully!');
    }

    public function editblog($id)
    {
        if(Auth::id()){
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            $data= blog::find($id);

            return view('organAdmin.editblog', compact('users','data'));
        }else{

            return redirect()->back();
         }

    }

    public function updateblog(Request $request, $id)
    {
       $blog = blog::find($id);

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageblog',$imagename);
          $blog->image=$imagename;
        $blog->title=$request->title;
        $blog->category=$request->category;
        $blog->content=$request->content;
        $blog->status=$request->status;
        $blog->organ_name=$request->organ_name;

        $blog->save();
        return redirect()->back()->with('message', 'Blog updated successfully!');
       //return redirect()->back()->with('success', 'Event added successfully!');
    }

    public function deleteblog($id)
    {
        $data= blog::find($id);
       $data->delete();

       return redirect()->back()->with('message', 'Blog deleted successfully!');

    }

    public function payment()
    {
        if(Auth::id()){
            $userID = Auth::user()->organization_name;
            $payments = payment::where('organ_name', $userID)->get();
            $useriD = Auth::user()->id;
            $users = User::where('id', $useriD)->get();
            return view('organAdmin.payment', compact('users', 'payments'));
        }else{

            return redirect()->back();
         }

    }


    public function uploadpayment(Request $request)
    {
       $payment = new payment;
        $payment->name=$request->name;
        $payment->organ_name=$request->organ_name;
      $payment->plan=$request->plan;
      $payment->amount=$request->amount;
      $payment->billing=$request->billing;
      $payment->payment_method=$request->payment_method;


   $payment->save();

   return redirect()->back()->with('message', 'Payment completed successfully!');

    }



}
