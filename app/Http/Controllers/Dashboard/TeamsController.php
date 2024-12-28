<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\ImageFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Exception;


class TeamsController extends Controller
{
    use ImageFunctions;

    public function index()
    {
        $teams = Team::get();
        return   view('dashboard.teams.list', ['teams' => $teams]);
    }


    public function create()
    {
        return view('dashboard.teams.create');
    }

    public function store(Request $request)
    {

        try {
            $data = [];
            $data['name'] = $request->name;
            $data['image'] = $request->image;
            $data['job_title'] = $request->job_title;
            $data['facebook_url'] = $request->facebook_url;
            $data['twitter_url'] = $request->twitter_url;
            $data['linkedin_url'] = $request->linkedin_url;
            $data['instagram_url'] = $request->instagram_url;
            $data['bio'] = $request->bio;
            $team =  Team::create($data);
            if ($request->file('image')) {
                $team->update(['image' => $this->storeImagePath($request->image, 'teams')]);
            }
            Session::flash('success', 'Team created successfully');
        } catch (Exception $e) {
            dd($e);

            Session::flash('error', 'Something went wrong');
            return Redirect::back();
        }
        $teams = Team::get();
        return redirect()->route('teams.index', ['teams' => $teams]);
    }

    public function edit(string $id)
    {

        $team =  Team::findOrFail($id);
        return view('dashboard.teams.update', ['team' => $team]);
    }

    public function update(Request $request, string $id)
    {
        $article =  Team::findOrFail($id);

        $article->update($request->except('image', '_token'));
        if ($request->file('image')) {
            $article->update(['image' => $this->storeImagePath($request->image, 'teams')]);
        }
        $teams = Team::get();
        return redirect()->route('teams.index', ['teams' => $teams]);
    }


    public function destroy($id)
    {
        try {
            Team::where('id', $id)->delete();
            Session::flash('success', 'Team deleted successfully');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong');
        }
        $teams = Team::get();
        return redirect()->route('teams.index', ['teams' => $teams]);
    }
}
