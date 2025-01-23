<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 * @var string[]|\Cake\Collection\CollectionInterface $skills
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Edit Project') ?></legend>
                <?php
                    echo $this->Form->control('project_name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('management_tool_link');
                    echo $this->Form->control('project_due_date');
                    echo $this->Form->control('complete');
                    echo $this->Form->control('organisation_id', ['options' => $organisations, 'id' => 'organisation_id']);
                    echo $this->Form->control('contractor_id', ['options' => $contractors, 'empty' => true, 'id' => 'contractor_id']);
                    echo $this->Form->control('skills._ids', ['options' => $skills, 'id' => 'skills', 'label' => 'Skills Required', 'multiple' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const organisationSelect = document.getElementById('organisation_id');
            if (organisationSelect) {
                new Choices(organisationSelect);
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const contractorSelect = document.getElementById('contractor_id');
            if (contractorSelect) {
                new Choices(contractorSelect);
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
