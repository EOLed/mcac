    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link(__("Montreal Chinese Alliance Church", true), "/", array("class" => "brand hidden-phone")) ?>
          <?php echo $this->Html->link(__("MCAC", true), "/", array("class" => "brand visible-phone")) ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li>
                <?php echo $this->Html->link($this->Html->image("logo-cma.png"),
                                             "/",
                                             array("escape" => false,
                                                   "id" => "logo")); ?>
              </li>
              <li class="">
                <?php echo $this->element("nav_connect"); ?>
              </li>
              <li class="">
                <?php echo $this->element("nav_pastors"); ?>
              </li>
              <li class="">
                <?php echo $this->element("nav_about"); ?>
              </li>
              <li class="divider-vertical"></li>
              <li class="">
                <?php if ($this->Session->read("Config.language") == "eng") {
                    echo $this->Html->link(__("Chinese", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "zh_CN"));
                } else {
                    echo $this->Html->link(__("English", true), array("plugin" => "urg", "controller" => "users", "action" => "locale", "eng"));
                } ?>
              </li>
              <li class="">
                  <?php 
                        if (CakeSession::read("User") == null) {
                            echo $this->Html->link(__("Login", true), array("plugin" => "urg", "controller"=>"users", "action"=>"login"));
                        } else {
                            echo $this->Html->link(__("Logout", true), array("plugin" => "urg", "controller"=>"users", "action"=>"logout"));
                        }
                   ?> 
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<div id="header" class="visible-desktop">
</div>

<script type="text/javascript">
    $('.dropdown-toggle').dropdown();
</script>
