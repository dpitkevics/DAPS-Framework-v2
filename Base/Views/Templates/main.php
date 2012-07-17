<!DOCTYPE html>
<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?=$title;?></title>
        <?=Base::jQuery();?>
        <?=Base::App()->DCSS->addCss();?>
        <?=Base::App()->DCSS->addCss('paragraph');?>
        </head>
        <body>
                <h1><?=$pageTitle;?></h1>
                <?=$content;?>
        </body>
</html>