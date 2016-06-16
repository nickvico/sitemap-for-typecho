<?php
class SiteMap_Action extends Typecho_Widget implements Widget_Interface_Do
{
	public function action()
	{
        $options = Typecho_Widget::widget('Widget_Options');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    <meta content="text/html; charset=<?php echo $options->row['charset']; ?>" http-equiv="Content-Type">
    <title>站点地图 - <?php echo $options->row['title']; ?></title>
    <meta content="站点地图,<?php echo $options->row['title']; ?>" name="keywords">
    <meta content="SiteMap Generator" name="generator">
    <style type="text/css">
        body {font-family: Verdana;FONT-SIZE: 12px;MARGIN: 0;color: #000000;background: #ffffff;}
        li {margin-top: 8px;}
        #nav, #content, #footer {padding: 8px; border: 1px solid #EEEEEE; clear: both; width: 95%; margin: auto; margin-top: 10px;}
    </style>
</head>
<body vlink="#333333" link="#333333">
    <h2 style="text-align: center; margin-top: 20px"> SiteMap of <?php echo $options->row['title']; ?> </h2>
    <div id="nav"><a href="<?php echo $options->siteUrl; ?>"><strong><?php echo $options->row['title']; ?></strong></a>　»　<a href="<?php echo $options->siteUrl; ?>sitemap.html">站点地图</a></div>
    <div id="content">
        <h3>最新文章</h3>
        <ul>
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=9999')
                        ->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
        </ul>
    </div>
    <div id="content">
        <h3>分类目录</h3>
        <ul>
            <?php $this->widget('Widget_Metas_Category_List')
                        ->parse('<li><a title="查看 {name} 下的所有文章" href="{permalink}">{name}</a></li>'); ?>
        </ul>
    </div>
    <div id="content">
        <h3>独立页面</h3>
        <ul>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div id="content">
        <h3>文章标签</h3>
        <ul>
            <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
            <?php if($tags->have()): ?>
                <?php while ($tags->next()): ?>
                    <li><a href="<?php $tags->permalink();?>"><?php $tags->name(); ?></a></li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div id="footer">
        查看博客首页: <strong><a href="<?php echo $options->siteUrl; ?>"><?php echo $options->row['title']; ?></a></strong>
    </div>
    <br />
    <center>
        <div style="text-algin: center; font-size: 11px">
            Powered by <strong><a rel="nofollow" target="_blank" href="https://github.com/nickvico/sitemap-for-typecho">SiteMap Generator</a></strong> &nbsp;&copy; <?php echo date('Y'); ?> <a title="<?php echo $options->row['title']; ?>" target="_blank" href="<?php echo $options->siteUrl; ?>"><?php echo $options->row['title']; ?></a><br><br>
        </div>
    </center>
</body>
</html>
<?php
	}
}