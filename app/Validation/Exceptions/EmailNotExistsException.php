<?php
namespace Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class EmailNotExistsException extends ValidationException {
	const STANDARD = 0;
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'L\'email existe déjà',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'L\'email existe déjà',
        ],
    ];
}

