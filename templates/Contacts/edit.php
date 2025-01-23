<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contacts form content">
            <?= $this->Form->create($contact) ?>
            <fieldset>
                <legend><?= __('Edit Contact') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message');
                    echo $this->Form->control('replied');
                    echo $this->Form->control('organisation_id', ['options' => $organisations, 'empty' => true, 'id' => 'organisation']);
                    echo $this->Form->control('contractor_id', ['options' => $contractors, 'empty' => true, 'id' => 'contractor']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const skillsSelect = document.getElementById('organisation');
                if (skillsSelect) {
                    new Choices(skillsSelect);
                }
            });

            document.addEventListener('DOMContentLoaded', function () {
                const skillsSelect = document.getElementById('contractor');
                if (skillsSelect) {
                    new Choices(skillsSelect);
                }
            });
        </script>
    </div>
</div>
