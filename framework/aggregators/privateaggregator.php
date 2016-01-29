<?php

class PrivateAggregator {

    public function __construct() {
        session_start();

        // setting an array containing all parameters
        $this->parameters = array();

        // messages block loaded by default from all pages
        block('template', 'message/messages');
        $this->messages = new Messages();

        $this->title = APPNAMEFORPAGETITLE;
        $this->menucontainer = array();
        $this->topcontainer = array();
        $this->messagescontainer = array($this->messages);
        $this->leftcontainer = array();
        $this->rightcontainer = array();
        $this->centralcontainer = array();
        $this->secondcentralcontainer = array();
        $this->thirdcentralcontainer = array();
        $this->bottomcontainer = array();
        $this->sidebarcontainer = array();
        $this->templateFile = PRIVATETEMPLATE;

        $this->addToHead = '';
        $this->addToFoot = '';

        $this->loadlinks();

        if (isset($_SESSION['msginfo'])) {
            $this->messages->info = $_SESSION['msginfo'];
            unset($_SESSION['msginfo']);
        }
        if (isset($_SESSION['msgwarning'])) {
            $this->messages->warning = $_SESSION['msgwarning'];
            unset($_SESSION['msgwarning']);
        }
        if (isset($_SESSION['msgerror'])) {
            $this->messages->error = $_SESSION['msgerror'];
            unset($_SESSION['msgerror']);
        }
        if (isset($_SESSION['msgsuccess'])) {
            $this->messages->success = $_SESSION['msgsuccess'];
            unset($_SESSION['msgsuccess']);
        }

        if (!$this->isSessionValid()) {
            header('Location: ' . BASEPATH . 'public/login.html');
            die();
        }
    }

    public function isGetRequest() {
        return $_SERVER["REQUEST_METHOD"] == "GET";
    }

    public function isPostRequest() {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }

    /**
     * Method to override (eventually)
     */
    public function getRequest() {
        echo 'not implemented yet';
    }

    /**
     * Method to override (eventually)
     */
    public function postRequest() {
        echo 'not implemented yet';
    }

    public function showPage() {
        $time_start = microtime(true);
        if ($this->isGetRequest()) {
            $this->getRequest();
        } else {
            $this->postRequest();
        }

        $this->loadTemplate();

        $time_end = microtime(true);
        if (($time_end - $time_start) > 5) {
            $logger = new Logger();
            $logger->write('WARNING TIME :: ' . $_SERVER["REQUEST_METHOD"] . ' ' . $_SERVER['PHP_SELF'] . ' ' . ($time_end - $time_start) . ' sec', __FILE__, __LINE__);
        }
    }

    private function isSessionValid() {
        // check if user logged in
        if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
            return false;
        }

        // check if ip matches
        if (!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
            return false;
        }
        if (!$_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
            return false;
        }

        // check user agent
        if (!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }
        if (!$_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
            return false;
        }

        // check elapsed time
        $max_elapsed = 60 * 60 * 24; // 1 day
        // return false if value is not set
        if (!isset($_SESSION['last_login'])) {
            return false;
        }
        if (!($_SESSION['last_login'] + $max_elapsed) >= time()) {
            return false;
        }

