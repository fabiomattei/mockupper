<?php

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: /05/2016
 * Time: 11:48
 */
class GSRV1 {

    public $class_name = 'GSRV1';
    public $slug       = 'gsrv1';
    public $base_slug               = 'gsr';
    public $family_slug             = 'report';
    public $human_name = 'GSR V1';
    public $destination_office_slug = 'safety';
    public $default_flow_class = 'GsrFlowV1';
    public $can_read                = array( '1' );
    public $can_edit                = array( '1' );
    public $can_receive             = array( '1' ); // destination offices

    public $fields = array(

    );

    public $validation = array(
        'id'                => 'required|integer',
        'gsryear'      => 'max_len,30',
        'gsrmonth'     => 'max_len,30',
        'gsrday'       => 'max_len,30',
        'gsrhour'      => 'max_len,30',
        'gsrminutes'       => 'max_len,30',
        'timestandard'     => 'max_len,30',
        'occurrenceLocation'         => 'max_len,30',
        'occurrenceLocationOther'    => 'max_len,30',
        'eventtypeheadline'          => 'max_len,255',
        'additionalDescriptionOther' => 'max_len,255',
        'locationInTheProcess' => 'max_len,255',
        'locationInTheProcessOther' => 'max_len,255',
        'aircrafttype' => 'max_len,255',
        'aircraftRegistration' => 'max_len,255',
        'aircraftNumber' => 'max_len,255',
        'aircraftPersonsOnBorad' => 'max_len,255',
        'aircraftFrom' => 'max_len,255',
        'aircraftTo' => 'max_len,255',
        'eventSummary' => 'max_len,2550',
        'consPercivedSeverity' => 'max_len,255',
        'consFlight' => 'max_len,255',
        'consFlightOther' => 'max_len,255',
        'consIATADelayCode' => 'max_len,255',
        'consInfrastructures' => 'max_len,255',
        'consInfrasctructuresDescription' => 'max_len,255',
        'consAircraftDamage' => 'max_len,255',
        'consAircraftDamageDescription' => 'max_len,255',
        'consInjuriesPax' => 'max_len,255',
        'consInjuriesCrew' => 'max_len,255',
        'consInjuriesStaff' => 'max_len,255',
        'consInjuriesOther' => 'max_len,255',
        'consInjuriesNone' => 'max_len,255',
        'consInjuriesMinor' => 'max_len,255',
        'consInjuriesMinorNumber' => 'max_len,255',
        'consInjuriesSerious' => 'max_len,255',
        'consInjuriesSeriousNumber' => 'max_len,255',
        'consInjuriesFatal' => 'max_len,255',
        'consInjuriesFatalNumber' => 'max_len,255',
        'actionImmediateActionTakenSelection' => 'max_len,255',
        'actionImmediateActionTakenTitle' => 'max_len,255',
        'actionImmediateActionTakenDescription' => 'max_len,255',
        'airdromeOtherInvolved' => 'max_len,255',
        'airdromeVehicle1Type' => 'max_len,255',
        'airdromeVehicle1Id' => 'max_len,255',
        'airdromeVehicle1Driver' => 'max_len,255',
        'airdromeVehicle1Operator' => 'max_len,255',
        'airdromeVehicle2Type' => 'max_len,255',
        'airdromeVehicle2Id' => 'max_len,255',
        'airdromeVehicle2Driver' => 'max_len,255',
        'airdromeVehicle2Operator' => 'max_len,255',
        'weather' => 'max_len,255',
        'runwayCondition' => 'max_len,255',
        'runwayBrakingAction' => 'max_len,255',
        'taxiwayCondition' => 'max_len,255',
        'bridsSeen' => 'max_len,255',
        'birdsSize' => 'max_len,255',
        'birdspilotWarned' => 'max_len,255',
        'birdsEventReportedByPilot' => 'max_len,255',
        'birdsDescription' => 'max_len,255',
        'wildSeen' => 'max_len,255',
        'wildSize' => 'max_len,255',
        'wildpilotWarned' => 'max_len,255',
        'wildEventReportedByPilot' => 'max_len,255',
        'wildDescription' => 'max_len,255',
        'securityLevel' => 'max_len,255',
        'securityPersonName' => 'max_len,255',
        'securityPersonNationality' => 'max_len,255',
        'securityPersonAge' => 'max_len,255',
        'securityPersonAddress' => 'max_len,255',
        'securityPersonPhone' => 'max_len,255',
        'securityPersonPassport' => 'max_len,255',
        'securityPersonSex' => 'max_len,255',
        'securityTraveling' => 'max_len,255',
        'securityNatureOfIncident' => 'max_len,255',
        'securitySpecificCause' => 'max_len,255',
        'securityWitness1Name' => 'max_len,255',
        'securityWitness1Address' => 'max_len,255',
        'securityWitness1Phone' => 'max_len,255',
        'securityWitness1PassportId' => 'max_len,255',
        'securityWitness2Name' => 'max_len,255',
        'securityWitness2Address' => 'max_len,255',
        'securityWitness2Phone' => 'max_len,255',
        'securityWitness2PassportId' => 'max_len,255',
        'dangerousGoodsProperShippingName' => 'max_len,255',
        'dangerousGoodsUnId' => 'max_len,255',
        'dangerousGoodsClass' => 'max_len,255',
        'dangerousGoodsAwbNumber' => 'max_len,255',
        'dangerousGoodsULDNumber' => 'max_len,255',
        'dangerousGoodsSpecificElements' => 'max_len,255',
        'dangerousGoodsProcessPhase' => 'max_len,255',
        'dangerousGoodsCauses' => 'max_len,255',
        'dangerousGoodsActions' => 'max_len,255',
        'dangerousGoodsCarriedBy' => 'max_len,255',
        'dangerousGoodsNotes' => 'max_len,255',
        'eventRecortType' => 'max_len,255',
        'eventRecordReference' => 'max_len,255',
        'eventRecordeventType' => 'max_len,255',
        'mandatoryoccurencereport' => 'max_len,255',
        'severity' => 'max_len,255',
        'eventRecordReporterName' => 'max_len,255',
        'eventRecordReporterId' => 'max_len,255',
        'eventRecordReporterQualification' => 'max_len,255',
        'eventRecordReporterOrganization' => 'max_len,255',
        'eventRecordWitnessName' => 'max_len,255',
        'eventRecordWitnessId' => 'max_len,255',
        'eventRecordWitnessQualification' => 'max_len,255',
        'eventRecordWitnessOrganization' => 'max_len,255',
    );

    public $filter = array(
        'id'                => 'trim',
        'gsryear'      => 'trim',
        'gsrmonth'     => 'trim',
        'gsrday'       => 'trim',
        'gsrhour'      => 'trim',
        'gsrminutes'       => 'trim',
        'timestandard'     => 'trim',
        'occurrenceLocation'         => 'trim',
        'occurrenceLocationOther'    => 'trim',
        'eventtypeheadline'          => 'trim',
        'additionalDescriptionOther' => 'trim',
        'locationInTheProcess' => 'trim',
        'locationInTheProcessOther' => 'trim',
        'aircrafttype' => 'trim',
        'aircraftRegistration' => 'trim',
        'aircraftNumber' => 'trim',
        'aircraftPersonsOnBorad' => 'trim',
        'aircraftFrom' => 'trim',
        'aircraftTo' => 'trim',
        'eventSummary' => 'trim',
        'consPercivedSeverity' => 'trim',
        'consFlight' => 'trim',
        'consFlightOther' => 'trim',
        'consIATADelayCode' => 'trim',
        'consInfrastructures' => 'trim',
        'consInfrasctructuresDescription' => 'trim',
        'consAircraftDamage' => 'trim',
        'consAircraftDamageDescription' => 'trim',
        'consInjuriesPax' => 'trim',
        'consInjuriesCrew' => 'trim',
        'consInjuriesStaff' => 'trim',
        'consInjuriesOther' => 'trim',
        'consInjuriesNone' => 'trim',
        'consInjuriesMinor' => 'trim',
        'consInjuriesMinorNumber' => 'trim',
        'consInjuriesSerious' => 'trim',
        'consInjuriesSeriousNumber' => 'trim',
        'consInjuriesFatal' => 'trim',
        'consInjuriesFatalNumber' => 'trim',
        'actionImmediateActionTakenSelection' => 'trim',
        'actionImmediateActionTakenTitle' => 'trim',
        'actionImmediateActionTakenDescription' => 'trim',
        'airdromeOtherInvolved' => 'trim',
        'airdromeVehicle1Type' => 'trim',
        'airdromeVehicle1Id' => 'trim',
        'airdromeVehicle1Driver' => 'trim',
        'airdromeVehicle1Operator' => 'trim',
        'airdromeVehicle2Type' => 'trim',
        'airdromeVehicle2Id' => 'trim',
        'airdromeVehicle2Driver' => 'trim',
        'airdromeVehicle2Operator' => 'trim',
        'weather' => 'trim',
        'runwayCondition' => 'trim',
        'runwayBrakingAction' => 'trim',
        'taxiwayCondition' => 'trim',
        'bridsSeen' => 'trim',
        'birdsSize' => 'trim',
        'birdspilotWarned' => 'trim',
        'birdsEventReportedByPilot' => 'trim',
        'birdsDescription' => 'trim',
        'wildSeen' => 'trim',
        'wildSize' => 'trim',
        'wildpilotWarned' => 'trim',
        'wildEventReportedByPilot' => 'trim',
        'wildDescription' => 'trim',
        'securityLevel' => 'trim',
        'securityPersonName' => 'trim',
        'securityPersonNationality' => 'trim',
        'securityPersonAge' => 'trim',
        'securityPersonAddress' => 'trim',
        'securityPersonPhone' => 'trim',
        'securityPersonPassport' => 'trim',
        'securityPersonSex' => 'trim',
        'securityTraveling' => 'trim',
        'securityNatureOfIncident' => 'trim',
        'securitySpecificCause' => 'trim',
        'securityWitness1Name' => 'trim',
        'securityWitness1Address' => 'trim',
        'securityWitness1Phone' => 'trim',
        'securityWitness1PassportId' => 'trim',
        'securityWitness2Name' => 'trim',
        'securityWitness2Address' => 'trim',
        'securityWitness2Phone' => 'trim',
        'securityWitness2PassportId' => 'trim',
        'dangerousGoodsProperShippingName' => 'trim',
        'dangerousGoodsUnId' => 'trim',
        'dangerousGoodsClass' => 'trim',
        'dangerousGoodsAwbNumber' => 'trim',
        'dangerousGoodsULDNumber' => 'trim',
        'dangerousGoodsSpecificElements' => 'trim',
        'dangerousGoodsProcessPhase' => 'trim',
        'dangerousGoodsCauses' => 'trim',
        'dangerousGoodsActions' => 'trim',
        'dangerousGoodsCarriedBy' => 'trim',
        'dangerousGoodsNotes' => 'trim',
        'eventRecortType' => 'trim',
        'eventRecordReference' => 'trim',
        'eventRecordeventType' => 'trim',
        'mandatoryoccurencereport' => 'trim',
        'severity' => 'trim',
        'eventRecordReporterName' => 'trim',
        'eventRecordReporterId' => 'trim',
        'eventRecordReporterQualification' => 'trim',
        'eventRecordReporterOrganization' => 'trim',
        'eventRecordWitnessName' => 'trim',
        'eventRecordWitnessId' => 'trim',
        'eventRecordWitnessQualification' => 'trim',
        'eventRecordWitnessOrganization' => 'trim',
    );

    function get_fields() {
        return $this->fields;
    }

    function get_validation_rules() {
        return $this->validation;
    }

