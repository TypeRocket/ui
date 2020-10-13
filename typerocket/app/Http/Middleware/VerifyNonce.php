<?php
namespace TR_UI\Http\Middleware;

use \TypeRocket\Http\Middleware\BaseVerify;

/**
 * Class ValidateNonce
 *
 * Validate WP Nonce
 */
class VerifyNonce extends BaseVerify  {

    public $except = [];

}