<?php
namespace CLIKE;

class CLIKEParser extends \hafriedlander\Peg\Parser\Packrat {
/* Program: _ stmt:Statement ( _ stmt:Statement )* _ */
protected $match_Program_typestack = ['Program'];
function match_Program($stack = []) {
	$matchrule = 'Program';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_7 = \null;
	do {
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_7 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_7 = \false; break; }
		while (\true) {
			$res_5 = $result;
			$pos_5 = $this->pos;
			$_4 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_4 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_4 = \false; break; }
				$_4 = \true; break;
			}
			while(\false);
			if($_4 === \false) {
				$result = $res_5;
				$this->setPos($pos_5);
				unset($res_5, $pos_5);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_7 = \false; break; }
		$_7 = \true; break;
	}
	while(\false);
	if($_7 === \true) { return $this->finalise($result); }
	if($_7 === \false) { return \false; }
}


/* Statement: alt:IfStatement | alt:WhileStatement | alt:Assignment _ ";" | alt:InterruptSimpleStmt _ ";" */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_28 = \null;
	do {
		$res_9 = $result;
		$pos_9 = $this->pos;
		$key = 'match_'.'IfStatement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_28 = \true; break;
		}
		$result = $res_9;
		$this->setPos($pos_9);
		$_26 = \null;
		do {
			$res_11 = $result;
			$pos_11 = $this->pos;
			$key = 'match_'.'WhileStatement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_26 = \true; break;
			}
			$result = $res_11;
			$this->setPos($pos_11);
			$_24 = \null;
			do {
				$res_13 = $result;
				$pos_13 = $this->pos;
				$_17 = \null;
				do {
					$key = 'match_'.'Assignment'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
					}
					else { $_17 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_17 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ';') {
						$this->addPos(1);
						$result["text"] .= ';';
					}
					else { $_17 = \false; break; }
					$_17 = \true; break;
				}
				while(\false);
				if($_17 === \true) { $_24 = \true; break; }
				$result = $res_13;
				$this->setPos($pos_13);
				$_22 = \null;
				do {
					$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
					}
					else { $_22 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_22 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ';') {
						$this->addPos(1);
						$result["text"] .= ';';
					}
					else { $_22 = \false; break; }
					$_22 = \true; break;
				}
				while(\false);
				if($_22 === \true) { $_24 = \true; break; }
				$result = $res_13;
				$this->setPos($pos_13);
				$_24 = \false; break;
			}
			while(\false);
			if($_24 === \true) { $_26 = \true; break; }
			$result = $res_11;
			$this->setPos($pos_11);
			$_26 = \false; break;
		}
		while(\false);
		if($_26 === \true) { $_28 = \true; break; }
		$result = $res_9;
		$this->setPos($pos_9);
		$_28 = \false; break;
	}
	while(\false);
	if($_28 === \true) { return $this->finalise($result); }
	if($_28 === \false) { return \false; }
}


