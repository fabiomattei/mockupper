<?php

require_once 'presentation/blocks/feedback/feedback.php';

class FeedbackTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenNoFeedBack_DoesNotReturnAnything() {
	    $block = new Feedback();
		$this->assertSame('', $block->show());
	}
	
	public function test_GivenInfo_ReturnsFeedback() {
	    $block = new Feedback();
		$block->setInfo('My info');
		$this->assertSame('<div class="message info"><p><strong>Info:</strong> My info</p></div>', $block->show());
	}
	
	public function test_GivenWarning_ReturnsFeedback() {
	    $block = new Feedback();
		$block->setWarning('My warning');
		$this->assertSame('<div class="message warning"><p><strong>Warning:</strong> My warning</p></div>', $block->show());
	}
	
	public function test_GivenQuestion_ReturnsFeedback() {
	    $block = new Feedback();
		$block->setQuestion('My question');
		$this->assertSame('<div class="message question"><p><strong>Question:</strong> My question</p></div>', $block->show());
	}
	
	public function test_GivenError_ReturnsFeedback() {
	    $block = new Feedback();
		$block->setError('My error');
		$this->assertSame('<div class="message error"><p><strong>Error:</strong> My error</p></div>', $block->show());
	}

}