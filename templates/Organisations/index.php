<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Organisation> $organisations
 */
?>
<div class="organisations index content">
    <?= $this->Html->link(__('Reset Filter'), ['controller' => 'Organisations', 'action' => 'index'], ['class' => 'button float-right mx-3']) ?>
    <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Organisations') ?></h3>

    <!-- Search Button -->
    <button id="search-toggle" class="button"><?= __('Search and Filter Organisation') ?></button>

    <!-- Hidden Search Form (will toggle visibility) -->
    <div id="search-form" style="display:none; margin-top: 20px;">
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <fieldset>
            <legend><?= __('Search Organisation') ?></legend>

            <!-- Search by Organisation Name-->
            <?= $this->Form->control('business_name', ['label' => 'Name']) ?>

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



    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('business_name', "Name") ?></th>
                    <th><?= $this->Paginator->sort('contact_first_name', "First Name") ?></th>
                    <th><?= $this->Paginator->sort('contact_last_name', "Last Name") ?></th>
                    <th><?= $this->Paginator->sort('contact_email') ?></th>
                    <th><?= $this->Paginator->sort('current_website') ?></th>
                    <th><?= $this->Paginator->sort('industry_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organisations as $organisation): ?>
                <tr>
                    <td><?= h($organisation->business_name) ?></td>
                    <td><?= h($organisation->contact_first_name) ?></td>
                    <td><?= h($organisation->contact_last_name) ?></td>
                    <td><?= $this->Html->link(h($organisation->contact_email), 'mailto:' . h($organisation->contact_email)) ?></td>
                    <td><?= $this->Html->link(h($organisation->current_website), $organisation->current_website, ['target' => '_blank']) ?></td>
                    <td><?= $organisation->hasValue('industry') ? $this->Html->link($organisation->industry->industry_name, ['controller' => 'Industries', 'action' => 'view', $organisation->industry->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id)]) ?>
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
    <script>
        document.getElementById('search-toggle').addEventListener('click', function() {
            var form = document.getElementById('search-form');
            if (form.style.display === "none") {
                form.style.display = "block";  // Show the form
            } else {
                form.style.display = "none";   // Hide the form
            }
        });
    </script>

</div>
