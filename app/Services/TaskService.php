<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

/**
 * Class TaskService.
 */
class TaskService
{
    /**
     * TaskService constructor.
     *
     * @param  Task  $task
     */
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    /**
     * @param int $task
     *
     * @return Task
     */
    public static function find(int $task)
    {
        try{
            $task = DB::table('tasks')
                    ->where('id', $task)
                    ->orderByDesc('created_at')
                    ->limit(1)
                    ->get();

            return $task->first();
        }
        catch(\Exception $e){
            return new Task();
        }

        
    }
    
    /**
     * @param int $project
     *
     * @return Task
     */
    public static function findByProject(int $project)
    {
        try{
            $tasks = DB::table('tasks')
                    ->where('project_id', $project)
                    ->orderByDesc('created_at')
                    ->get();

            return $tasks;
        }
        catch(\Exception $e){
            return [];
        }

        
    }
    
    /**
     * @param int $user
     *
     * @return Task
     */
    public static function findByUser(int $user)
    {
        try{
            $tasks = DB::table('tasks')
                    ->where('task_assignee', $user)
                    ->orderByDesc('created_at')
                    ->get();

            return $tasks;
        }
        catch(\Exception $e){
            return [];
        }

        
    }
    
    /**
     * return all tasks
     */
    public static function findAll()
    {
        try{
            $tasks = DB::table('tasks')
                    ->orderByDesc('created_at')
                    ->get();

            return $tasks;
        }
        catch(\Exception $e){
            return [];
        }

        
    }
}