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

            <? else: ?>
                <div id="bigphoto">
                    <div id='slider' class='swipe'>
                        <div class='swipe-wrap'>
                            <? foreach ($homepage->carousel->photos as $photo): ?>
                                <div class="carousel-photo" style="background-image:url('<?=base_url()?>images/<?=$homepage->carousel->date?>/<?=$photo->filename_large?>')"></div>
                            <? endforeach; ?>
                      </div>
                    </div>
                </div>
                <div id="caption">
                    <div class="dates"><?=dateify($homepage->leadstory->date, $date)?></div>
                    <h3><a href="<?=site_url()?>article/<?=$homepage->leadstory->id?>"><?=$homepage->carousel->title?></a></h3>
                </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        window.mySwipe = Swipe($('#slider')[0], {
            speed: 300,
            auto: 5000,
            disableScroll: true,
        });
    });
</script>

</body>

</html>
