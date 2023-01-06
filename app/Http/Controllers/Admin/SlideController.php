<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slide.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.add_slide')->with([
            'title' => 'Add Data Slide'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->hashName();
            $file->move('uploads/sliders', $filename);
            $validatedData['image'] = $filename;
        }

        Slide::create([
            'judul' => $validatedData['judul'],
            'description' => $validatedData['desc'],
            'image' => $validatedData['image']
        ]);

        return redirect('admin/slide')->with('message', 'Data Slide berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit_slide')->with([
            'title' => 'Update Slide',
            'slide' =>  $slide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, Slide $slide)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $files = $slide->image;
            if (File::exists('uploads/sliders/' . $files)) {
                File::delete('uploads/sliders/' . $files);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->hashName();
            $file->move('uploads/sliders', $filename);
            $validatedData['image'] = $filename;

            Slide::where('id', $slide->id)->update([
                'judul' => $validatedData['judul'],
                'description' => $validatedData['desc'],
                'image' => $validatedData['image']
            ]);
        } else {
            Slide::where('id', $slide->id)->update([
                'judul' => $validatedData['judul'],
                'description' => $validatedData['desc']
            ]);
        }
        return redirect('admin/slide')->with('message', 'Data Slide berhasil Di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        if (File::exists('uploads/sliders/' . $slide->image)) {
            File::delete('uploads/sliders/' . $slide->image);
        }
        $slide->delete();
        return redirect('admin/slide')->with('message', 'Data Berhasil Di Hapus');
    }
}