    function make_entity_for_saving( $array_containing_fields ) {
        $entity = array();

        $entity['eventTypeContainer'] = '';
        for ($i=0; $i < 60 ; $i++) { 
            if ( isset( $_POST["eventType$i"] ) ) {
                $entity['eventTypeContainer'] .= $array_containing_fields["eventType$i"] . '@';
            }
        }

        $entity['additionalDescirptionContainer'] = '';
        for ($i=0; $i < 20 ; $i++) { 
            if ( isset( $_POST["additionalDescription$i"] ) ) {
                $entity['additionalDescirptionContainer'] .= $array_containing_fields["additionalDescription$i"] . '@';
            }
        }

        $entity['airdromeVehiclesInvolved'] = '';
        for ($i=0; $i < 20 ; $i++) { 
            if ( isset( $_POST["airdromeVehiclesInvolved$i"] ) ) {
                $entity['airdromeVehiclesInvolved'] .= $array_containing_fields["airdromeVehiclesInvolved$i"] . '@';
            }
        }

        $entity['airdromeEquipementInvolved'] = '';
        for ($i=0; $i < 20 ; $i++) { 
            if ( isset( $_POST["airdromeEquipementInvolved$i"] ) ) {
                $entity['airdromeEquipementInvolved'] .= $array_containing_fields["airdromeEquipementInvolved$i"] . '@';
            }
        }

        $entity['occurrencedate']  = $array_containing_fields['gsryear'].'-'.$array_containing_fields['gsrmonth'].'-'.$array_containing_fields['gsrday'];
        $entity['occurrencetime']  = $array_containing_fields['gsrhour'].':'.$array_containing_fields['gsrminutes'];
        $entity['timestandard'] = ( isset($array_containing_fields['timestandard']) ? $array_containing_fields['timestandard'] : '' );
        $entity['occurrenceLocation'] = ( isset($array_containing_fields['occurrenceLocation']) ? $array_containing_fields['occurrenceLocation'] : '' );
        $entity['occurrenceLocationOther'] = ( isset($array_containing_fields['occurrenceLocationOther']) ? $array_containing_fields['occurrenceLocationOther'] : '' );
        $entity['eventtypeheadline'] = ( isset($array_containing_fields['eventtypeheadline']) ? $array_containing_fields['eventtypeheadline'] : '' );
        $entity['eventType'] = ( isset($array_containing_fields['eventType']) ? $array_containing_fields['eventType'] : '' );
        $entity['eventTypeOther'] = ( isset($array_containing_fields['eventTypeOther']) ? $array_containing_fields['eventTypeOther'] : '' );
        $entity['additionalDescription'] = ( isset($array_containing_fields['additionalDescription']) ? $array_containing_fields['additionalDescription'] : '' );
        $entity['additionalDescriptionOther'] = ( isset($array_containing_fields['additionalDescriptionOther']) ? $array_containing_fields['additionalDescriptionOther'] : '' );
        $entity['locationInTheProcess'] = ( isset($array_containing_fields['locationInTheProcess']) ? $array_containing_fields['locationInTheProcess'] : '' );
        $entity['locationInTheProcessOther'] = ( isset($array_containing_fields['locationInTheProcessOther']) ? $array_containing_fields['locationInTheProcessOther'] : '' );
        $entity['aircrafttype'] = ( isset($array_containing_fields['aircrafttype']) ? $array_containing_fields['aircrafttype'] : '' );
        $entity['aircraftRegistration'] = ( isset($array_containing_fields['aircraftRegistration']) ? $array_containing_fields['aircraftRegistration'] : '' );
        $entity['aircraftNumber'] = ( isset($array_containing_fields['aircraftNumber']) ? $array_containing_fields['aircraftNumber'] : '' );
        $entity['aircraftPersonsOnBorad'] = ( isset($array_containing_fields['aircraftPersonsOnBorad']) ? $array_containing_fields['aircraftPersonsOnBorad'] : '' );
        $entity['aircraftFrom'] = ( isset($array_containing_fields['aircraftFrom']) ? $array_containing_fields['aircraftFrom'] : '' );
        $entity['aircraftTo'] = ( isset($array_containing_fields['aircraftTo']) ? $array_containing_fields['aircraftTo'] : '' );
        $entity['eventSummary'] = ( isset($array_containing_fields['eventSummary']) ? $array_containing_fields['eventSummary'] : '' );
        $entity['consPercivedSeverity'] = ( isset($array_containing_fields['consPercivedSeverity']) ? $array_containing_fields['consPercivedSeverity'] : '' );
        $entity['consFlight'] = ( isset($array_containing_fields['consFlight']) ? $array_containing_fields['consFlight'] : '' );
        $entity['consFlightOther'] = ( isset($array_containing_fields['consFlightOther']) ? $array_containing_fields['consFlightOther'] : '' );
        $entity['consIATADelayCode'] = ( isset($array_containing_fields['consIATADelayCode']) ? $array_containing_fields['consIATADelayCode'] : '' );
        $entity['consInfrastructures'] = ( isset($array_containing_fields['consInfrastructures']) ? $array_containing_fields['consInfrastructures'] : '' );
        $entity['consInfrasctructuresDescription'] = ( isset($array_containing_fields['consInfrasctructuresDescription']) ? $array_containing_fields['consInfrasctructuresDescription'] : '' );
        $entity['consAircraftDamage'] = ( isset($array_containing_fields['consAircraftDamage']) ? $array_containing_fields['consAircraftDamage'] : '' );
        $entity['consAircraftDamageDescription'] = ( isset($array_containing_fields['consAircraftDamageDescription']) ? $array_containing_fields['consAircraftDamageDescription'] : '' );
        $entity['consInjuriesPax'] = ( isset($array_containing_fields['consInjuriesPax']) ? $array_containing_fields['consInjuriesPax'] : '' );
        $entity['consInjuriesCrew'] = ( isset($array_containing_fields['consInjuriesCrew']) ? $array_containing_fields['consInjuriesCrew'] : '' );
        $entity['consInjuriesStaff'] = ( isset($array_containing_fields['consInjuriesStaff']) ? $array_containing_fields['consInjuriesStaff'] : '' );
        $entity['consInjuriesOther'] = ( isset($array_containing_fields['consInjuriesOther']) ? $array_containing_fields['consInjuriesOther'] : '' );
        $entity['consInjuriesNone'] = ( isset($array_containing_fields['consInjuriesNone']) ? 1 : 0 );
        $entity['consInjuriesMinor'] = ( isset($array_containing_fields['consInjuriesMinor']) ? 1 : 0 );
        $entity['consInjuriesMinorNumber'] = ( isset($array_containing_fields['consInjuriesMinorNumber']) ? $array_containing_fields['consInjuriesMinorNumber'] : '' );
        $entity['consInjuriesSerious'] = ( isset($array_containing_fields['consInjuriesSerious']) ? 1 : 0 );
        $entity['consInjuriesSeriousNumber'] = ( isset($array_containing_fields['consInjuriesSeriousNumber']) ? $array_containing_fields['consInjuriesSeriousNumber'] : '' );
        $entity['consInjuriesFatal'] = ( isset($array_containing_fields['consInjuriesFatal']) ? 1 : 0 );
        $entity['consInjuriesFatalNumber'] = ( isset($array_containing_fields['consInjuriesFatalNumber']) ? $array_containing_fields['consInjuriesFatalNumber'] : '' );
        $entity['actionImmediateActionTakenSelection'] = ( isset($array_containing_fields['actionImmediateActionTakenSelection']) ? $array_containing_fields['actionImmediateActionTakenSelection'] : '' );
        $entity['actionImmediateActionTakenTitle'] = ( isset($array_containing_fields['actionImmediateActionTakenTitle']) ? $array_containing_fields['actionImmediateActionTakenTitle'] : '' );
        $entity['actionImmediateActionTakenDescription'] = ( isset($array_containing_fields['actionImmediateActionTakenDescription']) ? $array_containing_fields['actionImmediateActionTakenDescription'] : '' );
        $entity['airdromeVehiclesInvolved'] = ( isset($array_containing_fields['airdromeVehiclesInvolved']) ? $array_containing_fields['airdromeVehiclesInvolved'] : '' );
        $entity['airdromeEquipementInvolved'] = ( isset($array_containing_fields['airdromeEquipementInvolved']) ? $array_containing_fields['airdromeEquipementInvolved'] : '' );
        $entity['airdromeOtherInvolved'] = ( isset($array_containing_fields['airdromeOtherInvolved']) ? $array_containing_fields['airdromeOtherInvolved'] : '' );
        $entity['airdromeVehicle1Type'] = ( isset($array_containing_fields['airdromeVehicle1Type']) ? $array_containing_fields['airdromeVehicle1Type'] : '' );
        $entity['airdromeVehicle1Id'] = ( isset($array_containing_fields['airdromeVehicle1Id']) ? $array_containing_fields['airdromeVehicle1Id'] : '' );
        $entity['airdromeVehicle1Driver'] = ( isset($array_containing_fields['airdromeVehicle1Driver']) ? $array_containing_fields['airdromeVehicle1Driver'] : '' );
        $entity['airdromeVehicle1Operator'] = ( isset($array_containing_fields['airdromeVehicle1Operator']) ? $array_containing_fields['airdromeVehicle1Operator'] : '' );
        $entity['airdromeVehicle2Type'] = ( isset($array_containing_fields['airdromeVehicle2Type']) ? $array_containing_fields['airdromeVehicle2Type'] : '' );
        $entity['airdromeVehicle2Id'] = ( isset($array_containing_fields['airdromeVehicle2Id']) ? $array_containing_fields['airdromeVehicle2Id'] : '' );
        $entity['airdromeVehicle2Driver'] = ( isset($array_containing_fields['airdromeVehicle2Driver']) ? $array_containing_fields['airdromeVehicle2Driver'] : '' );
        $entity['airdromeVehicle2Operator'] = ( isset($array_containing_fields['airdromeVehicle2Operator']) ? $array_containing_fields['airdromeVehicle2Operator'] : '' );
        $entity['weather'] = ( isset($array_containing_fields['weather']) ? $array_containing_fields['weather'] : '' );
        $entity['runwayCondition'] = ( isset($array_containing_fields['runwayCondition']) ? $array_containing_fields['runwayCondition'] : '' );
        $entity['runwayBrakingAction'] = ( isset($array_containing_fields['runwayBrakingAction']) ? $array_containing_fields['runwayBrakingAction'] : '' );
        $entity['taxiwayCondition'] = ( isset($array_containing_fields['taxiwayCondition']) ? $array_containing_fields['taxiwayCondition'] : '' );
        $entity['bridsSeen'] = ( isset($array_containing_fields['bridsSeen']) ? $array_containing_fields['bridsSeen'] : '' );
        $entity['birdsSize'] = ( isset($array_containing_fields['birdsSize']) ? $array_containing_fields['birdsSize'] : '' );
        $entity['birdspilotWarned'] = ( isset($array_containing_fields['birdspilotWarned']) ? 1 : 0 );
        $entity['birdsEventReportedByPilot'] = ( isset($array_containing_fields['birdsEventReportedByPilot']) ? 1 : 0 );
        $entity['birdsDescription'] = ( isset($array_containing_fields['birdsDescription']) ? $array_containing_fields['birdsDescription'] : '' );
        $entity['wildSeen'] = ( isset($array_containing_fields['wildSeen']) ? $array_containing_fields['wildSeen'] : '' );
        $entity['wildSize'] = ( isset($array_containing_fields['wildSize']) ? $array_containing_fields['wildSize'] : '' );
        $entity['wildpilotWarned'] = ( isset($array_containing_fields['wildpilotWarned']) ? 1 : 0 );
        $entity['wildEventReportedByPilot'] = ( isset($array_containing_fields['wildEventReportedByPilot']) ? 1 : 0 );
        $entity['wildDescription'] = ( isset($array_containing_fields['wildDescription']) ? $array_containing_fields['wildDescription'] : '' );
        $entity['securityLevel'] = ( isset($array_containing_fields['securityLevel']) ? $array_containing_fields['securityLevel'] : '' );
        $entity['securityPersonName'] = ( isset($array_containing_fields['securityPersonName']) ? $array_containing_fields['securityPersonName'] : '' );
        $entity['securityPersonNationality'] = ( isset($array_containing_fields['securityPersonNationality']) ? $array_containing_fields['securityPersonNationality'] : '' );
        $entity['securityPersonAge'] = ( isset($array_containing_fields['securityPersonAge']) ? $array_containing_fields['securityPersonAge'] : '' );
        $entity['securityPersonAddress'] = ( isset($array_containing_fields['securityPersonAddress']) ? $array_containing_fields['securityPersonAddress'] : '' );
        $entity['securityPersonPhone'] = ( isset($array_containing_fields['securityPersonPhone']) ? $array_containing_fields['securityPersonPhone'] : '' );
        $entity['securityPersonPassport'] = ( isset($array_containing_fields['securityPersonPassport']) ? $array_containing_fields['securityPersonPassport'] : '' );
        $entity['securityPersonSex'] = ( isset($array_containing_fields['securityPersonSex']) ? $array_containing_fields['securityPersonSex'] : '' );
        $entity['securityTraveling'] = ( isset($array_containing_fields['securityTraveling']) ? $array_containing_fields['securityTraveling'] : '' );
        $entity['securityNatureOfIncident'] = ( isset($array_containing_fields['securityNatureOfIncident']) ? $array_containing_fields['securityNatureOfIncident'] : '' );
        $entity['securitySpecificCause'] = ( isset($array_containing_fields['securitySpecificCause']) ? $array_containing_fields['securitySpecificCause'] : '' );
        $entity['securityWitness1Name'] = ( isset($array_containing_fields['securityWitness1Name']) ? $array_containing_fields['securityWitness1Name'] : '' );
        $entity['securityWitness1Address'] = ( isset($array_containing_fields['securityWitness1Address']) ? $array_containing_fields['securityWitness1Address'] : '' );
        $entity['securityWitness1Phone'] = ( isset($array_containing_fields['securityWitness1Phone']) ? $array_containing_fields['securityWitness1Phone'] : '' );
        $entity['securityWitness1PassportId'] = ( isset($array_containing_fields['securityWitness1PassportId']) ? $array_containing_fields['securityWitness1PassportId'] : '' );
        $entity['securityWitness2Name'] = ( isset($array_containing_fields['securityWitness2Name']) ? $array_containing_fields['securityWitness2Name'] : '' );
        $entity['securityWitness2Address'] = ( isset($array_containing_fields['securityWitness2Address']) ? $array_containing_fields['securityWitness2Address'] : '' );
        $entity['securityWitness2Phone'] = ( isset($array_containing_fields['securityWitness2Phone']) ? $array_containing_fields['securityWitness2Phone'] : '' );
        $entity['securityWitness2PassportId'] = ( isset($array_containing_fields['securityWitness2PassportId']) ? $array_containing_fields['securityWitness2PassportId'] : '' );
        $entity['dangerousGoodsProperShippingName'] = ( isset($array_containing_fields['dangerousGoodsProperShippingName']) ? $array_containing_fields['dangerousGoodsProperShippingName'] : '' );
        $entity['dangerousGoodsUnId'] = ( isset($array_containing_fields['dangerousGoodsUnId']) ? $array_containing_fields['dangerousGoodsUnId'] : '' );
        $entity['dangerousGoodsClass'] = ( isset($array_containing_fields['dangerousGoodsClass']) ? $array_containing_fields['dangerousGoodsClass'] : '' );
        $entity['dangerousGoodsAwbNumber'] = ( isset($array_containing_fields['dangerousGoodsAwbNumber']) ? $array_containing_fields['dangerousGoodsAwbNumber'] : '' );
        $entity['dangerousGoodsULDNumber'] = ( isset($array_containing_fields['dangerousGoodsULDNumber']) ? $array_containing_fields['dangerousGoodsULDNumber'] : '' );
        $entity['dangerousGoodsSpecificElements'] = ( isset($array_containing_fields['dangerousGoodsSpecificElements']) ? $array_containing_fields['dangerousGoodsSpecificElements'] : '' );
        $entity['dangerousGoodsProcessPhase'] = ( isset($array_containing_fields['dangerousGoodsProcessPhase']) ? $array_containing_fields['dangerousGoodsProcessPhase'] : '' );
        $entity['dangerousGoodsCauses'] = ( isset($array_containing_fields['dangerousGoodsCauses']) ? $array_containing_fields['dangerousGoodsCauses'] : '' );
        $entity['dangerousGoodsActions'] = ( isset($array_containing_fields['dangerousGoodsActions']) ? $array_containing_fields['dangerousGoodsActions'] : '' );
        $entity['dangerousGoodsCarriedBy'] = ( isset($array_containing_fields['dangerousGoodsCarriedBy']) ? $array_containing_fields['dangerousGoodsCarriedBy'] : '' );
        $entity['dangerousGoodsNotes'] = ( isset($array_containing_fields['dangerousGoodsNotes']) ? $array_containing_fields['dangerousGoodsNotes'] : '' );
        $entity['eventRecortType'] = ( isset($array_containing_fields['eventRecortType']) ? $array_containing_fields['eventRecortType'] : '' );
        $entity['eventRecordReference'] = ( isset($array_containing_fields['eventRecordReference']) ? $array_containing_fields['eventRecordReference'] : '' );
        $entity['eventRecordeventType'] = ( isset($array_containing_fields['eventRecordeventType']) ? 1 : 0 );
        $entity['mandatoryoccurencereport'] = ( isset($array_containing_fields['mandatoryoccurencereport']) ? 1 : 0 );
        $entity['severity'] = ( isset($array_containing_fields['severity']) ? 1 : 0 );
        $entity['eventRecordReporterName'] = ( isset($array_containing_fields['eventRecordReporterName']) ? $array_containing_fields['eventRecordReporterName'] : '' );
        $entity['eventRecordReporterId'] = ( isset($array_containing_fields['eventRecordReporterId']) ? $array_containing_fields['eventRecordReporterId'] : '' );
        $entity['eventRecordReporterQualification'] = ( isset($array_containing_fields['eventRecordReporterQualification']) ? $array_containing_fields['eventRecordReporterQualification'] : '' );
        $entity['eventRecordReporterOrganization'] = ( isset($array_containing_fields['eventRecordReporterOrganization']) ? $array_containing_fields['eventRecordReporterOrganization'] : '' );
        $entity['eventRecordWitnessName'] = ( isset($array_containing_fields['eventRecordWitnessName']) ? $array_containing_fields['eventRecordWitnessName'] : '' );
        $entity['eventRecordWitnessId'] = ( isset($array_containing_fields['eventRecordWitnessId']) ? $array_containing_fields['eventRecordWitnessId'] : '' );
        $entity['eventRecordWitnessQualification'] = ( isset($array_containing_fields['eventRecordWitnessQualification']) ? $array_containing_fields['eventRecordWitnessQualification'] : '' );
        $entity['eventRecordWitnessOrganization'] = ( isset($array_containing_fields['eventRecordWitnessOrganization']) ? $array_containing_fields['eventRecordWitnessOrganization'] : '' );

        return $entity;
    }

