<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Http\Requests\StoreThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Theme::query())->make(true);
        }
        //
        $params = [
            'page_title' => $this->pageTitle("Themes List"),
            'page_content_title' => 'Themes List'
        ];
        return view('dashboard.theme.themes', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $params = [
            'page_title' => $this->pageTitle("Themes Create"),
            'page_content_title' => 'Themes Create'
        ];
        return view('dashboard.theme.themescreate', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreThemeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThemeRequest $request)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('public');
        }
        if ($request->hasFile('source_link')) {
            $data['source_link'] = $request->file('source_link')->store('private');
        }
        $t = Theme::create($data);
        return back()->with('success', 'Theme saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        $params = [
            'page_title' => $this->pageTitle("Themes Edit"),
            'page_content_title' => 'Themes Edit',
            'theme' => $theme
        ];
        return view('dashboard.theme.themesedit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateThemeRequest  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        //

        $data = $request->all();
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('public');
        }
        if ($request->hasFile('source_link')) {
            $data['source_link'] = $request->file('source_link')->store('public');
        }
        unset($data['_token']);
        $theme->update($data);
        return back()->with('success', 'Theme updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('dashboard.themes.index')->with('success', 'Theme deleted successfully.');
    }
}
