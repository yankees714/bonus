<? $this->load->view('template/head'); ?>

<body>

<? $this->load->view('template/bodyheader', $headerdata); ?>

<div id="content">
    <!-- Below-the-fold sidebar -->
    <div id="sidebar" class="hidetablet">

        <div id="twitter-widget" class="hidetablet">
            <a class="twitter-timeline" href="https://twitter.com/bowdoinorient" data-widget-id="265861494951002113">Tweets by @bowdoinorient</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

        <!-- ADS -->
        <? if($ad): ?>
            <h2>Sponsored</h2>
            <? if(isset($ad->link)):?>
                <a href="<?=$ad->link?>">
            <? endif; ?>
            <? if ($ad->type == "html"): ?>
                <div class="ad">
                    <?= file_get_contents(base_url()."ads/".$ad->filename); ?>
                </div>
            <? elseif ($ad->type == "image"): ?>
                <img class="ad" src="<?=base_url()."ads/".$ad->filename?>"/>
            <? endif; ?>
            <? if(isset($ad->link)):?>
                </a>
            <? endif; ?>
        <? endif; ?>
        <!-- end ads -->

        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
            <form action="http://bowdoinorient.us4.list-manage.com/subscribe/post?u=eab94f63abe221b2ef4a4baec&amp;id=739fef0bb9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h2 style="margin-top:0;margin-bottom:5px;">Weekly newsletter</h2>
            <div class="mc-field-group">
                <input class="email" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email address">
                <input class="button" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>
            </form>
        </div>
        <!-- end MailChimp -->

        <!-- Scribd issue download -->
        <? if($scribd_thumb_url): ?>
        <h2>Download issue</h2>
        <div class="scribd_block">
            <a href="http://www.scribd.com/doc/<?=$issue->scribd?>" target="new">
            <img src="<?=$scribd_thumb_url?>" class="issue_thumb">
            Volume <?=$issue->volume;?><br/>
            Number <?=$issue->issue_number;?><br/>
            <?=date("F j, Y",strtotime($issue->issue_date))?>
            </a>
        </div>
        <? endif; ?>
        <!-- end Scribd -->

        <!-- Disqus recent comments -->
        <div id="recentcomments" class="dsq-widget">
            <h2 class="dsq-widget-title">Recent Comments</h2>
            <script type="text/javascript" src="http://disqus.com/forums/bowdoinorient/recent_comments_widget.js?num_items=8&hide_avatars=1&avatar_size=24&excerpt_length=140"></script>
        </div>
        <!-- End Disqus -->

        <!-- Plancast events -->
        <script type="text/javascript" src="http://plancast.com/goodies/widgets/sidebar/1/43729"></script>
    </div>

    <section id="bignews">
        <div id="lead" class="hidemobile">
            <div class="dates"><?=dateify($homepage->leadstory->date, $date)?></div>
            <? if($homepage->leadstory->series): ?><span class="series"><a href="<?=base_url().'series/'.$homepage->leadstory->series?>"><?=$homepage->leadstory->series?>:</span></a><? endif; ?>
            <h3><a href="<?=site_url()?>article/<?=$homepage->leadstory->id?>"><?=$homepage->leadstory->title?></a></h3>
            <!-- <p><a href="<?=site_url()?>author/<?=$homepage->leadstory->author_id?>"><?=$homepage->leadstory->author?></a></p> -->
            <p><?=$homepage->leadstory->excerpt?></p>
        </div>
        <div id="lead-overlay"></div>
        <div id="photo">
            <? if (count($homepage->carousel->photos)==1): ?>
<!--            <?$photo_view_data = array('article' => $homepage->carousel, 'photos' => array($homepage->carousel->photos, $homepage->carousel->photos));
                $this->load->view('template/carousel', $photo_view_data);?> -->
            <? else: ?>
