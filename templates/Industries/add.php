<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Industry $industry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Industries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="industries form content">
            <?= $this->Form->create($industry) ?>
            <fieldset>
                <legend><?= __('Add Industry') ?></legend>
                <?php
                    echo $this->Form->control('industry_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