/* Assignment: var:Postfix _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_35 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_35 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_35 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_35 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_35 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_35 = \false; break; }
		$_35 = \true; break;
	}
	while(\false);
	if($_35 === \true) { return $this->finalise($result); }
	if($_35 === \false) { return \false; }
}


/* IfStatement: "if" _ "(" _ cond:Expression _ ")" _ "{" _ then:Statement ( _ then:Statement )* _ "}" ( _ "else" _ "{" _ else:Statement ( _ else:Statement )* _ "}" )? | "if" _ "(" _ cond:Expression _ ")" _ then:Statement ( _ "else" _ else:Statement )? */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_88 = \null;
	do {
		$res_37 = $result;
		$pos_37 = $this->pos;
		$_69 = \null;
		do {
			if (($subres = $this->literal('if')) !== \false) { $result["text"] .= $subres; }
			else { $_69 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_69 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_69 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_69 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_69 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "then");
			}
			else { $_69 = \false; break; }
			while (\true) {
				$res_52 = $result;
				$pos_52 = $this->pos;
				$_51 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_51 = \false; break; }
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "then");
					}
					else { $_51 = \false; break; }
					$_51 = \true; break;
				}
				while(\false);
				if($_51 === \false) {
					$result = $res_52;
					$this->setPos($pos_52);
					unset($res_52, $pos_52);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_69 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_69 = \false; break; }
			$res_68 = $result;
			$pos_68 = $this->pos;
			$_67 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_67 = \false; break; }
				if (($subres = $this->literal('else')) !== \false) { $result["text"] .= $subres; }
				else { $_67 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_67 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === '{') {
					$this->addPos(1);
					$result["text"] .= '{';
				}
				else { $_67 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_67 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_67 = \false; break; }
				while (\true) {
					$res_64 = $result;
					$pos_64 = $this->pos;
					$_63 = \null;
					do {
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_63 = \false; break; }
						$key = 'match_'.'Statement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "else");
						}
						else { $_63 = \false; break; }
						$_63 = \true; break;
					}
					while(\false);
					if($_63 === \false) {
						$result = $res_64;
						$this->setPos($pos_64);
						unset($res_64, $pos_64);
						break;
					}
				}
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_67 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === '}') {
					$this->addPos(1);
					$result["text"] .= '}';
				}
				else { $_67 = \false; break; }
				$_67 = \true; break;
			}
			while(\false);
			if($_67 === \false) {
				$result = $res_68;
				$this->setPos($pos_68);
				unset($res_68, $pos_68);
			}
			$_69 = \true; break;
		}
		while(\false);
		if($_69 === \true) { $_88 = \true; break; }
		$result = $res_37;
		$this->setPos($pos_37);
		$_86 = \null;
		do {
			if (($subres = $this->literal('if')) !== \false) { $result["text"] .= $subres; }
			else { $_86 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_86 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_86 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_86 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_86 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_86 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_86 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_86 = \false; break; }
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "then");
			}
			else { $_86 = \false; break; }
			$res_85 = $result;
			$pos_85 = $this->pos;
			$_84 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_84 = \false; break; }
				if (($subres = $this->literal('else')) !== \false) { $result["text"] .= $subres; }
				else { $_84 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_84 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_84 = \false; break; }
				$_84 = \true; break;
			}
			while(\false);
			if($_84 === \false) {
				$result = $res_85;
				$this->setPos($pos_85);
				unset($res_85, $pos_85);
			}
			$_86 = \true; break;
		}
		while(\false);
		if($_86 === \true) { $_88 = \true; break; }
		$result = $res_37;
		$this->setPos($pos_37);
		$_88 = \false; break;
	}
	while(\false);
	if($_88 === \true) { return $this->finalise($result); }
	if($_88 === \false) { return \false; }
}


/* WhileStatement: "while" _ "(" _ cond:Expression _ ")" _ "{" _ body:Statement ( _ body:Statement )* _ "}" | "while" _ "(" _ cond:Expression _ ")" _ body:Statement */
protected $match_WhileStatement_typestack = ['WhileStatement'];
function match_WhileStatement($stack = []) {
	$matchrule = 'WhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_121 = \null;
	do {
		$res_90 = $result;
		$pos_90 = $this->pos;
		$_108 = \null;
		do {
			if (($subres = $this->literal('while')) !== \false) { $result["text"] .= $subres; }
			else { $_108 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_108 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_108 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_108 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_108 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else { $_108 = \false; break; }
			while (\true) {
				$res_105 = $result;
				$pos_105 = $this->pos;
				$_104 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_104 = \false; break; }
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "body");
					}
					else { $_104 = \false; break; }
					$_104 = \true; break;
				}
				while(\false);
				if($_104 === \false) {
					$result = $res_105;
					$this->setPos($pos_105);
					unset($res_105, $pos_105);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_108 = \false; break; }
			$_108 = \true; break;
		}
		while(\false);
		if($_108 === \true) { $_121 = \true; break; }
		$result = $res_90;
		$this->setPos($pos_90);
		$_119 = \null;
		do {
			if (($subres = $this->literal('while')) !== \false) { $result["text"] .= $subres; }
			else { $_119 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_119 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_119 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_119 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_119 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_119 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_119 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_119 = \false; break; }
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else { $_119 = \false; break; }
			$_119 = \true; break;
		}
		while(\false);
		if($_119 === \true) { $_121 = \true; break; }
		$result = $res_90;
		$this->setPos($pos_90);
		$_121 = \false; break;
	}
	while(\false);
	if($_121 === \true) { return $this->finalise($result); }
	if($_121 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("print") _ "(" _ expr:Expression _ ")" */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_132 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_124 = \null;
		do {
			if (($subres = $this->literal('print')) !== \false) { $result["text"] .= $subres; }
			else { $_124 = \false; break; }
			$_124 = \true; break;
		}
		while(\false);
		if($_124 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_124 === \false) {
			$result = \array_pop($stack);
			$_132 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_132 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_132 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_132 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_132 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_132 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_132 = \false; break; }
		$_132 = \true; break;
	}
	while(\false);
	if($_132 === \true) { return $this->finalise($result); }
	if($_132 === \false) { return \false; }
}


