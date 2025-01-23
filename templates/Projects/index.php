<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="projects index content">
    <?= $this->Html->link(__('Reset Filter'), ['controller' => 'Projects', 'action' => 'index'], ['class' => 'button float-right mx-3']) ?>
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects') ?></h3>

    <!-- Search Button -->
    <button id="search-toggle" class="button"><?= __('Search and Filter Project') ?></button>
    <!-- Hidden Search Form (will toggle visibility) -->
    <div id="search-form" style="display:none; margin-top: 20px;">
        <?= $this->Form->create(null, ['type' => 'get' , 'url' => ['action' => 'index']]) ?>
        <fieldset>
            <!-- Search by Project Name-->
            <?= $this->Form->control('name', ['label' => 'Search by Name', 'placeholder' => 'Enter keyword']) ?>

            <!-- Filter by all possible status  -->
            <?= $this->Form->control('status', [
                'label' => 'Status',
                'type' => 'select',
                'options' => ['' => 'Any', false => 'Not Completed', true => 'Completed']
            ]) ?>

            <!-- Filter by Skills -->
            <label>Skills</label>
            <?php
            echo $this->Form->select('skills', $skills, ['options' => $skills ,'label' => 'Skills Required', 'multiple' => true, 'id' => 'skills']);
            ?>

            <!-- Range of all start and end date if the due date -->
            <?= $this->Form->control('start_date', ['label' => 'Start Date', 'type' => 'date']) ?>
            <?= $this->Form->control('end_date', ['label' => 'End Date', 'type' => 'date']) ?>



        </fieldset>
        <?= $this->Form->button(__('Search')) ?>
        <?= $this->Form->end() ?>
    </div>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('project_name') ?></th>
                    <th><?= $this->Paginator->sort('management_tool_link') ?></th>
                    <th><?= $this->Paginator->sort('project_due_date') ?></th>
                    <th><?= $this->Paginator->sort('last_checked') ?></th>
                    <th><?= $this->Paginator->sort('complete') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id') ?></th>
                    <th><?= $this->Paginator->sort('contractor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= h($project->project_name) ?></td>
                    <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>                    <td><?= h($project->project_due_date) ?></td>
                    <td><?= h($project->last_checked) ?></td>
                    <td><?= $project->complete ? __('Yes') : __('No'); ?></td>
                    <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->business_name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                    <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->first_name, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                        <?= $this->Html->link(__('Complete?'), ['action' => 'toggleComplete', $project->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
    <!-- Add some simple JavaScript for toggling the form visibility -->
    <script>
        document.getElementById('search-toggle').addEventListener('click', function() {
            var form = document.getElementById('search-form');
            if (form.style.display === "none") {
                form.style.display = "block";  // Show the form
            } else {
                form.style.display = "none";   // Hide the form
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const skillsSelect = document.getElementById('skills');
            if (skillsSelect) {
                new Choices(skillsSelect);
            }
        });
    </script>
</div>
