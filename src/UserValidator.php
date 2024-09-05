<?php declare(strict_types=1);

/**
 *Class UserValidator
 *
 * This class provides methods to validate user input, such as email addresses and passwords.
 * It ensures that email addresses are correctly formatted and that passwords meet certain security criteria.
 *
 * Methods:
 * - validateEmail(string $email): bool — Validates the format of an email address.
 * - validatePassword(string $password): bool — Validates a password based on length and character requirements.
 */
class UserValidator
{
    private const PASSWORD_MIN_LENGTH = 8;
    private const UPPERCASE_PATTERN = '/[A-Z]/';
    private const LOWERCASE_PATTERN = '/[a-z]/';
    private const DIGIT_PATTERN = '/[0-9]/';
    private const SPECIAL_CHAR_PATTERN = '/[!@#$%^&*(),.?":{}|<>]/';

    /**
     * Validates an email address based on specific criteria.
     * The email must start with at least one letter, contain an '@' symbol,
     * and have a domain with a dot (.) followed by at least two letters.
     *
     * @param string $email
     * @return bool
     */
    public function validateEmail(string $email): bool
    {
        $regex = '/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($regex, $email) === 1;
    }

    /**
     *  Validates a password based on specific criteria:
     * - at least 8 characters long.
     * - at least one uppercase letter.
     * - at least one lowercase letter.
     * - at least one digit.
     * - at least one special character.
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        return strlen($password) >= self::PASSWORD_MIN_LENGTH &&
            preg_match(self::UPPERCASE_PATTERN, $password) &&
            preg_match(self::LOWERCASE_PATTERN, $password) &&
            preg_match(self::DIGIT_PATTERN, $password) &&
            preg_match(self::SPECIAL_CHAR_PATTERN, $password);
    }
}