/* Expression: val:Logical */
protected $match_Expression_typestack = ['Expression'];
function match_Expression($stack = []) {
	$matchrule = 'Expression';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$key = 'match_'.'Logical'; $pos = $this->pos;
	$subres = $this->packhas($key, $pos)
		? $this->packread($key, $pos)
		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
	if ($subres !== \false) {
		$this->store($result, $subres, "val");
		return $this->finalise($result);
	}
	else { return \false; }
}


/* Logical: left:Comparison ( _ op:LogicalOp _ right:Comparison )* */
protected $match_Logical_typestack = ['Logical'];
function match_Logical($stack = []) {
	$matchrule = 'Logical';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_142 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_142 = \false; break; }
		while (\true) {
			$res_141 = $result;
			$pos_141 = $this->pos;
			$_140 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_140 = \false; break; }
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_140 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_140 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_140 = \false; break; }
				$_140 = \true; break;
			}
			while(\false);
			if($_140 === \false) {
				$result = $res_141;
				$this->setPos($pos_141);
				unset($res_141, $pos_141);
				break;
			}
		}
		$_142 = \true; break;
	}
	while(\false);
	if($_142 === \true) { return $this->finalise($result); }
	if($_142 === \false) { return \false; }
}


/* LogicalOp: "&&" | "||" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_147 = \null;
	do {
		$res_144 = $result;
		$pos_144 = $this->pos;
		if (($subres = $this->literal('&&')) !== \false) {
			$result["text"] .= $subres;
			$_147 = \true; break;
		}
		$result = $res_144;
		$this->setPos($pos_144);
		if (($subres = $this->literal('||')) !== \false) {
			$result["text"] .= $subres;
			$_147 = \true; break;
		}
		$result = $res_144;
		$this->setPos($pos_144);
		$_147 = \false; break;
	}
	while(\false);
	if($_147 === \true) { return $this->finalise($result); }
	if($_147 === \false) { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_156 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_156 = \false; break; }
		while (\true) {
			$res_155 = $result;
			$pos_155 = $this->pos;
			$_154 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_154 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_154 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_154 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_154 = \false; break; }
				$_154 = \true; break;
			}
			while(\false);
			if($_154 === \false) {
				$result = $res_155;
				$this->setPos($pos_155);
				unset($res_155, $pos_155);
				break;
			}
		}
		$_156 = \true; break;
	}
	while(\false);
	if($_156 === \true) { return $this->finalise($result); }
	if($_156 === \false) { return \false; }
}


/* CompOp: "==" | "!=" | "<=" | ">=" | "<" | ">" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_177 = \null;
	do {
		$res_158 = $result;
		$pos_158 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_177 = \true; break;
		}
		$result = $res_158;
		$this->setPos($pos_158);
		$_175 = \null;
		do {
			$res_160 = $result;
			$pos_160 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_175 = \true; break;
			}
			$result = $res_160;
			$this->setPos($pos_160);
			$_173 = \null;
			do {
				$res_162 = $result;
				$pos_162 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_173 = \true; break;
				}
				$result = $res_162;
				$this->setPos($pos_162);
				$_171 = \null;
				do {
					$res_164 = $result;
					$pos_164 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_171 = \true; break;
					}
					$result = $res_164;
					$this->setPos($pos_164);
					$_169 = \null;
					do {
						$res_166 = $result;
						$pos_166 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_169 = \true; break;
						}
						$result = $res_166;
						$this->setPos($pos_166);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_169 = \true; break;
						}
						$result = $res_166;
						$this->setPos($pos_166);
						$_169 = \false; break;
					}
					while(\false);
					if($_169 === \true) { $_171 = \true; break; }
					$result = $res_164;
					$this->setPos($pos_164);
					$_171 = \false; break;
				}
				while(\false);
				if($_171 === \true) { $_173 = \true; break; }
				$result = $res_162;
				$this->setPos($pos_162);
				$_173 = \false; break;
			}
			while(\false);
			if($_173 === \true) { $_175 = \true; break; }
			$result = $res_160;
			$this->setPos($pos_160);
			$_175 = \false; break;
		}
		while(\false);
		if($_175 === \true) { $_177 = \true; break; }
		$result = $res_158;
		$this->setPos($pos_158);
		$_177 = \false; break;
	}
	while(\false);
	if($_177 === \true) { return $this->finalise($result); }
	if($_177 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_186 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_186 = \false; break; }
		while (\true) {
			$res_185 = $result;
			$pos_185 = $this->pos;
			$_184 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_184 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_184 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_184 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_184 = \false; break; }
				$_184 = \true; break;
			}
			while(\false);
			if($_184 === \false) {
				$result = $res_185;
				$this->setPos($pos_185);
				unset($res_185, $pos_185);
				break;
			}
		}
		$_186 = \true; break;
	}
	while(\false);
	if($_186 === \true) { return $this->finalise($result); }
	if($_186 === \false) { return \false; }
}


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_191 = \null;
	do {
		$res_188 = $result;
		$pos_188 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_191 = \true; break;
		}
		$result = $res_188;
		$this->setPos($pos_188);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_191 = \true; break;
		}
		$result = $res_188;
		$this->setPos($pos_188);
		$_191 = \false; break;
	}
	while(\false);
	if($_191 === \true) { return $this->finalise($result); }
	if($_191 === \false) { return \false; }
}


/* Multiplicative: left:Postfix ( _ op:MulOp _ right:Postfix )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_200 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_200 = \false; break; }
		while (\true) {
			$res_199 = $result;
			$pos_199 = $this->pos;
			$_198 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_198 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_198 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_198 = \false; break; }
				$key = 'match_'.'Postfix'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_198 = \false; break; }
				$_198 = \true; break;
			}
			while(\false);
			if($_198 === \false) {
				$result = $res_199;
				$this->setPos($pos_199);
				unset($res_199, $pos_199);
				break;
			}
		}
		$_200 = \true; break;
	}
	while(\false);
	if($_200 === \true) { return $this->finalise($result); }
	if($_200 === \false) { return \false; }
}


/* MulOp: "*" | "/" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_205 = \null;
	do {
		$res_202 = $result;
		$pos_202 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_205 = \true; break;
		}
		$result = $res_202;
		$this->setPos($pos_202);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_205 = \true; break;
		}
		$result = $res_202;
		$this->setPos($pos_202);
		$_205 = \false; break;
	}
	while(\false);
	if($_205 === \true) { return $this->finalise($result); }
	if($_205 === \false) { return \false; }
}


/* Postfix: base:Primary ( _ "[" _ index:Expression _ "]" )* */
protected $match_Postfix_typestack = ['Postfix'];
function match_Postfix($stack = []) {
	$matchrule = 'Postfix';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_216 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "base");
		}
		else { $_216 = \false; break; }
		while (\true) {
			$res_215 = $result;
			$pos_215 = $this->pos;
			$_214 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_214 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === '[') {
					$this->addPos(1);
					$result["text"] .= '[';
				}
				else { $_214 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_214 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "index");
				}
				else { $_214 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_214 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ']') {
					$this->addPos(1);
					$result["text"] .= ']';
				}
				else { $_214 = \false; break; }
				$_214 = \true; break;
			}
			while(\false);
			if($_214 === \false) {
				$result = $res_215;
				$this->setPos($pos_215);
				unset($res_215, $pos_215);
				break;
			}
		}
		$_216 = \true; break;
	}
	while(\false);
	if($_216 === \true) { return $this->finalise($result); }
	if($_216 === \false) { return \false; }
}


