<? $this->load->view('template/head'); ?>

<body>

<? $this->load->view('template/bodyheader', $headerdata); ?>

<div id="content">
    
    <article id="pagescontent">
        
        <header>
            <hgroup>
                <h2 id="pagescontenttitle" class="pagescontenttitle">Comment Policy</h2>
            </hgroup>            
        </header>
        
        <figure id="contents">
            <h3>Related links</h3>
            <ul>
                <li><?=anchor('about','About the Orient')?></li>
                <li><?=anchor('pages/ethics', 'Ethical Practices Policy')?></li>
            </ul>
        </figure>
        
        <div id="pagescontentbody" class="pagescontentbody">

            <p>
            Lorem ipsum dolor sit amet, risus sapien ut sagittis etiam consectetuer, est vivamus vel elit, consequat et ut nunc eu nec. Arcu dolor vestibulum et massa elementum, lorem lorem, sit est amet nam condimentum est sollicitudin, non eget et nunc tristique cras quisque, mauris sollicitudin leo etiam ut enim lacus. Tempus ut, vestibulum odio, pede mauris purus ipsum, nunc neque, condimentum donec. Praesent libero ac id vitae amet convallis, id vulputate lobortis vestibulum. Sagittis harum ad aenean, erat cursus a augue dui, vel dui quam nulla fames elit pede. Dolor suscipit duis cras, curabitur vel et auctor justo sed. Dignissim neque turpis imperdiet vitae, rutrum nec ullamco donec venenatis mauris sem, fusce mauris rhoncus augue morbi amet. Sed eget urna rhoncus dui, sem egestas suspendisse fusce.
            </p>

            <p>
            Wisi sit lectus eget. A pulvinar semper in nisl eu, donec neque, risus faucibus lacus sed amet. Quis nam wisi ornare, etiam diam lobortis aliquam, sit ut rutrum tellus et non. Libero et lacus, mattis metus accumsan diam et massa, eget nunc molestie, quis elementum condimentum. Porta sit. Mauris mi ipsum commodo est dolor, accumsan velit cubilia egestas laoreet nam, minima sagittis, in proin integer velit. Ac vel non anim aptent, praesent quis tortor sed elit. Torquent sapien posuere nobis lectus quisque imperdiet, cursus sem metus elit vitae, sed nunc dolor aliquam tincidunt nunc maecenas, proin habitasse condimentum non ad amet, risus eget ac proin justo ut.
            </p>
            
            <p>
            Lorem neque amet felis nam, ante ante, odio et vitae quam, volutpat erat mi scelerisque massa vestibulum, consequat nulla mattis lacus semper. Auctor faucibus viverra, vitae gravida, at wisi sit inceptos. Libero pellentesque integer pede, non aliquet. Morbi tortor id sit amet diam, ut ac nam, fermentum adipiscing vitae vestibulum. Mauris eu nunc augue enim iaculis eleifend, scelerisque sit suspendisse eget volutpat amet placerat, laboris magna.
            </p>
        </div>
      
    </article>

</div>

<? $this->load->view('template/bodyfooter', $footerdata); ?>

<? $this->load->view('bonus/bonusbar', TRUE); ?>

</body>

</html>