        return true;
    }

    // ** next section load textual messages for messages block
    function setSuccess($success) {
        $this->messages->setSuccess($success);
    }

    function setError($error) {
        $this->messages->setError($error);
    }

    function setInfo($info) {
        $this->messages->setInfo($info);
    }

    function setWarning($warning) {
        $this->messages->setWarning($warning);
    }

    /*     * * functions for setting parameters array */

    public function setParameters($parameters) {
        if (is_array($parameters)) {
            $this->parameters = $parameters;
        }
    }

    /**
     * Saving the request made to webserver
     * It saves the STRING in $_SESSION['request'] variable and moves the previous request
     * to STRING $_SESSION['prevrequest']
     *
     * @param $request STRING containing URL complete of parameters
     */
    public function setRequest($request) {
        $this->request = $request;
        $_SESSION['prevprevrequest'] = ( isset($_SESSION['prevrequest']) ? $_SESSION['prevrequest'] : '' );
        $_SESSION['prevrequest'] = ( isset($_SESSION['request']) ? $_SESSION['request'] : '' );
        $_SESSION['request'] = $request;
    }

    /**
     * Redirect the script to $_SESSION['prevrequest'] with a header request
     * It send flash messages to new controller [info, warning, error, success]
     */
    public function redirectToPreviousPage() {
        if ($this->messages->info != '')
            $_SESSION['msginfo'] = $this->messages->info;
        if ($this->messages->warning != '')
            $_SESSION['msgwarning'] = $this->messages->warning;
        if ($this->messages->error != '')
            $_SESSION['msgerror'] = $this->messages->error;
        if ($this->messages->success != '')
            $_SESSION['msgsuccess'] = $this->messages->success;
        header('Location: ' . BASEPATH . $_SESSION['prevrequest']);
    }

    /**
     * Redirect the script to $_SESSION['prevprevrequest'] with a header request
     * It send flash messages to new controller [info, warning, error, success]
     */
    public function redirectToSecondPreviousPage() {
        if ($this->messages->info != '')
            $_SESSION['msginfo'] = $this->messages->info;
        if ($this->messages->warning != '')
            $_SESSION['msgwarning'] = $this->messages->warning;
        if ($this->messages->error != '')
            $_SESSION['msgerror'] = $this->messages->error;
        if ($this->messages->success != '')
            $_SESSION['msgsuccess'] = $this->messages->success;
        header('Location: ' . BASEPATH . $_SESSION['prevprevrequest']);
    }

    /**
     * Redirect the script to a selected page
     * it creates the url using the library function make_url form loaders.php
     * It send flash messages to new controller [info, warning, error, success]
     */
    public function redirectToPage($group = 'main', $action = '', $parameters = '', $extension = '.html') {
        if ($this->messages->info != '')
            $_SESSION['msginfo'] = $this->messages->info;
        if ($this->messages->warning != '')
            $_SESSION['msgwarning'] = $this->messages->warning;
        if ($this->messages->error != '')
            $_SESSION['msgerror'] = $this->messages->error;
        if ($this->messages->success != '')
            $_SESSION['msgsuccess'] = $this->messages->success;
        header( 'Location: ' . make_url($group, $action, $parameters, $extension) );
    }

    /**
     * Saving URL controller PATH in the controller
     *
     * @param $family      STRING coming from URL slicing
     * @param $subfamily   STRING coming from URL slicing
     * @param $aggregator  STRING coming from URL slicing
     */
    public function setControllerPath($family, $subfamily, $aggregator) {
        $this->family = $family;
        $this->subfamily = $subfamily;
        $this->aggregator = $aggregator;
    }

    // taken from page script
    function loadTemplate() {
        $this->addToHeadAndToFoot($this->menucontainer);
        $this->addToHeadAndToFoot($this->topcontainer);
        $this->addToHeadAndToFoot($this->messagescontainer);
        $this->addToHeadAndToFoot($this->leftcontainer);
        $this->addToHeadAndToFoot($this->centralcontainer);
        $this->addToHeadAndToFoot($this->secondcentralcontainer);
        $this->addToHeadAndToFoot($this->thirdcentralcontainer);
        $this->addToHeadAndToFoot($this->bottomcontainer);

        require_once 'templates/' . $this->templateFile . '.php';
    }

    function addToHeadAndToFoot($container) {
        if (isset($container)) {
            if (gettype($container) == 'array') {
                foreach ($container as $obj) {
                    $this->addToHead .= $obj->addToHead();
                    $this->addToFoot .= $obj->addToFoot();
                }
            }
            if (gettype($container) == 'object') {
                $this->addToHead .= $container->addToHead();
                $this->addToFoot .= $container->addToFoot();
            }
        }
    }

    /**
     * Load links directory from a file
     */
    function loadlinks() {

        if (!isset($_SESSION['office']))
            throw new GeneralException('Office has not been set!!!');

        $filepath = 'controllers/' . $_SESSION['office'] . '/links.php';

        if (file_exists($filepath)) {
            require_once $filepath;
        }
    }

}
