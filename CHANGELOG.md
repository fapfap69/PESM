# Changelog

All notable changes to PESM will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2025-02-11

### Added
- Initial release of PESM (PHP Embedded Scripts Manager)
- Bytecode compilation with 2.7-3.6x performance improvement over AST interpretation
- Stack-based Virtual Machine with O(1) resume capability
- Complete control flow: IF/ELSE, WHILE, DO-WHILE, REPEAT-UNTIL, FOREACH, SWITCH/CASE
- Loop control: BREAK, CONTINUE with proper nesting
- User-defined functions with local variables and return values
- STRUCT types for custom data structures
- Arrays, objects, and nested structures with full indexing
- GOTO/Labels support
- Interrupt system: MESSAGE, ACCEPT, REFUSE, INPUT
- 19 built-in functions (String, Math, Array, Type, Utility)
- Custom command registration with COMMAND directive
- Multi-language support via extensible PEG grammar system
- Universal ASTBuilder supporting 29 PESM constructs
- Automatic converter generation for custom grammars
- Zero runtime dependencies (pure PHP 8.0+)
- Comprehensive documentation and examples
- Full test suite

### Features
- **Parser**: PEG-based parser with automatic generation
- **Compiler**: AST to bytecode compilation
- **VM**: Stack-based execution with interrupt/resume
- **Runtime**: Global context, commands registry, result handling
- **Build Tools**: Parser builder, grammar analyzer, converter generator
- **Examples**: Basic usage, web integration, workflow automation, multi-language DSL

[1.0.0]: https://github.com/fap/pesm/releases/tag/v1.0.0
