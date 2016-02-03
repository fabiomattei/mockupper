<?php

require_once 'framework/utils/xmlserializer.php';

class XMLSerializerTest extends \PHPUnit_Framework_TestCase {

	public function test_empty_object() {
		$input = new stdClass;
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><nodes></nodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromObj($input) );
	}

	public function test_empty_object_naming_nodes() {
		$input = new stdClass;
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromObj($input, 'mynodes') );
	}

	public function test_object() {
		$input       = new stdClass;
		$input->id   = 42;
		$input->name = 'hello';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><nodes><id>42</id><name>hello</name></nodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromObj($input) );
	}

	public function test_object_naming_nodes() {
		$input       = new stdClass;
		$input->id   = 42;
		$input->name = 'hello';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes><id>42</id><name>hello</name></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromObj($input, 'mynodes') );
	}	

	// booooo
	public function test_object_naming_nodes_with_node_name() {
		$input        = new stdClass;
		$input->id    = 42;
		$input->{'1'} = 'twelve';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes><id>42</id><tagname>twelve</tagname></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromObj($input, 'mynodes', 'tagname') );
	}	
	
	public function test_empty_array() {
		$input = array();
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><nodes></nodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromArray($input) );
	}

	public function test_empty_array_naming_nodes() {
		$input = array();
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromArray($input, 'mynodes') );
	}

	public function test_array() {
		$input         = array();
		$input['id']   = 42;
		$input['name'] = 'hello';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><nodes><id>42</id><name>hello</name></nodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromArray($input) );
	}

	public function test_array_naming_nodes() {
		$input         = array();
		$input['id']   = 42;
		$input['name'] = 'hello';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes><id>42</id><name>hello</name></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromArray($input, 'mynodes') );
	}

	public function test_array_naming_nodes_with_node_name() {
		$input         = array();
		$input['id']   = 42;
		$input['12']   = 'twelve';
		$exp = '<?xml version="1.0" encoding="UTF-8" ?><mynodes><id>42</id><tagname>twelve</tagname></mynodes>';
		$this->assertSame( $exp, XMLSerializer::generateValidXmlFromArray($input, 'mynodes', 'tagname') );
	}	

}
