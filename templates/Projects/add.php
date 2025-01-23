<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Add Project') ?></h4>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
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
