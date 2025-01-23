<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contractor> $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="contractors index content">
    <?= $this->Html->link(__('Reset Filter'), ['controller' => 'Contractors', 'action' => 'index'], ['class' => 'button float-right mx-3']) ?>
    <?= $this->Html->link(__('New Contractor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contractors') ?></h3>

    <!-- Search Button -->
    <button id="search-toggle" class="button"><?= __('Search and Filter Contractors') ?></button>
    <!-- Hidden Search Form (will toggle visibility) -->
    <div id="search-form" style="display:none; margin-top: 20px;">
        <?= $this->Form->create(null, ['type' => 'get' , 'url' => ['action' => 'index']]) ?>
        <fieldset>
            <!-- Search by First or Last Name -->
            <?= $this->Form->control('name', ['label' => 'Search by Name', 'placeholder' => 'Enter keyword']) ?>

            <!-- Search by Email -->
            <?= $this->Form->control('emailKeyword', ['label' => 'Search Email', 'placeholder' => 'Enter keyword']) ?>

            <!-- Filter by Skills -->
            <label>Skills</label>
            <?php
            echo $this->Form->select('skills', $skills, ['options' => $skills ,'label' => 'Skills Required', 'multiple' => true, 'id' => 'skills']);
            ?>
            <!-- Sort by Number of Projects -->
            <?= $this->Form->control('sort_projects', [
                'label' => 'Sort by Number of Projects',
                'type' => 'select',
                'options' => ['' => 'Any', 'asc' => 'Ascending', 'desc' => 'Descending']
            ]) ?>

        </fieldset>
        <?= $this->Form->button(__('Search')) ?>
        <?= $this->Form->end() ?>
    </div>

    <!-- Rest of the contractors table remains as it is -->
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('phone_number') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contractors as $contractor): ?>
                <tr>
                    <td><?= $this->Html->image("/files/Contractors/photo/". h($contractor->photo), ['style' => 'max-width: 64px; max-height: 64px;']) ?></td>
                    <td><?= h($contractor->first_name) ?></td>
                    <td><?= h($contractor->last_name) ?></td>
                    <td><?= h($contractor->phone_number) ?></td>
                    <td><?= $this->Html->link(h($contractor->email), 'mailto:' . h($contractor->email)) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contractor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]) ?>
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

