<?php

require_once 'core/aggregators/privateaggregator.php';

class Aggregator extends PrivateAggregator {
	
    public function __construct() {
          parent::__construct();
    }
	
	public function getRequest() {
		page('private/organization/survey/answersformpg');

		block('containers/rowcontainer');
		block('answers/answersform');
		block('menu/anmenu');
		
		dao('organizationquestionnairedao');
		dao('questiondao');
		
		$this->title                  = "SAT :: Dashboard";
		$this->menucontainer          = array( new AnMenu() );
		$this->topcontainer           = array();
		$this->leftcontainer          = array();
		$this->centralcontainer       = array( $this->messages, 
		 									   new RowContainer( 'col-xs-12', 'My survey', 
											   new AnswersForm( new OrganizationQuestionnaireDao(), 
											   					new QuestionDao(), $this->orgqueid, $this->xmldata ) ) );
		$this->secondcentralcontainer = array();
		$this->thirdcentralcontainer  = array();
		$this->bottomcontainer        = array();
		$this->templateFile           = 'private';
		
		$page->compose();
	}
	
	public function postRequest() {
		usecase('organization/organizationsavesanswers');
		dao('answerdao');
		$dao = new AnswerDao();
		
		$usecase = new OrganizationSavesAnswers($_POST, $dao, $_SESSION['user_id']);
		$usecase->performAction();
		
		page('private/organization/survey/answersformpg');
		$page = new AnswersFormPg();
		$page->setOrganizationQuestionnaireId($_POST['orgqueid']);

		if (!$usecase->isDataValidated()) {			
			$page->setError($usecase->getReadableErrors());
		} else {
			$page->setSuccess('Questionnaire saved successfully');
		}
		$page->setData($usecase->getXML());
		$page->compose();
	}
	
}

$aggregator = new Aggregator();
$aggregator->showPage();