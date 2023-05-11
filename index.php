<?php
require_once 'config.php';
require_once 'libs/database.php';
require_once 'libs/messages.php';

require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';

require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/errors.php';
require_once 'classes/success.php';

include_once 'models/usermodel.php';

$app = new App();