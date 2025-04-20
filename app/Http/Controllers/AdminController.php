<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\OrganAdmin;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function organ()

    {

       
         
            $organ = user::all();
            return view('admin.organ', compact('organ' ));
       
        }
       
    

    public function orgAdmin()
    {
       
        return view('admin.orgAdmin');
    }

    public function orgadmin_upload(Request $request)
    {
        $org =new organadmin;
      

        $org->organ_name=$request->organ_name;
        $org->name=$request->name;
        $org->email=$request->email;
        $org->role=$request->role;
        

        $org->status=$request->status;

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            // other validations...
        ]);
     
        $org->save();
        return redirect()->back()->with('message', 'Organization Admin added successfully!');
       
    }

    public function members()
    {
        $member = member::all();
        return view('admin.members' , compact('member'));
    }

    public function organadmin()
    {
        $org = organadmin::all();
        return view('admin.organadmin', compact('org'));
    }

    public function editorgan($id)
    {
        $data= user::find($id);
        return view('admin.editorgan', compact('data') );
    }

    public function updateorgan(Request $request,$id)
    {
        $org =user::find($id);
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageorgan',$imagename);
          $org->profile_photo_path=$imagename;

        $org->organization_name=$request->organization_name;
        $org->name=$request->name;
        $org->plan=$request->plan;
        $org->member=$request->member;
        $org->email=$request->email;
        $org->password=$request->password;
        

        $org->organization_type=$request->organization_type;

    
        $org->save();
        return redirect()->back()->with('message', 'Organization updated successfully!');
       
    }
   
     
    public function deleteorgan($id)
    {
        $data= user::find($id);
       $data->delete();

       return redirect()->back()->with('message', 'Organization deleted successfully!');

    }

    public function editmembers($id)
    {
        $data= member::find($id);
        return view('admin.editmembers', compact('data') );
    }
    
    public function updatemember(Request $request, $id)
    {
        $member= member::find($id);
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imagemember',$imagename);
          $member->photo=$imagename;
          
        $member->name=$request->name;
      
       $member->email=$request->email;
       $member->organ_name=$request->organ_name;
       $member->status=$request->status;
       $member->join_date=$request->join_date;
       $member->password=$request->password;
     
      

       
    $member->save();
    return redirect()->back()->with('message', 'Member updated successfully!');
       
    }

    public function deletemembers($id)
    {
        $data= member::find($id);
       $data->delete();

       return redirect()->back()->with('message', 'Member deleted successfully!');

    }

    public function muaz()
    {
        return view('admin.addorgan');
    }
    public function uploadorgan(Request $request)
    {
        $org =new user;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->file->move('imageorgan',$imagename);
          $org->profile_photo_path=$imagename;

        $org->organization_name=$request->organization_name;
        $org->name=$request->name;
        $org->plan=$request->plan;
        $org->member=$request->member;
        $org->email=$request->email;
        $org->password=$request->password;
        

        $org->organization_type=$request->organization_type;

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            // other validations...
        ]);
     
        $org->save();
        return redirect()->back()->with('message', 'Organization added successfully!');
       
    }

    public function payments()

    {
        
        $payments = payment::all();
        return view('admin.payments', compact('payments'));
    }
}
