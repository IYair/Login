<?php
include('../Controller/config.php');
$query = $connection->prepare("SELECT * FROM cursos;");
$query->execute();
?>

<ul class="collapsible">
    <?php foreach ($query as $name => $valor) : ?>
        <li>
            <div class="collapsible-header"><i class="material-icons">class</i>
                <?= $valor['name']; ?>
                <ul class="right">
                    <a class="waves-effect waves-light btn">Button</a>
                    <a class="waves-effect waves-light btn">Button</a>
                </ul>
            </div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    <?php endforeach; ?>
</ul>