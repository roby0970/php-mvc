<div class="delete-view">
    <div class="delete-container">
        <h1 id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/DeleteUsers/delete" method="POST" class="form-action">
            <p> Are you sure you want to delete user <b><?php echo $data['userName']?></b>?<p>
            <input type="hidden" name="userId" value="<?php echo $data['userId']?>">
            <div class="user-actions">
                <button type="submit" name="choice" value="1">Yes</button>
                <button class="secondary" type="submit" name="choice" value="0">No</button>
            </div>
        </form>
    </div>
</div>