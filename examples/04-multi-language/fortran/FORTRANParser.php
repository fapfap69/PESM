<?php
namespace FORTRAN;

class FORTRANParser extends \hafriedlander\Peg\Parser\Packrat {
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


/* Statement: alt:Assignment | alt:InterruptSimpleStmt | alt:IfStatement | alt:GotoStmt | alt:LabelStmt | alt:ForeachRangeStmt | alt:Continue */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_32 = \null;
	do {
		$res_9 = $result;
		$pos_9 = $this->pos;
		$key = 'match_'.'Assignment'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_32 = \true; break;
		}
		$result = $res_9;
		$this->setPos($pos_9);
		$_30 = \null;
		do {
			$res_11 = $result;
			$pos_11 = $this->pos;
			$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_30 = \true; break;
			}
			$result = $res_11;
			$this->setPos($pos_11);
			$_28 = \null;
			do {
				$res_13 = $result;
				$pos_13 = $this->pos;
				$key = 'match_'.'IfStatement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
					$_28 = \true; break;
				}
				$result = $res_13;
				$this->setPos($pos_13);
				$_26 = \null;
				do {
					$res_15 = $result;
					$pos_15 = $this->pos;
					$key = 'match_'.'GotoStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_26 = \true; break;
					}
					$result = $res_15;
					$this->setPos($pos_15);
					$_24 = \null;
					do {
						$res_17 = $result;
						$pos_17 = $this->pos;
						$key = 'match_'.'LabelStmt'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
							$_24 = \true; break;
						}
						$result = $res_17;
						$this->setPos($pos_17);
						$_22 = \null;
						do {
							$res_19 = $result;
							$pos_19 = $this->pos;
							$key = 'match_'.'ForeachRangeStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
								$_22 = \true; break;
							}
							$result = $res_19;
							$this->setPos($pos_19);
							$key = 'match_'.'Continue'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
								$_22 = \true; break;
							}
							$result = $res_19;
							$this->setPos($pos_19);
							$_22 = \false; break;
						}
						while(\false);
						if($_22 === \true) { $_24 = \true; break; }
						$result = $res_17;
						$this->setPos($pos_17);
						$_24 = \false; break;
					}
					while(\false);
					if($_24 === \true) { $_26 = \true; break; }
					$result = $res_15;
					$this->setPos($pos_15);
					$_26 = \false; break;
				}
				while(\false);
				if($_26 === \true) { $_28 = \true; break; }
				$result = $res_13;
				$this->setPos($pos_13);
				$_28 = \false; break;
			}
			while(\false);
			if($_28 === \true) { $_30 = \true; break; }
			$result = $res_11;
			$this->setPos($pos_11);
			$_30 = \false; break;
		}
		while(\false);
		if($_30 === \true) { $_32 = \true; break; }
		$result = $res_9;
		$this->setPos($pos_9);
		$_32 = \false; break;
	}
	while(\false);
	if($_32 === \true) { return $this->finalise($result); }
	if($_32 === \false) { return \false; }
}


/* Assignment: var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_39 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_39 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_39 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_39 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_39 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_39 = \false; break; }
		$_39 = \true; break;
	}
	while(\false);
	if($_39 === \true) { return $this->finalise($result); }
	if($_39 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("MESSAGE") _ expr:Expression */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_46 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_42 = \null;
		do {
			if (($subres = $this->literal('MESSAGE')) !== \false) { $result["text"] .= $subres; }
			else { $_42 = \false; break; }
			$_42 = \true; break;
		}
		while(\false);
		if($_42 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_42 === \false) {
			$result = \array_pop($stack);
			$_46 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_46 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_46 = \false; break; }
		$_46 = \true; break;
	}
	while(\false);
	if($_46 === \true) { return $this->finalise($result); }
	if($_46 === \false) { return \false; }
}


