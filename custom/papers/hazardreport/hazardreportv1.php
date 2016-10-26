<?php

require_once( 'framework/paperworks/basicpaper.php' );

/**
 * Created by Fabio Mattei <matteif@tcd.ie>
 * Date: 18/04/2016
 * Time: 10:50
 */
class HazardReportV1 extends BasicPaper {

    public $class_name              = 'HazardReportV1';
    public $slug                    = 'hazardreportv1';
    public $base_slug               = 'hazardreport';
    public $family_slug             = 'report';
    public $human_name              = 'Hazard Report V1';
    public $destination_office_slug = 'safety';
    public $default_flow_slug       = 'gsrflowv1';
    public $can_read                = array( '1' );
    public $can_edit                = array( '1' );
    public $can_receive             = array( '1' ); // destination offices

    public $fields = array();

    public $validation = array(
        'id'                        => 'required|integer',
        'issue'                     => 'max_len,2500',
		'issueclassification'       => 'integer',
        'cause'                     => 'max_len,2500',
		'causeclassification'       => 'integer',
        'consequences'              => 'max_len,2500',
		'consequenceclassification' => 'integer',
        'mitigation'                => 'max_len,2500',
		'mitigationclassification'  => 'integer',
		'likelihood'                => 'integer',
		'severitysafety'            => 'integer',
		'severityreputation'        => 'integer',
		'severityperformances'      => 'integer',
		'severityfinacial'          => 'integer',
		'severityenvironmental'     => 'integer',
		'steplink0'                 => 'integer',
		'steplink1'                 => 'integer',
		'steplink2'                 => 'integer',
		'steplink3'                 => 'integer',
		'steplink4'                 => 'integer',
		'steplink5'                 => 'integer',
		'steplink6'                 => 'integer',
		'steplink7'                 => 'integer',
		'steplink8'                 => 'integer',
		'steplink9'                 => 'integer',
		'assetlink0'                => 'integer',
		'assetlink1'                => 'integer',
		'assetlink2'                => 'integer',
		'assetlink3'                => 'integer',
		'assetlink4'                => 'integer',
		'assetlink5'                => 'integer',
		'assetlink6'                => 'integer',
		'assetlink7'                => 'integer',
		'assetlink8'                => 'integer',
		'assetlink9'                => 'integer',
    );

    public $filter = array(
        'id'                        => 'trim',
        'issue'                     => 'trim',
		'issueclassification'       => 'trim',
        'cause'                     => 'trim',
		'causeclassification'       => 'trim',
        'consequences'              => 'trim',
		'consequenceclassification' => 'trim',
        'mitigation'                => 'trim',
		'mitigationclassification'  => 'trim',
		'likelihood'                => 'trim',
		'severitysafety'            => 'trim',
		'severityreputation'        => 'trim',
		'severityperformances'      => 'trim',
		'severityfinacial'          => 'trim',
		'severityenvironmental'     => 'trim',
		'steplink0'                 => 'trim',
		'steplink1'                 => 'trim',
		'steplink2'                 => 'trim',
		'steplink3'                 => 'trim',
		'steplink4'                 => 'trim',
		'steplink5'                 => 'trim',
		'steplink6'                 => 'trim',
		'steplink7'                 => 'trim',
		'steplink8'                 => 'trim',
		'steplink9'                 => 'trim',
		'assetlink0'                => 'trim',
		'assetlink1'                => 'trim',
		'assetlink2'                => 'trim',
		'assetlink3'                => 'trim',
		'assetlink4'                => 'trim',
		'assetlink5'                => 'trim',
		'assetlink6'                => 'trim',
		'assetlink7'                => 'trim',
		'assetlink8'                => 'trim',
		'assetlink9'                => 'trim',
    );

    public $related_documents = array( 'recommendationv1' => 'Recommendation' );

