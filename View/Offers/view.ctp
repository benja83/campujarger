<h1><?php echo h($offer['Offer']['title']); ?></h1>

<p><small>Created: <?php echo $offer['Offer']['created']; ?></small></p>

<p><?php echo h($offer['Offer']['body']); ?></p>

<?php if(isset($token)) { ?>
    <div>
    <?php
        echo $this->Html->link( 'Edit', array(
            'action' => 'edit', $offer['Offer']['id'],
            '?' => array('token' => $token )));
    ?>
    </div>
    <div>
    <?php
        echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete', $offer['Offer']['id'],
            '?' => array('token' => $token )),
            array('confirm' => 'Are you sure?'));
    ?>
    <div>
<?php } ?>

