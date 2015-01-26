<?php 
if($_POST["username"] == ''){
    header("Location: login.php");
    die();
}
?>

<form action='account.php' method='post' name='frm'>
    <?php
    foreach ($_POST as $a => $b) {
    echo "<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>";
    }
    ?>
</form>
<script language="JavaScript">
document.frm.submit();
</script>