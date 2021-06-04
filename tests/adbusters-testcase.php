<?php

/**
 * Base unit test class for Adbusters
 */
class Adbusters_TestCase extends WP_UnitTestCase {
	public function setUp() {
		parent::setUp();

		global $adbusters;
		$this->_toc = $adbusters;
	}
}
