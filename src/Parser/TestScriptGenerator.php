<?php

namespace PESM\Parser;

/**
 * Generates comprehensive test scripts from PEG grammar
 */
class TestScriptGenerator
{
    private string $grammarPath;
    private array $keywords = [];
    private string $commentSyntax = '//';
    
    public function __construct(string $grammarPath)
    {
        $this->grammarPath = $grammarPath;
        $this->analyzeGrammar();
    }
    
    private function analyzeGrammar(): void
    {
        $content = file_get_contents($this->grammarPath);
        
        // Extract keywords
        if (preg_match('/Keyword:\s*\((.*?)\)/s', $content, $matches)) {
            $keywordStr = $matches[1];
            preg_match_all('/"([^"]+)"/', $keywordStr, $kwMatches);
            $this->keywords = $kwMatches[1];
        }
        
        // Detect comment syntax
        if (preg_match('/Comment:\s*[\'"]([^\'"]+)[\'"]/', $content, $matches)) {
            $this->commentSyntax = $matches[1];
        } elseif (strpos($content, "Comment: '//'") !== false) {
            $this->commentSyntax = '//';
        } elseif (strpos($content, 'Comment: "#"') !== false) {
            $this->commentSyntax = '#';
        }
    }
    
    public function generate(): string
    {
        $script = [];
        $script[] = $this->commentSyntax . ' ' . str_repeat('═', 60);
        $script[] = $this->commentSyntax . ' Comprehensive Language Test';
        $script[] = $this->commentSyntax . ' Auto-generated from grammar';
        $script[] = $this->commentSyntax . ' ' . str_repeat('═', 60);
        $script[] = '';
        
        // Detect language features
        $hasStruct = $this->hasKeyword('STRUCT');
        $hasFunction = $this->hasKeyword('FUNCTION') || $this->hasKeyword('DEF');
        $hasIf = $this->hasKeyword('IF');
        $hasWhile = $this->hasKeyword('WHILE');
        $hasFor = $this->hasKeyword('FOR');
        $hasForeach = $this->hasKeyword('FOREACH');
        $hasSwitch = $this->hasKeyword('SWITCH');
        $hasMessage = $this->hasKeyword('MESSAGE') || $this->hasKeyword('PRINT');
        $hasInput = $this->hasKeyword('INPUT');
        $hasGoto = $this->hasKeyword('GOTO');
        
        // Generate sections based on features
        if ($hasStruct) {
            $script = array_merge($script, $this->generateStructSection());
        }
        
        if ($hasFunction) {
            $script = array_merge($script, $this->generateFunctionSection());
        }
        
        $script = array_merge($script, $this->generateVariableSection());
        
        if ($hasIf) {
            $script = array_merge($script, $this->generateIfSection());
        }
        
        if ($hasSwitch) {
            $script = array_merge($script, $this->generateSwitchSection());
        }
        
        if ($hasWhile) {
            $script = array_merge($script, $this->generateWhileSection());
        }
        
        if ($hasFor) {
            $script = array_merge($script, $this->generateForSection());
        }
        
        if ($hasForeach) {
            $script = array_merge($script, $this->generateForeachSection());
        }
        
        if ($hasGoto) {
            $script = array_merge($script, $this->generateGotoSection());
        }
        
        if ($hasMessage || $hasInput) {
            $script = array_merge($script, $this->generateInterruptSection());
        }
        
        $script = array_merge($script, $this->generateSummarySection());
        
        return implode("\n", $script);
    }
    
    private function hasKeyword(string $keyword): bool
    {
        return in_array($keyword, $this->keywords);
    }
    
    private function section(string $title): array
    {
        return [
            '',
            $this->commentSyntax . ' ' . str_repeat('─', 60),
            $this->commentSyntax . ' ' . $title,
            $this->commentSyntax . ' ' . str_repeat('─', 60),
        ];
    }
    
    private function generateStructSection(): array
    {
        $lines = $this->section('STRUCT Definitions');
        $lines[] = 'STRUCT Point x y';
        $lines[] = 'END';
        $lines[] = '';
        $lines[] = 'STRUCT Person name age';
        $lines[] = 'END';
        $lines[] = '';
        $lines[] = $this->commentSyntax . ' Create instances';
        $lines[] = 'point = MAKE Point(10, 20)';
        $lines[] = 'person = MAKE Person(name: "Alice", age: 30)';
        return $lines;
    }
    