/* Primary: val:ArrayLiteral | val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_239 = \null;
	do {
		$res_218 = $result;
		$pos_218 = $this->pos;
		$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_239 = \true; break;
		}
		$result = $res_218;
		$this->setPos($pos_218);
		$_237 = \null;
		do {
			$res_220 = $result;
			$pos_220 = $this->pos;
			$key = 'match_'.'String'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_237 = \true; break;
			}
			$result = $res_220;
			$this->setPos($pos_220);
			$_235 = \null;
			do {
				$res_222 = $result;
				$pos_222 = $this->pos;
				$key = 'match_'.'Number'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_235 = \true; break;
				}
				$result = $res_222;
				$this->setPos($pos_222);
				$_233 = \null;
				do {
					$res_224 = $result;
					$pos_224 = $this->pos;
					$key = 'match_'.'Identifier'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_233 = \true; break;
					}
					$result = $res_224;
					$this->setPos($pos_224);
					$_231 = \null;
					do {
						if (\substr($this->string, $this->pos, 1) === '(') {
							$this->addPos(1);
							$result["text"] .= '(';
						}
						else { $_231 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_231 = \false; break; }
						$key = 'match_'.'Expression'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
						}
						else { $_231 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_231 = \false; break; }
						if (\substr($this->string, $this->pos, 1) === ')') {
							$this->addPos(1);
							$result["text"] .= ')';
						}
						else { $_231 = \false; break; }
						$_231 = \true; break;
					}
					while(\false);
					if($_231 === \true) { $_233 = \true; break; }
					$result = $res_224;
					$this->setPos($pos_224);
					$_233 = \false; break;
				}
				while(\false);
				if($_233 === \true) { $_235 = \true; break; }
				$result = $res_222;
				$this->setPos($pos_222);
				$_235 = \false; break;
			}
			while(\false);
			if($_235 === \true) { $_237 = \true; break; }
			$result = $res_220;
			$this->setPos($pos_220);
			$_237 = \false; break;
		}
		while(\false);
		if($_237 === \true) { $_239 = \true; break; }
		$result = $res_218;
		$this->setPos($pos_218);
		$_239 = \false; break;
	}
	while(\false);
	if($_239 === \true) { return $this->finalise($result); }
	if($_239 === \false) { return \false; }
}


/* ArrayLiteral: "[" _ elems:ArrayElements? _ "]" */
protected $match_ArrayLiteral_typestack = ['ArrayLiteral'];
function match_ArrayLiteral($stack = []) {
	$matchrule = 'ArrayLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_246 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_246 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_246 = \false; break; }
		$res_243 = $result;
		$pos_243 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elems");
		}
		else {
			$result = $res_243;
			$this->setPos($pos_243);
			unset($res_243, $pos_243);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_246 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_246 = \false; break; }
		$_246 = \true; break;
	}
	while(\false);
	if($_246 === \true) { return $this->finalise($result); }
	if($_246 === \false) { return \false; }
}


