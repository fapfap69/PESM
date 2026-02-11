<?php
namespace BASIC;

class BASICParser extends \hafriedlander\Peg\Parser\Packrat {
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


/* Statement: alt:Assignment | alt:InterruptSimpleStmt | alt:InterruptWithVarStmt | alt:IfStatement | alt:GotoStmt | alt:LabelStmt | alt:ForeachRangeStmt */
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
				$key = 'match_'.'InterruptWithVarStmt'; $pos = $this->pos;
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
					$key = 'match_'.'IfStatement'; $pos = $this->pos;
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
						$key = 'match_'.'GotoStmt'; $pos = $this->pos;
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
							$key = 'match_'.'LabelStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
								$_22 = \true; break;
							}
							$result = $res_19;
							$this->setPos($pos_19);
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


/* Assignment: "LET"? _ var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_41 = \null;
	do {
		$res_34 = $result;
		$pos_34 = $this->pos;
		if (($subres = $this->literal('LET')) !== \false) { $result["text"] .= $subres; }
		else {
			$result = $res_34;
			$this->setPos($pos_34);
			unset($res_34, $pos_34);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_41 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_41 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_41 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_41 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_41 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_41 = \false; break; }
		$_41 = \true; break;
	}
	while(\false);
	if($_41 === \true) { return $this->finalise($result); }
	if($_41 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("PRINT") _ expr:Expression */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_48 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_44 = \null;
		do {
			if (($subres = $this->literal('PRINT')) !== \false) { $result["text"] .= $subres; }
			else { $_44 = \false; break; }
			$_44 = \true; break;
		}
		while(\false);
		if($_44 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_44 === \false) {
			$result = \array_pop($stack);
			$_48 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_48 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_48 = \false; break; }
		$_48 = \true; break;
	}
	while(\false);
	if($_48 === \true) { return $this->finalise($result); }
	if($_48 === \false) { return \false; }
}


/* InterruptWithVarStmt: type:("INPUT") _ var:Identifier */
protected $match_InterruptWithVarStmt_typestack = ['InterruptWithVarStmt'];
function match_InterruptWithVarStmt($stack = []) {
	$matchrule = 'InterruptWithVarStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_55 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_51 = \null;
		do {
			if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
			else { $_51 = \false; break; }
			$_51 = \true; break;
		}
		while(\false);
		if($_51 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_51 === \false) {
			$result = \array_pop($stack);
			$_55 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_55 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_55 = \false; break; }
		$_55 = \true; break;
	}
	while(\false);
	if($_55 === \true) { return $this->finalise($result); }
	if($_55 === \false) { return \false; }
}


/* IfStatement: "IF" _ cond:Expression _ "THEN" _ stmt:Statement */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_64 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
		else { $_64 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_64 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_64 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_64 = \false; break; }
		if (($subres = $this->literal('THEN')) !== \false) { $result["text"] .= $subres; }
		else { $_64 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_64 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_64 = \false; break; }
		$_64 = \true; break;
	}
	while(\false);
	if($_64 === \true) { return $this->finalise($result); }
	if($_64 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_69 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_69 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_69 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_69 = \false; break; }
		$_69 = \true; break;
	}
	while(\false);
	if($_69 === \true) { return $this->finalise($result); }
	if($_69 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_74 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_74 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_74 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_74 = \false; break; }
		$_74 = \true; break;
	}
	while(\false);
	if($_74 === \true) { return $this->finalise($result); }
	if($_74 === \false) { return \false; }
}


/* ForeachRangeStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:ForBody ( _ body:ForBody )* _ "NEXT" */
protected $match_ForeachRangeStmt_typestack = ['ForeachRangeStmt'];
function match_ForeachRangeStmt($stack = []) {
	$matchrule = 'ForeachRangeStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_95 = \null;
	do {
		if (($subres = $this->literal('FOR')) !== \false) { $result["text"] .= $subres; }
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_95 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		$key = 'match_'.'ForBody'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "body");
		}
		else { $_95 = \false; break; }
		while (\true) {
			$res_92 = $result;
			$pos_92 = $this->pos;
			$_91 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_91 = \false; break; }
				$key = 'match_'.'ForBody'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "body");
				}
				else { $_91 = \false; break; }
				$_91 = \true; break;
			}
			while(\false);
			if($_91 === \false) {
				$result = $res_92;
				$this->setPos($pos_92);
				unset($res_92, $pos_92);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_95 = \false; break; }
		if (($subres = $this->literal('NEXT')) !== \false) { $result["text"] .= $subres; }
		else { $_95 = \false; break; }
		$_95 = \true; break;
	}
	while(\false);
	if($_95 === \true) { return $this->finalise($result); }
	if($_95 === \false) { return \false; }
}


/* ForBody: alt:Assignment | alt:InterruptSimpleStmt | alt:InterruptWithVarStmt | alt:IfStatement | alt:GotoStmt | alt:LabelStmt */
protected $match_ForBody_typestack = ['ForBody'];
function match_ForBody($stack = []) {
	$matchrule = 'ForBody';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_116 = \null;
	do {
		$res_97 = $result;
		$pos_97 = $this->pos;
		$key = 'match_'.'Assignment'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_116 = \true; break;
		}
		$result = $res_97;
		$this->setPos($pos_97);
		$_114 = \null;
		do {
			$res_99 = $result;
			$pos_99 = $this->pos;
			$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_114 = \true; break;
			}
			$result = $res_99;
			$this->setPos($pos_99);
			$_112 = \null;
			do {
				$res_101 = $result;
				$pos_101 = $this->pos;
				$key = 'match_'.'InterruptWithVarStmt'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
					$_112 = \true; break;
				}
				$result = $res_101;
				$this->setPos($pos_101);
				$_110 = \null;
				do {
					$res_103 = $result;
					$pos_103 = $this->pos;
					$key = 'match_'.'IfStatement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_110 = \true; break;
					}
					$result = $res_103;
					$this->setPos($pos_103);
					$_108 = \null;
					do {
						$res_105 = $result;
						$pos_105 = $this->pos;
						$key = 'match_'.'GotoStmt'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
							$_108 = \true; break;
						}
						$result = $res_105;
						$this->setPos($pos_105);
						$key = 'match_'.'LabelStmt'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
							$_108 = \true; break;
						}
						$result = $res_105;
						$this->setPos($pos_105);
						$_108 = \false; break;
					}
					while(\false);
					if($_108 === \true) { $_110 = \true; break; }
					$result = $res_103;
					$this->setPos($pos_103);
					$_110 = \false; break;
				}
				while(\false);
				if($_110 === \true) { $_112 = \true; break; }
				$result = $res_101;
				$this->setPos($pos_101);
				$_112 = \false; break;
			}
			while(\false);
			if($_112 === \true) { $_114 = \true; break; }
			$result = $res_99;
			$this->setPos($pos_99);
			$_114 = \false; break;
		}
		while(\false);
		if($_114 === \true) { $_116 = \true; break; }
		$result = $res_97;
		$this->setPos($pos_97);
		$_116 = \false; break;
	}
	while(\false);
	if($_116 === \true) { return $this->finalise($result); }
	if($_116 === \false) { return \false; }
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
	$_126 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_126 = \false; break; }
		while (\true) {
			$res_125 = $result;
			$pos_125 = $this->pos;
			$_124 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_124 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_124 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_124 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_124 = \false; break; }
				$_124 = \true; break;
			}
			while(\false);
			if($_124 === \false) {
				$result = $res_125;
				$this->setPos($pos_125);
				unset($res_125, $pos_125);
				break;
			}
		}
		$_126 = \true; break;
	}
	while(\false);
	if($_126 === \true) { return $this->finalise($result); }
	if($_126 === \false) { return \false; }
}