    private function generateFunctionSection(): array
    {
        $lines = $this->section('Functions');
        
        if ($this->hasKeyword('FUNCTION')) {
            $lines[] = 'FUNCTION add(a, b)';
            $lines[] = '    result = a + b';
            $lines[] = '    RETURN result';
            $lines[] = 'END';
        } elseif ($this->hasKeyword('DEF')) {
            $lines[] = 'DEF add(a, b)';
            $lines[] = '    result = a + b';
            $lines[] = '    RETURN result';
            $lines[] = 'END';
        }
        
        $lines[] = '';
        $lines[] = $this->commentSyntax . ' Call function';
        $lines[] = 'sum = add(10, 20)';
        return $lines;
    }
    
    private function generateVariableSection(): array
    {
        $lines = $this->section('Variables and Expressions');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $this->commentSyntax . ' Basic variables';
        $lines[] = $assign . 'x = 10';
        $lines[] = $assign . 'y = 20';
        $lines[] = $assign . 'name = "Test"';
        $lines[] = '';
        $lines[] = $this->commentSyntax . ' Arithmetic';
        $lines[] = $assign . 'sum = x + y';
        $lines[] = $assign . 'product = x * y';
        $lines[] = '';
        $lines[] = $this->commentSyntax . ' Arrays';
        $lines[] = $assign . 'numbers = [1, 2, 3, 4, 5]';
        $lines[] = $assign . 'first = numbers[0]';
        
        return $lines;
    }
    
    private function generateIfSection(): array
    {
        $lines = $this->section('Conditional Statements');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        $then = $this->hasKeyword('THEN') ? ' THEN' : '';
        
        $lines[] = $assign . 'value = 15';
        $lines[] = 'IF value > 10' . $then;
        $lines[] = '    status = "high"';
        
        if ($this->hasKeyword('ELSE')) {
            $lines[] = 'ELSE';
            $lines[] = '    status = "low"';
        }
        
        $lines[] = 'END';
        
        return $lines;
    }
    
    private function generateSwitchSection(): array
    {
        $lines = $this->section('Switch Statement');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $assign . 'choice = 2';
        $lines[] = 'SWITCH choice';
        $lines[] = '    CASE 1';
        $lines[] = '        result = "one"';
        $lines[] = '    CASE 2';
        $lines[] = '        result = "two"';
        
        if ($this->hasKeyword('DEFAULT')) {
            $lines[] = '    DEFAULT';
            $lines[] = '        result = "other"';
        }
        
        $lines[] = 'END';
        
        return $lines;
    }
    
    private function generateWhileSection(): array
    {
        $lines = $this->section('While Loop');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $assign . 'counter = 0';
        $lines[] = 'WHILE counter < 5';
        $lines[] = '    counter = counter + 1';
        $lines[] = 'END';
        
        return $lines;
    }
    
    private function generateForSection(): array
    {
        $lines = $this->section('For Loop');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $assign . 'total = 0';
        $lines[] = 'FOR i = 1 TO 10';
        $lines[] = '    total = total + i';
        $lines[] = $this->hasKeyword('NEXT') ? 'NEXT' : 'END';
        
        return $lines;
    }
    
    private function generateForeachSection(): array
    {
        $lines = $this->section('Foreach Loop');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $assign . 'items = [10, 20, 30]';
        $lines[] = $assign . 'sum = 0';
        $lines[] = 'FOREACH item IN items';
        $lines[] = '    sum = sum + item';
        $lines[] = 'END';
        
        return $lines;
    }
    
    private function generateGotoSection(): array
    {
        $lines = $this->section('GOTO and Labels');
        
        $assign = $this->hasKeyword('LET') ? 'LET ' : '';
        
        $lines[] = $assign . 'test = 1';
        $lines[] = 'GOTO skip';
        $lines[] = $assign . 'test = 999';
        $lines[] = 'skip:';
        $lines[] = $assign . 'test = test + 10';
        
        return $lines;
    }
    
    private function generateInterruptSection(): array
    {
        $lines = $this->section('Interrupts');
        
        if ($this->hasKeyword('MESSAGE')) {
            $lines[] = 'MESSAGE "Test completed successfully"';
        } elseif ($this->hasKeyword('PRINT')) {
            $lines[] = 'PRINT "Test completed successfully"';
        }
        
        if ($this->hasKeyword('INPUT')) {
            $lines[] = 'INPUT "Enter value: " userInput';
        }
        
        return $lines;
    }
    
    private function generateSummarySection(): array
    {
        $lines = $this->section('Summary');
        
        if ($this->hasKeyword('MESSAGE')) {
            $lines[] = 'MESSAGE "All tests completed"';
        } elseif ($this->hasKeyword('PRINT')) {
            $lines[] = 'PRINT "All tests completed"';
        }
        
        return $lines;
    }
}
