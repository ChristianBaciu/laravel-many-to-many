<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $projects = Project::all();

        // la funzione 'compact' crea un array in cui la chiave è 'projects'
        return view('pages.project.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        // dati della tabella Type
        $types = Type::all();

        return view('pages.project.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request){
        // sostituire false con true nel file 'StoreProjectRequest'

        $val_data = $request->validated();

        // gestione img
        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_image', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        //dd($val_data);

        $new_project = Project::create($val_data);
        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project){
        return view('pages.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project){
        $types = Type::all();
        return view('pages.project.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project){
        // sostituire false con true nel file 'UpdateProjectRequest'

        $val_data = $request->validated();

        if($request->hasFile('cover_image')){
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }
            $path = Storage::disk('public')->put('project_image', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        $project->update($val_data);
        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project){
        // cancella nella cartella Storage l'immagine
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }

        // cancella dal DB
        $project->delete();
        // una volta eliminata la colonna desiderata, torneremo nella rotta 'dashboard.projects.index'
        return redirect()->route('dashboard.projects.index');
    }
}