    function make_indexes_for_saving( $array_containing_fields ) {
        $entity = array();

        // pwp_iind1 :: severity
        // $entity['pwp_iind1'] = ( isset($array_containing_fields['severity']) ? $array_containing_fields['severity'] : 1 );
        // pwp_iind2 :: likelihood
        // $entity['pwp_iind2'] = ( isset($array_containing_fields['likelihood']) ? $array_containing_fields['likelihood'] : 1 );
        // pwp_iind3 :: risk
        // $entity['pwp_iind3'] = $entity['pwp_iind1'] * $entity['pwp_iind2'];

        return $entity;
    }

    function make_title( $array_containing_fields ) {
        $out = '';

        $out .= ( isset($array_containing_fields['eventSummary']) ? $array_containing_fields['eventSummary'] : 1 );

        return $out;
    }

    function get_form( $paper_data = null, $paper_id = 0, $parent_paper_id = 0 ) {
        utils( 'xmlserializer' );
        $entity = simplexml_load_string($paper->pwp_data);

        $id = ( $paper == null ? '0' : $paper->pwp_id );
        $occurrencedate = ( $entity == null ? '' : $entity->occurrencedate );
        $occurrencetime = ( $entity == null ? '' : $entity->occurrencetime );
        $timestandard = ( $entity == null ? '' : $entity->timestandard );
        $occurrenceLocation = ( $entity == null ? '' : $entity->occurrenceLocation );
        $occurrenceLocationOther = ( $entity == null ? '' : $entity->occurrenceLocationOther );
        $eventtypeheadline = ( $entity == null ? '' : $entity->eventtypeheadline );
        $eventType = ( $entity == null ? '' : $entity->eventType );
        $eventTypeOther = ( $entity == null ? '' : $entity->eventTypeOther );
        $additionalDescription = ( $entity == null ? '' : $entity->additionalDescription );
        $additionalDescriptionOther = ( $entity == null ? '' : $entity->additionalDescriptionOther );
        $locationInTheProcess = ( $entity == null ? '' : $entity->locationInTheProcess );
        $locationInTheProcessOther = ( $entity == null ? '' : $entity->locationInTheProcessOther );
        $aircrafttype = ( $entity == null ? '' : $entity->aircrafttype );
        $aircraftRegistration = ( $entity == null ? '' : $entity->aircraftRegistration );
        $aircraftNumber = ( $entity == null ? '' : $entity->aircraftNumber );
        $aircraftFrom = ( $entity == null ? '' : $entity->aircraftFromaircraftFrom );
        $aircraftTo = ( $entity == null ? '' : $entity->aircraftToaircraftTo );
        $aircraftPersonsOnBoradaircraftPersonsOnBorad = ( $entity == null ? '' : $entity->aircraftPersonsOnBorad );
        $eventSummary = ( $entity == null ? '' : $entity->eventSummary );
        $consPercivedSeverity = ( $entity == null ? '' : $entity->consPercivedSeverity );
        $consFlight = ( $entity == null ? '' : $entity->consFlight );
        $consFlightOther = ( $entity == null ? '' : $entity->consFlightOther );
        $consIATADelayCode = ( $entity == null ? '' : $entity->consIATADelayCode );
        $consInfrastructures = ( $entity == null ? '' : $entity->consInfrastructures );
        $consInfrasctructuresDescription = ( $entity == null ? '' : $entity->consInfrasctructuresDescription );
        $consAircraftDamage = ( $entity == null ? '' : $entity->consAircraftDamage );
        $consAircraftDamageDescription = ( $entity == null ? '' : $entity->consAircraftDamageDescription );
        $consInjuriesPax = ( $entity == null ? '' : $entity->consInjuriesPax );
        $consInjuriesNone = ( $entity == null ? '' : $entity->consInjuriesNone );
        $consInjuriesCrew = ( $entity == null ? '' : $entity->consInjuriesCrew );
        $consInjuriesMinor = ( $entity == null ? '' : $entity->consInjuriesMinor );
        $consInjuriesMinorNumber = ( $entity == null ? '' : $entity->consInjuriesMinorNumber );
        $consInjuriesStaff = ( $entity == null ? '' : $entity->consInjuriesStaff );
        $consInjuriesSerious = ( $entity == null ? '' : $entity->consInjuriesSerious );
        $consInjuriesSeriousNumber = ( $entity == null ? '' : $entity->consInjuriesSeriousNumber );
        $consInjuriesOther = ( $entity == null ? '' : $entity->consInjuriesOther );
        $consInjuriesFatal = ( $entity == null ? '' : $entity->consInjuriesFatal );
        $consInjuriesFatalNumber = ( $entity == null ? '' : $entity->consInjuriesFatalNumber );
        $actionImmediateActionTakenSelection = ( $entity == null ? '' : $entity->actionImmediateActionTakenSelection );
        $actionImmediateActionTakenTitle = ( $entity == null ? '' : $entity->actionImmediateActionTakenTitle );
        $actionImmediateActionTakenDescription = ( $entity == null ? '' : $entity->actionImmediateActionTakenDescription );
        $airdromeVehiclesInvolved = ( $entity == null ? '' : $entity->airdromeVehiclesInvolved );
        $airdromeEquipementInvolved = ( $entity == null ? '' : $entity->airdromeEquipementInvolved );
        $airdromeOtherInvolved = ( $entity == null ? '' : $entity->airdromeOtherInvolved );
        $airdromeVehicle1Type = ( $entity == null ? '' : $entity->airdromeVehicle1Type );
        $airdromeVehicle1Id = ( $entity == null ? '' : $entity->airdromeVehicle1Id );
        $airdromeVehicle1Driver = ( $entity == null ? '' : $entity->airdromeVehicle1Driver );
        $airdromeVehicle1Operator = ( $entity == null ? '' : $entity->airdromeVehicle1Operator );
        $airdromeVehicle2Type = ( $entity == null ? '' : $entity->airdromeVehicle2Type );
        $airdromeVehicle2Id = ( $entity == null ? '' : $entity->airdromeVehicle2Id );
        $airdromeVehicle2Driver = ( $entity == null ? '' : $entity->airdromeVehicle2Driver );
        $airdromeVehicle2Operator = ( $entity == null ? '' : $entity->airdromeVehicle2Operator );
        $weather = ( $entity == null ? '' : $entity->weather );
        $runwayCondition = ( $entity == null ? '' : $entity->runwayCondition );
        $runwayBrakingAction = ( $entity == null ? '' : $entity->runwayBrakingAction );
        $taxiwayCondition = ( $entity == null ? '' : $entity->taxiwayCondition );
        $bridsSeen = ( $entity == null ? '' : $entity->bridsSeen );
        $birdsSize = ( $entity == null ? '' : $entity->birdsSize );
        $birdspilotWarned = ( $entity == null ? '' : $entity->birdspilotWarned );
        $birdsEventReportedByPilot = ( $entity == null ? '' : $entity->birdsEventReportedByPilot );
        $birdsDescription = ( $entity == null ? '' : $entity->birdsDescription );
        $wildSeen = ( $entity == null ? '' : $entity->wildSeen );
        $wildSize = ( $entity == null ? '' : $entity->wildSize );
        $wildpilotWarned = ( $entity == null ? '' : $entity->wildpilotWarned );
        $wildEventReportedByPilot = ( $entity == null ? '' : $entity->wildEventReportedByPilot );
        $wildDescription = ( $entity == null ? '' : $entity->wildDescription );
        $securityLevel = ( $entity == null ? '' : $entity->securityLevel );
        $securityPersonName = ( $entity == null ? '' : $entity->securityPersonName );
        $securityPersonNationality = ( $entity == null ? '' : $entity->securityPersonNationality );
        $securityPersonAge = ( $entity == null ? '' : $entity->securityPersonAge );
        $securityPersonAddress = ( $entity == null ? '' : $entity->securityPersonAddress );
        $securityPersonPhone = ( $entity == null ? '' : $entity->securityPersonPhone );
        $securityPersonPassport = ( $entity == null ? '' : $entity->securityPersonPassport );
        $securityPersonSex = ( $entity == null ? '' : $entity->securityPersonSex );
        $securityTraveling = ( $entity == null ? '' : $entity->securityTraveling );
        $securityNatureOfIncident = ( $entity == null ? '' : $entity->securityNatureOfIncident );
        $securitySpecificCause = ( $entity == null ? '' : $entity->securitySpecificCause );
        $securityWitness1Name = ( $entity == null ? '' : $entity->securityWitness1Name );
        $securityWitness1Address = ( $entity == null ? '' : $entity->securityWitness1Address );
        $securityWitness1Phone = ( $entity == null ? '' : $entity->securityWitness1Phone );
        $securityWitness1PassportId = ( $entity == null ? '' : $entity->securityWitness1PassportId );
        $securityWitness2Name = ( $entity == null ? '' : $entity->securityWitness2Name );
        $securityWitness2Address = ( $entity == null ? '' : $entity->securityWitness2Address );
        $securityWitness2Phone = ( $entity == null ? '' : $entity->securityWitness2Phone );
        $securityWitness2PassportId = ( $entity == null ? '' : $entity->securityWitness2PassportId );
        $dangerousGoodsProperShippingName = ( $entity == null ? '' : $entity->dangerousGoodsProperShippingName );
        $dangerousGoodsUnId = ( $entity == null ? '' : $entity->dangerousGoodsUnId );
        $dangerousGoodsClass = ( $entity == null ? '' : $entity->dangerousGoodsClass );
        $dangerousGoodsAwbNumber = ( $entity == null ? '' : $entity->dangerousGoodsAwbNumber );
        $dangerousGoodsULDNumber = ( $entity == null ? '' : $entity->dangerousGoodsULDNumber );
        $dangerousGoodsSpecificElements = ( $entity == null ? '' : $entity->dangerousGoodsSpecificElements );
        $dangerousGoodsProcessPhase = ( $entity == null ? '' : $entity->dangerousGoodsProcessPhase );
        $dangerousGoodsCauses = ( $entity == null ? '' : $entity->dangerousGoodsCauses );
        $dangerousGoodsActions = ( $entity == null ? '' : $entity->dangerousGoodsActions );
        $dangerousGoodsCarriedBy = ( $entity == null ? '' : $entity->dangerousGoodsCarriedBy );
        $dangerousGoodsNotes = ( $entity == null ? '' : $entity->dangerousGoodsNotes );
        $eventRecortType = ( $entity == null ? '' : $entity->eventRecortType );
        $eventRecordReference = ( $entity == null ? '' : $entity->eventRecordReference );
        $eventRecordReporterName = ( $entity == null ? '' : $entity->eventRecordReporterName );
        $eventRecordReporterId = ( $entity == null ? '' : $entity->eventRecordReporterId );
        $eventRecordReporterQualification = ( $entity == null ? '' : $entity->eventRecordReporterQualification );
        $eventRecordReporterOrganization = ( $entity == null ? '' : $entity->eventRecordReporterOrganization );
        $eventRecordWitnessName = ( $entity == null ? '' : $entity->eventRecordWitnessName );
        $eventRecordWitnessId = ( $entity == null ? '' : $entity->eventRecordWitnessId );
        $eventRecordWitnessQualification = ( $entity == null ? '' : $entity->eventRecordWitnessQualification );
        $eventRecordWitnessOrganization = ( $entity == null ? '' : $entity->eventRecordWitnessOrganization );

        list( $year, $month, $day ) = explode( '-' , $occurrencedate );
        list( $hour, $minute ) = explode( ':' , $occurrencetime ); 

$out = '<tr>
<td colspan="2">
<table>
<tr width="100%">
    <th colspan="5">
        1. OCCURRENCE DATE & LOCATION *
    </th>
</tr>
<tr>
    <td>Occurrence date</td>
    <td>
        <select name ="gsrday">';
        for ( $i = 1; $i <= 31 ; $i++ ) { 
            $out .= '<option value="'.sprintf("%02d", $i).'" '.( $day == $i ? 'selected' : '' ).'>'.sprintf("%02d", $i).'</option>';
        }
        $out .= '</select>
        <select name ="gsrmonth">';
        for ( $i = 1; $i <= 12 ; $i++ ) { 
            $out .= '<option value="'.sprintf("%02d", $i).'" '.( $month == $i ? 'selected' : '' ).'>'.sprintf("%02d", $i).'</option>';
        }
        $out .= '</select>
        <select name ="gsryear">';
        for ( $i = 2012; $i <= 2023 ; $i++ ) { 
            $out .= '<option value="'.$i.'" '.( $year == $i ? 'selected' : '' ).'>'.$i.'</option>';
        }
        $out .= '</select>
    </td>
</tr>
<tr>
    <td>Occurrence time</td>
    <td>
        <select name ="timestandard">
            <option '.selected( $timestandard, 'Localtime' ).' value="Localtime">Local time</option>
            <option '.selected( $timestandard, 'UTC' ).' value="UTC">UTC</option>
        </select>
        <select name ="gsrhour">';
        for ( $i = 0; $i <= 23 ; $i++ ) { 
            $out .= '<option value="'.sprintf("%02d", $i).'" '.( $hour == $i ? 'selected' : '' ).'>'.sprintf("%02d", $i).'</option>';
        }
        $out .= '</select>
        <select name ="gsrminutes">';
        for ( $i = 0; $i <= 59 ; $i++ ) { 
            $out .= '<option value="'.sprintf("%02d", $i).'" '.( $minute == $i ? 'selected' : '' ).'>'.sprintf("%02d", $i).'</option>';
        }
        $out .= '</select></td>
</tr>
<tr>
    <td>Occurrence location</td>
    <td>
        <select name ="occurrenceLocation">
            <option '.selected( $occurrenceLocation, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $occurrenceLocation, 'Land Side' ).' value="Land Side">Land Side</option>
            <option '.selected( $occurrenceLocation, 'Terminal' ).' value="Terminal">Terminal</option>
            <option '.selected( $occurrenceLocation, 'Air Side' ).' value="Air Side">Air Side</option>
            <option '.selected( $occurrenceLocation, 'RW' ).' value="RW">RW</option>
            <option '.selected( $occurrenceLocation, 'TW' ).' value="TW">TW</option>
            <option '.selected( $occurrenceLocation, 'ApPk' ).' value="ApPk">Ap\Pk</option>
        </select>
        <input type="text" name="occurrenceLocationOther" size="80" placeholder="Other" value="'.$occurrenceLocationOther.'" maxlength="99">
    </td>
</tr>
<tr>
    <td colspan="5">
        <hr>
    </td>
</tr>
<tr>
    <td>Event Title/Headline</td>
    <td>
        <input type="text" name="eventtypeheadline" size="100" placeholder="Event Title/Headline" value="'.$eventtypeheadline.'" maxlength="149">
    </td>
</tr>
<tr>
    <td colspan="5">
        <br/>
        <table width="980" border="1">
            <tr width="100%">
                <th colspan="5">
                    2. EVENT TYPE (select one or more of the following items) *
                </th>
            </tr>
            <tr width="100%">
                <td>&nbsp;<b>Airdrome (ADRM)</b></td>
                <td>&nbsp;<b>RAMP</b></td>
                <td>&nbsp;<b>Others (OTHR)</b></td>
                <td colspan="2">&nbsp;<b>Others</b></td>
            </tr>
            <tr>
                <td valign="top" width="20%">
                    <input type="checkbox" name="eventType1" '.checked_if_contains( $eventType, 'AirportProcedureAndDocumentation' ).' value="AirportProcedureAndDocumentation">Airport procedure <br />&nbsp;&nbsp;&nbsp;&nbsp; and documentation<br>
                    <input type="checkbox" name="eventType2" '.checked_if_contains( $eventType, 'AirportServicesInfrastructures' ).'  value="AirportServicesInfrastructures">Airport services &<br />&nbsp;&nbsp;&nbsp;&nbsp; infrastructures<br>
                    <input type="checkbox" name="eventType3" '.checked_if_contains( $eventType, 'FOD' ).' value="FOD">FOD<br>
                    <input type="checkbox" name="eventType4" '.checked_if_contains( $eventType, 'Markings' ).'  value="Markings">Markings<br>
                    <input type="checkbox" name="eventType5" '.checked_if_contains( $eventType, 'Obstacles' ).'  value="Obstacles">Obstacles<br>
                    <input type="checkbox" name="eventType6" '.checked_if_contains( $eventType, 'ParkingArea' ).' value="ParkingArea">Parking area<br>
                    <input type="checkbox" name="eventType7" '.checked_if_contains( $eventType, 'ProcedureDocumentation' ).'  value="ProcedureDocumentation">Procedure &<br />&nbsp;&nbsp;&nbsp;&nbsp; documentation<br>
                    <input type="checkbox" name="eventType8" '.checked_if_contains( $eventType, 'RunwayTaxiwayApronLayoutDesign' ).'  value="RunwayTaxiwayApronLayoutDesign">Runway/Taxiway/<br />&nbsp;&nbsp;&nbsp;&nbsp; Apron layout & design<br>
                    <input type="checkbox" name="eventType9" '.checked_if_contains( $eventType, 'Signage' ).'  value="Signage">Signage<br>
                    <input type="checkbox" name="eventType10" '.checked_if_contains( $eventType, 'WeatherEncountersRelatedEvents' ).'  value="WeatherEncountersRelatedEvents">Weather encounters<br />&nbsp;&nbsp;&nbsp;&nbsp; related events<br>
                    <hr>
                    <b>Security (SEC)</b><br/>
                    <input type="checkbox" name="eventType11" '.checked_if_contains( $eventType, 'BombThreat' ).' value="BombThreat">Bomb threat<br>
                    <input type="checkbox" name="eventType12" '.checked_if_contains( $eventType, 'Hijacking' ).'  value="Hijacking">Hijacking<br>
                    <input type="checkbox" name="eventType13" '.checked_if_contains( $eventType, 'Sabotage' ).'  value="Sabotage">Sabotage<br>
                    <input type="checkbox" name="eventType14" '.checked_if_contains( $eventType, 'UnrulyDisruptivePax' ).' value="UnrulyDisruptivePax">Unruly/Disruptive pax<br>
                    <input type="checkbox" name="eventType15" '.checked_if_contains( $eventType, 'AnyOtherActsOfUnlawfulInterference' ).' value="AnyOtherActsOfUnlawfulInterference">Any other acts of<br />&nbsp;&nbsp;&nbsp;&nbsp; unlawful interference<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="eventType16" '.checked_if_contains( $eventType, 'AircraftServicing' ).' value="AircraftServicing">Aircraft servicing<br />&nbsp;&nbsp;&nbsp;&nbsp; (boarding, <br />&nbsp;&nbsp;&nbsp;&nbsp; disembarking, loading,<br />&nbsp;&nbsp;&nbsp;&nbsp; unloading, refuelling, other<br />&nbsp;&nbsp;&nbsp;&nbsp; services)<br>
                    <input type="checkbox" name="eventType17" '.checked_if_contains( $eventType, 'DamageCausedByGroundEquipment' ).'  value="DamageCausedByGroundEquipment">Damage caused by<br />&nbsp;&nbsp;&nbsp;&nbsp; ground equipment<br>
                    <input type="checkbox" name="eventType18" '.checked_if_contains( $eventType, 'DeicingOpsOrIceInRampTaxiwayRunway' ).' value="DeicingOpsOrIceInRampTaxiwayRunway">De-icing ops. or ice<br />&nbsp;&nbsp;&nbsp;&nbsp; in ramp taxiway runway<br>
                    <input type="checkbox" name="eventType19" '.checked_if_contains( $eventType, 'FuelSpillage' ).' value="FuelSpillage">Fuel spillage<br>
                    <input type="checkbox" name="eventType20" '.checked_if_contains( $eventType, 'GroundEquipmentFire' ).' value="GroundEquipmentFire">Ground equipment fire<br>
                    <input type="checkbox" name="eventType21" '.checked_if_contains( $eventType, 'InjuriesToPeopleDuringRampOperations' ).' value="InjuriesToPeopleDuringRampOperations">Injuries to people during<br />&nbsp;&nbsp;&nbsp;&nbsp; ramp operations<br>
                    <input type="checkbox" name="eventType22" '.checked_if_contains( $eventType, 'JetBlast' ).' value="JetBlastPropRotorDownwash">Jet blast/Prop/<br />&nbsp;&nbsp;&nbsp;&nbsp; Rotor downwash<br>
                    <input type="checkbox" name="eventType23" '.checked_if_contains( $eventType, 'RProcedureAndDocumentation' ).' value="RProcedureAndDocumentation">Procedure and<br />&nbsp;&nbsp;&nbsp;&nbsp; documentation<br>
                    <input type="checkbox" name="eventType24" '.checked_if_contains( $eventType, 'PushBackTowing' ).' value="PushBackTowing">Push back/Towing<br>
                    <input type="checkbox" name="eventType25" '.checked_if_contains( $eventType, 'VehiclesTrafficViolation' ).' value="Vehicles traffic violation related to A/C">Vehicles traffic<br />&nbsp;&nbsp;&nbsp;&nbsp; violation related to A/C<br>
                    <input type="checkbox" name="eventType26" '.checked_if_contains( $eventType, 'WeightBalance' ).' value="WeightBalance">Weight & balance<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="eventType27" '.checked_if_contains( $eventType, 'AircraftSystemComponentFailures' ).' value="AircraftSystemComponentFailures">Aircraft System/component<br />&nbsp;&nbsp;&nbsp;&nbsp; Failures<br>
                    <input type="checkbox" name="eventType28" '.checked_if_contains( $eventType, 'CabinSafetyEvents' ).' value="CabinSafetyEvents">Cabin safety events<br>
                    <input type="checkbox" name="eventType29" '.checked_if_contains( $eventType, 'EmergencyEquipment' ).' value="EmergencyEquipment">Emergency equipment<br>
                    <input type="checkbox" name="eventType30" '.checked_if_contains( $eventType, 'FirefightingEquipmentMalfunctionDamage' ).' value="FirefightingEquipmentMalfunctionDamage">Firefighting equipment<br />&nbsp;&nbsp;&nbsp;&nbsp; malfunction/damage<br>
                    <input type="checkbox" name="eventType31" '.checked_if_contains( $eventType, 'HumanFactor' ).' value="HumanFactor">Human factor<br>
                    <input type="checkbox" name="eventType32" '.checked_if_contains( $eventType, 'PersonalProtectiveEquipment' ).' value="PersonalProtectiveEquipment">Personal Protective<br />&nbsp;&nbsp;&nbsp;&nbsp; Equipment<br>
                    <input type="checkbox" name="eventType33" '.checked_if_contains( $eventType, 'OProcedureAndDocumentation' ).' value="OProcedureAndDocumentation">Procedure and<br />&nbsp;&nbsp;&nbsp;&nbsp; documentation<br>
                    <input type="checkbox" name="eventType34" '.checked_if_contains( $eventType, 'AnyOtherEventNotClassified' ).' value="AnyOtherEventNotClassified">Any other event<br />&nbsp;&nbsp;&nbsp;&nbsp; not classified<br><br>
                    &nbsp;&nbsp;<textarea rows="5" cols="20" name="eventTypeOther" placeholder="In case you selected any other event not classified, please specify" maxlength="250">'.$eventTypeOther.'</textarea>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="eventType35" '.checked_if_contains( $eventType, 'OTHRAMAN' ).' value="OTHRAMAN">A/C intentional near<br />&nbsp;&nbsp;&nbsp;&nbsp; collision or loss<br />&nbsp;&nbsp;&nbsp;&nbsp; of separation on ground<br />&nbsp;&nbsp;&nbsp;&nbsp; (AMAN)<br>
                    <input type="checkbox" name="eventType36" '.checked_if_contains( $eventType, 'AirTrafficManagementNavigation' ).' value="AirTrafficManagementNavigation">Air Traffic Management<br />&nbsp;&nbsp;&nbsp;&nbsp;  & Navigation (ATM)<br>
                    <input type="checkbox" name="eventType37" '.checked_if_contains( $eventType, 'ExternalLoadRelatedOccurrencesEXTL' ).' value="ExternalLoadRelatedOccurrencesEXTL">External load related<br />&nbsp;&nbsp;&nbsp;&nbsp; occurrences (EXTL)<br>
                    <input type="checkbox" name="eventType38" '.checked_if_contains( $eventType, 'AircraftLossOfControlOnGroundLOCG' ).' value="AircraftLossOfControlOnGroundLOCG">Aircraft Loss of control<br />&nbsp;&nbsp;&nbsp;&nbsp; on ground (LOC-G)<br>
                    <input type="checkbox" name="eventType39" '.checked_if_contains( $eventType, 'OTHRNAV' ).' value="OTHRNAV">ATC miscommunication or<br />&nbsp;&nbsp;&nbsp;&nbsp;  not compliance with<br />&nbsp;&nbsp;&nbsp;&nbsp; received instruction (NAV)<br>
                    <input type="checkbox" name="eventType40" '.checked_if_contains( $eventType, 'ACTakeoffOrLandingRelatedEventsARC' ).' value="ACTakeoffOrLandingRelatedEventsARC">A/C takeoff or landing<br />&nbsp;&nbsp;&nbsp;&nbsp;  related events (ARC)<br>
                    <input type="checkbox" name="eventType41" '.checked_if_contains( $eventType, 'AircraftTaxingGroundCollisionGCOL' ).' value="AircraftTaxingGroundCollisionGCOL">Aircraft/Taxing Ground<br />&nbsp;&nbsp;&nbsp;&nbsp; collision (GCOL)<br>
                    <input type="checkbox" name="eventType42" '.checked_if_contains( $eventType, 'AircraftUndershootOvershootUSOS' ).' value="AircraftUndershootOvershootUSOS">Aircraft undershoot/<br />&nbsp;&nbsp;&nbsp;&nbsp; overshoot (USOS)<br>
                    <input type="checkbox" name="eventType43" '.checked_if_contains( $eventType, 'AptSnowLightingHeavyRainSevereWeather' ).' value="AptSnowLightingHeavyRainSevereWeather">Apt Snow/Lighting/heavy<br />&nbsp;&nbsp;&nbsp;&nbsp; rain/severe weather<br />&nbsp;&nbsp;&nbsp;&nbsp; (WSTRW)<br>
                    <input type="checkbox" name="eventType44" '.checked_if_contains( $eventType, 'BIRDWildlife' ).' value="BIRDWildlife">BIRD/Wildlife (BIRD)<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="eventType45" '.checked_if_contains( $eventType, 'CollisionWithObstaclesDuringTOLandingCTOL' ).' value="CollisionWithObstaclesDuringTOLandingCTOL">Collision with obstacles<br />&nbsp;&nbsp;&nbsp;&nbsp; during TO/Landing<br />&nbsp;&nbsp;&nbsp;&nbsp; (CTOL)<br>
                    <input type="checkbox" name="eventType46" '.checked_if_contains( $eventType, 'DangerousGoodDG' ).' value="DangerousGoodDG">Dangerous good (DG)<br>
                    <input type="checkbox" name="eventType47" '.checked_if_contains( $eventType, 'DeclaredEmergenciesSCFNPPP' ).' value="DeclaredEmergenciesSCFNPPP">Declared emergencies<br />&nbsp;&nbsp;&nbsp;&nbsp; (if aircraft: SCF-NP/PP)<br>
                    <input type="checkbox" name="eventType48" '.checked_if_contains( $eventType, 'EvacuationEVAC' ).' value="EvacuationEVAC">Evacuation (EVAC)<br>
                    <input type="checkbox" name="eventType49" '.checked_if_contains( $eventType, 'FireSmokeFNI' ).' value="FireSmokeFNI">Fire Smoke (F-NI)<br>
                    <input type="checkbox" name="eventType50" '.checked_if_contains( $eventType, 'FireSmokePostImpactFPOST' ).' value="FireSmokePostImpactFPOST">Fire/Smoke post-impact<br />&nbsp;&nbsp;&nbsp;&nbsp; (F-POST)<br>
                    <input type="checkbox" name="eventType51" '.checked_if_contains( $eventType, 'IcingDeicingAntiicingICE' ).' value="IcingDeicingAntiicingICE">Icing/De-icing, Anti-icing<br />&nbsp;&nbsp;&nbsp;&nbsp; (ICE)<br>
                    <input type="checkbox" name="eventType52" '.checked_if_contains( $eventType, 'MedicalEmergenciesInjuries' ).' value="MedicalEmergenciesInjuries">Medical emergencies/<br />&nbsp;&nbsp;&nbsp;&nbsp; injuries (MED)<br>
                    <input type="checkbox" name="eventType53" '.checked_if_contains( $eventType, 'RefuelingDefuellingFUEL' ).' value="RefuellingDefuelingFUEL">Refuelling/Defuelling<br />&nbsp;&nbsp;&nbsp;&nbsp; (FUEL)<br>
                    <input type="checkbox" name="eventType54" '.checked_if_contains( $eventType, 'RunwayExcursionRE' ).' value="RunwayExcursionRE">Runway excursion (RE)<br>
                    <input type="checkbox" name="eventType55" '.checked_if_contains( $eventType, 'TaxiwayExcurtionNAV' ).' value="TaxiwayExcurtionNAV">Taxiway excurtion (NAV)<br>
                    <input type="checkbox" name="eventType56" '.checked_if_contains( $eventType, 'RunwayIncursionRI' ).' value="RunwayIncursionRI">Runway incursion (RI)<br>
                    <input type="checkbox" name="eventType57" '.checked_if_contains( $eventType, 'WildlifeOnRunwayTaxiwayApronsWILD' ).' value="WildlifeOnRunwayTaxiwayApronsWILD">Wildlife on runway/taxiway/<br />&nbsp;&nbsp;&nbsp;&nbsp; aprons (WILD)<br>
                    <input type="checkbox" name="eventType58" '.checked_if_contains( $eventType, 'UnknownUndetermined' ).' value="UnknownUndetermined">Unknown/undetermined<br />&nbsp;&nbsp;&nbsp;&nbsp; (UNK)<br>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="2">
        <table width="980">
            <tr><td colspan="5"><center>2.1 ADDITIONAL DESCRIPTION (if needed) *</center></td></tr>
            <tr width="100%">
                <td valign="top" width="20%">
                    <input type="checkbox" name="additionalDescription1" '.checked_if_contains( $additionalDescription, 'AircraftWasteWaterServicing' ).' value="AircraftWasteWaterServicing">Aircraft waste/<br />&nbsp;&nbsp;&nbsp;&nbsp; Water servicing<br>
                    <input type="checkbox" name="additionalDescription2" '.checked_if_contains( $additionalDescription, 'Catering' ).' value="Catering">Catering<br>
                    <input type="checkbox" name="additionalDescription3" '.checked_if_contains( $additionalDescription, 'CheckIn' ).' value="CheckIn">Check in<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="additionalDescription4" '.checked_if_contains( $additionalDescription, 'Cleaning' ).' value="Cleaning">Cleaning <br>
                    <input type="checkbox" name="additionalDescription5" '.checked_if_contains( $additionalDescription, 'CompetenceExperience' ).' value="CompetenceExperience">Competence/ Experience<br>
                    <input type="checkbox" name="additionalDescription6" '.checked_if_contains( $additionalDescription, 'FamiliarityWithTaskOrEquipment' ).' value="FamiliarityWithTaskOrEquipment">Familiarity with task<br />&nbsp;&nbsp;&nbsp;&nbsp; or equipment<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="additionalDescription7" '.checked_if_contains( $additionalDescription, 'FatigueStress' ).' value="FatigueStress">Fatigue/stress<br>
                    <input type="checkbox" name="additionalDescription8" '.checked_if_contains( $additionalDescription, 'GroundCongestion' ).' value="GroundCongestion">Ground congestion<br>
                    <input type="checkbox" name="additionalDescription9" '.checked_if_contains( $additionalDescription, 'HumanResources' ).' value="HumanResources">Human resources<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="additionalDescription10" '.checked_if_contains( $additionalDescription, 'MaterialResources' ).' value="MaterialResources">Material resources<br>
                    <input type="checkbox" name="additionalDescription11" '.checked_if_contains( $additionalDescription, 'Motivation' ).' value="Motivation<">Motivation<br>
                    <input type="checkbox" name="additionalDescription12" '.checked_if_contains( $additionalDescription, 'Organizational' ).' value="Organizational">Organizational<br />&nbsp;&nbsp;&nbsp;&nbsp; communication<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="additionalDescription13" '.checked_if_contains( $additionalDescription, 'PaxTransportation' ).' value="PaxTransportation">Pax transportation<br>
                    <input type="checkbox" name="additionalDescription14" '.checked_if_contains( $additionalDescription, 'TechnicalIssueWithVehiclesEquipement' ).' value="TechnicalIssueWithVehiclesEquipement">Technical issue with<br />&nbsp;&nbsp;&nbsp;&nbsp; vehicles & equipement<br>
                </td>
            </tr>
        </table>

    </td>
</tr>
<tr>
    <td colspan="5">
        <input type="text" name="additionalDescriptionOther" size="80" value="'.$additionalDescriptionOther.'" placeholder="Other" maxlength="250">
        <hr>
    </td>
</tr>
<tr>
    <td colspan="2"><center>2.2 LOCATION IN THE PROCESS</center></td>
</tr>
<tr>
    <td colspan="2">
        <select name="locationInTheProcess">
            <option '.selected( $locationInTheProcess, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $locationInTheProcess, 'Manouvering' ).' value="Manouvering">Manouvering</option>
            <option '.selected( $locationInTheProcess, 'Disengagement' ).' value="Disengagement">Disengagement</option>
            <option '.selected( $locationInTheProcess, 'Positioning' ).' value="Positioning">Positioning</option>
            <option '.selected( $locationInTheProcess, 'EquipRemoval' ).' value="EquipRemoval">Equip. Removal</option>
            <option '.selected( $locationInTheProcess, 'Marshaling' ).' value="Marshaling">Marshaling</option>
            <option '.selected( $locationInTheProcess, 'EquipStorage' ).' value="EquipStorage">Equip. Storage</option>
            <option '.selected( $locationInTheProcess, 'Unloading' ).' value="Unloading">Unloading</option>
            <option '.selected( $locationInTheProcess, 'CheckIn' ).' value="CheckIn">Check in</option>
            <option '.selected( $locationInTheProcess, 'Loading' ).' value="Loading">Loading</option>
            <option '.selected( $locationInTheProcess, 'Boarding' ).' value="Boarding">Boarding</option>
        </select>
        <input type="text" name="locationInTheProcessOther" size="80" value="'.$locationInTheProcessOther.'" placeholder="Other" maxlength="250">
    </td>
</tr>
<tr width="100%">
    <th colspan="2">
        <hr>
        3. AIRCRAFT/FLIGHT IDENTIFICATION (if available/relevant) *
    </th>
</tr>
<tr>
    <td colspan="2">
        <table width="980">
            <tr width="100%">
                <td valign="top" align="right" width="30%">
                    A/C Type: <input type="text" name="aircrafttype" size="14" value="'.$aircrafttype.'" maxlength="19">
                </td>
                <td valign="top" align="right" width="30%">
                    A/C Registration: <input type="text" name="aircraftRegistration" size="14" value="'.$aircraftRegistration.'" maxlength="19">
                </td>
                <td valign="top" align="right" width="30%">
                    Flight number: <input type="text" name="aircraftNumber" size="14" value="'.$aircraftNumber.'" maxlength="19">
                </td>
                <td width="10%">&nbsp;</td>
            </tr>
            <tr width="100%">
                <td valign="top" align="right" width="20%">
                    From: <input type="text" name="aircraftFrom" size="14" value="'.$aircraftFrom.'" maxlength="24">
                </td>
                <td valign="top" align="right" width="20%">
                    To: <input type="text" name="aircraftTo" size="14" value="'.$aircraftTo.'" maxlength="24">
                </td>
                <td valign="top" align="right" width="30%">
                    Total persons on board: <input type="text" name="aircraftPersonsOnBorad" size="14" value="'.$aircraftPersonsOnBorad.'" maxlength="9">
                </td>
                <td width="10%">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
<tr width="100%">
    <th colspan="2">
        <hr>
        4. SUMMARY EVENT DESCRIPTION *
    </th>
</tr>
<tr>
    <td colspan="2">
        <textarea rows="4" cols="120" name="eventSummary" maxlength="250">'.$eventSummary.'</textarea>
    </td>
</tr>
<td colspan="2">
    <hr>
    4.1 OPERATIONAL CONSEQUENCES
</td>
<tr>
    <td>Perceived severity of consequences:</td>
    <td>
        <select name = "consPercivedSeverity">
            <option '.selected( $consPercivedSeverity, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $consPercivedSeverity, '5' ).' value="5">5 - Catastrophic</option>
            <option '.selected( $consPercivedSeverity, '4' ).' value="4">4 - Hazardous</option>
            <option '.selected( $consPercivedSeverity, '3' ).' value="3">3 - Major</option>
            <option '.selected( $consPercivedSeverity, '2' ).' value="2">2 - Minor</option>
            <option '.selected( $consPercivedSeverity, '1' ).' value="1">1 - Negligible</option>
        </select>
    </td>
</tr>
<tr>
    <td>Flight</td>
    <td>
        <select name ="consFlight">
            <option '.selected( $consFlight, 'Unselected' ).' value="">Unselected</option>
            <option '.selected( $consFlight, 'RejectedTakeOff' ).' value="RejectedTakeOff">Rejected take-off</option>
            <option '.selected( $consFlight, 'DeclaredEmergency' ).' value="DeclaredEmergency">Declared Emergency</option>
            <option '.selected( $consFlight, 'ReturnToStand' ).' value="ReturnToStand">Return to stand</option>
            <option '.selected( $consFlight, 'FlightInterruptionDiversion' ).' value="FlightInterruptionDiver">Flight Interruption/diversion</option>
            <option '.selected( $consFlight, 'Evacuation' ).' value="Evacuation">Evacuation</option>
            <option '.selected( $consFlight, 'FlightCancellation' ).' value="FlightCancellation">Flight cancellation</option>
        </select>
        <input type="text" name="consFlightOther" size="80" value="'.$consFlightOther.'" placeholder="Other" maxlength="250"><br />
        IATA Delay Code: <input type="text" name="consIATADelayCode" size="80" value="'.$consIATADelayCode.'" maxlength="9">
    </td>
</tr>
<tr>
    <td>Infrastructures</td>
    <td>
        <select name ="consInfrastructures">
            <option '.selected( $consInfrastructures, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $consInfrastructures, 'ReducedAvailability' ).' value="ReducedAvailability">Reduced Availability</option>
            <option '.selected( $consInfrastructures, 'Closed' ).' value="Closed">Closed</option>
        </select>
        <input type="text" name="consInfrasctructuresDescription" size="80" value="'.$consInfrasctructuresDescription.'" placeholder="Description" maxlength="250">
    </td>
</tr>
<tr>
    <td>Aircraft or equipment damage</td>
    <td>
        <select name ="consAircraftDamage">
            <option '.selected( $consAircraftDamage, 'NoDamage' ).' value="NoDamage">No damage</option>
            <option '.selected( $consAircraftDamage, 'LightlyDamaged' ).' value="LightlyDamaged">Lightly damaged</option>
            <option '.selected( $consAircraftDamage, 'SubstantiallyDamaged' ).' value="SubstantiallyDamaged">Substantially damaged</option>
            <option '.selected( $consAircraftDamage, 'DestroyedTotalLoss' ).' value="DestroyedTotalLoss">Destroyed/Total loss</option>
        </select>
        <input type="text" name="consAircraftDamageDescription" size="80" value="'.$consAircraftDamageDescription.'" placeholder="Damage description" maxlength="250">
    </td>
</tr>
<tr>
    <td valing="top">injuries to person(s)</td>
    <td>
        <table width="780">
            <tr width="100%">
                <td valign="top" width="50%">
                    Pax: <input type="text" name="consInjuriesPax" size="6" value="'.$consInjuriesPax.'" placeholder="number" maxlength="4">
                </td>
                <td valign="top" width="50%">
                    <input type="checkbox" name="consInjuriesNone" '.selected( $consInjuriesNone, '1' ).' value="1"> None<br>
                </td>
            </tr>
            <tr width="100%">
                <td valign="top" width="50%">
                    Crew: <input type="text" name="consInjuriesCrew" size="6" value="'.$consInjuriesCrew.'" placeholde="number" maxlength="4"><br />
                </td>
                <td valign="top" width="50%">
                    <input type="checkbox" name="consInjuriesMinor" '.selected( $consInjuriesMinor, '1' ).' value="1"> Minor
                    - Number: <input type="text" name="consInjuriesMinorNumber" size="6" value="'.$consInjuriesMinorNumber.'" placeholde="number" maxlength="4">
                </td>
            </tr>
            <tr width="100%">
                <td valign="top" width="50%">
                    Staff: <input type="text" name="consInjuriesStaff" size="6" value="'.$consInjuriesStaff.'" placeholder="number" maxlength="4">
                </td>
                <td valign="top" width="50%">
                    <input type="checkbox" name="consInjuriesSerious" '.selected( $consInjuriesSerious, '1' ).' value="1"> Serious
                    - Number: <input type="text" name="consInjuriesSeriousNumber" size="6" value="'.$consInjuriesSeriousNumber.'" placeholde="number" maxlength="4">
                </td>
            </tr>
            <tr width="100%">
                <td valign="top" width="50%">
                    Other: <input type="text" name="consInjuriesOther" size="6" value="'.$consInjuriesOther.'" placeholde="number" maxlength="4">
                </td>
                <td valign="top" width="50%">
                    <input type="checkbox" name="consInjuriesFatal" '.selected( $consInjuriesFatal, '1' ).' value="1"> Fatal
                    - Number: <input type="text" name="consInjuriesFatalNumber" size="6" value="'.$consInjuriesFatalNumber.'" placeholde="number" maxlength="4">
                </td>
            </tr>
        </table>
    </td>
</tr>
<td colspan="2">
    <hr>
    4.2 IMMEDIATE ACTION TAKEN
</td>
<tr>
    <td>IMMEDIATE ACTION TAKEN</td>
    <td>
        <select name ="actionImmediateActionTakenSelection">
            <option '.selected( $actionImmediateActionTakenSelection, 'NoActionTaken' ).' value="NoActionTaken">No action taken</option>
            <option '.selected( $actionImmediateActionTakenSelection, 'AccordingToECAM' ).' value="AccordingToECAM">According to ECAM</option>
            <option '.selected( $actionImmediateActionTakenSelection, 'CompanyProcedure' ).' value="CompanyProcedure">Company procedure</option>
            <option '.selected( $actionImmediateActionTakenSelection, 'Regulations' ).' value="Regulations">Regulations</option>
            <option '.selected( $actionImmediateActionTakenSelection, 'NoSuitableProcedureFound' ).' value="NoSuitableProcedureFound">No suitable procedure found</option>
        </select>
        <input type="text" name="actionImmediateActionTakenTitle" size="30" value="'.$actionImmediateActionTakenTitle.'" placeholder="Who took the action" maxlength="250"><br />
        <textarea rows="4" cols="80" name="actionImmediateActionTakenDescription" placeholder="Description" maxlength="250">'.$actionImmediateActionTakenDescription.'</textarea>
    </td>
</tr>
<tr>
    <td colspan="2">
        <table width="980">
            <tr width="100%"><th colspan="5">
                <hr>
                5. AIRDROME INFRASTRUCTURES/PLANTS, EQUIPMENT & VEHICLES INVOLVED (if relevant)
            </th>
            </tr>
            <tr width="100%">
                <td colspan="5" align="center">Infrastructure & Plants</td>
            </tr>
            <tr width="100%">
                <td valign="top" width="20%">
                    <input type="checkbox" name="airdromeVehiclesInvolved1" '.selected( $airdromeVehiclesInvolved, 'Apron' ).' value="Apron">Apron<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved2" '.selected( $airdromeVehiclesInvolved, 'BirdWildlifeControlSystems' ).' value="BirdWildlifeControlSystems">Bird Wildlife Control<br />&nbsp;&nbsp;&nbsp;&nbsp; systems<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved3" '.selected( $airdromeVehiclesInvolved, 'CCTVIncursionSystem' ).' value="CCTVIncursionSystem">CCTV - Incursion System<br>

                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="airdromeVehiclesInvolved4" '.selected( $airdromeVehiclesInvolved, 'DockingSystem' ).' value="DockingSystem">Docking System<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved5" '.selected( $airdromeVehiclesInvolved, 'Drainage' ).' value="Drainage">Drainage<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved6" '.selected( $airdromeVehiclesInvolved, 'FireExtinguishingSystem' ).' value="FireExtinguishingSystem">Fire Extinguishing system<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved7" '.selected( $airdromeVehiclesInvolved, 'FloodingLightingEarthquake' ).' value="FloodingLightingEarthquake">Flooding/lighting/<br />&nbsp;&nbsp;&nbsp;&nbsp; Earthquake<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="airdromeVehiclesInvolved8" '.selected( $airdromeVehiclesInvolved, 'FuelPit' ).' value="FuelPit">Fuel Pit<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved9" '.selected( $airdromeVehiclesInvolved, 'FreshWaterPlant' ).' value="FreshWaterPlant">Fresh water plant<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved10" '.selected( $airdromeVehiclesInvolved, 'GreenAreas' ).' value="GreenAreas">Green Areas<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved11" '.selected( $airdromeVehiclesInvolved, 'JetBlastFences' ).' value="JetBlastFences">Jet Blast Fences<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="airdromeVehiclesInvolved12" '.selected( $airdromeVehiclesInvolved, 'Lights' ).' value="Lights">Lights<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved13" '.selected( $airdromeVehiclesInvolved, 'LoadingBridge' ).'  value="LoadingBridge">Loading Bridge<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved14" '.selected( $airdromeVehiclesInvolved, 'Markings' ).' value="Markings">Markings<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved15" '.selected( $airdromeVehiclesInvolved, 'Neighbouring' ).' value="Neighbouring">Neighbouring<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved16" '.selected( $airdromeVehiclesInvolved, 'Obstacles' ).' value="Obstacles">Obstacles<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" name="airdromeVehiclesInvolved17" '.selected( $airdromeVehiclesInvolved, 'Pavement' ).' value="Pavement">Pavement<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved18" '.selected( $airdromeVehiclesInvolved, 'Runway' ).' value="Runway">Runway<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved19" '.selected( $airdromeVehiclesInvolved, 'Taxiway' ).' value="Taxiway">Taxiway<br>
                    <input type="checkbox" name="airdromeVehiclesInvolved20" '.selected( $airdromeVehiclesInvolved, 'Signs' ).' value="Signs">Signs<br>
                </td>
            </tr>
        </table>
        <table width="980">
            <tr width="100%">
                <td colspan="5" align="center">Equipment & Vehicles</td>
            </tr>
            <tr width="100%">
                <td valign="top" width="20%">
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Preconditioning' ).' name="airdromeEquipementInvolved1" value="Preconditioning">A/C Preconditioning<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'AirStarter' ).'      name="airdromeEquipementInvolved2" value="AirStarter">Air Starter<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Ambulift' ).'        name="airdromeEquipementInvolved3" value="Ambulift">Ambulift<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'BaggageCarts' ).'    name="airdromeEquipementInvolved4" value="BaggageCarts">Baggage Carts<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Cars' ).'            name="airdromeEquipementInvolved5" value="Cars">Cars<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'CateringTruck' ).'   name="airdromeEquipementInvolved6" value="CateringTruck">Catering truck<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Chocks' ).'          name="airdromeEquipementInvolved7" value="Chocks">Chocks<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Containers' ).'      name="airdromeEquipementInvolved8" value="Containers">Containers<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'ConveyorBelt' ).'    name="airdromeEquipementInvolved9" value="ConveyorBelt">Conveyor belt<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'GPU' ).'             name="airdromeEquipementInvolved10" value="GPU">GPU<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'DeicingVehicle' ).'  name="airdromeEquipementInvolved11" value="DeicingVehicle">De-icing vehicle<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'ForkLift' ).'        name="airdromeEquipementInvolved12" value="ForkLift">Fork lift<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'FuelTruck' ).'       name="airdromeEquipementInvolved13" value="FuelTruck">Fuel truck<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Loader' ).'          name="airdromeEquipementInvolved14" value="Loader">Loader<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'LoadingBridge' ).'   name="airdromeEquipementInvolved15" value="LoadingBridge">Loading Bridge Equipment<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Pallets' ).'         name="airdromeEquipementInvolved16" value="Pallets">Pallets<br>
                </td>
                <td valign="top" width="20%">
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'PaxBus' ).'          name="airdromeEquipementInvolved17" value="PaxBus">Pax Bus<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'SignalCones' ).'     name="airdromeEquipementInvolved18" value="SignalCones">Signal cones<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'Stairs' ).'          name="airdromeEquipementInvolved19" value="Stairs">Stairs<br>
                    <input type="checkbox" '.selected( $airdromeEquipementInvolved, 'TowingTractor' ).'   name="airdromeEquipementInvolved20" value="TowingTractor">Towing tractor<br>
                </td>
            </tr>
        </table>
        Others: <input type="text" name="airdromeOtherInvolved" size="30" value="'.$airdromeOtherInvolved.'" placeholder="description" maxlength="250">
        <br/><br/>
        Vehicle 1: <input type="text" name="airdromeVehicle1Type" size="30" value="'.$airdromeVehicle1Type.'" placeholder="Type" maxlength="24">
        <input type="text" name="airdromeVehicle1Id" size="30" value="'.$airdromeVehicle1Id.'" placeholder="N° ID" maxlength="24">
        <input type="text" name="airdromeVehicle1Driver" size="30" value="'.$airdromeVehicle1Driver.'" placeholder="Driver" maxlength="24">
        <input type="text" name="airdromeVehicle1Operator" size="30" value="'.$airdromeVehicle1Operator.'" placeholder="Operator" maxlength="24"><br />
        Vehicle 2: <input type="text" name="airdromeVehicle2Type" size="30" value="'.$airdromeVehicle2Type.'" placeholder="Type" maxlength="24">
        <input type="text" name="airdromeVehicle2Id" size="30" value="'.$airdromeVehicle2Id.'" placeholder="N° ID" maxlength="24">
        <input type="text" name="airdromeVehicle2Driver" size="30" value="'.$airdromeVehicle2Driver.'" placeholder="Driver" maxlength="24">
        <input type="text" name="airdromeVehicle2Operator" size="30" value="'.$airdromeVehicle2Operator.'" placeholder="Operator" maxlength="24"><br />
        <br />
    </td>
