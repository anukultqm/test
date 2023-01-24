<div class="column-responsive column-80">
<?= $this->Html->link(__('back'), ['action' => 'view']) ?>
        <div class="users view content">
            <h3><?= h($post->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                </tr>
                <div>

                    <td><?= h($post->title) ?></td>
                </div>
                <div>
                    <tr>
                        <th><?= __('Post image') ?></th>
                    </tr>

                </div>
                <div>
                    
                    <td><?= $this->Html->image($post->image,['class'=>"post-img"]) ?></td>
                </div>
                <div>

                    <tr><th><?= __('Body') ?></th></tr>
                </div>
                <div>
                    
                    <td><?= h($post->body) ?></td>
                </div>
            </table>

            <?php foreach ($post['comments'] as $comments): ?>
                <tr>                
                    <td><?= h($comments->comment).'<br>'?></td>
                    
                </tr>

                <?php endforeach; ?>
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit',$post->id)) ?>
            <?= $this->Form->end() ?>

</div>
</div>       