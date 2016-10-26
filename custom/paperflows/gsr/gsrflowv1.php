<?php

require_once( 'framework/paperworks/basicflow.php' );

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: 18/04/2016
 * Time: 10:50
 */
class GsrFlowV1 extends BasicFlow {

    public $class_name            = 'GsrFlowV1';
    public $slug                  = 'gsrflowv1';
    public $human_name            = 'GSR Flow V1';
    public $default_initial_state = 'received';

    public $states = array(
        'received'      => 'RECEIVED',
        'validated'     => 'VALIDATED',
        'sent'          => 'SENT TO AUTHORITIES',
        'investigation' => 'INVESTIGATION',
        'monitored'     => 'MONITORED',
        'feedback'      => 'FEEDBACK RECCOMENDATIONs',
        'final'         => 'FINAL REPORT',
        'closed'        => 'CLOSED/MONITORED',
    );

    public $description = array(
        'received'      => 'Report received, if MOR send to authorities before 72h',
        'validated'     => 'Report validated, feedback sent to the reporter',
        'sent'          => 'Report sent to ENAC, ANSV, authomatic feedback received',
        'investigation' => 'Analysis of event',
        'monitored'     => '',
        'feedback'      => 'Received feedback from postholder',
        'final'         => 'Sent final report with recommendation',
        'closed'        => '',
    );

    public $next_state_description = array(
        'received'      => 'validated',
        'validated'     => '',
        'sent'          => '',
        'investigation' => '',
        'monitored'     => '',
        'feedback'      => '',
        'final'         => '',
        'closed'        => '',
    );

    public $time_limit = array(
        'received'      => '72 hours',
        'validated'     => '',
        'sent'          => '',
        'investigation' => '',
        'monitored'     => '',
        'feedback'      => '',
        'final'         => '',
        'closed'        => '',
    );

    // array made from string containing class_name of required paper
    public $required_papers = array(
        'received'      => 'GSRAppendixV1',
        'validated'     => '',
        'sent'          => '',
        'investigation' => '',
        'monitored'     => '',
        'feedback'      => '',
        'final'         => '',
        'closed'        => '',
    );

}
