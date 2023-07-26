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

    public function show($id) {

        $project = Project::findOrFail($id);

        return view('auth.show', compact('project'));
    }

    public function edit($id) {

        $technologies = Technology :: all();

        $types = Type :: all();

        $project = Project :: findOrFail($id);

        return view('auth.edit', compact('project', 'technologies', 'types'));
    }

    public function update(Request $request, $id) {

        $data = $request -> validate(
            $this -> getValidationRules(),
            $this -> getValidationMessages()
        );

        $project = Project :: findOrfail($id);

        $project -> update($data);

        if (array_key_exists('technologies', $data)) {

            $project -> technologies() -> sync($data['technologies']);
        } else {

            $project -> technologies() -> detach();
        }

        return redirect() -> route("auth.show", $project -> id);
    }

    private function getValidationRules() {

        return [
            'nome' => 'required|string',
            'framework' => 'required|string',
            'versione' => 'required|string',

            'technologies' => 'required|array',
        ];
    }

    private function getValidationMessages() {

        return [
            'nome.required' => 'Il nome è necessario',
            'framework.required' => 'Il framework è necessario',
            'versione.required' => 'La versione è necessaria',
            'technologies.required' => 'Almeno una tecnologia è necessaria',
        ];
    }
}
