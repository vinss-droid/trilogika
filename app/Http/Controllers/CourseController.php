<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('courses.add_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $newFileName = $date . '_' . $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/images/course', $newFileName);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $date . '_' . $file->getClientOriginalName();
            $filePath = public_path() . '/image/course/';
            $file->move($filePath, $fileName);
        }

        Course::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $fileName,
        ]);

        return redirect()->route('course.index')->with('success', 'Course berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        return view('courses.edit_course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->file('image')) {
        //     if (Storage::disk('public')->exists('images/course/' . $course->image)) {
        //         Storage::disk('public')->delete('images/course/' . $course->image);
        //     }
        //     $newImage = $date . '_' . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/images/course', $newImage);
        //     $validatedData['image'] = $newImage;
        // } else {
        //     $validatedData['image'] = $course->image;
        // }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (file_exists(public_path('image/course/' . $course->image))) {
                unlink(public_path('image/course/' . $course->image));
            }
            $newImage = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/course'), $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $course->image;
        }

        $course->update($validatedData);
        return redirect()->route('course.index')->with('success', 'Course berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        // if (Storage::disk('public')->exists('images/course/' . $course->image)) {
        //     Storage::disk('public')->delete('images/course/' . $course->image);
        // }
        if (file_exists(public_path('image/course/' . $course->image))) {
            unlink(public_path('image/course/' . $course->image));
        }
        $course->delete();
        return redirect()->back()->with('success', 'Course berhasil dihapus');
    }
}
