<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\UserService;
use App\Services\TaskService;


class ProjectController extends Controller
{

    /**
     * Set services to be used throughout class
     */
    public function __construct(ProjectService $projectService, UserService $userService, TaskService $taskService)
    {
        $this->projectService = $projectService;
        $this->userService = $userService;
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        //grab all projects
        $projects = $this->projectService->findAll();

        //grab tasks and group data for view consumption
        $projectsToView = [];

        foreach($projects as $project){
            $tasks = $this->taskService->findByProject($project->id);

            $estimatedHours = 0;

            foreach($tasks as $task){
                $estimatedHours += $task->estimated_hours;

                $task->task_assignee_name = $this->userService->find($task->task_assignee)->first_name;
            }

            $projectsToView[] = [
                'project' => $project,
                'tasks' => $tasks,
                'estimatedHours' => $estimatedHours
            ];
        }

        $variables = [
            'projects' => $projectsToView
        ];
        
        return view('home', $variables);
    }
    
    /**
     * Display a specific project's details
     *
     */
    public function project(Request $request)
    {
        $project = $this->projectService->find($request->project_id);

        $tasks = $this->taskService->findByProject($project->id);

            $estimatedHours = 0;

            foreach($tasks as $task){
                $estimatedHours += $task->estimated_hours;

                $task->task_assignee_name = $this->userService->find($task->task_assignee)->first_name;
            }

            $projectItem = [
                'project' => $project,
                'tasks' => $tasks,
                'estimatedHours' => $estimatedHours
            ];

            //formatted this way to minimize number of nearly-identical views
            $variables = [
                'project' => $projectItem
            ];

        return view('project', $variables);
    }

}
