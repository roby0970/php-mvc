<h1 id="index-text"><?php echo $data['viewName']?></h1>

<form action="/DeleteUsers/delete" method="POST">
    <p> Are you sure you want to delete user <b><?php echo $data['userName']?></b>?<p>
    <input type="hidden" name="userId" value="<?php echo $data['userId']?>">
    <button type="submit" name="choice" value="1">Yes</button>
    <button type="submit" name="choice" value="0">No</button>
</form>