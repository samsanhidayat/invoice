<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::first();

        if ($setting) {
            $setting->update([
                'name_website' => $request->name_website,
                'url_website' => $request->url_website,
                'page_title' => $request->page_title,
                'keywords' => $request->keywords,
                'about' => $request->about,
                'description_website' => $request->description,
                'phone_website' => $request->phone,
                'email_website' => $request->email,
                'wa_website' => $request->wa,
                'address_website' => $request->address,
                'fb_website' => $request->fb,
                'ig_website' => $request->ig,
                'youtube_website' => $request->youtube,
                'twitter_website' => $request->twitter
            ]);

            return redirect()->back()->with('message', 'Data Setting Updated');
        } else {
            Setting::create([
                'name_website' => $request->name_website,
                'url_website' => $request->url_website,
                'page_title' => $request->page_title,
                'keywords' => $request->keywords,
                'about' => $request->about,
                'description_website' => $request->description,
                'phone_website' => $request->phone,
                'email_website' => $request->email,
                'wa_website' => $request->wa,
                'address_website' => $request->address,
                'fb_website' => $request->fb,
                'ig_website' => $request->ig,
                'youtube_website' => $request->youtube,
                'twitter_website' => $request->twitter
            ]);

            return redirect()->back()->with('message', 'Data Setting Created');
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}