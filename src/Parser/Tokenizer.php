<?php
/**
 * PESM - Tokenizer
 * Converts script text into tokens
 */

namespace PESM\Parser;

class Tokenizer {
    private array $tokens = [];
    private int $position = 0;
    
    public function tokenize(string $script): array {
        $this->tokens = [];
        $this->position = 0;
        
        // Split by lines
        $lines = explode("\n", $script);
        
        foreach ($lines as $lineNum => $line) {
            $line = trim($line);
            
            // Skip empty lines and comments
            if (empty($line) || str_starts_with($line, '//')) {
                continue;
            }
            
            $this->tokens[] = [
                'line' => $lineNum + 1,
                'text' => $line
            ];
        }
        
        return $this->tokens;
    }
}
