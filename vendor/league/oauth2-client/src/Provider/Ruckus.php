<?php

namespace League\OAuth2\Client\Provider;

use League\OAuth2\Client\Entity\User;
use League\OAuth2\Client\Token\AccessToken;

class Ruckus extends AbstractProvider
{
  public $domain;
  public $responseType = 'json';

  public function __construct($options = [])
  {
    parent::_construct($option);

    $this->domain = $options['domain'];
  }

  /**
   * Get the URL that this provider uses to begin authorization.
   *
   * @return string
   */
  public function urlAuthorize()
  {
    return $this->domain . '/login';
  }

  /**
   * Get the URL that this provider users to request an access token.
   *
   * @return string
   */
  public function urlAccessToken()
  {
    return $this->domain . '/oauth/token';
  }

  /**
   * Get the URL that this provider uses to request user details.
   *
   * Since this URL is typically an authorized route, most providers will require you to pass the access_token as
   * a parameter to the request. For example, the google url is:
   *
   * 'https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='.$token
   *
   * @param AccessToken $token
   * @return string
   */
  public function urlUserDetails(AccessToken $token)
  {
    return $this->domain . '/api/v1/info?access_token=' . $token;
  }

  /**
   * Given an object response from the server, process the user details into a format expected by the user
   * of the client.
   *
   * @param object $response
   * @param AccessToken $token
   * @return mixed
   */
  public function userDetails($response, AccessToken $token)
  {
    d($response);
  }
}