/* ArrayElements: head:Expression ( _ "," _ tail:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_255 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_255 = \false; break; }
		while (\true) {
			$res_254 = $result;
			$pos_254 = $this->pos;
			$_253 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_253 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_253 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_253 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_253 = \false; break; }
				$_253 = \true; break;
			}
			while(\false);
			if($_253 === \false) {
				$result = $res_254;
				$this->setPos($pos_254);
				unset($res_254, $pos_254);
				break;
			}
		}
		$_255 = \true; break;
	}
	while(\false);
	if($_255 === \true) { return $this->finalise($result); }
	if($_255 === \false) { return \false; }
}


/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_260 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_260 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_260 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_260 = \false; break; }
		$_260 = \true; break;
	}
	while(\false);
	if($_260 === \true) { return $this->finalise($result); }
	if($_260 === \false) { return \false; }
}


/* Number: /[0-9]+(\.[0-9]+)?/ */
protected $match_Number_typestack = ['Number'];
function match_Number($stack = []) {
	$matchrule = 'Number';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[0-9]+(\.[0-9]+)?/')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}


/* Identifier: !Keyword /[a-z_][a-z0-9_]{0,}/ */
protected $match_Identifier_typestack = ['Identifier'];
function match_Identifier($stack = []) {
	$matchrule = 'Identifier';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_265 = \null;
	do {
		$res_263 = $result;
		$pos_263 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_263;
			$this->setPos($pos_263);
			$_265 = \false; break;
		}
		else {
			$result = $res_263;
			$this->setPos($pos_263);
		}
		if (($subres = $this->rx('/[a-z_][a-z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_265 = \false; break; }
		$_265 = \true; break;
	}
	while(\false);
	if($_265 === \true) { return $this->finalise($result); }
	if($_265 === \false) { return \false; }
}


/* Keyword: ("if" | "else" | "while" | "print" | "for") !(/[a-z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_289 = \null;
	do {
		$_284 = \null;
		do {
			$_282 = \null;
			do {
				$res_267 = $result;
				$pos_267 = $this->pos;
				if (($subres = $this->literal('if')) !== \false) {
					$result["text"] .= $subres;
					$_282 = \true; break;
				}
				$result = $res_267;
				$this->setPos($pos_267);
				$_280 = \null;
				do {
					$res_269 = $result;
					$pos_269 = $this->pos;
					if (($subres = $this->literal('else')) !== \false) {
						$result["text"] .= $subres;
						$_280 = \true; break;
					}
					$result = $res_269;
					$this->setPos($pos_269);
					$_278 = \null;
					do {
						$res_271 = $result;
						$pos_271 = $this->pos;
						if (($subres = $this->literal('while')) !== \false) {
							$result["text"] .= $subres;
							$_278 = \true; break;
						}
						$result = $res_271;
						$this->setPos($pos_271);
						$_276 = \null;
						do {
							$res_273 = $result;
							$pos_273 = $this->pos;
							if (($subres = $this->literal('print')) !== \false) {
								$result["text"] .= $subres;
								$_276 = \true; break;
							}
							$result = $res_273;
							$this->setPos($pos_273);
							if (($subres = $this->literal('for')) !== \false) {
								$result["text"] .= $subres;
								$_276 = \true; break;
							}
							$result = $res_273;
							$this->setPos($pos_273);
							$_276 = \false; break;
						}
						while(\false);
						if($_276 === \true) { $_278 = \true; break; }
						$result = $res_271;
						$this->setPos($pos_271);
						$_278 = \false; break;
					}
					while(\false);
					if($_278 === \true) { $_280 = \true; break; }
					$result = $res_269;
					$this->setPos($pos_269);
					$_280 = \false; break;
				}
				while(\false);
				if($_280 === \true) { $_282 = \true; break; }
				$result = $res_267;
				$this->setPos($pos_267);
				$_282 = \false; break;
			}
			while(\false);
			if($_282 === \false) { $_284 = \false; break; }
			$_284 = \true; break;
		}
		while(\false);
		if($_284 === \false) { $_289 = \false; break; }
		$res_288 = $result;
		$pos_288 = $this->pos;
		$_287 = \null;
		do {
			if (($subres = $this->rx('/[a-z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_287 = \false; break; }
			$_287 = \true; break;
		}
		while(\false);
		if($_287 === \true) {
			$result = $res_288;
			$this->setPos($pos_288);
			$_289 = \false; break;
		}
		if($_287 === \false) {
			$result = $res_288;
			$this->setPos($pos_288);
		}
		$_289 = \true; break;
	}
	while(\false);
	if($_289 === \true) { return $this->finalise($result); }
	if($_289 === \false) { return \false; }
}


/* _: ( /[ \t\r]{1,}/ | /\n/ | /\/\/[^\n]{0,}\n?/ | /\/\*[^*]{0,}\*\// ){0,} */
protected $match___typestack = ['_'];
function match__($stack = []) {
	$matchrule = '_';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	while (\true) {
		$res_305 = $result;
		$pos_305 = $this->pos;
		$_304 = \null;
		do {
			$_302 = \null;
			do {
				$res_291 = $result;
				$pos_291 = $this->pos;
				if (($subres = $this->rx('/[ \t\r]{1,}/')) !== \false) {
					$result["text"] .= $subres;
					$_302 = \true; break;
				}
				$result = $res_291;
				$this->setPos($pos_291);
				$_300 = \null;
				do {
					$res_293 = $result;
					$pos_293 = $this->pos;
					if (($subres = $this->rx('/\n/')) !== \false) {
						$result["text"] .= $subres;
						$_300 = \true; break;
					}
					$result = $res_293;
					$this->setPos($pos_293);
					$_298 = \null;
					do {
						$res_295 = $result;
						$pos_295 = $this->pos;
						if (($subres = $this->rx('/\/\/[^\n]{0,}\n?/')) !== \false) {
							$result["text"] .= $subres;
							$_298 = \true; break;
						}
						$result = $res_295;
						$this->setPos($pos_295);
						if (($subres = $this->rx('/\/\*[^*]{0,}\*\//')) !== \false) {
							$result["text"] .= $subres;
							$_298 = \true; break;
						}
						$result = $res_295;
						$this->setPos($pos_295);
						$_298 = \false; break;
					}
					while(\false);
					if($_298 === \true) { $_300 = \true; break; }
					$result = $res_293;
					$this->setPos($pos_293);
					$_300 = \false; break;
				}
				while(\false);
				if($_300 === \true) { $_302 = \true; break; }
				$result = $res_291;
				$this->setPos($pos_291);
				$_302 = \false; break;
			}
			while(\false);
			if($_302 === \false) { $_304 = \false; break; }
			$_304 = \true; break;
		}
		while(\false);
		if($_304 === \false) {
			$result = $res_305;
			$this->setPos($pos_305);
			unset($res_305, $pos_305);
			break;
		}
	}
	return $this->finalise($result);
}




}
