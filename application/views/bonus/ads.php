<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BONUS - Ads</title>
    <link rel="shortcut icon" href="<?=base_url()?>img/o-32-invert.png">
    <link rel="stylesheet" media="screen" href="<?=base_url()?>/css/bonus.css?v=1">
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://use.typekit.com/rmt0nbm.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>

<div id="container">

<header>
    <h1>/BONUS</h1>
</header>

<div id="content">
        
    <h2>Ads</h2>
    
    <nav>
    <ul>
    <li><?=anchor('bonus/dashboard','Dashboard')?></li>
    <li><?=anchor('bonus/authors','Authors')?></li>
    <li><?=anchor('bonus/alerts','Alerts')?></li>
    <li><?=anchor('bonus/issues','PDFs')?></li>
    <li><?=anchor('bonus/ads','Ads')?></li>
    </ul>
    </nav>  

    <h3>Create Advertisments</h3>

    <? 
        $attributes = array(
            'name' => 'create_issue',
            'class' => 'create_issue', 
            'id' => 'create_issue',
            'onsubmit'  => "return validateIssueForm()"
            );
        $hidden = array(
            'form_name' => 'create_issue',
            );
        echo form_open('bonus/issues',$attributes,$hidden);
    ?>
    Sponsor: <input type="text" name="sponsor"><br/>
    Start date: <input type="datetime" name="publish_date" value="<?=date("Y-m-d",time())?>"><br/>
    End date: <input type="datetime" name="publish_date" value=""><br/>
    Link when clicked (optional): <input type="text" name="number"><br/>
    <?= form_submit('submit',"Create advertisement") ?>
    <?= form_close() ?>

    <h3>Existing Ads</h3>
    
    <? if(!empty($ads)): ?>
    <table>
    <tr>
        <th>Sponsor</th>
        <th>Link</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Filename</th>
        <th>Type</th>
        <th>Preview</th>
        <th>Delete?</th>
    </tr>
    <? foreach($ads as $ad): ?>
    <tr>
        <td><?=$ad->sponsor?></td>
        <td><?=$ad->link?></td>
        <td><?=$ad->start_date?></td>
        <td><?=$ad->end_date?></td>
        <td><?=$ad->filename?></td>
        <td><?=$ad->type?></td>
        <? if($ad->type == "image"): ?>
            <td><img class="ad_thumb" src='<?=base_url()."ads/".$ad->filename?>'></a></td>
        <? else: ?>
            <td>None</td>
        <? endif; ?>
        <td><p id="<?=$ad->id?>" class="delete-link">x</p></td>
    <tr>
    <? endforeach; ?>
    </table>
    <? endif; ?>

</div>
    
<footer>
    <p class="bonusquote">&ldquo;<?=$quote->quote?>&rdquo;</p>
    <p class="bonusquoteattribution">&mdash; <?=$quote->attribution?></p>
    <p class="sunbug"><a href="<?=base_url()?>">&#x2600;</a></p>
    <p class="about">Bowdoin Orient Network Update System 2.0</p>
</footer>

</div>

<? $this->load->view('bonus/bonusbar', TRUE); ?>

</body>

<script type="text/javascript">
    $(".delete-link").click(function(){
        id = $(this).attr("id");

        $.post("<?=base_url()?>bonus/ads/ajax_delete_ad"+id, {"remove": true}).done(function(){
            location.reload(true);
        });
    });
</script>

</html>