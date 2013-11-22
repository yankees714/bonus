<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BONUS - Ads</title>
    <link rel="shortcut icon" href="<?=base_url()?>img/o-32-invert.png">
    <link rel="stylesheet" media="screen" href="<?=base_url()?>/css/bonus.css?v=1">
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="http://use.typekit.com/rmt0nbm.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <script type="text/javascript" src="<?=base_url()?>js/datepicker/picker.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/datepicker/picker.date.js"></script>

    <link rel="stylesheet" href="<?=base_url()?>js/datepicker/themes/classic.css">
    <link rel="stylesheet" href="<?=base_url()?>js/datepicker/themes/classic.date.css">
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
            'name' => 'create_ad',
            'class' => 'create_issue', 
            'id' => 'create_issue',
            'onsubmit'  => "return validateAdForm()"
            );
        $hidden = array(
            'form_name' => 'create_ad',
            );
        echo form_open_multipart('bonus/ads',$attributes,$hidden);
    ?>
    <table class="adupload">
    <tr><td>Sponsor: </td><td> <input required type="text" name="sponsor" placeholder="e.g., 'Flipside'"> </td></tr>
    <tr><td>Start date: </td><td> <input class="datepick" required type="datetime" name="start_date" value="" placeholder="Click to select a date"> </td></tr>
    <tr><td>End date: </td><td> <input class="datepick" required type="datetime" name="end_date" value="" placeholder="Click to select a date"> </td></tr>
    <tr><td>Link when clicked (optional): </td><td> <input type="text" name="link" placeholder="e.g., 'http://flipsidemaine.com'"> </td></tr>
    <tr><td>Photo upload:</td><td><input required type="file" name="filename" id="filename" accept="image/png, image/jpeg"></td></tr>
    </table>
    <?= form_submit('submit',"Create advertisement") ?>
    <?= form_close() ?>

    <script type="text/javascript">
        $(".adupload input.datepick").pickadate({format: 'yyyy-mm-dd'});
    </script>

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
        <td><?=!empty($ad->link) ? $ad->link : "None specified"; ?></td>
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
        $.post("<?=base_url()?>bonus/ajax_delete_ad/"+id, {"remove": true}).done(function(){
            location.reload(true);
        });
    });
</script>

</html>