<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{

    // 
    public function index()
    {
        $plant = Course::all();
        return view('index', compact('plant'));
    }

     public function create()
    {
        return view('create');
        
    }

    public function store(Request $request)
{
    Course::create([
        'code' => $request->code,
        'name' => $request->name,
        'category' => $request->category,
        'cycle' => $request->cycle,
        'modality' => $request->modality,
        'quota' => $request->quota,
        'description' => $request->description,
    ]);
     return redirect('/courses');
}

public function search(Request $request)
{
 
}
}