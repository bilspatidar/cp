<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '684384852038-h064prglin8mnlknkr5jck9q95h3mdnc.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'https://tcc.sparkhub.in/web/checkauth';
$config['google']['application_name'] = 'The Cosmic Connect';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();