/* IfStatement: "IF" _ "(" _ cond:Expression _ ")" _ stmt:Statement */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_57 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
		else { $_57 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_57 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_57 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_57 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_57 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_57 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_57 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_57 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_57 = \false; break; }
		$_57 = \true; break;
	}
	while(\false);
	if($_57 === \true) { return $this->finalise($result); }
	if($_57 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Label */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_62 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_62 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_62 = \false; break; }
		$key = 'match_'.'Label'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_62 = \false; break; }
		$_62 = \true; break;
	}
	while(\false);
	if($_62 === \true) { return $this->finalise($result); }
	if($_62 === \false) { return \false; }
}


/* LabelStmt: label:Label */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$key = 'match_'.'Label'; $pos = $this->pos;
	$subres = $this->packhas($key, $pos)
		? $this->packread($key, $pos)
		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
	if ($subres !== \false) {
		$this->store($result, $subres, "label");
		return $this->finalise($result);
	}
	else { return \false; }
}


/* Label: val:Number | val:Identifier */
protected $match_Label_typestack = ['Label'];
function match_Label($stack = []) {
	$matchrule = 'Label';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_68 = \null;
	do {
		$res_65 = $result;
		$pos_65 = $this->pos;
		$key = 'match_'.'Number'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_68 = \true; break;
		}
		$result = $res_65;
		$this->setPos($pos_65);
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_68 = \true; break;
		}
		$result = $res_65;
		$this->setPos($pos_65);
		$_68 = \false; break;
	}
	while(\false);
	if($_68 === \true) { return $this->finalise($result); }
	if($_68 === \false) { return \false; }
}


/* ForeachRangeStmt: "DO" _ var:Identifier _ "=" _ from:Expression _ "," _ to:Expression _ body:DoBody ( _ body:DoBody )* _ "CONTINUE" */
protected $match_ForeachRangeStmt_typestack = ['ForeachRangeStmt'];
function match_ForeachRangeStmt($stack = []) {
	$matchrule = 'ForeachRangeStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_89 = \null;
	do {
		if (($subres = $this->literal('DO')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		$key = 'match_'.'DoBody'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "body");
		}
		else { $_89 = \false; break; }
		while (\true) {
			$res_86 = $result;
			$pos_86 = $this->pos;
			$_85 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_85 = \false; break; }
				$key = 'match_'.'DoBody'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "body");
				}
				else { $_85 = \false; break; }
				$_85 = \true; break;
			}
			while(\false);
			if($_85 === \false) {
				$result = $res_86;
				$this->setPos($pos_86);
				unset($res_86, $pos_86);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (($subres = $this->literal('CONTINUE')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
		$_89 = \true; break;
	}
	while(\false);
	if($_89 === \true) { return $this->finalise($result); }
	if($_89 === \false) { return \false; }
}


/* DoBody: alt:Assignment | alt:InterruptSimpleStmt | alt:IfStatement | alt:GotoStmt | alt:LabelStmt */
protected $match_DoBody_typestack = ['DoBody'];
function match_DoBody($stack = []) {
	$matchrule = 'DoBody';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_106 = \null;
	do {
		$res_91 = $result;
		$pos_91 = $this->pos;
		$key = 'match_'.'Assignment'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_106 = \true; break;
		}
		$result = $res_91;
		$this->setPos($pos_91);
		$_104 = \null;
		do {
			$res_93 = $result;
			$pos_93 = $this->pos;
			$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_104 = \true; break;
			}
			$result = $res_93;
			$this->setPos($pos_93);
			$_102 = \null;
			do {
				$res_95 = $result;
				$pos_95 = $this->pos;
				$key = 'match_'.'IfStatement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
					$_102 = \true; break;
				}
				$result = $res_95;
				$this->setPos($pos_95);
				$_100 = \null;
				do {
					$res_97 = $result;
					$pos_97 = $this->pos;
					$key = 'match_'.'GotoStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_100 = \true; break;
					}
					$result = $res_97;
					$this->setPos($pos_97);
					$key = 'match_'.'LabelStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_100 = \true; break;
					}
					$result = $res_97;
					$this->setPos($pos_97);
					$_100 = \false; break;
				}
				while(\false);
				if($_100 === \true) { $_102 = \true; break; }
				$result = $res_95;
				$this->setPos($pos_95);
				$_102 = \false; break;
			}
			while(\false);
			if($_102 === \true) { $_104 = \true; break; }
			$result = $res_93;
			$this->setPos($pos_93);
			$_104 = \false; break;
		}
		while(\false);
		if($_104 === \true) { $_106 = \true; break; }
		$result = $res_91;
		$this->setPos($pos_91);
		$_106 = \false; break;
	}
	while(\false);
	if($_106 === \true) { return $this->finalise($result); }
	if($_106 === \false) { return \false; }
}