</tr>';
$out = '<tr><th colspan="5">6. RUNWAY / TAXIWAY / APRON CONDITION (if relevant) *</th></tr>
<tr>
    <td colspan="5">
        <table width="980">
            <tr>
                <td width="25%">Wheather (if relevant)</td>
                <td width="75%">
                    <select name ="weather">
                        <option '.selected( $weather, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $weather, 'Rain' ).' value="Rain">Rain</option>
                        <option '.selected( $weather, 'Snow' ).' value="Snow">Snow</option>
                        <option '.selected( $weather, 'Wind' ).' value="Wind">Wind</option>
                        <option '.selected( $weather, 'Hail' ).' value="Hail">Hail</option>
                        <option '.selected( $weather, 'Storm' ).' value="Storm">Storm</option>
                        <option '.selected( $weather, 'Lightning' ).' value="Lightning">Lightning</option>
                        <option '.selected( $weather, 'Flooding' ).' value="Flooding">Flooding</option>
                        <option '.selected( $weather, 'Earthquake' ).' value="Earthquake">Earthquake</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Runway condition</td>
                <td>
                    <select name ="runwayCondition">
                        <option '.selected( $runwayCondition, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $runwayCondition, 'Dry' ).' value="Dry">Dry</option>
                        <option '.selected( $runwayCondition, 'DrySnow' ).' value="DrySnow">Dry Snow</option>
                        <option '.selected( $runwayCondition, 'Damp' ).' value="Damp">Damp</option>
                        <option '.selected( $runwayCondition, 'WetSnow' ).' value="WetSnow">Wet Snow</option>
                        <option '.selected( $runwayCondition, 'Wet' ).' value="Wet">Wet</option>
                        <option '.selected( $runwayCondition, 'Slush' ).' value="Slush">Slush</option>
                        <option '.selected( $runwayCondition, 'StandingWater' ).' value="StandingWater">Standing Water</option>
                        <option '.selected( $runwayCondition, 'Ice' ).' value="Ice">Ice</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Runway braking action:</td>
                <td>
                    <select name ="runwayBrakingAction">
                        <option '.selected( $runwayBrakingAction, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $runwayBrakingAction, 'Good' ).' value="Good">Good</option>
                        <option '.selected( $runwayBrakingAction, 'Medium' ).' value="Medium">Medium</option>
                        <option '.selected( $runwayBrakingAction, 'Poor' ).' value="Poor">Poor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Taxiway, apron condition</td>
                <td>
                    <select name ="taxiwayCondition">
                        <option '.selected( $taxiwayCondition, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $taxiwayCondition, 'Dry' ).' value="Dry">Dry</option>
                        <option '.selected( $taxiwayCondition, 'DrySnow' ).' value="DrySnow">Dry Snow</option>
                        <option '.selected( $taxiwayCondition, 'Damp' ).' value="Damp">Damp</option>
                        <option '.selected( $taxiwayCondition, 'WetSnow' ).' value="WetSnow">Wet Snow</option>
                        <option '.selected( $taxiwayCondition, 'Wet' ).' value="Wet">Wet</option>
                        <option '.selected( $taxiwayCondition, 'Slush' ).' value="Slush">Slush</option>
                        <option '.selected( $taxiwayCondition, 'StandingWater' ).' value="StandingWater">Standing Water</option>
                        <option '.selected( $taxiwayCondition, 'Ice' ).' value="Ice">Ice</option>
                    </select>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr><th colspan="5"><hr>7. BIRDSTRIKE (if relevant) *</th></tr>
