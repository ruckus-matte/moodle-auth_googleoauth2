<?php

require_once $CFG->dirroot . '/auth/googleoauth2/vendor/autoload.php';

class provideroauth2ruckus extends League\OAuth2\Client\Provider\Ruckus {

    // THE VALUES YOU WANT TO CHANGE WHEN CREATING A NEW PROVIDER.
    public $sskstyle = 'ruckus';
    public $name = 'ruckus'; // it must be the same as the XXXXX in the class name provideroauth2XXXXX.
    public $readablename = 'Ruckus';
    public $scopes = array('public', 'client', 'developer');

    /**
     * Constructor.
     *
     * @throws Exception
     * @throws dml_exception
     */
    public function __construct() {
        global $CFG;

        parent::__construct([
            'clientId'      => $CFG->ruckus->oauth2_application_id,
            'clientSecret'  => $CFG->ruckus->oauth2_secret,
            'redirectUri'   => $CFG->wwwroot .'/auth/googleoauth2/' . $this->name . '_redirect.php',
            'scopes'        => $this->scopes,
            'domain'        => $CFG->ruckus->oauth2_domain
        ]);
    }

    /**
     * Is the provider enabled.
     *
     * @return bool
     * @throws Exception
     * @throws dml_exception
     */
    public function isenabled() {
        return true;
    }

    /**
     * The html button.
     *
     * @param $authUrl
     * @param $providerdisplaystyle
     * @return string
     * @throws coding_exception
     */
    public function html_button($authUrl, $providerdisplaystyle) {
        return googleoauth2_html_button($authUrl, $providerdisplaystyle, $this);
    }
}
