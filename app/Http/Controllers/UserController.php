<?php

namespace App\Http\Controllers;


use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
        public function createAnnouncements(Request $request) {

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'deadline'=>'required',
                'salary' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return  response($errors, 419);
            } else {

                Announcement::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'deadline' => $request->deadline,
                    'salary' => $request->salary,
                    'user_id'=>Auth::user()->id
                ]);

                return response('success', 200);
            }
        }
}