<tr>
    <td>Birds</td>
    <td>
        Nr. Seen: <select name ="bridsSeen">
        <option '.selected( $bridsSeen, 'Unselected' ).' value="Unselected">Unselected</option>
        <option '.selected( $bridsSeen, '1' ).' value="1">1</option>
        <option '.selected( $bridsSeen, '2to10' ).' value="2to10">2-10</option>
        <option '.selected( $bridsSeen, '11to100' ).' value="11to100">11-100</option>
        <option '.selected( $bridsSeen, 'more' ).' value="more">more</option>
    </select>&nbsp;
        Size: <select name ="birdsSize">
        <option '.selected( $birdsSize, 'Unselected' ).' value="Unselected">Unselected</option>
        <option '.selected( $birdsSize, 'Small' ).' value="Small">Small</option>
        <option '.selected( $birdsSize, 'Medium' ).' value="Medium">Medium</option>
        <option '.selected( $birdsSize, 'Big' ).' value="Big">Big</option>
    </select><br />
        Pilot warned about the event?
        <input type="radio" name="birdspilotWarned" '.checked( $birdspilotWarned, '1' ).' value="Yes"> Yes
        <input type="radio" name="birdspilotWarned" '.checked( $birdspilotWarned, '0' ).' value="No"> No<br />
        Event reported by the Pilot?
        <input type="radio" name="birdsEventReportedByPilot" '.checked( $birdsEventReportedByPilot, '1' ).' value="Yes"> Yes
        <input type="radio" name="birdsEventReportedByPilot" '.checked( $birdsEventReportedByPilot, '0' ).' value="No"> No<br />
        <input type="text" name="birdsDescription" size="80" value="'.$birdsDescription.'" placeholder="Description of bird(s)" maxlength="250">
    </td>
