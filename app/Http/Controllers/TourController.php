<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Tour;
use App\Staff;
use App\Schedule;
use App\Tour_Image;
use DB;
use File;

class TourController extends Controller
{
	public function __construct()
    {
        $this->middleware('company',['except' => 'getLogout']);
    }

    public function getTour()
    {
        $tour = Tour::paginate(10);
    	return view('tour.list', compact('tour'));
    }

    public function getCreateTour(){
        return view('tour.create');
    }

    public function deleteTour($id){
        
        // die(var_dump($tour->tourImage[0]['image']));
        $tourimage = Tour_Image::where('tour_id', $id)->get();
        $tour = Tour::Find($id);
        $folderDir = 'uploads/';
        $destinationPath = base_path() . '/' . $folderDir;
        
        foreach ($tourimage as $key=>$value) {
            File::delete($destinationPath.$tourimage[$key]->image);
        }
        Tour_Image::where('tour_id', $id)->delete();
        Schedule::where('tour_id', $id)->delete();
        $tour->delete();
        return back()->withMessage('Tour deleted!');
    }


    public function postCreateTour(Request $request){

        $tour =new Tour();
        
        $company_id = Auth::guard('company')->user()->id;
        $tour ->name       = $request->tourname;
        $tour ->vehicle = $request->vehicle;
        $tour ->short_description = $request->short_description;
        $tour ->overview = $request->overview;
        $tour ->policy = $request->policy;
        $tour ->startlocal = $request->startlocal;
        $tour ->endlocal = $request->endlocal;
        $tour ->number = $request->number;
        $tour ->company_id = $company_id;
        $tour ->save();

        $timestart = (array) $request ->timestart;
        $timeend = (array) $request ->timeend;
        $hourstart = (array) $request ->hourstart;
        $adultprice = (array) $request ->adultprice;
        $childprice = (array) $request ->childprice;

        for ($i=0; $i < count($adultprice); $i++) {
            $schedule = new Schedule();
            $schedule ->tour_id = $tour ->id;
            $schedule ->timestart = $timestart[$i];
            $schedule ->timeend = $timeend[$i];
            $schedule ->hourstart = date("H:i A", strtotime($hourstart[$i]));;
            $schedule ->adultprice = $adultprice[$i];
            $schedule ->childprice = $childprice[$i];
            $schedule ->save();
        }

//        $this->_postImage($request, $tour);

        return redirect()->back();
    }


    public function tourDetails($id){
	    $tour = Tour::find($id);
        $staff = Staff::all();
        // $schedule = Schedule::where('tour_id', $id);
        $tourimage = $tour->tourImage;
        $schedule = $tour->tourSchedule;
	    return view('tour.details', compact('tour','tourimage','schedule','staff'));

    }
    public function postImage(Request $request){

         if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                // set destination path

                $folderDir = 'uploads';
                $destinationPath = public_path().'/images/tour';
                $abc = Tour::orderBy('created_at', 'desc')->first();
                // this form uploads multiple files
                foreach ($request->file('file') as $fileKey => $fileObject ) {
                    // make sure each file is valid
                    $tourImage = new Tour_Image;
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = time() . $fileObject->getClientOriginalName();
                        // move the file from tmp to the destination path
                        $fileObject->move($destinationPath, $destinationFileName);
                        // save the the destination filename
                        $tourImage->tour_id = $abc->id;
                        $tourImage->image = $destinationFileName;
                        
                    }
                    $tourImage->save();
                }
            }

        }


        return redirect()->back();
    }

    public function addStaffSchedule($schedule_id,$staff_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);
        $schedule ->staff_id = (int)$staff_id;
        $schedule->save();

    }

}