    function make_entity_for_saving( $array_containing_fields ) {
        $entity = array();

        $entity['issue'] = $this->check_field_content( $array_containing_fields['issue'], '' );
        $entity['issueclassification'] = $this->check_field_content( $array_containing_fields['issueclassification'], 0 );
        $entity['cause'] = $this->check_field_content( $array_containing_fields['cause'], '' );
        $entity['causeclassification'] = $this->check_field_content( $array_containing_fields['causeclassification'], 0 );
        $entity['consequences'] = $this->check_field_content( $array_containing_fields['consequences'], '' );
        $entity['consequenceclassification'] = $this->check_field_content( $array_containing_fields['consequenceclassification'], 0 );
        $entity['mitigation'] = $this->check_field_content( $array_containing_fields['mitigation'], '' );
        $entity['mitigationclassification'] = $this->check_field_content( $array_containing_fields['mitigationclassification'], 0 );
		$entity['likelihood'] = $this->check_field_content( $array_containing_fields['likelihood'], 0 );
		$entity['severitysafety'] = $this->check_field_content( $array_containing_fields['severitysafety'], 0 );
		$entity['severityreputation'] = $this->check_field_content( $array_containing_fields['severityreputation'], 0 );
		$entity['severityperformances'] = $this->check_field_content( $array_containing_fields['severityperformances'], 0 );
		$entity['severityfinacial'] = $this->check_field_content( $array_containing_fields['severityfinacial'], 0 );
		$entity['severityenvironmental'] = $this->check_field_content( $array_containing_fields['severityenvironmental'], 0 );

        $entity['risk'] = $this->calculate_risk($entity['likelihood'],
            $entity['severitysafety'],
            $entity['severityreputation'],
            $entity['severityperformances'],
            $entity['severityfinacial'],
            $entity['severityenvironmental']);

		$entity['steplink0'] = ( array_key_exists( 'steplink0', $array_containing_fields ) ? $array_containing_fields['steplink0'] : 0 );
		$entity['steplink1'] = ( array_key_exists( 'steplink1', $array_containing_fields ) ? $array_containing_fields['steplink1'] : 0 );
		$entity['steplink2'] = ( array_key_exists( 'steplink2', $array_containing_fields ) ? $array_containing_fields['steplink2'] : 0 );
		$entity['steplink3'] = ( array_key_exists( 'steplink3', $array_containing_fields ) ? $array_containing_fields['steplink3'] : 0 );
		$entity['steplink4'] = ( array_key_exists( 'steplink4', $array_containing_fields ) ? $array_containing_fields['steplink4'] : 0 );
		$entity['steplink5'] = ( array_key_exists( 'steplink5', $array_containing_fields ) ? $array_containing_fields['steplink5'] : 0 );
		$entity['steplink6'] = ( array_key_exists( 'steplink6', $array_containing_fields ) ? $array_containing_fields['steplink6'] : 0 );
		$entity['steplink7'] = ( array_key_exists( 'steplink7', $array_containing_fields ) ? $array_containing_fields['steplink7'] : 0 );
		$entity['steplink8'] = ( array_key_exists( 'steplink8', $array_containing_fields ) ? $array_containing_fields['steplink8'] : 0 );
        $entity['steplink9'] = ( array_key_exists( 'steplink9', $array_containing_fields ) ? $array_containing_fields['steplink9'] : 0 );
		$entity['assetlink0'] = ( array_key_exists( 'assetlink0', $array_containing_fields ) ? $array_containing_fields['assetlink0'] : 0 );
		$entity['assetlink1'] = ( array_key_exists( 'assetlink1', $array_containing_fields ) ? $array_containing_fields['assetlink1'] : 0 );
		$entity['assetlink2'] = ( array_key_exists( 'assetlink2', $array_containing_fields ) ? $array_containing_fields['assetlink2'] : 0 );
		$entity['assetlink3'] = ( array_key_exists( 'assetlink3', $array_containing_fields ) ? $array_containing_fields['assetlink3'] : 0 );
		$entity['assetlink4'] = ( array_key_exists( 'assetlink4', $array_containing_fields ) ? $array_containing_fields['assetlink4'] : 0 );
		$entity['assetlink5'] = ( array_key_exists( 'assetlink5', $array_containing_fields ) ? $array_containing_fields['assetlink5'] : 0 );
		$entity['assetlink6'] = ( array_key_exists( 'assetlink6', $array_containing_fields ) ? $array_containing_fields['assetlink6'] : 0 );
		$entity['assetlink7'] = ( array_key_exists( 'assetlink7', $array_containing_fields ) ? $array_containing_fields['assetlink7'] : 0 );
		$entity['assetlink8'] = ( array_key_exists( 'assetlink8', $array_containing_fields ) ? $array_containing_fields['assetlink8'] : 0 );
        $entity['assetlink9'] = ( array_key_exists( 'assetlink9', $array_containing_fields ) ? $array_containing_fields['assetlink9'] : 0 );

        return $entity;
    }

    function make_indexes_for_saving( $array_containing_fields ) {
        $entity = array();
		
		$likelihood = $this->check_field_content( $array_containing_fields['likelihood'], 0 );
		$saf = $this->check_field_content( $array_containing_fields['severitysafety'], 0 );
		$rep = $this->check_field_content( $array_containing_fields['severityreputation'], 0 );
		$per = $this->check_field_content( $array_containing_fields['severityperformances'], 0 );
		$fin = $this->check_field_content( $array_containing_fields['severityfinacial'], 0 );
		$env = $this->check_field_content( $array_containing_fields['severityenvironmental'], 0 );

        // pwp_iind1 :: issueclassification
        $entity['pwp_iind1'] = $this->check_field_content( $array_containing_fields['issueclassification'], 0 );
        // pwp_iind2 :: causeclassification
        $entity['pwp_iind2'] = $this->check_field_content( $array_containing_fields['causeclassification'], 0 );
        // pwp_iind3 :: consequenceclassification
        $entity['pwp_iind3'] = $this->check_field_content( $array_containing_fields['consequenceclassification'], 0 );
        // pwp_iind3 :: mitigationclassification
        $entity['pwp_iind4'] = $this->check_field_content( $array_containing_fields['mitigationclassification'], 0 );
        // pwp_iind3 :: risk
        $entity['pwp_iind5'] = $this->calculate_risk($likelihood, $saf, $rep, $per, $fin, $env);
		// pwp_tind1 :: issue
        $entity['pwp_tind1'] = $this->check_field_content( $array_containing_fields['issue'], 0 );
        // pwp_tind2 :: cause
        $entity['pwp_tind2'] = $this->check_field_content( $array_containing_fields['cause'], 0 );
        // pwp_tind3 :: consequences
        $entity['pwp_tind3'] = $this->check_field_content( $array_containing_fields['consequences'], 0 );
        // pwp_tind4 :: mitigation
        $entity['pwp_tind4'] = $this->check_field_content( $array_containing_fields['mitigation'], 0 );

        return $entity;
    }

