<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\helpdesk;
use App\Models\helpdesk_image;
use App\Models\studentProfile;
use App\Models\teacherProfile;




class BugReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('bugreport');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch data from the helpdesk table
        $row = helpdesk::find($id);

        if (!$row) {
            // Handle the case where the helpdesk record with the given ID is not found
            abort(404);
        }



        if ($row) {
            $id_user = $row->created_by;

            $studentProfile = StudentProfile::where('user_id', $id_user)->first();
            $teacherProfile = TeacherProfile::where('user_id', $id_user)->first();

            if ($studentProfile && $studentProfile->first_name !== null && $studentProfile->last_name !== null) {
                // Student profile exists and has non-null first_name and last_name
                $profileName = $studentProfile->first_name . ' ' . $studentProfile->last_name;
            } elseif ($teacherProfile && $teacherProfile->first_name !== null && $teacherProfile->last_name !== null) {
                // Teacher profile exists and has non-null first_name and last_name
                $profileName = $teacherProfile->first_name . ' ' . $teacherProfile->last_name;
            } else {
                // Handle the case where neither student nor teacher profile is found or their names are null
                abort(404); // or perform any other action based on your requirements
            }
        }


        // Join the helpdesk and helpdesk_image tables
        $images = helpdesk_image::where('helpdesk_id', $id)->get();


        // Use the $row variable for the original helpdesk data
        // Use $groupedImages to access images grouped by helpdesk_id

        // dd($row, $groupedImages);

        return view('bugreport',compact('row','images','profileName'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
