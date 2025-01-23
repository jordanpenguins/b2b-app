<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 * @var string[]|\Cake\Collection\CollectionInterface $skills
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contractor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contractors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php
                if ($contractor->photo) {
                    // button to remove current photo
                    echo $this->Form->postLink(
                        __('Remove photo'),
                        ['action' => 'removeImage', $contractor->id],
                        ['confirm' =>__('Are you sure you want to remove the photo?'), 'class' => 'side-nav-item']
                    );
                }
            ?>

        </div>
    </aside>
    <div class="column column-80">
        <div class="contractors form content">
            <?= $this->Form->create($contractor, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Contractor') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('email');
                    echo '<h6>Current Photo</h6>';
                    echo $this->Html->image("/files/Contractors/photo/". h($contractor->photo), ['style' => 'max-width: 100px;']);
                    echo $this->Form->control('photo', ['type' => 'file']);
                    echo $this->Form->control('skills._ids', ['options' => $skills, 'id' => 'skills', 'label' => 'Skills', 'multiple' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const skillsSelect = document.getElementById('skills');
            if (skillsSelect) {
                new Choices(skillsSelect);
            }
        });
    </script>
</div>