    function make_action_after_saving( $paper_id ) {
        if ( $paper_id != 0 ) {
        	
        	$paperstep_dao = dao_exp('paper', 'PaperStepDao');

			$paperstep_dao->deleteByFields( array( 'pwps_pwpid' => $paper_id ) );

			for ($i=1; $i < 11 ; $i++) { 
				if ( isset( $_POST['steplink'.$i] ) AND $_POST['steplink'.$i] != 0 ) {
					$paperstep_dao->insert( 
						array(
							'pwps_pwpid' => $paper_id,
							'pwps_stpid' => $_POST['steplink'.$i],
							) 
					);
				}
				if ( isset( $_POST['assetlink'.$i] ) AND $_POST['assetlink'.$i] != 0 ) {
					$paperstep_dao->insert( 
						array(
							'pwps_pwpid' => $paper_id,
							'pwps_stpid' => $_POST['assetlink'.$i],
							) 
					);
				}
			}
        }
    }

    function make_title( $array_containing_fields ) {
        $out = '';
        $out .= ( isset($array_containing_fields['issue']) ? $array_containing_fields['issue'] : '' );
        return $out;
    }

    function get_form( $paper_data = null, $paper_id = 0, $parent_paper_id = 0 ) {
        utils( 'xmlserializer' );
        $entity = ( $paper_data == null ? null : simplexml_load_string( $paper_data ) );

        $id = $paper_id;
        $issue = ( $entity == null ? '' : $entity->issue );
		$issueclassification = ( $entity == null ? 0 : $entity->issueclassification );
        $cause = ( $entity == null ? '' : $entity->cause );
		$causeclassification = ( $entity == null ? 0 : $entity->causeclassification );
        $consequences = ( $entity == null ? '' : $entity->consequences );
		$consequenceclassification = ( $entity == null ? 0 : $entity->consequenceclassification );
        $mitigation = ( $entity == null ? '' : $entity->mitigation );
		$mitigationclassification = ( $entity == null ? 0 : $entity->mitigationclassification );
		$likelihood = ( $entity == null ? '' : $entity->likelihood );
        $severitysafety = ( $entity == null ? '' : $entity->severitysafety );
		$severityreputation = ( $entity == null ? '' : $entity->severityreputation );
		$severityperformances = ( $entity == null ? '' : $entity->severityperformances );
		$severityfinacial = ( $entity == null ? '' : $entity->severityfinacial );
		$severityenvironmental = ( $entity == null ? '' : $entity->severityenvironmental );

        $out = '
	        <fieldset>
	            <div class="row">
	                <div class="col-sm-6">
	                    <div class="form_sep">
	                        <h4>Connected tasks</h4>
	                        <p>Select the tasks relevant for the issue you are reporting.</p>
	                        <div class="well">
	                            <ul id="tree_plugin_ex_a" class="ztree"></ul>
	                        </div>
	                    </div>  
	                </div>
	                <div class="col-sm-6">
	                    <div class="form_sep">
	                        <h4>Connected assets</h4>
	                        <p>Select the assets relevant for the issue you are reporting.</p>
	                        <div class="well">
	                            <ul id="tree_plugin_ex_b" class="ztree"></ul>
	                        </div>
	                    </div>  
	                </div>
	            </div>
	            <div id="operationscontainer" style="visibility: hidden;">';
	       $i = 0;
	       foreach ( $this->steplinks as $lk ) {
	           $out .= '<input type="checkbox" name="steplink'.$i.'" value="'.$lk.'" checked="checked" />';   
	           $i++; 
	       }
	       $out .= '</div>
	           <div id="assetscontainer" style="visibility: hidden;">';
	       $i = 0;
	       foreach ( $this->assetlinks as $lk ) {
	           $out .= '<input type="checkbox" name="assetlink'.$i.'" value="'.$lk.'" checked="checked" />';   
	           $i++; 
	       }
	              $out .= '</div>
	              </fieldset>
			
        <fieldset>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form_sep">
                        <label for="issue" class="req">What the issue is?</label>
                        <textarea id="issue" name="issue" class="form-control" required="true">'.$issue.'</textarea>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-3">
                    <div class="form_sep">
                        <label>&nbsp;</label>
                        <select class="form-control" name="issueclassification">
							<option value="0" '.selected( $issueclassification , 0 ).'>'.$this->get_descriptive_classification( 0 ).'</option>
			                <option value="1" '.selected( $issueclassification , 1 ).'>'.$this->get_descriptive_classification( 1 ).'</option>
			                <option value="2" '.selected( $issueclassification , 2 ).'>'.$this->get_descriptive_classification( 2 ).'</option>
			                <option value="3" '.selected( $issueclassification , 3 ).'>'.$this->get_descriptive_classification( 3 ).'</option>
			                <option value="4" '.selected( $issueclassification , 4 ).'>'.$this->get_descriptive_classification( 4 ).'</option>
							<option value="5" '.selected( $issueclassification , 5 ).'>'.$this->get_descriptive_classification( 5 ).'</option>
							<option value="6" '.selected( $issueclassification , 6 ).'>'.$this->get_descriptive_classification( 6 ).'</option>
							<option value="7" '.selected( $issueclassification , 7 ).'>'.$this->get_descriptive_classification( 7 ).'</option>
			            </select><br /><br />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form_sep">
                        <label for="cause">Causes</label>
                        <textarea id="cause" name="cause" class="form-control">'.$cause.'</textarea>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-3">
                    <div class="form_sep">
                        <label>&nbsp;</label>
                        <select class="form-control" name="causeclassification">
							<option value="0" '.selected( $causeclassification , 0 ).'>'.$this->get_descriptive_classification( 0 ).'</option>
		            	    <option value="1" '.selected( $causeclassification , 1 ).'>'.$this->get_descriptive_classification( 1 ).'</option>
		            	    <option value="2" '.selected( $causeclassification , 2 ).'>'.$this->get_descriptive_classification( 2 ).'</option>
		            	    <option value="3" '.selected( $causeclassification , 3 ).'>'.$this->get_descriptive_classification( 3 ).'</option>
		            	    <option value="4" '.selected( $causeclassification , 4 ).'>'.$this->get_descriptive_classification( 4 ).'</option>
							<option value="5" '.selected( $causeclassification , 5 ).'>'.$this->get_descriptive_classification( 5 ).'</option>
							<option value="6" '.selected( $causeclassification , 6 ).'>'.$this->get_descriptive_classification( 6 ).'</option>
							<option value="7" '.selected( $causeclassification , 7 ).'>'.$this->get_descriptive_classification( 7 ).'</option>
		            	</select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form_sep">
                        <label for="consequences">Consequences</label>
                        <textarea id="consequences" name="consequences" class="form-control">'.$consequences.'</textarea>
                    </div>
                    <hr />
                </div>
                <div class="col-sm-3">
                    <div class="form_sep">
                        <label>&nbsp;</label>
                        <select class="form-control" name="consequenceclassification">
							<option value="0" '.selected( $consequenceclassification , 0 ).'>'.$this->get_descriptive_classification( 0 ).'</option>
	            		    <option value="1" '.selected( $consequenceclassification , 1 ).'>'.$this->get_descriptive_classification( 1 ).'</option>
	            		    <option value="2" '.selected( $consequenceclassification , 2 ).'>'.$this->get_descriptive_classification( 2 ).'</option>
	            		    <option value="3" '.selected( $consequenceclassification , 3 ).'>'.$this->get_descriptive_classification( 3 ).'</option>
	            		    <option value="4" '.selected( $consequenceclassification , 4 ).'>'.$this->get_descriptive_classification( 4 ).'</option>
							<option value="5" '.selected( $consequenceclassification , 5 ).'>'.$this->get_descriptive_classification( 5 ).'</option>
							<option value="6" '.selected( $consequenceclassification , 6 ).'>'.$this->get_descriptive_classification( 6 ).'</option>
							<option value="7" '.selected( $consequenceclassification , 7 ).'>'.$this->get_descriptive_classification( 7 ).'</option>
	            		</select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="form_sep">
                        <label for="mitigation">Suggested mitigation</label>
                        <textarea id="mitigation" name="mitigation" class="form-control">'.$mitigation.'</textarea>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form_sep">
                        <label>&nbsp;</label>
                        <select class="form-control" name="mitigationclassification">
							<option value="0" '.selected( $mitigationclassification , 0 ).'>'.$this->get_descriptive_classification( 0 ).'</option>
            			    <option value="1" '.selected( $mitigationclassification , 1 ).'>'.$this->get_descriptive_classification( 1 ).'</option>
            			    <option value="2" '.selected( $mitigationclassification , 2 ).'>'.$this->get_descriptive_classification( 2 ).'</option>
            			    <option value="3" '.selected( $mitigationclassification , 3 ).'>'.$this->get_descriptive_classification( 3 ).'</option>
            			    <option value="4" '.selected( $mitigationclassification , 4 ).'>'.$this->get_descriptive_classification( 4 ).'</option>
							<option value="5" '.selected( $mitigationclassification , 5 ).'>'.$this->get_descriptive_classification( 5 ).'</option>
							<option value="6" '.selected( $mitigationclassification , 6 ).'>'.$this->get_descriptive_classification( 6 ).'</option>
							<option value="7" '.selected( $mitigationclassification , 7 ).'>'.$this->get_descriptive_classification( 7 ).'</option>
            			</select>
                    </div>
                </div>
            </div>
        </fieldset>
		
		
              <fieldset>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="step_info">
                              <h4>Severity</h4>
                              <lable>Environmental</lable>
                              <select class="form-control" name="severityenvironmental">
						  	  	  <option value="0" '.selected( $severityenvironmental , 0 ).'>'.$this->get_descriptive_severity_environmental( 0 ).'</option>
						  	      <option value="1" '.selected( $severityenvironmental , 1 ).'>'.$this->get_descriptive_severity_environmental( 1 ).'</option>
						  	      <option value="2" '.selected( $severityenvironmental , 2 ).'>'.$this->get_descriptive_severity_environmental( 2 ).'</option>
						  	      <option value="3" '.selected( $severityenvironmental , 3 ).'>'.$this->get_descriptive_severity_environmental( 3 ).'</option>
						  	  </select>
							<lable>Financial</lable>
							<select class="form-control" name="severityfinacial">
								<option value="0" '.selected( $severityfinacial , 0 ).'>'.$this->get_descriptive_severity_financial( 0 ).'</option>
							    <option value="1" '.selected( $severityfinacial , 1 ).'>'.$this->get_descriptive_severity_financial( 1 ).'</option>
							    <option value="2" '.selected( $severityfinacial , 2 ).'>'.$this->get_descriptive_severity_financial( 2 ).'</option>
							    <option value="3" '.selected( $severityfinacial , 3 ).'>'.$this->get_descriptive_severity_financial( 3 ).'</option>
							</select>
							<lable>Performances</lable>
							<select class="form-control" name="severityperformances">
								<option value="0" '.selected( $severityperformances , 0 ).'>'.$this->get_descriptive_severity_performances( 0 ).'</option>
							    <option value="1" '.selected( $severityperformances , 1 ).'>'.$this->get_descriptive_severity_performances( 1 ).'</option>
							    <option value="2" '.selected( $severityperformances , 2 ).'>'.$this->get_descriptive_severity_performances( 2 ).'</option>
							    <option value="3" '.selected( $severityperformances , 3 ).'>'.$this->get_descriptive_severity_performances( 3 ).'</option>
							</select>
							<lable>Reputation</lable>
							<select class="form-control" name="severityreputation">
								<option value="0" '.selected( $severityreputation , 0 ).'>'.$this->get_descriptive_severity_reputation( 0 ).'</option>
							    <option value="1" '.selected( $severityreputation , 1 ).'>'.$this->get_descriptive_severity_reputation( 1 ).'</option>
							    <option value="2" '.selected( $severityreputation , 2 ).'>'.$this->get_descriptive_severity_reputation( 2 ).'</option>
							    <option value="3" '.selected( $severityreputation , 3 ).'>'.$this->get_descriptive_severity_reputation( 3 ).'</option>
							</select>
							<lable>Safety</lable>
							<select class="form-control" name="severitysafety">
								<option value="0" '.selected( $severitysafety , 0 ).'>'.$this->get_descriptive_severity_safety( 0 ).'</option>
							    <option value="1" '.selected( $severitysafety , 1 ).'>'.$this->get_descriptive_severity_safety( 1 ).'</option>
							    <option value="2" '.selected( $severitysafety , 2 ).'>'.$this->get_descriptive_severity_safety( 2 ).'</option>
							    <option value="3" '.selected( $severitysafety , 3 ).'>'.$this->get_descriptive_severity_safety( 3 ).'</option>
								<option value="4" '.selected( $severitysafety , 4 ).'>'.$this->get_descriptive_severity_safety( 4 ).'</option>
								<option value="5" '.selected( $severitysafety , 5 ).'>'.$this->get_descriptive_severity_safety( 5 ).'</option>
							</select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form_sep">
                        <h4>Likelihood</h4>
                        <select class="form-control" name="likelihood">
							<option value="0" '.selected( $likelihood , 0 ).'>'.$this->get_descriptive_likelihood( 0 ).'</option>
        				    <option value="1" '.selected( $likelihood , 1 ).'>'.$this->get_descriptive_likelihood( 1 ).'</option>
        				    <option value="2" '.selected( $likelihood , 2 ).'>'.$this->get_descriptive_likelihood( 2 ).'</option>
        				    <option value="3" '.selected( $likelihood , 3 ).'>'.$this->get_descriptive_likelihood( 3 ).'</option>>
        				    <option value="4" '.selected( $likelihood , 4 ).'>'.$this->get_descriptive_likelihood( 4 ).'</option>
							<option value="5" '.selected( $likelihood , 5 ).'>'.$this->get_descriptive_likelihood( 5 ).'</option>
        				</select>
                        </div>
                        <hr />
                    </div>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="'.$id.'">';

        return $out;
    }
	
