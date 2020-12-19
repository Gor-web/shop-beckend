<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function all() {
        $announcements = Announcement::all();
        return $announcements;
    }
    public function delete($id) {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return 'success';
    }
}