</tr>
<tr><td colspan="5" align="center"><hr>
    7.1 WILD (if relevant)</td></tr>
<tr>
    <td>Animals</td>
    <td>
        Nr. Seen:
        <select name ="wildSeen">
            <option '.selected( $wildSeen, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $wildSeen, '1' ).' value="1">1</option>
            <option '.selected( $wildSeen, '2to10' ).' value="2to10">2-10</option>
            <option '.selected( $wildSeen, '11to100' ).' value="11to100">11-100</option>
            <option '.selected( $wildSeen, 'more' ).' value="more">more</option>
        </select>&nbsp;
        Size:
        <select name ="wildSize">
            <option '.selected( $wildSize, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $wildSize, 'Small' ).' value="Small">Small</option>
            <option '.selected( $wildSize, 'Medium' ).' value="Medium">Medium</option>
            <option '.selected( $wildSize, 'Big' ).' value="Big">Big</option>
        </select><br />
        Pilot warned about the event?
        <input type="radio" name="wildpilotWarned" '.checked( $wildpilotWarned, '1' ).' value="Yes"> Yes
        <input type="radio" name="wildpilotWarned" '.checked( $wildpilotWarned, '0' ).' value="No"> No<br />
        Event reported by the Pilot?
        <input type="radio" name="wildEventReportedByPilot" '.checked( $wildEventReportedByPilot, '1' ).' value="Yes"> Yes
        <input type="radio" name="wildEventReportedByPilot" '.checked( $wildEventReportedByPilot, '0' ).' value="No"> No<br />
        <input type="text" name="wildDescription" size="80" value="'.$wildDescription.'" placeholder="Description of animal(s)" maxlength="250">
    </td>
