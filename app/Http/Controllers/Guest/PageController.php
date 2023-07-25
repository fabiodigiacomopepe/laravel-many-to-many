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

        return view('auth.create');
    }

    public function store(Request $request) {

        $projectData = [
            "nome" => $request->input('nome_project'),
            "framework" => $request->input('framework'),
            "versione" => $request->input('versione'),
            "deployato" => $request->input('deployato'),
        ];

        $typeData = [
            "nome" => $request->input('nome_type'),
            "di_gruppo" => $request->input('di_gruppo'),
        ];

        $technologyData = [
            "nome" => $request->input('nome_technology'),
            "descrizione" => $request->input('descrizione'),
        ];

        $type = Type::firstOrCreate(['nome' => $typeData['nome']], $typeData);
        $projectData['type_id'] = $type->id;

        $technology = Technology::firstOrCreate(['nome' => $technologyData['nome']], $technologyData);

        $project = Project::create($projectData);

        $project->type()->associate($type);

        $project->technologies()->attach($technology->id);

        $project->save();

        return redirect() -> route("auth.show", $project -> id);
    }
}
