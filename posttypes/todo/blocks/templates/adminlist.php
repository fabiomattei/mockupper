<?php while($row = $this->alltodos->fetch()) { ?>
<?php echo htmlspecialchars($row->id) ?> <?php echo htmlspecialchars($row->title) ?> <?php echo htmlspecialchars($row->body) ?> 
<a href="<?php echo $this->editscript ?>?id=<?php echo htmlspecialchars($row->id) ?>">Edit</a>
<a href="<?php echo $this->deletescript ?>?id=<?php echo htmlspecialchars($row->id) ?>">Del</a><br />
<?php } ?>
<a href="<?php echo $this->editscript ?>?id=0">New</a>