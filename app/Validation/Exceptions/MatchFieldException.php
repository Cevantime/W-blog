<?php
namespace Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class MatchFieldException extends ValidationException {
	const STANDARD = 0;
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'La valeur contenue dans le champs {{name}} doit être égale à celle du champs {{field}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'La valeur contenue dans le champs {{name}} doit être égale à celle du champs {{field}',
        ],
    ];
}

