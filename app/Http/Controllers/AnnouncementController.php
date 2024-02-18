<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use App\Models\Notification;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = Announcement::all();
        return view('Backend.Announcement.list')->with(compact('announcement'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->save();
        $user = User::where('type', 'user')->get();
        foreach ($user as $user_details) {
            $notification = new Notification();
            $notification->title = $request->title;
            $notification->description = $request->description;
            $notification->student_id = $user_details->id;
            $notification->type = 'announcement';
            $notification->url = '/student/notifications';
            $notification->save();
        }
        return redirect()->back()->with('success', 'Announcement List');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
