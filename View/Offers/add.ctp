<h1>Add Post</h1>
<?php
echo $this->Form->create('Offer');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('creator_email');
echo $this->Form->end('Save Offer');
?>
