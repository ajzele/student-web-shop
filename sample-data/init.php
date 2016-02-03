<?php

/**
 * @todo Study dirname() function and __FILE__
 */

//Load the DB config
require_once dirname(__FILE__) . '/../config.php';

//Execute customer sample data import
require_once dirname(__FILE__).'/customer.php';

require_once dirname(__FILE__).'/category.php';

require_once dirname(__FILE__).'/product.php';

require_once dirname(__FILE__).'/customer_adress.php';