</tr>
<tr><th colspan="5"><hr>8. SECURITY *</th></tr>
<tr>
    <td colspan="2">
        <table width="980">
            <tr>
                <td valign="top">
                    Type/Level: <select name ="securityLevel">
                    <option '.selected( $securityLevel, 'Unselected' ).' value="Unselected">Unselected</option>
                    <option '.selected( $securityLevel, '1' ).' value="1">1 - Normal risk</option>
                    <option '.selected( $securityLevel, '2' ).' value="2">2 - Medium risk</option>
                    <option '.selected( $securityLevel, '3' ).' value="3">3 - Hight risk</option>
                </select><br />
                    <input type="text" name="securityPersonName" size="40" value="'.$securityPersonName.'" placeholder="Full name" maxlength="24"> <br>
                    <input type="text" name="securityPersonNationality" size="40" value="'.$securityPersonNationality.'" placeholder="Nationality" maxlength="19"> <br>
                    <input type="text" name="securityPersonAge" size="40" value="'.$securityPersonAge.'" placeholder="Age" maxlength="4"><br>
                    <input type="text" name="securityPersonAddress" size="40" value="'.$securityPersonAddress.'" placeholder="Address" maxlength="39"><br>
                    <input type="text" name="securityPersonPhone" size="40" value="'.$securityPersonPhone.'" placeholder="Phone" maxlength="19"><br>
                    <input type="text" name="securityPersonPassport" size="40" value="'.$securityPersonPassport.'" placeholder="Passport/ID" maxlength="19"><br>
                    Gender: <select name ="securityPersonSex">
                        <option '.selected( $securityPersonSex, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $securityPersonSex, 'Male' ).' value="Male">Male</option>
                        <option '.selected( $securityPersonSex, 'Female' ).' value="Female">Female</option>
                    </select><br />
                    Traveling: <select name ="securityTraveling">
                    <option '.selected( $securityTraveling, 'Unselected' ).' value="Unselected">Unselected</option>
                    <option '.selected( $securityTraveling, 'Alone' ).' value="Alone">Alone</option>
                    <option '.selected( $securityTraveling, 'WithFamily' ).' value="WithFamily">With family</option>
                    <option '.selected( $securityTraveling, 'InGroup' ).' value="InGroup">In group</option>
                </select><br />
                    Nature of incident:
                <select name ="securityNatureOfIncident">
                    <option '.selected( $securityNatureOfIncident, 'Unselected' ).' value="Unselected">Unselected</option>
                    <option '.selected( $securityNatureOfIncident, 'OffLoadedPreFlight' ).' value="OffLoadedPreFlight">Off-loaded pre-flight</option>
                    <option '.selected( $securityNatureOfIncident, 'AircraftDiverted' ).' value="AircraftDiverted">Aircraft Diverted</option>
                    <option '.selected( $securityNatureOfIncident, 'WarningForIssued' ).' value="WarningForIssued">Warning for issued</option>
                    <option '.selected( $securityNatureOfIncident, 'UseOfConstraintKit' ).' value="UseOfConstraintKit">Use of constraint kit</option>
                    <option '.selected( $securityNatureOfIncident, 'PoliceRequested' ).' value="PoliceRequested">Police requested</option>
                    <option '.selected( $securityNatureOfIncident, 'ArrestRequested' ).' value="ArrestRequested">Arrest requested</option>
                </select><br />
                    Specific cause:<select name ="securitySpecificCause">
                    <option '.selected( $securitySpecificCause, 'Unselected' ).' value="Unselected">Unselected</option>
                    <option '.selected( $securitySpecificCause, 'AlcoholicDrug' ).' value="AlcoholicDrug">alcoholic/drug</option>
                    <option '.selected( $securitySpecificCause, 'smoking' ).' value="smoking">smoking</option>
                    <option '.selected( $securitySpecificCause, 'baggage' ).' value="baggage">baggage</option>
                    <option '.selected( $securitySpecificCause, 'MobilePhoneElectricalDevice' ).' value="MobilePhoneElectricalDevice">mobile phone electrical device</option>
                    <option '.selected( $securitySpecificCause, 'LAGsRegulation' ).' value="LAGsRegulation">LAG’s regulation</option>
                    <option '.selected( $securitySpecificCause, 'CarrierRelated' ).' value="CarrierRelated">carrier related</option>
                </select>
                </td>
                <td>
                    <b>First Witness</b><br />
                    <input type="text" name="securityWitness1Name" size="40" value="'.$securityWitness1Name.'" placeholder="Witness name"  maxlength="24"> <br>
                    <input type="text" name="securityWitness1Address" size="40" value="'.$securityWitness1Address.'" placeholder="Witness address" maxlength="24"> <br>
                    <input type="text" name="securityWitness1Phone" size="40" value="'.$securityWitness1Phone.'" placeholder="Witness telephone number" maxlength="24"><br>
                    <input type="text" name="securityWitness1PassportId" size="40" value="'.$securityWitness1PassportId.'" placeholder="Witness passport/Id" maxlength="24"><br>
                    <b>Second Witness</b><br />
                    <input type="text" name="securityWitness2Name" size="40" value="'.$securityWitness2Name.'" placeholder="Witness name" maxlength="24"> <br>
                    <input type="text" name="securityWitness2Address" size="40" value="'.$securityWitness2Address.'" placeholder="Witness address" maxlength="24"> <br>
                    <input type="text" name="securityWitness2Phone" size="40" value="'.$securityWitness2Phone.'" placeholder="Witness telephone number" maxlength="24"><br>
                    <input type="text" name="securityWitness2PassportId" size="40" value="'.$securityWitness2PassportId.'" placeholder="Witness passport/Id" maxlength="24"><br>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr><th colspan="5"><hr>9. DANGEROUS GOOD (DG) *</th></tr>