/* CompOp: "=" | "<>" | "<=" | ">=" | "<" | ">" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_147 = \null;
	do {
		$res_128 = $result;
		$pos_128 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
			$_147 = \true; break;
		}
		$result = $res_128;
		$this->setPos($pos_128);
		$_145 = \null;
		do {
			$res_130 = $result;
			$pos_130 = $this->pos;
			if (($subres = $this->literal('<>')) !== \false) {
				$result["text"] .= $subres;
				$_145 = \true; break;
			}
			$result = $res_130;
			$this->setPos($pos_130);
			$_143 = \null;
			do {
				$res_132 = $result;
				$pos_132 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_143 = \true; break;
				}
				$result = $res_132;
				$this->setPos($pos_132);
				$_141 = \null;
				do {
					$res_134 = $result;
					$pos_134 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_141 = \true; break;
					}
					$result = $res_134;
					$this->setPos($pos_134);
					$_139 = \null;
					do {
						$res_136 = $result;
						$pos_136 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_139 = \true; break;
						}
						$result = $res_136;
						$this->setPos($pos_136);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_139 = \true; break;
						}
						$result = $res_136;
						$this->setPos($pos_136);
						$_139 = \false; break;
					}
					while(\false);
					if($_139 === \true) { $_141 = \true; break; }
					$result = $res_134;
					$this->setPos($pos_134);
					$_141 = \false; break;
				}
				while(\false);
				if($_141 === \true) { $_143 = \true; break; }
				$result = $res_132;
				$this->setPos($pos_132);
				$_143 = \false; break;
			}
			while(\false);
			if($_143 === \true) { $_145 = \true; break; }
			$result = $res_130;
			$this->setPos($pos_130);
			$_145 = \false; break;
		}
		while(\false);
		if($_145 === \true) { $_147 = \true; break; }
		$result = $res_128;
		$this->setPos($pos_128);
		$_147 = \false; break;
	}
	while(\false);
	if($_147 === \true) { return $this->finalise($result); }
	if($_147 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_156 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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
				$key = 'match_'.'AddOp'; $pos = $this->pos;
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
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_161 = \null;
	do {
		$res_158 = $result;
		$pos_158 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_161 = \true; break;
		}
		$result = $res_158;
		$this->setPos($pos_158);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_161 = \true; break;
		}
		$result = $res_158;
		$this->setPos($pos_158);
		$_161 = \false; break;
	}
	while(\false);
	if($_161 === \true) { return $this->finalise($result); }
	if($_161 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_170 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_170 = \false; break; }
		while (\true) {
			$res_169 = $result;
			$pos_169 = $this->pos;
			$_168 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_168 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_168 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_168 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_168 = \false; break; }
				$_168 = \true; break;
			}
			while(\false);
			if($_168 === \false) {
				$result = $res_169;
				$this->setPos($pos_169);
				unset($res_169, $pos_169);
				break;
			}
		}
		$_170 = \true; break;
	}
	while(\false);
	if($_170 === \true) { return $this->finalise($result); }
	if($_170 === \false) { return \false; }
}


/* MulOp: "*" | "/" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_175 = \null;
	do {
		$res_172 = $result;
		$pos_172 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_175 = \true; break;
		}
		$result = $res_172;
		$this->setPos($pos_172);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_175 = \true; break;
		}
		$result = $res_172;
		$this->setPos($pos_172);
		$_175 = \false; break;
	}
	while(\false);
	if($_175 === \true) { return $this->finalise($result); }
	if($_175 === \false) { return \false; }
}


/* Primary: val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_194 = \null;
	do {
		$res_177 = $result;
		$pos_177 = $this->pos;
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_194 = \true; break;
		}
		$result = $res_177;
		$this->setPos($pos_177);
		$_192 = \null;
		do {
			$res_179 = $result;
			$pos_179 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_192 = \true; break;
			}
			$result = $res_179;
			$this->setPos($pos_179);
			$_190 = \null;
			do {
				$res_181 = $result;
				$pos_181 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_190 = \true; break;
				}
				$result = $res_181;
				$this->setPos($pos_181);
				$_188 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_188 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_188 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_188 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_188 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_188 = \false; break; }
					$_188 = \true; break;
				}
				while(\false);
				if($_188 === \true) { $_190 = \true; break; }
				$result = $res_181;
				$this->setPos($pos_181);
				$_190 = \false; break;
			}
			while(\false);
			if($_190 === \true) { $_192 = \true; break; }
			$result = $res_179;
			$this->setPos($pos_179);
			$_192 = \false; break;
		}
		while(\false);
		if($_192 === \true) { $_194 = \true; break; }
		$result = $res_177;
		$this->setPos($pos_177);
		$_194 = \false; break;
	}
	while(\false);
	if($_194 === \true) { return $this->finalise($result); }
	if($_194 === \false) { return \false; }
}


/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_199 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_199 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_199 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_199 = \false; break; }
		$_199 = \true; break;
	}
	while(\false);
	if($_199 === \true) { return $this->finalise($result); }
	if($_199 === \false) { return \false; }
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
	$_204 = \null;
	do {
		$res_202 = $result;
		$pos_202 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_202;
			$this->setPos($pos_202);
			$_204 = \false; break;
		}
		else {
			$result = $res_202;
			$this->setPos($pos_202);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_204 = \false; break; }
		$_204 = \true; break;
	}
	while(\false);
	if($_204 === \true) { return $this->finalise($result); }
	if($_204 === \false) { return \false; }
}


/* Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "GOTO" | "FOR" | "TO" | "NEXT" | "END") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_248 = \null;
	do {
		$_243 = \null;
		do {
			$_241 = \null;
			do {
				$res_206 = $result;
				$pos_206 = $this->pos;
				if (($subres = $this->literal('LET')) !== \false) {
					$result["text"] .= $subres;
					$_241 = \true; break;
				}
				$result = $res_206;
				$this->setPos($pos_206);
				$_239 = \null;
				do {
					$res_208 = $result;
					$pos_208 = $this->pos;
					if (($subres = $this->literal('PRINT')) !== \false) {
						$result["text"] .= $subres;
						$_239 = \true; break;
					}
					$result = $res_208;
					$this->setPos($pos_208);
					$_237 = \null;
					do {
						$res_210 = $result;
						$pos_210 = $this->pos;
						if (($subres = $this->literal('INPUT')) !== \false) {
							$result["text"] .= $subres;
							$_237 = \true; break;
						}
						$result = $res_210;
						$this->setPos($pos_210);
						$_235 = \null;
						do {
							$res_212 = $result;
							$pos_212 = $this->pos;
							if (($subres = $this->literal('IF')) !== \false) {
								$result["text"] .= $subres;
								$_235 = \true; break;
							}
							$result = $res_212;
							$this->setPos($pos_212);
							$_233 = \null;
							do {
								$res_214 = $result;
								$pos_214 = $this->pos;
								if (($subres = $this->literal('THEN')) !== \false) {
									$result["text"] .= $subres;
									$_233 = \true; break;
								}
								$result = $res_214;
								$this->setPos($pos_214);
								$_231 = \null;
								do {
									$res_216 = $result;
									$pos_216 = $this->pos;
									if (($subres = $this->literal('GOTO')) !== \false) {
										$result["text"] .= $subres;
										$_231 = \true; break;
									}
									$result = $res_216;
									$this->setPos($pos_216);
									$_229 = \null;
									do {
										$res_218 = $result;
										$pos_218 = $this->pos;
										if (($subres = $this->literal('FOR')) !== \false) {
											$result["text"] .= $subres;
											$_229 = \true; break;
										}
										$result = $res_218;
										$this->setPos($pos_218);
										$_227 = \null;
										do {
											$res_220 = $result;
											$pos_220 = $this->pos;
											if (($subres = $this->literal('TO')) !== \false) {
												$result["text"] .= $subres;
												$_227 = \true; break;
											}
											$result = $res_220;
											$this->setPos($pos_220);
											$_225 = \null;
											do {
												$res_222 = $result;
												$pos_222 = $this->pos;
												if (($subres = $this->literal('NEXT')) !== \false) {
													$result["text"] .= $subres;
													$_225 = \true; break;
												}
												$result = $res_222;
												$this->setPos($pos_222);
												if (($subres = $this->literal('END')) !== \false) {
													$result["text"] .= $subres;
													$_225 = \true; break;
												}
												$result = $res_222;
												$this->setPos($pos_222);
												$_225 = \false; break;
											}
											while(\false);
											if($_225 === \true) { $_227 = \true; break; }
											$result = $res_220;
											$this->setPos($pos_220);
											$_227 = \false; break;
										}
										while(\false);
										if($_227 === \true) { $_229 = \true; break; }
										$result = $res_218;
										$this->setPos($pos_218);
										$_229 = \false; break;
									}
									while(\false);
									if($_229 === \true) { $_231 = \true; break; }
									$result = $res_216;
									$this->setPos($pos_216);
									$_231 = \false; break;
								}
								while(\false);
								if($_231 === \true) { $_233 = \true; break; }
								$result = $res_214;
								$this->setPos($pos_214);
								$_233 = \false; break;
							}
							while(\false);
							if($_233 === \true) { $_235 = \true; break; }
							$result = $res_212;
							$this->setPos($pos_212);
							$_235 = \false; break;
						}
						while(\false);
						if($_235 === \true) { $_237 = \true; break; }
						$result = $res_210;
						$this->setPos($pos_210);
						$_237 = \false; break;
					}
					while(\false);
					if($_237 === \true) { $_239 = \true; break; }
					$result = $res_208;
					$this->setPos($pos_208);
					$_239 = \false; break;
				}
				while(\false);
				if($_239 === \true) { $_241 = \true; break; }
				$result = $res_206;
				$this->setPos($pos_206);
				$_241 = \false; break;
			}
			while(\false);
			if($_241 === \false) { $_243 = \false; break; }
			$_243 = \true; break;
		}
		while(\false);
		if($_243 === \false) { $_248 = \false; break; }
		$res_247 = $result;
		$pos_247 = $this->pos;
		$_246 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_246 = \false; break; }
			$_246 = \true; break;
		}
		while(\false);
		if($_246 === \true) {
			$result = $res_247;
			$this->setPos($pos_247);
			$_248 = \false; break;
		}
		if($_246 === \false) {
			$result = $res_247;
			$this->setPos($pos_247);
		}
		$_248 = \true; break;
	}
	while(\false);
	if($_248 === \true) { return $this->finalise($result); }
	if($_248 === \false) { return \false; }
}


/* _: ( /[ \t\r]{1,}/ | /\n/ | /REM[^\n]{0,}\n?/ ){0,} */
protected $match___typestack = ['_'];
function match__($stack = []) {
	$matchrule = '_';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	while (\true) {
		$res_260 = $result;
		$pos_260 = $this->pos;
		$_259 = \null;
		do {
			$_257 = \null;
			do {
				$res_250 = $result;
				$pos_250 = $this->pos;
				if (($subres = $this->rx('/[ \t\r]{1,}/')) !== \false) {
					$result["text"] .= $subres;
					$_257 = \true; break;
				}
				$result = $res_250;
				$this->setPos($pos_250);
				$_255 = \null;
				do {
					$res_252 = $result;
					$pos_252 = $this->pos;
					if (($subres = $this->rx('/\n/')) !== \false) {
						$result["text"] .= $subres;
						$_255 = \true; break;
					}
					$result = $res_252;
					$this->setPos($pos_252);
					if (($subres = $this->rx('/REM[^\n]{0,}\n?/')) !== \false) {
						$result["text"] .= $subres;
						$_255 = \true; break;
					}
					$result = $res_252;
					$this->setPos($pos_252);
					$_255 = \false; break;
				}
				while(\false);
				if($_255 === \true) { $_257 = \true; break; }
				$result = $res_250;
				$this->setPos($pos_250);
				$_257 = \false; break;
			}
			while(\false);
			if($_257 === \false) { $_259 = \false; break; }
			$_259 = \true; break;
		}
		while(\false);
		if($_259 === \false) {
			$result = $res_260;
			$this->setPos($pos_260);
			unset($res_260, $pos_260);
			break;
		}
	}
	return $this->finalise($result);
}




}
