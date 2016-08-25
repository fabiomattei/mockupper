<?php

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: 18/04/2016
 * Time: 12:22
 */
class BasicFlow {

    public $class_name            = 'BasicFlow';
    public $slug                  = 'basicflow';
    public $human_name            = 'Basic Flow';
    public $default_initial_state = 'received';

    public $states = array(
        'received'      => 'RECEIVED',
        'closed'        => 'CLOSED',
    );

    public $description = array(
        'received'      => '',
        'closed'        => '',
    );

    public $next_state_description = array(
        'received'      => '',
        'closed'        => '',
    );

    public $time_limit = array(
        'received'      => '2 months',
        'closed'        => '',
    );

    public $required_papers = array(
        'received'      => '',
        'closed'        => '',
    );

    public function is_too_late( $current_time, $pw_initial_time, $state_time_limit ) {
        if ( strtotime( $current_time ) > strtotime( $pw_initial_time.' +'.$state_time_limit ) ) {
            return true;
        } else {
            return false;
        }
    }

    public function get_status( $index ) {
        if ( isset( $this->states[$index] ) ) {
            return $this->states[$index];
        } else {
            return 'Undefined';
        }
    }

    public function get_time_limit( $index ) {
        if ( isset( $this->time_limit[$index] ) ) {
            return $this->time_limit[$index];
        } else {
            return '2 months';
        }
    }

    public function get_description( $index ) {
        if ( isset( $this->description[$index] ) ) {
            return $this->description[$index];
        } else {
            return '';
        }
    }

}