/* Continue: "CONTINUE" */
protected $match_Continue_typestack = ['Continue'];
function match_Continue($stack = []) {
	$matchrule = 'Continue';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->literal('CONTINUE')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}


/* Expression: val:Comparison */
protected $match_Expression_typestack = ['Expression'];
function match_Expression($stack = []) {
	$matchrule = 'Expression';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$key = 'match_'.'Comparison'; $pos = $this->pos;
	$subres = $this->packhas($key, $pos)
		? $this->packread($key, $pos)
		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
	if ($subres !== \false) {
		$this->store($result, $subres, "val");
		return $this->finalise($result);
	}
	else { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_117 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_117 = \false; break; }
		while (\true) {
			$res_116 = $result;
			$pos_116 = $this->pos;
			$_115 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_115 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_115 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_115 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_115 = \false; break; }
				$_115 = \true; break;
			}
			while(\false);
			if($_115 === \false) {
				$result = $res_116;
				$this->setPos($pos_116);
				unset($res_116, $pos_116);
				break;
			}
		}
		$_117 = \true; break;
	}
	while(\false);
	if($_117 === \true) { return $this->finalise($result); }
	if($_117 === \false) { return \false; }
}


/* CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_138 = \null;
	do {
		$res_119 = $result;
		$pos_119 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_138 = \true; break;
		}
		$result = $res_119;
		$this->setPos($pos_119);
		$_136 = \null;
		do {
			$res_121 = $result;
			$pos_121 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_136 = \true; break;
			}
			$result = $res_121;
			$this->setPos($pos_121);
			$_134 = \null;
			do {
				$res_123 = $result;
				$pos_123 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_134 = \true; break;
				}
				$result = $res_123;
				$this->setPos($pos_123);
				$_132 = \null;
				do {
					$res_125 = $result;
					$pos_125 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_132 = \true; break;
					}
					$result = $res_125;
					$this->setPos($pos_125);
					$_130 = \null;
					do {
						$res_127 = $result;
						$pos_127 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_130 = \true; break;
						}
						$result = $res_127;
						$this->setPos($pos_127);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_130 = \true; break;
						}
						$result = $res_127;
						$this->setPos($pos_127);
						$_130 = \false; break;
					}
					while(\false);
					if($_130 === \true) { $_132 = \true; break; }
					$result = $res_125;
					$this->setPos($pos_125);
					$_132 = \false; break;
				}
				while(\false);
				if($_132 === \true) { $_134 = \true; break; }
				$result = $res_123;
				$this->setPos($pos_123);
				$_134 = \false; break;
			}
			while(\false);
			if($_134 === \true) { $_136 = \true; break; }
			$result = $res_121;
			$this->setPos($pos_121);
			$_136 = \false; break;
		}
		while(\false);
		if($_136 === \true) { $_138 = \true; break; }
		$result = $res_119;
		$this->setPos($pos_119);
		$_138 = \false; break;
	}
	while(\false);
	if($_138 === \true) { return $this->finalise($result); }
	if($_138 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_147 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_147 = \false; break; }
		while (\true) {
			$res_146 = $result;
			$pos_146 = $this->pos;
			$_145 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_145 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_145 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_145 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_145 = \false; break; }
				$_145 = \true; break;
			}
			while(\false);
			if($_145 === \false) {
				$result = $res_146;
				$this->setPos($pos_146);
				unset($res_146, $pos_146);
				break;
			}
		}
		$_147 = \true; break;
	}
	while(\false);
	if($_147 === \true) { return $this->finalise($result); }
	if($_147 === \false) { return \false; }
}


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_152 = \null;
	do {
		$res_149 = $result;
		$pos_149 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_152 = \true; break;
		}
		$result = $res_149;
		$this->setPos($pos_149);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_152 = \true; break;
		}
		$result = $res_149;
		$this->setPos($pos_149);
		$_152 = \false; break;
	}
	while(\false);
	if($_152 === \true) { return $this->finalise($result); }
	if($_152 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_161 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_161 = \false; break; }
		while (\true) {
			$res_160 = $result;
			$pos_160 = $this->pos;
			$_159 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_159 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_159 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_159 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_159 = \false; break; }
				$_159 = \true; break;
			}
			while(\false);
			if($_159 === \false) {
				$result = $res_160;
				$this->setPos($pos_160);
				unset($res_160, $pos_160);
				break;
			}
		}
		$_161 = \true; break;
	}
	while(\false);
	if($_161 === \true) { return $this->finalise($result); }
	if($_161 === \false) { return \false; }
}


/* MulOp: "*" | "/" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_166 = \null;
	do {
		$res_163 = $result;
		$pos_163 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_166 = \true; break;
		}
		$result = $res_163;
		$this->setPos($pos_163);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_166 = \true; break;
		}
		$result = $res_163;
		$this->setPos($pos_163);
		$_166 = \false; break;
	}
	while(\false);
	if($_166 === \true) { return $this->finalise($result); }
	if($_166 === \false) { return \false; }
}


/* Primary: val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_181 = \null;
	do {
		$res_168 = $result;
		$pos_168 = $this->pos;
		$key = 'match_'.'Number'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_181 = \true; break;
		}
		$result = $res_168;
		$this->setPos($pos_168);
		$_179 = \null;
		do {
			$res_170 = $result;
			$pos_170 = $this->pos;
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_179 = \true; break;
			}
			$result = $res_170;
			$this->setPos($pos_170);
			$_177 = \null;
			do {
				if (\substr($this->string, $this->pos, 1) === '(') {
					$this->addPos(1);
					$result["text"] .= '(';
				}
				else { $_177 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_177 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
				}
				else { $_177 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_177 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ')') {
					$this->addPos(1);
					$result["text"] .= ')';
				}
				else { $_177 = \false; break; }
				$_177 = \true; break;
			}
			while(\false);
			if($_177 === \true) { $_179 = \true; break; }
			$result = $res_170;
			$this->setPos($pos_170);
			$_179 = \false; break;
		}
		while(\false);
		if($_179 === \true) { $_181 = \true; break; }
		$result = $res_168;
		$this->setPos($pos_168);
		$_181 = \false; break;
	}
	while(\false);
	if($_181 === \true) { return $this->finalise($result); }
	if($_181 === \false) { return \false; }
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


/* Identifier: !Keyword /[A-Z][A-Z0-9]{0,}/ */
protected $match_Identifier_typestack = ['Identifier'];
function match_Identifier($stack = []) {
	$matchrule = 'Identifier';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_186 = \null;
	do {
		$res_184 = $result;
		$pos_184 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_184;
			$this->setPos($pos_184);
			$_186 = \false; break;
		}
		else {
			$result = $res_184;
			$this->setPos($pos_184);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_186 = \false; break; }
		$_186 = \true; break;
	}
	while(\false);
	if($_186 === \true) { return $this->finalise($result); }
	if($_186 === \false) { return \false; }
}


