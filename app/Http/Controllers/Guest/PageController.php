<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class PageController extends Controller
{
    public function index() {

        $projects = Project::all();

        return view('index', compact('projects'));
    }

    public function show($id) {

        $project = Project::findOrFail($id);

        return view('auth.show', compact('project'));
    }

    public function create() {

        $technologies = Technology :: all();

        $types = Type :: all();

        return view('auth.create', compact('technologies', 'types'));
    }

    public function store(Request $request) {

        $data = $request -> all();

        $project = Project :: create($data);

        $project->technologies()->attach($data['technologies']);

        return redirect() -> route("auth.show", $project -> id);
    }
}
