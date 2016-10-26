<?php

require_once( 'framework/paperworks/basicpaper.php' );

/**
 * Created by Fabio Mattei <fabio@toscasolutions.com>
 * Date: 27/07/2016
 * Time: 17:00
 */
class AnomalyReportV1 extends BasicPaper {

    public $class_name              = 'AnomalyReportV1';
    public $slug                    = 'anomalyreportv1';
    public $base_slug               = 'anomalyreport';
    public $family_slug             = 'report';
    public $human_name              = 'Anomaly Report V1';
    public $destination_office_slug = 'safety';
    public $default_flow_slug       = 'basicv1';
    public $can_read                = array( '1' );
    public $can_edit                = array( '1' );
    public $can_receive             = array( '1' ); // destination offices

    public $fields = array( );

    public $validation = array(
        'id'                 => 'required|integer',
        'parentid'           => 'required|integer',
        'slug'               => 'max_len,250',
        'tasknumber'         => 'required|numeric',
        'description'        => 'max_len,2500',
        'responsibleId'      => 'required|numeric',
        'severity'           => 'required|numeric',
        'category'           => 'required|numeric',
        'solved'             => 'max_len,10',
    );

    public $filter = array(
        'id'                 => 'trim',
        'parentid'           => 'trim',
        'slug'               => 'trim',
		'tasknumber'         => 'trim',
        'description'        => 'trim',
        'responsibleId'      => 'trim',
        'severity'           => 'trim',
        'category'           => 'trim',
        'solved'             => 'trim',
	);

    function make_entity_for_saving( $array_containing_fields ) {
        $entity = array();

        $entity['tasknumber'] = ( isset($array_containing_fields['tasknumber']) ? $array_containing_fields['tasknumber'] : '' );
        $entity['description'] = ( isset($array_containing_fields['description']) ? $array_containing_fields['description'] : '' );
		$entity['responsibleId'] = ( isset($array_containing_fields['responsibleId']) ? $array_containing_fields['responsibleId'] : 0 );
        $entity['severity'] = ( isset($array_containing_fields['severity']) ? $array_containing_fields['severity'] : 0 );
        $entity['category'] = ( isset($array_containing_fields['category']) ? $array_containing_fields['category'] : 0 );
        $entity['solved'] = ( isset($array_containing_fields['solved']) ? $array_containing_fields['solved'] : 0 );
		
        return $entity;
    }

    function make_indexes_for_saving( $array_containing_fields ) {
        $entity = array();
		
        // pwp_iind1 :: responsibleId
        $entity['pwp_iind1'] = ( isset($array_containing_fields['responsibleId']) ? $array_containing_fields['responsibleId'] : 0 );
        // pwp_iind2 :: tasknumber
        $entity['pwp_iind2'] = ( isset($array_containing_fields['tasknumber']) ? $array_containing_fields['tasknumber'] : 0 );
        // pwp_iind3 :: severity
        $entity['pwp_iind3'] = ( isset($array_containing_fields['severity']) ? $array_containing_fields['severity'] : 0 );
        // pwp_iind4 :: category
        $entity['pwp_iind4'] = ( isset($array_containing_fields['category']) ? $array_containing_fields['category'] : 0 );
		
        return $entity;
    }

    function make_title( $array_containing_fields ) {
        $out = '';
        $out .= ( isset($array_containing_fields['description']) ? $array_containing_fields['description'] : '' );
        return $out;
    }

