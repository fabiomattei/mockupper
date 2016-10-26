<?php

/**
 * Created by Fabio Mattei
 * Date: 20/05/16
 * Time: 12.17
 */
class GSRAppendixV1 extends BasicPaper {

    public $class_name = 'GSRAppendixV1';
    public $slug       = 'gsrappendixv1';
    public $base_slug               = 'gsrappendix';
    public $family_slug             = 'gsrappendix';
    public $human_name = 'GSR Appendix V1';
    public $destination_office_slug = '';
    public $default_flow_class = '';
    public $can_read                = array( '1' );
    public $can_edit                = array( '1' );
    public $can_receive             = array( '1' ); // destination offices

    public $fields = array(

    );

    public $validation = array(
        'id'                       => 'required|integer',
        'eventRecordeventType'     => 'max_len,50',
        'mandatoryoccurencereport' => 'max_len,5',
        'severity'                 => 'integer',
        'erceffectiveness'         => 'integer',
        'ercseverity'              => 'integer',
        'relatedsafetyreport'      => 'max_len,5',
        'transmittedauthorities'   => 'max_len,5',
    );

    public $filter = array(
        'id'                       => 'trim',
        'eventRecordeventType'     => 'trim',
        'mandatoryoccurencereport' => 'trim',
        'severity'                 => 'trim',
        'erceffectiveness'         => 'trim',
        'ercseverity'              => 'trim',
        'relatedsafetyreport'      => 'trim',
    );

    function make_entity_for_saving( $array_containing_fields ) {
        $entity = array();

        $entity['eventRecordeventType'] = ( isset($array_containing_fields['eventRecordeventType']) ? $array_containing_fields['eventRecordeventType'] : '' );
        $entity['mandatoryoccurencereport'] = ( isset($array_containing_fields['mandatoryoccurencereport']) ? $array_containing_fields['mandatoryoccurencereport'] : '' );
        $entity['severity'] = ( isset($array_containing_fields['severity']) ? $array_containing_fields['severity'] : 1 );
        $entity['erceffectiveness'] = ( isset($array_containing_fields['erceffectiveness']) ? $array_containing_fields['erceffectiveness'] : 1 );
        $entity['ercseverity'] = ( isset($array_containing_fields['ercseverity']) ? $array_containing_fields['ercseverity'] : 1 );
        $entity['relatedsafetyreport'] = ( isset($array_containing_fields['relatedsafetyreport']) ? $array_containing_fields['relatedsafetyreport'] : '' );
        $entity['transmittedauthorities'] = ( isset($array_containing_fields['transmittedauthorities']) ? $array_containing_fields['transmittedauthorities'] : '' );

        return $entity;
    }

    function make_indexes_for_saving( $array_containing_fields ) {
        $entity = array();

        // pwp_iind1 :: severity
        $entity['pwp_iind1'] = ( isset($array_containing_fields['severity']) ? $array_containing_fields['severity'] : 1 );
        // pwp_iind2 :: likelihood
        $entity['pwp_iind2'] = ( isset($array_containing_fields['likelihood']) ? $array_containing_fields['likelihood'] : 1 );
        // pwp_iind3 :: risk
        $entity['pwp_iind3'] = $entity['pwp_iind1'] * $entity['pwp_iind2'];

        return $entity;
    }

    function make_title( $array_containing_fields ) {
        $out = '';

        $out .= ( isset($array_containing_fields['erceffectiveness']) ? 'ERC = '.$array_containing_fields['erceffectiveness'] : 1 );

        return $out;
    }

