<?php

require_once 'presentation/blocks/calendar/calendar.php';

class CalendarTest extends \PHPUnit_Framework_TestCase {
	
	public function test_CalendarWorks() {
	    $block = new Calendar("<p>Try</p>");
		$this->assertContains("Sun", $block->show());
	}
	
}