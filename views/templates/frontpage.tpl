<form action="/" method="post">
    URL of a product feed: <input type="text" value="<?=$url?>" name="url" class="url" />
    <input type="submit" class="process" value="Process"/>
    <img class="loader" style="display:none" src="/views/images/loader.gif"/>
</form>
<hr/>
<div class="result">
    <?=self::tpl('result.tpl', ['processed' => $processed, 'error' => $error])?>
</div>
