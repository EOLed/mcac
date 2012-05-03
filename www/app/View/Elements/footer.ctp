<div class="row">
    <div class="span12">
<?php
echo $this->Html->link(__("13 rue Finchley, Hampstead, QC H3X 2Z6", true), "http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Montreal+Chinese+Alliance+Church,+13,+Rue+Finchley,+Hampstead,+QC+H3X+2Z4,+Canada&aq=0&sll=37.0625,-95.677068&sspn=33.847644,79.013672&ie=UTF8&hq=Montreal+Chinese+Alliance+Church,&hnear=13+Rue+Finchley,+Hampstead,+Communaut%C3%A9-Urbaine-de-Montr%C3%A9al,+Qu%C3%A9bec+H3X+2Z6,+Canada&ll=45.480069,-73.633461&spn=0.006936,0.01929&z=16&iwloc=A");
echo " | " . __("Phone: 514.482.2703", true);
echo " | " . __("Email: ", true) . $this->Html->link("info@montreal-cac.org", "mailto:info@montreal-cac.org"); ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        &copy; Montreal Chinese Alliance Church |
        Designed by <a href="http://am05.com">AM05.com</a> |
        Part of the <a href="http://churchie.org">Churchie.org Network</a>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?php 
            if (Cache::read("app.version") === false) {
                $f = fopen(Configure::read("General.changelog"), "r");
                Cache::write("app.version", fgets($f));
                fclose($f);
            }

            echo $this->Html->link("Version " . substr(Cache::read("app.version"), 1), array("plugin" => false, "controller" => "pages", "action" => "display", "changelog"));
        ?>
    </div>
</div>
<?php if (Configure::read("debug") > 0) { ?>
<div class="row">
    <div class="span12">
        <a href="#" onclick="$('#debug').toggle(); return false;">Show Debug Info</a>
    </div>
</div>
<?php } ?>
