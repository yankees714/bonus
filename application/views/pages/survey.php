<? $this->load->view('template/head'); ?>

<style>
.survey {
   position:relative;
   display:block;
}
.insidesurvey {
    margin:0 auto;
    overflow:hidden;
    width:744px;
    height:1550px;
}
</style

<body>

<? $this->load->view('template/bodyheader', $headerdata); ?>

<div id="content">    
    <!-- 
    <header>
        <hgroup>
            <h2 id="articletitle" class="articletitle">This survey's response period has closed.</h2>
        </hgroup>            
    </header>
    -->
    
    <div class="survey">
        <div class="insidesurvey">
        <iframe src="https://docs.google.com/forms/d/1lRZCibs7hZssgA2cefzV4_w-jrvwoKMYOfGVo3IJbH0/viewform?embedded=true" width="760" height="2150" frameborder="0" marginheight="0" marginwidth="0" align="middle">Loading...</iframe>
        </div>    
    </div>
</div>

<? $this->load->view('template/bodyfooter', $footerdata); ?>

<? $this->load->view('bonus/bonusbar', TRUE); ?>

</body>

</html>