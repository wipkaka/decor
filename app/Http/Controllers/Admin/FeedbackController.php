<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback()
    {
        $feedback = FeedBack::all();
        return view('admin.pages.feedback',compact('feedback'));
    }
}
