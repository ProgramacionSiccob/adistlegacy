<?php


namespace Siccob\shared\domain\criteria;


final class Criteria
{
    private $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public static function create(array $filters): self
    {
        return new self($filters);
    }

    public function filters(): array
    {
        return $this->filters;
    }
}