<?php

require_once( 'framework/paperworks/basicflow.php' );

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: 18/04/2016
 * Time: 10:50
 */
class BasicV1 extends BasicFlow {

    public $class_name            = 'BasicV1';
    public $slug                  = 'basicv1';
    public $human_name            = 'Basic V1';
    public $default_initial_state = 'open';

    public $states = array(
        'received'      => 'RECEIVED',
        'inprogress'    => 'IN PROGRESS',
        'closed'        => 'CLOSED/MONITORED',
    );

    public $description = array(
        'received'      => 'Report received, check before 72h',
        'inprogress'    => 'Working on it',
        'closed'        => '',
    );

    public $next_state_description = array(
        'received'      => '',
        'inprogress'    => '',
        'closed'        => '',
    );

    public $time_limit = array(
        'received'      => '72 hours',
        'inprogress'    => '2 months',
        'closed'        => '',
    );

    // array made from string containing class_name of required paper
    public $required_papers = array(
        'received'      => '',
        'inprogress'    => '',
        'closed'        => '',
    );

}
