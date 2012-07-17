<? foreach($users as $row): ?>
<p>Hi, <?=$row['name'];?>!</p>
<? endforeach; ?>
<?=DHtml::Link("Default", array("site/default"), array("style"=>"color:teal"));?>