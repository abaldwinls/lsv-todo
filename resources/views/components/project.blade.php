<div class="project-container">
    <div class="project-header">
        <div class="project-title"><?= $project['project']->project_name ?></div>
        <div class="project-hours"><?= $project['estimatedHours'] ?> Hours</div>  
    </div>
    
    <div class="project-table">
        <table>
            <tr>
                <th>Task</th>
                <th>Assigned To</th>
                <th>Estimated Hours</th>
            </tr>

            <?php foreach($project['tasks'] as $task): ?>
                @include('components.task')
            <?php endforeach; ?>
        </table>
    </div>
</div>