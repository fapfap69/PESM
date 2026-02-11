<?php
/**
 * PESM - Execution Result
 */

namespace PESM\Runtime;

class Result {
    public function __construct(
        public string $status,
        public array $variables = [],
        public ?string $message = null,
        public ?string $action = null,
        public ?string $error = null,
        public $actionData = null,
        public ?int $resumeFrom = null,
        public ?array $state = null,
        public bool $expectsReturn = false,
        public ?string $targetVar = null
    ) {}
    
    public function toArray(): array {
        return [
            'status' => $this->status,
            'variables' => $this->variables,
            'message' => $this->message,
            'action' => $this->action,
            'error' => $this->error,
            'actionData' => $this->actionData,
            'resumeFrom' => $this->resumeFrom,
            'state' => $this->state,
            'expectsReturn' => $this->expectsReturn,
            'targetVar' => $this->targetVar
        ];
    }
}
