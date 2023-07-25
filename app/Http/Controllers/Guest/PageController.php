<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;

class PageController extends Controller
{
    public function index() {

        $projects = Project::all();

        return view('index', compact('projects'));
    }

    public function show($id) {

        $project = Project::findOrFail($id);
        $types = Type::all();

        return view('auth.show', compact('project', 'types'));
    }
}
