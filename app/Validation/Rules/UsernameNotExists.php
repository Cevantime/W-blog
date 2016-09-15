<?php 
namespace Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use W\Model\UsersModel;

class UsernameNotExists extends AbstractRule
{
    public function validate($username)
    {
        $userModel = new UsersModel();
		return !$userModel->usernameExists($username);
    }
}
