<?php

namespace PESM\Parser;

/**
 * GrammarAnalyzer - Extracts metadata from annotated PEG grammar
 */
class GrammarAnalyzer
{
    private string $grammarFile;
    private array $metadata = [];
    
    public function __construct(string $grammarFile)
    {
        $this->grammarFile = $grammarFile;
    }
    
    /**
     * Extract metadata from grammar
     */
    public function analyze(): array
    {
        $content = file_get_contents($this->grammarFile);
        
        // Extract rules with annotations
        preg_match_all(
            '/(?:#node\((.*?)\)\s*\n)?^(\w+):\s*(.+?)(?=\n\n|\n#|\n\w+:|$)/ms',
            $content,
            $matches,
            PREG_SET_ORDER
        );
        
        foreach ($matches as $match) {
            $annotation = $match[1] ?? '';
            $ruleName = $match[2];
            $ruleBody = $match[3];
            
            $this->metadata[$ruleName] = $this->parseRule($ruleName, $ruleBody, $annotation);
        }
        
        return $this->metadata;
    }
    
    /**
     * Parse single rule
     */
    private function parseRule(string $name, string $body, string $annotation): array
    {
        $info = [
            'name' => $name,
            'body' => trim($body),
            'node' => null,
            'type' => 'rule'
        ];
        
        // Parse annotation: #node(NodeClass, args=['a', 'b'])
        if ($annotation) {
            if (preg_match('/^(\w+)(?:,\s*args=\[(.*?)\])?$/', $annotation, $m)) {
                $info['node'] = $m[1];
                $info['args'] = isset($m[2]) ? 
                    array_map('trim', explode(',', str_replace("'", '', $m[2]))) : 
                    [];
            }
        }
        
        // Detect rule type
        if (preg_match('/^\/.*\/$/', trim($body))) {
            $info['type'] = 'regex';
        } elseif (preg_match('/^".*"$/', trim($body))) {
            $info['type'] = 'literal';
        } elseif (strpos($body, '|') !== false) {
            $info['type'] = 'choice';
        } elseif (preg_match('/\+$/', trim($body))) {
            $info['type'] = 'oneOrMore';
        } elseif (preg_match('/\*$/', trim($body))) {
            $info['type'] = 'zeroOrMore';
        }
        
        return $info;
    }
    
    /**
     * Get metadata for specific rule
     */
    public function getRule(string $name): ?array
    {
        return $this->metadata[$name] ?? null;
    }
    
    /**
     * Get all rules with node annotations
     */
    public function getNodeRules(): array
    {
        return array_filter($this->metadata, fn($rule) => $rule['node'] !== null);
    }
}
