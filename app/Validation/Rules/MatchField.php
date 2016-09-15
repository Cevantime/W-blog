<?php 
namespace Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class MatchField extends AbstractRule
{
	public $field;
	public function __construct($field) {
		$this->field = $field;
	}
    public function validate($passwordconfirm)
    {
		return $passwordconfirm === $_POST[$this->field];
    }
}
