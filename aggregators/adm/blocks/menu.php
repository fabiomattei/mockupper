<?php

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class AnMenu extends BaseBlock {
	
	function __construct( $active = 'home' ) {
		$this->active = $active;
	}
	
    function show() {
		$out = '
			<nav id="sidebar">
			    <ul id="icon_nav_v" class="side_ico_nav">
			        <li '.( $this->active == 'home' ? 'class="active"' : '').' >
			            <a href="'.BASEPATH.'analyst/dashboard/dashboard" title="Dashboard"><i class="icon-home"></i></a>
			        </li>
			        <li '.( $this->active == 'organization' ? 'class="active"' : '').' >
			            <a href="'.BASEPATH.'analyst/organization/organizationlist" title="Organizations"><i class="icon-building"></i></a>
			        </li>
			        <!--<li '.( $this->active == 'models' ? 'class="active"' : '').' >
			            <a href="#" title="Models"><i class="icon-building"></i></a>
			        </li>
			        <li '.( $this->active == 'models' ? 'class="active"' : '').' >
			            <a href="#" title="Models"><i class="icon-building"></i></a>
			        </li>-->
			    </ul>
			</nav>';
        return $out; 
    }
	
}
