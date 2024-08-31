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
use Delight\Auth\Role;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UnknownIdException;

class RegisterController extends Controller
{

    public function __construct(public Container $container)
    {
    }

    /**
     * @throws \Exception
     */
    public function view(Request $request): bool|string
    {
        return view('dashboard/register.view');
    }

    /**
     * @throws InvalidEmailException
     * @throws TooManyRequestsException
     * @throws AuthError
     * @throws AttemptCancelledException
     * @throws InvalidPasswordException
     * @throws EmailNotVerifiedException
     * @throws UnknownIdException
     */
    public function register(Request $request): bool
    {
        /** @var Auth $auth */
        $auth = $this->container->make('auth');
        $userId = $auth->register(
            $request->body['email'],
            $request->body['password']
        );
        $auth->admin()->addRoleForUserById($userId, Role::CONSUMER);

        return Response::redirect('/profile');
    }
}