    function get_form( $paper_data = null, $paper_id = 0, $parent_paper_id = 0 ) {
        utils( 'xmlserializer' );
        $entity = ( $paper_data == null ? null : simplexml_load_string( $paper_data ) );

        $id = $paper_id;
        $eventRecordeventType = ( $entity == null ? '' : $entity->eventRecordeventType );
        $mandatoryoccurencereport = ( $entity == null ? '' : $entity->mandatoryoccurencereport );
        $severity = ( $entity == null ? '' : $entity->severity );
        $erceffectiveness = ( $entity == null ? '' : $entity->erceffectiveness );
        $ercseverity = ( $entity == null ? '' : $entity->ercseverity );
        $relatedsafetyreport = ( $entity == null ? '' : $entity->relatedsafetyreport );
        $transmittedauthorities = ( $entity == null ? '' : $entity->transmittedauthorities );

        $out = '<tr><th colspan="5"><hr>TRANSMISSION INSTRUCTIONS & PRELIMINARY ANALYSIS (Reserved safety office)</th></tr>
<tr>
    <td colspan="5">
        <table width="980">
            <tr>
                <td width="30%">Type of Occurrence</td>
                <td width="70%">
                    <select name ="eventRecordeventType">
                        <option '.selected( $eventRecordeventType, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $eventRecordeventType, 'Accident' ).' value="Accident">Accident</option>
                        <option '.selected( $eventRecordeventType, 'SeriousIncident' ).' value="SeriousIncident">Serious incident</option>
                        <option '.selected( $eventRecordeventType, 'Incident' ).' value="Incident">Incident</option>
                        <option '.selected( $eventRecordeventType, 'OccurrenceWithoutSafetyEffect' ).' value="OccurrenceWithoutSafetyEffect">Occurrence Without Safety Effect</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mandatory Occurence Report/MOR:</td>
                <td>
                    <select name ="mandatoryoccurencereport">
                        <option '.checked( $mandatoryoccurencereport, 'No' ).' value="No">No</option>
                        <option '.checked( $mandatoryoccurencereport, 'Yes' ).' value="Yes">Yes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Safety Risk Level:</td>
                <td>
                    <select name ="severity">
                        <option '.selected( $severity, '0' ).' value="0">Unselected</option>
                        <option '.selected( $severity, '1' ).' value="1">1 - Intolerable</option>
                        <option '.selected( $severity, '2' ).' value="2">2 - Tolerable</option>
                        <option '.selected( $severity, '3' ).' value="3">3 - Acceptable</option>
                    </select>
                </td>
            </tr>
            <tr>	
                <td>ERC Ectiveness:</td>
                <td>
                    <select name ="erceffectiveness">';
        for ( $i = 1; $i <= 4 ; $i++ ) {
            $out .= '<option '.selected( $erceffectiveness, $i ).' value="'.$i.'">'.
                $this->effectiveness_name( $i ).': '.$this->effectiveness_description( $i ).'</option>';
        }
        $out .= '</select>
                </td>
            </tr>
            <tr>
                <td>ERC Severity:</td>
                <td>
                    <select name ="ercseverity">';
        for ( $i = 1; $i <= 5 ; $i++ ) {
            $out .= '<option '.selected( $ercseverity, $i ).' value="'.$i.'">'.
                $this->severity_name( $i ).': '.$this->severity_description( $i ).'</option>';
        }
        $out .= '</select>
                </td>
            </tr>
            <tr>
                <td>Related Safety Report from other Airport Operators?</td>
                <td>
                    <input type="radio" name="relatedsafetyreport" '.checked( $relatedsafetyreport, 1 ).' value="Yes"> Yes
                    <input type="radio" name="relatedsafetyreport" '.checked( $relatedsafetyreport, 0 ).' value="No"> No
                </td>
            </tr>
            <tr>
                <td>Transmitted to other Authorities?</td>
                <td>
                    <input type="radio" name="transmittedauthorities" '.checked( $transmittedauthorities, 1 ).' value="Yes"> Yes
                    <input type="radio" name="transmittedauthorities" '.checked( $transmittedauthorities, 0 ).' value="No"> No
                </td>
            </tr>
        </table>
    </td>
</tr>
<input type="hidden" name="id" value="'.$id.'">';
        return $out;
    }

    function get_view( $entity = null ) {
        utils( 'xmlserializer' );

        $entity = simplexml_load_string($entity->pwp_data);

        $deviation = ( $entity->deviation == null ? '' : $entity->deviation );
        $cause = ( $entity->cause == null ? '' : $entity->cause );
        $consequence = ( $entity->consequence == null ? '' : $entity->consequence );
        $severity = ( $entity->severity == null ? '' : $entity->severity );
        $likelihood = ( $entity->likelihood == null ? '' : $entity->likelihood );
        $risk = ( $entity->risk == null ? '' : $entity->risk );
        $mitigation = ( $entity->mitigation == null ? '' : $entity->mitigation );

        $out = '<br />
        Hazard: '.$deviation.'<br /><br />
        Cause: '.$cause.'<br /><br />
        Consequences: '.$consequence.'<br /><br />
        Severity: '.$this->get_descriptive_severity($severity).'<br /><br />
        Likelihood: '.$this->get_descriptive_likelihood($likelihood).'<br /><br />
        Risk: '.$this->get_descriptive_risk($risk).' (obtained from severity and likelihood)<br /><br />
        Proposed mitigation: '.$mitigation.'<br /><br />';

        return $out;
    }

