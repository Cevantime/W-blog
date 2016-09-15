<?php 
namespace Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use W\Model\UsersModel;

class UsernameOrEmailExists extends AbstractRule
{
    public function validate($usernameOrEmail)
    {
        $userModel = new UsersModel();
		
		return $userModel->emailExists($username) || $userModel->usernameExists($username);
    }
}