/* Keyword: ("IF" | "GOTO" | "DO" | "CONTINUE" | "MESSAGE") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_210 = \null;
	do {
		$_205 = \null;
		do {
			$_203 = \null;
			do {
				$res_188 = $result;
				$pos_188 = $this->pos;
				if (($subres = $this->literal('IF')) !== \false) {
					$result["text"] .= $subres;
					$_203 = \true; break;
				}
				$result = $res_188;
				$this->setPos($pos_188);
				$_201 = \null;
				do {
					$res_190 = $result;
					$pos_190 = $this->pos;
					if (($subres = $this->literal('GOTO')) !== \false) {
						$result["text"] .= $subres;
						$_201 = \true; break;
					}
					$result = $res_190;
					$this->setPos($pos_190);
					$_199 = \null;
					do {
						$res_192 = $result;
						$pos_192 = $this->pos;
						if (($subres = $this->literal('DO')) !== \false) {
							$result["text"] .= $subres;
							$_199 = \true; break;
						}
						$result = $res_192;
						$this->setPos($pos_192);
						$_197 = \null;
						do {
							$res_194 = $result;
							$pos_194 = $this->pos;
							if (($subres = $this->literal('CONTINUE')) !== \false) {
								$result["text"] .= $subres;
								$_197 = \true; break;
							}
							$result = $res_194;
							$this->setPos($pos_194);
							if (($subres = $this->literal('MESSAGE')) !== \false) {
								$result["text"] .= $subres;
								$_197 = \true; break;
							}
							$result = $res_194;
							$this->setPos($pos_194);
							$_197 = \false; break;
						}
						while(\false);
						if($_197 === \true) { $_199 = \true; break; }
						$result = $res_192;
						$this->setPos($pos_192);
						$_199 = \false; break;
					}
					while(\false);
					if($_199 === \true) { $_201 = \true; break; }
					$result = $res_190;
					$this->setPos($pos_190);
					$_201 = \false; break;
				}
				while(\false);
				if($_201 === \true) { $_203 = \true; break; }
				$result = $res_188;
				$this->setPos($pos_188);
				$_203 = \false; break;
			}
			while(\false);
			if($_203 === \false) { $_205 = \false; break; }
			$_205 = \true; break;
		}
		while(\false);
		if($_205 === \false) { $_210 = \false; break; }
		$res_209 = $result;
		$pos_209 = $this->pos;
		$_208 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_208 = \false; break; }
			$_208 = \true; break;
		}
		while(\false);
		if($_208 === \true) {
			$result = $res_209;
			$this->setPos($pos_209);
			$_210 = \false; break;
		}
		if($_208 === \false) {
			$result = $res_209;
			$this->setPos($pos_209);
		}
		$_210 = \true; break;
	}
	while(\false);
	if($_210 === \true) { return $this->finalise($result); }
	if($_210 === \false) { return \false; }
}


/* _: ( /[ \t\r]{1,}/ | /\n/ ){0,} */
protected $match___typestack = ['_'];
function match__($stack = []) {
	$matchrule = '_';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	while (\true) {
		$res_218 = $result;
		$pos_218 = $this->pos;
		$_217 = \null;
		do {
			$_215 = \null;
			do {
				$res_212 = $result;
				$pos_212 = $this->pos;
				if (($subres = $this->rx('/[ \t\r]{1,}/')) !== \false) {
					$result["text"] .= $subres;
					$_215 = \true; break;
				}
				$result = $res_212;
				$this->setPos($pos_212);
				if (($subres = $this->rx('/\n/')) !== \false) {
					$result["text"] .= $subres;
					$_215 = \true; break;
				}
				$result = $res_212;
				$this->setPos($pos_212);
				$_215 = \false; break;
			}
			while(\false);
			if($_215 === \false) { $_217 = \false; break; }
			$_217 = \true; break;
		}
		while(\false);
		if($_217 === \false) {
			$result = $res_218;
			$this->setPos($pos_218);
			unset($res_218, $pos_218);
			break;
		}
	}
	return $this->finalise($result);
}




}
