<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::query()
            ->when(request()->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'regexp', $search);
                });
            })
            ->when(request()->project_type, function ($query, $project_type) {
                $query->where('project_type', $project_type);
            })
            ->when(request()->active, function ($query, $active) {
                $query->where('active', $active);
            })
            ->when(request()->from, function ($query, $date_from) {
                $query->whereDate('created_at', '>=', $date_from);
            })
            ->when(request()->to, function ($query, $date_to) {
                $query->whereDate('created_at', '<=', $date_to);
            });

        return Inertia::render('Project/Index', [
            'projects' => $projects->paginate(request()->perpage ?? 100)->onEachSide(1)->appends(request()->input()),
            'request' => request()->input(),
            // 'filters' => [
            //     'project_type' => [
            //         1 => 'Public',
            //         2 => 'Private'
            //     ],
            //     'active' => [
            //         0 => 'Yes',
            //         1 => 'No'
            //     ]
            // ],
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
