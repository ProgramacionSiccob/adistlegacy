<?php


namespace Siccob\shared\domain\mailer;


final class Mailer
{

    private $to;
    private $subject;
    private $htmlTemplate;
    private $context;

    public function __construct(
        array  $to ,
        string $subject ,
        string $htmlTemplate ,
        array  $context
    )
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->htmlTemplate = $htmlTemplate;
        $this->context = $context;
    }

    public static function create(): self
    {
        return new self([] , '' , '' , []);
    }

    public function setConfig(array $to , string $subject , string $template , array $context): void
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->htmlTemplate = $template;
        $this->context = $context;
    }

    public function getConfig(): array
    {
        return [
            $this->to ,
            $this->subject ,
            $this->htmlTemplate ,
            $this->context ,
        ];
    }
}