<!--            <?$photo_view_data = array('article' => $homepage->carousel, 'photos' => $homepage->carousel->photos);
                $this->load->view('template/carousel', $photo_view_data);?> -->
            <? endif; ?>
        </div>
        <div id="teasers" class="hidetablet">
            <? foreach($homepage->teasers as $teaser): ?>
                <div class="teaser">
                    <div class="dates"><?=dateify($teaser->date, $date)?></div>
                    <h4><a href="<?=site_url()?>article/<?=$teaser->id?>"><?=$teaser->title?></a></h4>
                </div>
            <? endforeach; ?>
        </div>
        <? if(bonus()): ?>
        <? endif; ?>
    </section>

    <!-- SECTIONS -->
    <? foreach($sections as $section): ?>
        <? if(!empty($articles[$section->name])): ?>
        <section id="<?=$section->name?>" class="issuesection">
            <h2><?=$section->name?><? if(bonus()): ?><a href="<?=site_url()?>article/add/<?=$issue->volume?>/<?=$issue->issue_number?>/<?=$section->id?>"><button class="bonusbutton" id="addarticlebutton">Add article</button></a><? endif; ?></h2>
            <?$blocktype = array(
                "blocks"=>$articles[$section->name],
                "twotier"=>TRUE,
                "dateified"=>TRUE,
                "dateoverlay"=>TRUE);?>
            <?$this->load->view('template/articleblock', $blocktype);?>
        </section>
        <? endif; ?>
    <? endforeach; ?>
</div>

<? $this->load->view('template/bodyfooter', $footerdata); ?>

<? $this->load->view('bonus/bonusbar', TRUE); ?>

<!-- SwipeView. Only needed for slideshows. -->
<script type="text/javascript" src="<?= base_url() ?>js/swipeview-mwidmann.js"></script>
<script type="text/javascript">
var    carousel,
    el,
    i,
    page,
    hasInteracted = false,
    dots = document.querySelectorAll('#swipeview_nav li'),
    slides = [
        <? foreach($popular as $key => $article): ?>
            <? if($key > 0): ?>,<? endif; ?>
            '<div class="carouseltile <? if(!$article->published): ?>draft<?endif;?>">'
                +'<div class="articletitle-group">'
                <? if($article->series): ?>+'<div class="series"><?=anchor('series/'.$article->series_id,$article->series); ?></div>'<? endif; ?>
                +'<a href="<?=site_url()?>article/<?=$article->id?>"><h3><?= addslashes(trim(str_replace(array("\r\n", "\n", "\r")," ",$article->title))); ?></h3></a>'
                <? if($article->subtitle): ?>+'<h4 class="articlesubtitle"><?= addslashes(trim(str_replace(array("\r\n", "\n", "\r")," ",$article->subtitle))); ?></h4>'<? endif; ?>
                +'</div>'
                <? if(!empty($article->filename_small)): ?>+'<img src="<?=base_url().'images/'.$article->date.'/'.$article->filename_small?>">'<? endif; ?>
                +'<div class="article-author-date">'
                <? if(!empty($article->author)): ?>+'<a href="<?=base_url()?>author/<?=$article->author_id?>"><div class="authortile hidemobile"><p class="articleauthor"><?=addslashes($article->author)?></p></div></a>'<? endif; ?>
                +'<p class="articledate hidemobile"><time pubdate datetime="<?=$article->date?>"><?=date("F j, Y",strtotime($article->date))?></time></p>'
                +'</div>'
                +'<div class="excerpt"><?= addslashes(trim(str_replace(array("\r\n", "\n", "\r"),"<br/>",$article->excerpt))); ?></div>'
            +'</div>'
        <? endforeach; ?>
    ];

carousel = new SwipeView('#swipeview_wrapper', {
    numberOfPages: slides.length,
    hastyPageFlip: true
});

// Load initial data
for (i=0; i<3; i++) {
    page = i==0 ? slides.length-1 : i-1;

    el = document.createElement('span');
    el.innerHTML = slides[page];
    carousel.masterPages[i].appendChild(el)
}

carousel.onFlip(function () {
    var el,
        upcoming,
        i;

    for (i=0; i<3; i++) {
        upcoming = carousel.masterPages[i].dataset.upcomingPageIndex;

        if (upcoming != carousel.masterPages[i].dataset.pageIndex) {
            el = carousel.masterPages[i].querySelector('span');
            el.innerHTML = slides[upcoming];
        }
    }

    document.querySelector('#swipeview_nav .selected').className = '';
    dots[carousel.pageIndex].className = 'selected';
});


// timer for carousel autoplay
function loaded() {
    var interval = setInterval(function () {
            if(!hasInteracted) carousel.next();
        }, 5000);

}
document.addEventListener('DOMContentLoaded', loaded, false);

</script>

</body>

</html>
