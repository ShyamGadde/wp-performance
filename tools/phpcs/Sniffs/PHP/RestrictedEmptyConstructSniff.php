<?php
/**
 * Sniff to restrict usage of the empty() construct.
 *
 * @package performance
 */

namespace WPPCS\WPP\Sniffs\PHP;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

// phpcs:ignoreFile WordPress.NamingConventions.ValidVariableName -- required by the interface.

/**
 * Restricts usage of empty().
 */
class RestrictedEmptyConstructSniff implements Sniff {

	/**
	 * Registers the tokens that this sniff wants to listen for.
	 */
	public function register(): array {
		return array( \T_EMPTY );
	}

	/**
	 * Processes this sniff, when one of its tokens is encountered.
	 *
	 * @param File $phpcsFile The file being scanned.
	 * @param int  $stackPtr  The position of the current token in the stack.
	 */
	public function process( File $phpcsFile, $stackPtr ): void { // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint -- required by the interface.
		$phpcsFile->addWarning(
			'Usage of empty() can mask code problems. Consider explicit checks instead.',
			$stackPtr,
			'EmptyConstructUsage'
		);
	}
}
