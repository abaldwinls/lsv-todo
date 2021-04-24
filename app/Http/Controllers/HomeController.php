<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\UserService;
use App\Services\TaskService;

class HomeController extends Controller
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

        //if specific user requested, only show that
        if(!empty($request->query('user'))){
            return $this->userTasks($request);
        }

        //grab all users
        $users = $this->userService->findAll();

        $usersToView = [];

        //foreach user, grab task
        foreach($users as $user){
            $hours = 0;

            $tasks = $this->taskService->findByUser($user->id);

            foreach($tasks as $task){
                $hours += $task->estimated_hours;
            }

            $usersToView[] = [
                'user' => $user,
                'estimated_hours' => $hours
            ];
        }

        $variables = [
            'users' => $usersToView
        ];
        
        return view('home', $variables);
    }

    /**
     * Display a specific user's info.
     *
     */
    public function userTasks(Request $request)
    {
        $user = $this->userService->findByUsername($request->query('user'));

        $hours = 0;

        $projects = [];

        //grab task list
        $tasks = $this->taskService->findByUser($user->id);

        foreach($tasks as $task){
            $hours += $task->estimated_hours;

            //grab project data as well
            if(!isset($projects[$task->project_id])){//only retrieve each project once
                $project = $this->projectService->find($task->project_id);

                //find all tasks under project to calculate hours and identify members
                $projectHours = 0;
                $projectMembers = [];
                $projectTasks = $this->taskService->findByProject($project->id);
                
                foreach($projectTasks as $projectTask){
                    $projectHours += $projectTask->estimated_hours;

                    //only retrieve member information once
                    if(!isset($projectMembers[$projectTask->task_assignee])){
                        $projectMember = $this->userService->find($projectTask->task_assignee);
                        $projectMembers[$projectTask->task_assignee] = $projectMember->username;
                    }
                }

                $projectItem = [
                    'project' => $project,
                    'estimated_hours' => $projectHours,
                    'members' => $projectMembers
                ];

                //add to main projects array for view
                $projects[$task->project_id] = $projectItem;
            }
        }

        $variables = [
            'user' => $user,
            'projects' => $projects,
            'estimated_hours' => $hours
        ];

        return view('user', $variables);
    }
}
