<?php

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: 10/05/2016
 * Time: 12:32
 */
class BasicPaper {

    public $class_name = 'BasicPaper';
    public $slug       = 'basicpaper';
    public $human_name = 'Basic Paper';
    public $descriptive_field = 'deviation';
    public $destination_office_slug = 'safety';
    public $default_flow_class = 'BasicFlow';

    public $fields = array(

    );

    public $validation = array(
        'id' => 'required|integer',
    );

    public $filter = array(
        'id'  => 'trim',
    );

    function get_fields() {
        return $this->fields;
    }

    function get_validation_rules() {
        return $this->validation;
    }

    function make_entity_for_saving( $array_containing_fields ) {
        $entity = array();

        return $entity;
    }

    function get_form( $paper_data = null, $paper_id = 0 ) {
        $out = 'No Form defined';
        return $out;
    }

    function get_view( $entity = null ) {
        $out = 'No view defined';
        return $out;
    }

}
