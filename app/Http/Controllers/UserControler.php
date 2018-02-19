<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Tog\Credit_card\Service\CreditCardCreator;
use Tog\User\Service\Login;
use Tog\User\Service\Register;

/**
 * Class UserControler
 *
 * @package App\Http\Controllers
 */
class UserControler extends Controller
{
    /**
     * @var \Tog\User\Service\Register
     */
    protected $register;

    /**
     * @var \Tog\User\Service\Login $login
     */
    protected $login;

    /**
     * @var
     */
    protected $creditCard;

    /**
     * UserControler constructor.
     *
     * @param \Tog\User\Service\Register                 $register
     * @param \Tog\User\Service\Login                    $login
     * @param \Tog\Credit_card\Service\CreditCardCreator $creditCard
     */
    public function __construct(Register $register, Login $login, CreditCardCreator $creditCard)
    {
        $this->register = $register;
        $this->login = $login;
        $this->creditCard = $creditCard;
    }

    /**
     * @param \App\Http\Requests\RegisterRequest $request
     * @return mixed
     */
    public function actionRegister(RegisterRequest $request)
    {
        return response()->json($this->register->handle($request->all()));
    }

    /**
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Tog\User\User
     */
    public function actionLogin(LoginRequest $request)
    {
        return response()->json($this->login->handle($request->all()));
    }
}
