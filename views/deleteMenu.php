<div class="delete-view">
    <div class="delete-container">
        <h1 id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/Navigations/delete" method="POST" class="form-action">
            <input type="hidden" name="action" id="action" value="delete">
            <p> Are you sure you want to delete menu <b><?php echo $data['menuName']?> from navigation</b>?<p>
            <input type="hidden" name="menuId" value="<?php echo $data['menuId']?>">
            <div class="user-actions">
                <button type="submit" name="choice" value="1">Yes</button>
                <button class="secondary" type="submit" name="choice" value="0">No</button>
            </div>
        </form>
    </div>
</div>