    function get_form( $paper_data = null, $paper_id = 0, $parent_paper_id = 0 ) {
        $out = 'This form can only be related to a checklist';
        if ( $parent_paper_id != 0 ) {

            if ( is_numeric( $parent_paper_id ) AND $parent_paper_id != 0 ) {
                $pwp_dao = dao_exp( 'paper', 'PaperDao' );
                $parent_paper = $pwp_dao->getById( $parent_paper_id );
                $parent_paper_obj = paperwork( get_paper_class_path( $parent_paper->pwp_slug ), get_paper_class_name( $parent_paper->pwp_slug ) );
                // checkgin if the parent is a checklist if not it does not work
                if ( method_exists( $parent_paper_obj, 'get_tasks' ) ) {
                    $tasks = $parent_paper_obj->get_tasks();

                    utils( 'xmlserializer' );
                    $entity = ( $paper_data == null ? null : simplexml_load_string( $paper_data ) );

                    $id = $paper_id;
                    $tasknumber = ( $entity == null ? '' : $entity->tasknumber );
                    $description = ( $entity == null ? '' : $entity->description );
                    $responsibleId = ( $entity == null ? 0 : $entity->responsibleId );
                    $severity = ( $entity == null ? 0 : $entity->severity );
                    $category = ( $entity == null ? 0 : $entity->category );
                    $solved = ( $entity == null ? 0 : $entity->solved );

                    $usr_dao = dao_exp( 'user', 'UserDao' );
                    $users = $usr_dao->getByFields( array() );

                    $out = '<br />
                    Description:<br />
                    <textarea name="description" cols="120" rows="3">'.$description.'</textarea><br /><br />';
                    $out .= 'Task:<br /><select name="tasknumber">';
                    $out .= '<option value="0">Select</option>';
                    foreach ( $tasks as $key => $value ) {
                        $out .= '<option value="'.$key.'" '.selected( $tasknumber, $key ).' >'.$value['task'].'</option>';
                    }
                    $out .= '</select><br /><br />';
                    $out .= 'Shift supervisor:<br /><select name="responsibleId">';
                    $out .= '<option value="0">Select</option>';
                    foreach ( $users as $usr ) {
                        $out .= '<option value="'.$usr->usr_id.'" '.selected( $usr->usr_id, $responsibleId ).'>'.$usr->usr_name.' '.$usr->usr_surname.'</option>';
                    }
                    $out .= '</select><br /><br />';
                    $out .= 'Severity:<br /><select name="severity">';
                    for ( $i=0; $i <= 3 ; $i++ ) { 
                        $out .= '<option value="'.$i.'" '.selected( $i, $severity ).'>'.$this->get_descriptive_severity( $i ).'</option>';
                    }
                    $out .= '</select><br /><br />';
                    $out .= 'Category:<br /><select name="category">';
                    for ( $i=0; $i <= 8 ; $i++ ) { 
                        $out .= '<option value="'.$i.'" '.selected( $i, $category ).'>'.$this->get_descriptive_category( $i ).'</option>';
                    }
                    $out .= '</select><br /><br />';
                    $out .= '<input type="hidden" name="id" value="'.$id.'">';
                }
            }
        }

        return $out;
    }

    function get_view( $entity = null ) {
        utils( 'xmlserializer' );

        $parent_id = $entity->pwp_parentid;
        $entity = simplexml_load_string( $entity->pwp_data );

        $tasknumber = ( $entity->tasknumber == null ? '' : $entity->tasknumber );
        $description = ( $entity->description == null ? '' : $entity->description );
        $responsibleId = ( $entity->responsibleId == null ? 0 : $entity->responsibleId->__toString() );
		$severity = ( $entity->severity == null ? 0 : $entity->severity );
        $category = ( $entity->category == null ? 0 : $entity->category );
        $solved = ( $entity->solved == null ? 0 : $entity->solved );

        $responsible_string = '';
        if ( is_numeric( $responsibleId ) AND $responsibleId != 0 ) {
            $usr_dao = dao_exp( 'user', 'UserDao' );
            $responsible = $usr_dao->getById( $responsibleId );
            $responsible_string = 'Shift supervisor: '.$responsible->usr_name.' '.$responsible->usr_surname.'<br /><br />'; 
        }
        
        $taskstring = '';
        if ( is_numeric( $parent_id ) AND $parent_id != 0 ) {
            $pwp_dao = dao_exp( 'paper', 'PaperDao' );
            $parent_paper = $pwp_dao->getById( $parent_id );
            $parent_paper_obj = paperwork( get_paper_class_path( $parent_paper->pwp_slug ), get_paper_class_name( $parent_paper->pwp_slug ) );
            // checkgin if the parent is a checklist if not it does not work
            if ( method_exists( $parent_paper_obj, 'get_task' ) ) {
                $task = $parent_paper_obj->get_task( $tasknumber->__toString() );
                $taskstring = 'Task: ' . $task['task'] . '<br /><br />';
            }
        }

        $out = '<br />
        '.$taskstring.'
        Description: '.$description.'<br /><br />
		'.$responsible_string.'
        Severity: '.$this->get_descriptive_severity( $severity ).'<br /><br />
        Category: '.$this->get_descriptive_category( $category ).'<br /><br />';

        return $out;
    }

    function get_short_view( $entity = null ) {
        utils( 'xmlserializer' );

        $entity = simplexml_load_string($entity->pwp_data);

        $description = ( $entity->description == null ? '' : $entity->description );

        $out = '<br />Description: '.$description.'<br /><br />';

        return $out;
    }

    /* Private section */

    function get_descriptive_severity( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Low'; break;
            case 2: $out = 'Medium'; break;
            case 3: $out = 'High'; break;
            default: $out = 'Select'; break;
        }
        return $out;
    }

    function get_descriptive_category( $category ) {
        switch ( $category ) {
            case 1: $out = 'Health and safety'; break;
            case 2: $out = 'Environmental'; break;
            case 3: $out = 'Quality'; break;
            case 4: $out = 'Economical'; break;
            case 5: $out = 'Security'; break;
            case 6: $out = 'Terminal infrastructures'; break;
            case 7: $out = 'Airside infrastructures'; break;
            case 8: $out = 'Customer care'; break;
            default: $out = 'Select'; break;
        }
        return $out;
    }

}
