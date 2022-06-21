<form method = "Post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>Do you want to Remove <?php echo   $_SESSION['removeJ']?> from being a joint apointee? </p>
<input type="submit" class = "btn btn-primary" value="YES" name = "RemoveJ">
<input type="submit" class = "btn btn-primary" value="No" name = "No">
</form>