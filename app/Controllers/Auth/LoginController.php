<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Core\Container;
use Core\Request;
use Core\Response;
use Delight\Auth\AttemptCancelledException;
use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;

class LoginController extends Controller
{

    public function __construct(public Container $container)
    {
    }

    /**
     * @throws InvalidEmailException
     * @throws TooManyRequestsException
     * @throws AuthError
     * @throws AttemptCancelledException
     * @throws InvalidPasswordException
     * @throws EmailNotVerifiedException
     */
    public function login(Request $request)
    {
        /** @var Auth $auth */
        $auth = $this->container->make('auth');
        $auth->login(
            $request->body['email'],
            $request->body['password']
        );

        return Response::redirect('/');
    }
}