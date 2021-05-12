<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function ViewFAssignSubject()
    {
        //  $data['allData']=AssignSubject::all();
        $data['allData']=AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);
    }
    public function AssignSubjectAdd()
    {
        $data['subjects']=SchoolSubject::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }
    public function AssignSubjectStore(Request $request)
    {
        $subjectCount=count($request->subject_id);
        if( $subjectCount!=NULL)
        {
            for($i=0;$i< $subjectCount;$i++)
            {
                $subject = new AssignSubject();
                $subject->class_id=$request->class_id;
                $subject->subject_id=$request->subject_id[$i];
                $subject->full_mark=$request->full_mark[$i];
                $subject->pass_mark=$request->pass_mark[$i];
                $subject->subjective_mark=$request->subjective_mark[$i];
                $subject->save();
            }
        }
        $notification = array(
            'message'=>'Subject Assigned Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function AssignSubjectEdit($class_id)
    {
        $data['editData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        // dd($data['editData']->toArray());
        $data['subjects']=SchoolSubject::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject',$data);
    }
    public function AssignSubjectUpdate(Request $request,$class_id)
    {
        if($request->subject_id==NULL)
        {
            $notification = array(
                'message'=>'Sorry! You Do Not Select Any Subject',
                'alert-type'=>'error'
            );
            return redirect()->route('assign.subject.edit',$class_id)->with($notification);
        }
        else
        {
            $countsubject=count($request->subject_id);
            $fee_amount=AssignSubject::where('class_id',$class_id)->delete();
                for($i=0;$i<$countsubject;$i++)
                {
                    $subject = new AssignSubject();
                    $subject->class_id=$request->class_id;
                    $subject->subject_id=$request->subject_id[$i];
                    $subject->full_mark=$request->full_mark[$i];
                    $subject->pass_mark=$request->pass_mark[$i];
                    $subject->subjective_mark=$request->subjective_mark[$i];
                    $subject->save();
                    
                } //end loop
            $notification = array(
                'message'=>'Assign Subject Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }
    public function AssignSubjectDetails($class_id)
    {
        $data['detailsData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);
    }
}