    function form_addToHead() {
        return '<!-- zTree -->
            <link rel="stylesheet" href="'.BASEPATH.'assets/js/lib/zTree/css/zTreeStyle/zTreeStyle.css">';
    }

    function form_addToFoot() {
        $out = '
        <script>
            var BASEPATH = "'.BASEPATH.'";
            var SCRIPTPATH = "'.BASEPATH.'manager-paperwork/ajaxloadsteps";

            var zNodes =[ ';
        foreach ( $this->steps as $stp ) {
            $checked = '';
            foreach ($this->steplinks as $lk) {
                if ( $lk == $stp->stp_id ) {
                    $checked = ', checked:true';
                }
            }
            $open = '';
            foreach ($this->steps as $internal_stp) {
                if ( $internal_stp->stp_parentid == $stp->stp_id ) {
                    $open = ', open:true';
                }
            }
            $out .= '{ id:'.$stp->stp_id.', pId:'.$stp->stp_parentid.', name:"'.$stp->stp_name.'", isParent:true'.$checked.''.$open.'},';
        }
        $out .= '    ];

            var zNodesAssets =[ ';
        foreach ( $this->assets as $stp ) {
            $checked = '';
            foreach ($this->assetlinks as $lk) {
                if ( $lk == $stp->stp_id ) {
                    $checked = ', checked:true';
                }
            }
            $open = '';
            foreach ($this->assets as $internal_stp) {
                if ( $internal_stp->stp_parentid == $stp->stp_id ) {
                    $open = ', open:true';
                }
            }
            $out .= '{ id:'.$stp->stp_id.', pId:'.$stp->stp_parentid.', name:"'.$stp->stp_name.'", isParent:true'.$checked.''.$open.'},';
        }
        $out .= '    ];
        </script>
        <!-- zTree -->
            <script src="'.BASEPATH.'assets/js/lib/zTree/js/jquery.ztree.core-3.5.min.js"></script>
            <script src="'.BASEPATH.'assets/js/lib/zTree/js/jquery.ztree.excheck-3.5.min.js"></script>
        
            <script src="'.BASEPATH.'assets/js/pages/ebro_tree.js"></script>';
        return $out;
    }
	
	function form_load_entites( $paper_data, $connection = '' ) {
        utils( 'xmlserializer' );
        $entity = ( $paper_data == null ? null : simplexml_load_string( $paper_data ) );
		
		$steplinks = array();
		$steplinks[] = ( $entity == null ? '' : $entity->steplink0 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink1 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink2 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink3 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink4 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink5 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink6 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink7 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink8 );
		$steplinks[] = ( $entity == null ? '' : $entity->steplink9 );
		
		$this->steplinks = $steplinks;
		
		$assetlinks = array();
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink0 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink1 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink2 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink3 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink4 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink5 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink6 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink7 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink8 );
		$assetlinks[] = ( $entity == null ? '' : $entity->assetlink9 );
		
		$this->assetlinks = $assetlinks;
		
		// loading first level steps and assets
    	$stp_dao = dao_exp( 'operations', 'StepDao' );
        $this->steps = $stp_dao->stp_get_operation_steps_having_parentid( 0 );
        $this->assets = $stp_dao->stp_get_assets_steps_having_parentid( 0 );
		
        // iterating trought the links
        foreach ($steplinks as $lk) {
            // I need to look for the base step
            $step = $stp_dao->getOneByFields( array('stp_id' => $lk ) );
            while ( $step->stp_parentid != 0 ) {
                $steps_with_same_parent = $stp_dao->getArrayByFields( array( 'stp_parentid' => $step->stp_parentid ) );
                foreach ($steps_with_same_parent as $step_to_insert) {
                    if (!isset($this->steps[$step_to_insert->stp_id])) $this->steps[$step_to_insert->stp_id] = $step_to_insert;
                }
                // iterating to the parent
                $step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
            }
        }
        // opening the path in case I come form the analysis module
        if ( isset($this->step_to_open_type) and $this->step_to_open_type == 'task' ) {
        	$step = $stp_dao->getOneByFields( array('stp_id' => $this->step_to_open_id ) );
            while ( $step->stp_parentid != 0 ) {
                $steps_with_same_parent = $stp_dao->getArrayByFields( array( 'stp_parentid' => $step->stp_parentid ) );
                foreach ($steps_with_same_parent as $step_to_insert) {
                    if (!isset($this->steps[$step_to_insert->stp_id])) $this->steps[$step_to_insert->stp_id] = $step_to_insert;
                }
                // iterating to the parent
                $step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
            }
        }
		
        // iterating trought the links
        foreach ($assetlinks as $lk) {
            // I need to look for the base step
            $step = $stp_dao->getOneByFields( array('stp_id' => $lk ) );
            while ( $step->stp_parentid != 0 ) {
                $steps_with_same_parent = $stp_dao->getArrayByFields( array( 'stp_parentid' => $step->stp_parentid ) );
                foreach ($steps_with_same_parent as $step_to_insert) {
                    if (!isset($this->assets[$step_to_insert->stp_id])) $this->assets[$step_to_insert->stp_id] = $step_to_insert;   
                }
                // iterating to the parent
                $step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
            }
        }
        // opening the path in case I come form the analysis module
        if ( isset($this->step_to_open_type) and $this->step_to_open_type == 'asset' ) {
        	$step = $stp_dao->getOneByFields( array('stp_id' => $this->step_to_open_id ) );
            while ( $step->stp_parentid != 0 ) {
                $steps_with_same_parent = $stp_dao->getArrayByFields( array( 'stp_parentid' => $step->stp_parentid ) );
                foreach ($steps_with_same_parent as $step_to_insert) {
                    if (!isset($this->assets[$step_to_insert->stp_id])) $this->assets[$step_to_insert->stp_id] = $step_to_insert;
                }
                // iterating to the parent
                $step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
            }
        }
	}

	function open_step_on_list( $step_id, $step_type ) {
		$this->step_to_open_id   = $step_id;
		$this->step_to_open_type = $step_type;
	}

    function get_view( $entity = null ) {
        utils( 'xmlserializer' );
        $entity = simplexml_load_string($entity->pwp_data);
		
        $issue = ( $entity == null ? '' : $entity->issue );
		$issueclassification = ( $entity == null ? 0 : $entity->issueclassification );
        $cause = ( $entity == null ? '' : $entity->cause );
		$causeclassification = ( $entity == null ? 0 : $entity->causeclassification );
        $consequences = ( $entity == null ? '' : $entity->consequences );
		$consequenceclassification = ( $entity == null ? 0 : $entity->consequenceclassification );
        $mitigation = ( $entity == null ? '' : $entity->mitigation );
		$mitigationclassification = ( $entity == null ? 0 : $entity->mitigationclassification );
		$likelihood = ( $entity == null ? '' : $entity->likelihood );
        $safety = ( $entity == null ? '' : $entity->severitysafety );
		$reputation = ( $entity == null ? '' : $entity->severityreputation );
		$performances = ( $entity == null ? '' : $entity->severityperformances );
		$finacial = ( $entity == null ? '' : $entity->severityfinacial );
		$environmental = ( $entity == null ? '' : $entity->severityenvironmental );

        $risk = $this->calculate_risk(
            $likelihood->__toString(),
            $safety->__toString(),
            $reputation->__toString(),
            $performances->__toString(),
            $finacial->__toString(),
            $environmental->__toString()
        );

        $steplinks = array();
        $steplinks[] = ( $entity == null ? '' : $entity->steplink0 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink1 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink2 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink3 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink4 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink5 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink6 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink7 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink8 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink9 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink0 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink1 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink2 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink3 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink4 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink5 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink6 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink7 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink8 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink9 );

		$stp_dao = dao_exp( 'operations', 'StepDao' );
        $out = 'Operations / Assets<br/><ul>';

        foreach( $steplinks as $step_id ) {
            $numeric_step_id = $step_id->__toString();

			$stepnames = array();
            if( is_numeric( $numeric_step_id ) AND $numeric_step_id > 0 ) {
            	$step = $stp_dao->getOneByFields( array( 'stp_id' => $numeric_step_id ) );
            	$stepnames[] = $step->stp_name;
            	while ( $step->stp_parentid != 0 ) {
                	$step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
                	$stepnames[] = $step->stp_name;
            	}

            	$order_names = array_reverse( $stepnames );
            	$stepname = implode( ' > ', $order_names );

                $out .= '<li>' . $stepname . '</li>';
            }

        }

        $out .= '</ul><br />';

        $out .= '<b>Issue: '.$issue.'</b> ('.$this->get_descriptive_classification( $issueclassification ).')<br /><br />
        Cause: '.$cause.' ('.$this->get_descriptive_classification( $causeclassification ).')<br /><br />
        Consequences: '.$consequences.' ('.$this->get_descriptive_classification( $consequenceclassification ).')<br /><br />
        Suggested mitigation: '.$mitigation.' ('.$this->get_descriptive_classification( $mitigationclassification ).')<br /><br />
        Risk: '.$this->get_descriptive_risk($risk).'<br /><br />';

        return $out;
    }

    function get_short_view( $entity = null ) {
        utils( 'xmlserializer' );
        $entity = simplexml_load_string($entity->pwp_data);
		
        $issue = ( $entity == null ? '' : $entity->issue );
		$issueclassification = ( $entity == null ? 0 : $entity->issueclassification );
        $cause = ( $entity == null ? '' : $entity->cause );
		$causeclassification = ( $entity == null ? 0 : $entity->causeclassification );
        $consequences = ( $entity == null ? '' : $entity->consequences );
		$consequenceclassification = ( $entity == null ? 0 : $entity->consequenceclassification );
        $mitigation = ( $entity == null ? '' : $entity->mitigation );
		$mitigationclassification = ( $entity == null ? 0 : $entity->mitigationclassification );
		$likelihood = ( $entity == null ? '' : $entity->likelihood );
        $safety = ( $entity == null ? '' : $entity->severitysafety );
		$reputation = ( $entity == null ? '' : $entity->severityreputation );
		$performances = ( $entity == null ? '' : $entity->severityperformances );
		$finacial = ( $entity == null ? '' : $entity->severityfinacial );
		$environmental = ( $entity == null ? '' : $entity->severityenvironmental );

        $risk = $this->calculate_risk(
            $likelihood->__toString(),
            $safety->__toString(),
            $reputation->__toString(),
            $performances->__toString(),
            $finacial->__toString(),
            $environmental->__toString()
        );

        $steplinks = array();
        $steplinks[] = ( $entity == null ? '' : $entity->steplink0 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink1 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink2 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink3 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink4 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink5 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink6 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink7 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink8 );
        $steplinks[] = ( $entity == null ? '' : $entity->steplink9 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink0 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink1 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink2 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink3 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink4 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink5 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink6 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink7 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink8 );
        $steplinks[] = ( $entity == null ? '' : $entity->assetlink9 );

		$stp_dao = dao_exp( 'operations', 'StepDao' );
        $out = 'Operations / Assets<br/><ul>';

        foreach( $steplinks as $step_id ) {
            $numeric_step_id = $step_id->__toString();

			$stepnames = array();
            if( is_numeric( $numeric_step_id ) AND $numeric_step_id > 0 ) {
            	$step = $stp_dao->getOneByFields( array( 'stp_id' => $numeric_step_id ) );
            	$stepnames[] = $step->stp_name;
            	while ( $step->stp_parentid != 0 ) {
                	$step = $stp_dao->getOneByFields( array( 'stp_id' => $step->stp_parentid ) );
                	$stepnames[] = $step->stp_name;
            	}

            	$order_names = array_reverse( $stepnames );
            	$stepname = implode( ' > ', $order_names );

                $out .= '<li>' . $stepname . '</li>';
            }

        }

        $out .= '</ul><br />';

        $out .= '<b>Issue: '.$issue.'</b> ('.$this->get_descriptive_classification( $issueclassification ).')<br /><br />
        Risk: '.$this->get_descriptive_risk($risk).'<br /><br />';

        return $out;
    }

    function get_table_column_names() {
    	$out = '<th>id</th>
				<th>Issue</th>
				<th>Risk</th>
				<th>State</th>
				<th>Owner</th>';
		return $out;
    }

    function get_table_column_row( $entity ) {
    	utils( 'xmlserializer' );
        $entitydata = simplexml_load_string($entity->pwp_data);

        $risk = $this->calculate_risk(
            $entitydata->likelihood->__toString(),
            $entitydata->severitysafety->__toString(),
            $entitydata->severityreputation->__toString(),
            $entitydata->severityperformances->__toString(),
            $entitydata->severityfinacial->__toString(),
            $entitydata->severityenvironmental->__toString()
        );

        $flow_obj = paperflow( get_paperflow_class_path( $entity->pwp_flowslug ), get_paperflow_class_name( $entity->pwp_flowslug ) );

        $owner_string = '';
        if ( $entity->pwp_owner != 0 ) {
        	$owner_string = $entity->ownername.' '.$entity->ownersurname;
        }

    	$out = '<th>'.$entity->pwp_id.'</th>
				<th>'.truncate_string( $entitydata->issue, 40 ).' ('.$this->get_descriptive_classification( $entitydata->issueclassification ).')</th>
				<th>'.$this->get_descriptive_risk( $risk ).'</th>
				<th>'.$flow_obj->get_status( $entity->pwp_status ).'</th>
				<th>'.$owner_string.'</th>';
		return $out;
    }

    /**
     * Return a descriptive string for a given likelihood.
     * Only for intenal usage
     *
     * @param $likelihood
     * @return string
     */
    private function get_descriptive_likelihood( $likelihood ) {
        switch ( $likelihood ) {
            case 1: $out = 'Very rare (once every 10 years)'; break;
            case 2: $out = 'Rare (once every 3 years)'; break;
            case 3: $out = 'Occasional (once per year)'; break;
            case 4: $out = 'Probable (more than once per year)'; break;
            case 5: $out = 'Frequent (once per month or more)'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }
	
    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $category
     * @return string
     */
    function get_descriptive_classification( $classification ) {
        switch ( $classification ) {
            case 1: $out = 'LL'; break;
            case 2: $out = 'LS'; break;
            case 3: $out = 'LH'; break;
            case 4: $out = 'LE'; break;
			case 5: $out = 'OHS'; break;
			case 6: $out = 'Q'; break;
			case 7: $out = 'P'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }

    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $severity
     * @return string
     */
    function get_descriptive_severity_environmental( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Low no impact'; break;
            case 2: $out = 'Medium impact'; break;
            case 3: $out = 'High impact'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }
	
    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $severity
     * @return string
     */
    private function get_descriptive_severity_financial( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Low no impact'; break;
            case 2: $out = 'Medium impact'; break;
            case 3: $out = 'High impact'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }
	
    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $severity
     * @return string
     */
    private function get_descriptive_severity_performances( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Low no impact'; break;
            case 2: $out = 'Medium impact'; break;
            case 3: $out = 'High impact'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }
	
    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $severity
     * @return string
     */
    private function get_descriptive_severity_reputation( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Low no impact'; break;
            case 2: $out = 'Medium impact'; break;
            case 3: $out = 'High impact'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }
	
    /**
     * Return a descriptive string for severity.
     * Only for internal usage.
     *
     * @param $severity
     * @return string
     */
    private function get_descriptive_severity_safety( $severity ) {
        switch ( $severity ) {
            case 1: $out = 'Distress'; break;
            case 2: $out = 'Injuries'; break;
            case 3: $out = 'Serious injuries recoverable'; break;
			case 4: $out = 'Permanent damage to health'; break;
			case 5: $out = 'Death, lethal effects'; break;
            default: $out = 'Undefined'; break;
        }
        return $out;
    }

    /**
     * Return a descriptive risk for this document.
     * Only for interna usage.
     *
     * @param $risk
     * @return string
     */
    private function get_descriptive_risk( $risk ) {
        if ( $risk == 0 ) {
            $out = '<span>Not evaluated</span>';
        } else if ( in_array( $risk, array( 1, 2, 3, 4, 6, 7, 11 ) ) ) {
            $out = '<span style="color:green;">Acceptable</span>';
        } else if ( in_array( $risk, array( 5, 8, 9, 10, 12, 13, 14, 16, 17, 18, 21, 22 ) ) ) {
            $out = '<span style="color:orange;">Tolerable</span>';
        } else {
            $out = '<span style="color:red;">Intolerable</span>';
        }
        return $out;
    }

    private function calculate_risk($likelihood, $saf, $rep, $per, $fin, $env) {
        if (!is_numeric($likelihood)) $likelihood = 0;
        if (!is_numeric($saf)) $saf = 0;
        if (!is_numeric($rep)) $rep = 0;
        if (!is_numeric($per)) $per = 0;
        if (!is_numeric($fin)) $fin = 0;
        if (!is_numeric($env)) $env = 0;
        return $likelihood * max($saf, $rep, $per, $fin, $env);
    }

}
