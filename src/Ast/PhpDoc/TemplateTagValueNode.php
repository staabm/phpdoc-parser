<?php declare(strict_types = 1);

namespace PHPStan\PhpDocParser\Ast\PhpDoc;

use PHPStan\PhpDocParser\Ast\NodeAttributes;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use function trim;

class TemplateTagValueNode implements PhpDocTagValueNode
{

	use NodeAttributes;

	/** @var non-empty-string */
	public string $name;

	public ?TypeNode $bound = null;

	public ?TypeNode $default = null;

	/** @var string (may be empty) */
	public string $description;

	/**
	 * @param non-empty-string $name
	 */
	public function __construct(string $name, ?TypeNode $bound, string $description, ?TypeNode $default = null)
	{
		$this->name = $name;
		$this->bound = $bound;
		$this->default = $default;
		$this->description = $description;
	}


	public function __toString(): string
	{
		$bound = $this->bound !== null ? " of {$this->bound}" : '';
		$default = $this->default !== null ? " = {$this->default}" : '';
		return trim("{$this->name}{$bound}{$default} {$this->description}");
	}

}
