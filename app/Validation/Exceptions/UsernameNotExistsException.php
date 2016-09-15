<?php
namespace Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class UsernameNotExistsException extends ValidationException {
	const STANDARD = 0;
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Le nom d\'utilisateur existe déjà',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Le nom d\'utilisateur existe déjà',
        ],
    ];
}