    private function effectiveness_name( $effectiveness ) {
        switch ( $effectiveness ) {
            case 1:
                $out = 'EFFICACE';
                break;
            case 2:
                $out = 'LIMITATO';
                break;
            case 3:
                $out = 'MINIMO';
                break;
            case 4:
                $out = 'NON EFFICACE';
                break;
            default:
                $out = 'Unselected';
        }

        return $out;
    }

    private function severity_name( $severity ) {
        switch ( $severity ) {
            case 1:
                $out = 'Trascurabile';
                break;
            case 2:
                $out = 'Minore';
                break;
            case 3:
                $out = 'Maggiore';
                break;
            case 4:
                $out = 'Critico';
                break;
            case 5:
                $out = 'Catastrofica';
                break;
            default:
                $out = 'Unselected';
        }

        return $out;
    }

    private function effectiveness_description( $effectiveness ) {
        switch ( $effectiveness ) {
            case 1:
                $out = '';
                break;
            case 2:
                $out = '';
                break;
            case 3:
                $out = '';
                break;
            case 4:
                $out = '';
                break;
            default:
                $out = 'Unselected';
        }

        return $out;
    }

    private function severity_description( $severity ) {
        switch ( $severity ) {
            case 1:
                $out = 'Any event which could not escalate into an accident; event which may have operational consequences (e.g. diversion, delay, individual sickness)';
                break;
            case 2:
                $out = 'Medical intervention, FRFF intervention, declared emergency with no consequences';
                break;
            case 3:
                $out = 'Pushback accident, Minor injuries to Staff/ Passengers, Minor ground damage to equipment or aircraft';
                break;
            case 4:
                $out = 'High speed taxiway excursion, Injuries/incidents during Gnd Ops, Serious emergency with significant operational consequences';
                break;
            case 5:
                $out = 'A/C crash, Uncontrollable Fire on Board/Apron, Explosion';
                break;
            default:
                $out = 'Unselected';
        }

        return $out;
    }

    /**
     * It calculates the value of ERC mark based on the values of $effectivenessa and $severity
     * @param effectiveness :: int value 1 to 5
     * @param severity      :: int value 1 to 5
     * @return              :: int value 0 to 2500
     */
    private function calculate_erc( $effectiveness, $severity ) {
        $result = 0;

        // first row
        if ( $severity == 1 ) {
            $result = 1;
        }

        // second row
        if ( $effectiveness == 1 AND $severity == 2 ) {
            $result = 2;
        }
        if ( $effectiveness == 2 AND $severity == 2 ) {
            $result = 4;
        }
        if ( $effectiveness == 3 AND $severity == 2 ) {
            $result = 20;
        }
        if ( $effectiveness == 4 AND $severity == 2 ) {
            $result = 100;
        }

        // third row
        if ( $effectiveness == 1 AND $severity == 3 ) {
            $result = 6;
        }
        if ( $effectiveness == 2 AND $severity == 3 ) {
            $result = 12;
        }
        if ( $effectiveness == 3 AND $severity == 3 ) {
            $result = 60;
        }
        if ( $effectiveness == 4 AND $severity == 3 ) {
            $result = 300;
        }

        // forth row
        if ( $effectiveness == 1 AND $severity == 4 ) {
            $result = 17;
        }
        if ( $effectiveness == 2 AND $severity == 4 ) {
            $result = 34;
        }
        if ( $effectiveness == 3 AND $severity == 4 ) {
            $result = 170;
        }
        if ( $effectiveness == 4 AND $severity == 4 ) {
            $result = 850;
        }

        // fifth row
        if ( $effectiveness == 1 AND $severity == 5 ) {
            $result = 50;
        }
        if ( $effectiveness == 2 AND $severity == 5 ) {
            $result = 100;
        }
        if ( $effectiveness == 3 AND $severity == 5 ) {
            $result = 502;
        }
        if ( $effectiveness == 4 AND $severity == 5 ) {
            $result = 2500;
        }

        return $result;
    }

    private function erc_color( $erc ) {
        $color = '#FFFFFF'; // white

        if ( $erc >= 1 ) {
            $color = '#00FF00'; // green
        }

        if ( $erc >= 20 ) {
            $color = '#FFFF00'; // yellow
        }

        if ( $erc >= 502 ) {
            $color = '#FF0000'; // red
        }

        return $color;
    }

    private function necessary_action( $erc ) {
        $out = '';

        if ( $erc >= 12 ) {
            $out = '(necessary feedback)';
        }

        if ( $erc >= 20 ) {
            $out = '(necessary feedback and investigation)';
        }

        return $out;
    }

}

