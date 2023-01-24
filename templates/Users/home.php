<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users Posts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('body') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                
                    <td><?= $this->Number->format($post->id) ?></td>
                    <td><?= h($post->title) ?></td>
                    <td><?= $this->Html->image($post->image,['width'=>'100px']);?></td>
                    <td><?= h($post->body) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'postview', $post->id]) ?>
                </td>    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>