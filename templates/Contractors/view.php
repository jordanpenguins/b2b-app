<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contractor'), ['action' => 'edit', $contractor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contractor'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contractors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contractor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contractors view content">
            <h3><?= h($contractor->first_name) ?></h3>
            <?= $this -> Html -> image("/files/Contractors/photo/". h($contractor->photo), ['style' => 'max-width: 300px;']) ?>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($contractor->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($contractor->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($contractor->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Html->link(h($contractor->email), 'mailto:' . h($contractor->email)) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Skills') ?></h4>
                <?php if (!empty($contractor->skills)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Skill Name') ?></th>
                        </tr>
                        <?php foreach ($contractor->skills as $skill) : ?>
                        <tr>
                            <td><?= h($skill->skill_name) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Contacts') ?></h4>
                <?php if (!empty($contractor->contacts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Message') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contractor->contacts as $contact) : ?>
                        <tr>
                            <td><?= h($contact->first_name) ?></td>
                            <td><?= h($contact->last_name) ?></td>
                            <td><?= h($contact->phone_number) ?></td>
                            <td><?= h($contact->email) ?></td>
                            <td><?= h($contact->message) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($contractor->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Project Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Management Tool Link') ?></th>
                            <th><?= __('Project Due Date') ?></th>
                            <th><?= __('Last Checked') ?></th>
                            <th><?= __('Complete') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contractor->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->project_name) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>                            <td><?= h($project->project_due_date) ?></td>
                            <td><?= h($project->last_checked) ?></td>
                            <td><?= $project->complete ? __('Yes') : __('No'); ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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
