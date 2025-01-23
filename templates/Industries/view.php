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
            <?= $this->Html->link(__('Edit Industry'), ['action' => 'edit', $industry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Industry'), ['action' => 'delete', $industry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Industries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Industry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="industries view content">
            <h3><?= h($industry->industry_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Industry Name') ?></th>
                    <td><?= h($industry->industry_name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Organisations') ?></h4>
                <?php if (!empty($industry->organisations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Business Name') ?></th>
                            <th><?= __('Contact First Name') ?></th>
                            <th><?= __('Contact Last Name') ?></th>
                            <th><?= __('Contact Email') ?></th>
                            <th><?= __('Current Website') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($industry->organisations as $organisation) : ?>
                        <tr>
                            <td><?= h($organisation->business_name) ?></td>
                            <td><?= h($organisation->contact_first_name) ?></td>
                            <td><?= h($organisation->contact_last_name) ?></td>
                            <td><?= $this->Html->link(h($organisation->contact_email), 'mailto:' . h($organisation->contact_email)) ?></td>
                            <td><?= $this->Html->link(h($organisation->current_website), h($organisation->current_website), ['target' => '_blank']) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Organisations', 'action' => 'view', $organisation->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Organisations', 'action' => 'edit', $organisation->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organisations', 'action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
