<tr>
    <td><?= $project['project']->project_name ?></td>
    <td><?= implode(', ', $project['members']) ?></td>
    <td><?= $project['estimated_hours'] ?></td>
    <td><a class="lsv-button" href="/projects/<?= $project['project']->id ?>">View -></a></td>
</tr>