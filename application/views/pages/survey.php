<? $this->load->view('template/head'); ?>

<style>
.survey {
   position:relative;
   display:block;
}
.insidesurvey {
    margin:0 auto;
    overflow:hidden;
    /*width:744px;*/
    /*height:2500px;*/
}

 @media (max-width: 667px) {
    .insidesurvey {
        /*width:500px;*/
        /*height:2800px;*/
        -webkit-overflow-scrolling: touch;
    }
    .insidesurvey iframe{
        /*width: 300px;*/
        /*height: 100%;*/
    }
}
</style>

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
        <iframe id="survey" src="https://docs.google.com/forms/d/1LaKxhjXkybhjv3F6dqk0LYE18HxVSscOxhpDTHIqzeU/viewform?embedded=true" height="500" width="100%" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
        </div>    
    </div>
    <script>
        /* Set the iframe to a reasonable height so that most of the scrolling 
            is in the frame*/
        document.getElementById("survey").height = window.screen.height - 47 - 63- 45;
    </script>
</div>

<? $this->load->view('template/bodyfooter', $footerdata); ?>

<? $this->load->view('bonus/bonusbar', TRUE); ?>

</body>

</html>
