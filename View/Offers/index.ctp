<?php echo $this->Html->link(
    'Add Offer',
    array('controller' => 'offers', 'action' => 'add')
); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Creator Email</th>
        <th>Created</th>
        <th>Modified</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($offers as $offer): ?>
    <tr>
        <td><?php echo $offer['Offer']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($offer['Offer']['title'],
                  array('controller' => 'offers', 'action' => 'view', $offer['Offer']['id']));
            ?>
        </td>
        <td><?php echo $offer['Offer']['creator_email']; ?></td>
        <td><?php echo $offer['Offer']['created']; ?></td>
        <td><?php echo $offer['Offer']['modified']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $offer['Offer']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $offer['Offer']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>

    </tr>
    <?php endforeach; ?>
    <?php unset($offer); ?>
</table>
