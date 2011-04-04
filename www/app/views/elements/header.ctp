<div id="logo" class="alpha grid_3">
    <?php echo $this->Html->image("logo.png"); ?>
</div>
<div id="nav-pane" class="omega grid_6 suffix_3">
    <ul id="nav">
        <li>
            <span><?php echo strtoupper(__("About Us", true)); ?></span>
            <div id="nav-about">This is the about page</div>
        </li>
        <li>
            <span><?php echo strtoupper(__("Our Pastors", true)); ?></span>
            <div id="nav-pastors">
                <ul>
                    <li><?php echo $this->Html->link(__("Rev. Jonathan Kaan", true), "/jkaan") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Thomas Chan", true), "/tchan") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Terry Yeung", true), "/tyeung") ?></li>
                    <li><?php echo $this->Html->link(__("Rev. Ian Ho", true), "/iho") ?></li>
                    <li><?php echo $this->Html->link(__("Pastor Davis Marshall", true), "/mdavis") ?></li>
                </ul>
            </div>
        </li>
        <li>
            <span><?php echo strtoupper(__("Connect", true)); ?></span>
            <div id="nav-connect">connect with us!</div>
        </li>
    </ul>
</div>


<script type="text/javascript">
    $("#nav li").hover(
        function() { $(this).addClass("hover") }, 
        function() { $(this).removeClass("hover") }
    );
</script>
