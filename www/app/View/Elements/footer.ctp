<div id="site-map-footer" class="hidden-phone">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h4><?php echo __("Montreal Chinese Alliance Church"); ?></h4>
                <h5><?php echo __("Location"); ?></h5>
                <div id="footer-location">
                    13 Finchley<br/>
                    Hampstead, Quebec</br>
                    H3X 2Z4<br/>
                </div>
                <h5><?php echo __("Service Times"); ?></h5>
                <ul>
                    <li>English Service: Sunday 9:30am</li>
                    <li>Chiese Service: Sunday 11:30am</li>
                </ul>
            </div>
            <div class="span2">
                <h4><?php echo __("Our Pastors"); ?></h4>
                <ul>
                    <li>
                        <?php echo $this->Html->link(__("Rev. Jonathan Kaan"), 
                                                     array("plugin" => "urg",
                                                           "controller" => "groups",
                                                           "action" => "view",
                                                           "jkaan")); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__("Rev. Thomas Chan"), 
                                                     array("plugin" => "urg",
                                                           "controller" => "groups",
                                                           "action" => "view",
                                                           "tchan")); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__("Rev. Terry Yeung"), 
                                                     array("plugin" => "urg",
                                                           "controller" => "groups",
                                                           "action" => "view",
                                                           "tyeung")); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__("Rev. Ian Ho"), 
                                                     array("plugin" => "urg",
                                                           "controller" => "groups",
                                                           "action" => "view",
                                                           "iho")); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__("Rev. Marshall Davis"), 
                                                     array("plugin" => "urg",
                                                           "controller" => "groups",
                                                           "action" => "view",
                                                           "mdavis")); ?>
                    </li>
            </div>
            <div class="span2">
                <h4><?php echo __("Chinese Ministries"); ?></h4>
                <ul>
                    <?php
        echo $this->Html->tag("li",
                $this->Html->link(__("Hang-Oi (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "hangoi")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Jien Jin (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "jienjin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Canaan (Elderly)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "canaan")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Zion (Adults)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "zion")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Mandarin (Adults)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "mandarin")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Betha (Married)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "betha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("Elisha (Career)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "elisha")));
        echo $this->Html->tag("li",
                $this->Html->link(__("David (High School)", true), array("plugin" => "urg",
                                                                       "controller" => "groups",
                                                                       "action" => "view",
                                                                       "david"), array("class" => "dropdown-last")));
        ?>
        </ul>
            </div>
            <div class="span2">
                <h4><?php echo __("English Ministries"); ?></h4>
                <ul>
                <?php
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Isaac (Mature Adult)", true), array("plugin" => "urg",
                                                                                      "controller" => "groups",
                                                                                      "action" => "view",
                                                                                      "isaac")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Mothers Group", true), array("plugin" => "urg",
                                                                               "controller" => "groups",
                                                                               "action" => "view",
                                                                               "mothersgroup")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Jacob (Young Family)", true), array("plugin" => "urg",
                                                                                   "controller" => "groups",
                                                                                   "action" => "view",
                                                                                   "jacob")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("AE (Career)", true), array("plugin" => "urg",
                                                                                   "controller" => "groups",
                                                                                   "action" => "view",
                                                                                   "ae")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Bethany (College/University)", true), array("plugin" => "urg",
                                                                                   "controller" => "groups",
                                                                                   "action" => "view",
                                                                                   "bethanies")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Timothy (High School/CEGEP1)", true), array("plugin" => "urg",
                                                                                   "controller" => "groups",
                                                                                   "action" => "view",
                                                                                   "timothies")));
                    echo $this->Html->tag("li",
                            $this->Html->link(__("Worship Team", true), array("plugin" => "urg",
                                                                                   "controller" => "groups",
                                                                                   "action" => "view",
                                                                                   "worship")));

                ?>
                </ul>
            </div>
            <div id="footer-logo" class="span3">
                <?php echo $this->Html->image("logo-cma-footer.png"); ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
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
            Powered by <a href="http://churchie.org">Churchie</a>
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
    <div class="row">
        <div id="debug" class="span12" style="display: none">
            <?php echo $this->element('sql_dump'); ?>
            <?php echo $this->Js->writeBuffer(); ?>
        </div>
    </div>
    <?php } ?>
</div>
