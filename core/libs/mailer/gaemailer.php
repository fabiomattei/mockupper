<?php 

/* ==============================================================
 * This object has been created to adapt the framework to 
 * Google App Engine environment
 * The object has just a method that send an email.
 * ============================================================== */

use \google\appengine\api\mail\Message;

class GaeMailer {
	
	function send($dest_email, $object, $messagebody) { 		

		try {
			$message = new Message();
			$message->setSender("cihscenter@gmail.com");
			$message->addTo( $dest_email );
			$message->setSubject( $object );
			$message->setTextBody( $messagebody );
			$message->send();
		} catch (InvalidArgumentException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}

	}
	
} 