<tr>
    <td colspan="5">
        <table width="980">
            <tr>
                <td width="25%">
                    Proper Shipping Name:
                <td width="75%">
                    <input type="text" name="dangerousGoodsProperShippingName" size="80" value="'.$dangerousGoodsProperShippingName.'" maxlength="24">
                </td>
            </tr>
            <tr>
                <td>
                    UN/ID (if known):
                <td>
                    <input type="text" name="dangerousGoodsUnId" size="80" value="'.$dangerousGoodsUnId.'" maxlength="24">
                </td>
            </tr>
            <tr>
                <td>
                    Class/Division (if known):
                <td>
                    <input type="text" name="dangerousGoodsClass" size="80" value="'.$dangerousGoodsClass.'" maxlength="24">
                </td>
            </tr>
            <tr>
                <td>
                    AWB number:
                <td>
                    <input type="text" name="dangerousGoodsAwbNumber" size="80" value="'.$dangerousGoodsAwbNumber.'" maxlength="24">
                </td>
            </tr>
            <tr>
                <td>
                    ULD number:
                <td>
                    <input type="text" name="dangerousGoodsULDNumber" size="80" value="'.$dangerousGoodsULDNumber.'" maxlength="24">
                </td>
            </tr>
            <tr>
                <td>
                    Specific elements:
                <td>
                    <select name ="dangerousGoodsSpecificElements">
                        <option '.selected( $dangerousGoodsSpecificElements, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $dangerousGoodsSpecificElements, 'AWB' ).' value="AWB">AWB</option>
                        <option '.selected( $dangerousGoodsSpecificElements, 'CargoManifest' ).' value="CargoManifest">Cargo manifest</option>
                        <option '.selected( $dangerousGoodsSpecificElements, 'NOTOC' ).' value="NOTOC">NOTOC</option>
                        <option '.selected( $dangerousGoodsSpecificElements, 'Volume' ).' value="Volume">Volume</option>
                        <option '.selected( $dangerousGoodsSpecificElements, 'Weight' ).' value="Weight">Weight</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Process Phase:
                <td>
                    <select name ="dangerousGoodsProcessPhase">
                        <option '.selected( $dangerousGoodsProcessPhase, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $dangerousGoodsProcessPhase, 'Processing' ).' value="Processing">Processing</option>
                        <option '.selected( $dangerousGoodsProcessPhase, 'Labelling' ).' value="Labelling">Labelling</option>
                        <option '.selected( $dangerousGoodsProcessPhase, 'Transfer' ).' value="Transfer">Transfer</option>
                        <option '.selected( $dangerousGoodsProcessPhase, 'Loading' ).' value="Loading">Loading</option>
                        <option '.selected( $dangerousGoodsProcessPhase, 'Unloading' ).' value="Unloading">Unloading</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Causes of the event:
                <td>
                    <select name ="dangerousGoodsCauses">
                        <option '.selected( $dangerousGoodsCauses, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $dangerousGoodsCauses, 'Identification' ).' value="Identification">Identification</option>
                        <option '.selected( $dangerousGoodsCauses, 'Incompatibility' ).' value="Incompatibility">Incompatibility</option>
                        <option '.selected( $dangerousGoodsCauses, 'Packing' ).' value="Packing">Packing</option>
                        <option '.selected( $dangerousGoodsCauses, 'Registration' ).' value="Registration">Registration</option>
                        <option '.selected( $dangerousGoodsCauses, 'Procedures' ).' value="Procedures">Procedures</option>
                        <option '.selected( $dangerousGoodsCauses, 'Communication' ).' value="Communication">Communication</option>
                        <option '.selected( $dangerousGoodsCauses, 'Instruction' ).' value="Instruction">Instruction</option>
                        <option '.selected( $dangerousGoodsCauses, 'Inspection' ).' value="Inspection">Inspection</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Actions:
                <td>
                    <select name ="dangerousGoodsActions">
                        <option '.selected( $dangerousGoodsActions, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $dangerousGoodsActions, 'Verification' ).' value="Verification">Verification</option>
                        <option '.selected( $dangerousGoodsActions, 'QualifIntervention' ).' value="QualifIntervention">Qualif. intervention</option>
                        <option '.selected( $dangerousGoodsActions, 'Report' ).' value="Report">Report</option>
                        <option '.selected( $dangerousGoodsActions, 'Renunciation' ).' value="Renunciation">Renunciation</option>
                        <option '.selected( $dangerousGoodsActions, 'Filing' ).' value="Filing">Filing</option>
                        <option '.selected( $dangerousGoodsActions, 'TempCustody' ).' value="TempCustody">Temp. custody</option>
                        <option '.selected( $dangerousGoodsActions, 'IsolationArea' ).' value="IsolationArea">Isolation area</option>
                        <option '.selected( $dangerousGoodsActions, 'Discarding' ).' value="Discarding">Discarding</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                     Carried by:
                <td>
                    <select name ="dangerousGoodsCarriedBy">
                        <option '.selected( $dangerousGoodsCarriedBy, 'Unselected' ).' value="Unselected">Unselected</option>
                        <option '.selected( $dangerousGoodsCarriedBy, 'Pax' ).' value="Pax">Carried By Pax</option>
                        <option '.selected( $dangerousGoodsCarriedBy, 'Crew' ).' value="Crew">Carried By Crew</option>
                        <option '.selected( $dangerousGoodsCarriedBy, 'Hidden' ).' value="Hidden">Hidden</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Notes
                <td>
                    <input type="text" name="dangerousGoodsNotes" size="80" value="'.$dangerousGoodsNotes.'" placeholder="Notes" maxlength="80">
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr><th colspan="5"><hr>10. EVENT RECORD</th></tr>
<tr>
    <td>Event record</td>
    <td>
        <select name ="eventRecortType">
            <option '.selected( $eventRecortType, 'Unselected' ).' value="Unselected">Unselected</option>
            <option '.selected( $eventRecortType, 'LogbookDailyJournal' ).' value="LogbookDailyJournal">Logbook/Daily Journal</option>
            <option '.selected( $eventRecortType, 'TechnicalDocumentation' ).' value="TechnicalDocumentation">Technical documentation</option>
            <option '.selected( $eventRecortType, 'InternalReport' ).' value="InternalReport">Internal report/letter</option>
            <option '.selected( $eventRecortType, 'SafetyReportToOther' ).' value="SafetyReportToOther">Safety report to other</option>
        </select>
        <input type="text" name="eventRecordReference" size="80" value="'.$eventRecordReference.'" placeholder="References" maxlength="49">
    </td>
</tr>
<tr><th colspan="5"><hr>11. PERSONAL INFORMATION</th></tr>
<tr>
    <td valign="top">Additional information</td>
    <td>
        <b>Reporter information:</b><br>
        <input type="text" name="eventRecordReporterName" size="30" value="'.$eventRecordReporterName.'" placeholder="Name Surname" maxlength="24"><br>
        <input type="text" name="eventRecordReporterId" size="10" value="'.$eventRecordReporterId.'" placeholder="Contact info" maxlength="24"><br>
        <input type="text" name="eventRecordReporterQualification" size="30" value="'.$eventRecordReporterQualification.'" placeholder="Qualification" maxlength="24"><br>
        <input type="text" name="eventRecordReporterOrganization" size="30" value="'.$eventRecordReporterOrganization.'" placeholder="Operator/Qualification" maxlength="24"><br />
        <b>Witness information (if available):</b><br>
        <input type="text" name="eventRecordWitnessName" size="30" value="'.$eventRecordWitnessName.'" placeholder="Name Surname" maxlength="24"><br>
        <input type="text" name="eventRecordWitnessId" size="10" value="'.$eventRecordWitnessId.'" placeholder="Contact info" maxlength="24"><br>
        <input type="text" name="eventRecordWitnessQualification" size="30" value="'.$eventRecordWitnessQualification.'" placeholder="Qualification" maxlength="24"><br>
        <input type="text" name="eventRecordWitnessOrganization" size="30" value="'.$eventRecordWitnessOrganization.'" placeholder="Operator/Qualification" maxlength="24"><br />
    </td>
</tr>';

        return $out;
    }

    function get_view( $entity = null ) {
        utils( 'xmlserializer' );

        $entity = simplexml_load_string($entity->pwp_data);

        // $deviation = ( $entity->deviation == null ? '' : $entity->deviation );

        $out = '<br />
        Hazard: yet to be defined<br /><br />';

        return $out;
    }

}
