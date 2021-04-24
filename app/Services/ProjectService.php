<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectService.
 */
class ProjectService
{
    /**
     * ProjectService constructor.
     *
     * @param  Project  $project
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     * @param int $project
     *
     * @return Project
     */
    public static function find(int $project)
    {
        try{
            $project = DB::table('projects')
                    ->where('id', $project)
                    ->orderByDesc('created_at')
                    ->limit(1)
                    ->get();

            return $project->first();
        }
        catch(\Exception $e){
            return new Project();
        }

        
    }
    
    /**
     * Return all projects
     */
    public static function findAll()
    {
        try{
            $projects = DB::table('projects')
                    ->orderByDesc('created_at')
                    ->get();

            return $projects;
        }
        catch(\Exception $e){
            return [];
        }

        
    }
}