<div class="delete-view">
    <div class="delete-container">
        <h1 id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/DeletePages/delete" method="POST" class="form-action">
            <p> Are you sure you want to delete page <b><?php echo $data['pageName']?></b>?<p>
            <input type="hidden" name="pageId" value="<?php echo $data['pageId']?>">
            <div class="user-actions">
                <button type="submit" name="choice" value="1">Yes</button>
                <button class="secondary" type="submit" name="choice" value="0">No</button>
            </div>
        </form>
    </div>
</div>