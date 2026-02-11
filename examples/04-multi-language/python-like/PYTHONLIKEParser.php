<?php
namespace PYTHONLIKE;

class PYTHONLIKEParser extends \hafriedlander\Peg\Parser\Packrat {
/* Program: _ stmt:Statement ( /[\n;]/ _ stmt:Statement )* _ */
protected $match_Program_typestack = ['Program'];
function match_Program($stack = []) {
	$matchrule = 'Program';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_8 = \null;
	do {
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_8 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_8 = \false; break; }
		while (\true) {
			$res_6 = $result;
			$pos_6 = $this->pos;
			$_5 = \null;
			do {
				if (($subres = $this->rx('/[\n;]/')) !== \false) { $result["text"] .= $subres; }
				else { $_5 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_5 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_5 = \false; break; }
				$_5 = \true; break;
			}
			while(\false);
			if($_5 === \false) {
				$result = $res_6;
				$this->setPos($pos_6);
				unset($res_6, $pos_6);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_8 = \false; break; }
		$_8 = \true; break;
	}
	while(\false);
	if($_8 === \true) { return $this->finalise($result); }
	if($_8 === \false) { return \false; }
}


/* Statement: alt:Assignment | alt:InterruptSimpleStmt */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_13 = \null;
	do {
		$res_10 = $result;
		$pos_10 = $this->pos;
		$key = 'match_'.'Assignment'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_13 = \true; break;
		}
		$result = $res_10;
		$this->setPos($pos_10);
		$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_13 = \true; break;
		}
		$result = $res_10;
		$this->setPos($pos_10);
		$_13 = \false; break;
	}
	while(\false);
	if($_13 === \true) { return $this->finalise($result); }
	if($_13 === \false) { return \false; }
}


/* Assignment: var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_20 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_20 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_20 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_20 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_20 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_20 = \false; break; }
		$_20 = \true; break;
	}
	while(\false);
	if($_20 === \true) { return $this->finalise($result); }
	if($_20 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("print") _ "(" _ expr:Expression _ ")" */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_31 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_23 = \null;
		do {
			if (($subres = $this->literal('print')) !== \false) { $result["text"] .= $subres; }
			else { $_23 = \false; break; }
			$_23 = \true; break;
		}
		while(\false);
		if($_23 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_23 === \false) {
			$result = \array_pop($stack);
			$_31 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_31 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_31 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_31 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_31 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_31 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_31 = \false; break; }
		$_31 = \true; break;
	}
	while(\false);
	if($_31 === \true) { return $this->finalise($result); }
	if($_31 === \false) { return \false; }
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
	$_41 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_41 = \false; break; }
		while (\true) {
			$res_40 = $result;
			$pos_40 = $this->pos;
			$_39 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_39 = \false; break; }
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_39 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_39 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_39 = \false; break; }
				$_39 = \true; break;
			}
			while(\false);
			if($_39 === \false) {
				$result = $res_40;
				$this->setPos($pos_40);
				unset($res_40, $pos_40);
				break;
			}
		}
		$_41 = \true; break;
	}
	while(\false);
	if($_41 === \true) { return $this->finalise($result); }
	if($_41 === \false) { return \false; }
}


/* LogicalOp: "and" | "or" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_46 = \null;
	do {
		$res_43 = $result;
		$pos_43 = $this->pos;
		if (($subres = $this->literal('and')) !== \false) {
			$result["text"] .= $subres;
			$_46 = \true; break;
		}
		$result = $res_43;
		$this->setPos($pos_43);
		if (($subres = $this->literal('or')) !== \false) {
			$result["text"] .= $subres;
			$_46 = \true; break;
		}
		$result = $res_43;
		$this->setPos($pos_43);
		$_46 = \false; break;
	}
	while(\false);
	if($_46 === \true) { return $this->finalise($result); }
	if($_46 === \false) { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_55 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_55 = \false; break; }
		while (\true) {
			$res_54 = $result;
			$pos_54 = $this->pos;
			$_53 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_53 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_53 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_53 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_53 = \false; break; }
				$_53 = \true; break;
			}
			while(\false);
			if($_53 === \false) {
				$result = $res_54;
				$this->setPos($pos_54);
				unset($res_54, $pos_54);
				break;
			}
		}
		$_55 = \true; break;
	}
	while(\false);
	if($_55 === \true) { return $this->finalise($result); }
	if($_55 === \false) { return \false; }
}


/* CompOp: "==" | "!=" | "<=" | ">=" | "<" | ">" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_76 = \null;
	do {
		$res_57 = $result;
		$pos_57 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_76 = \true; break;
		}
		$result = $res_57;
		$this->setPos($pos_57);
		$_74 = \null;
		do {
			$res_59 = $result;
			$pos_59 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_74 = \true; break;
			}
			$result = $res_59;
			$this->setPos($pos_59);
			$_72 = \null;
			do {
				$res_61 = $result;
				$pos_61 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_72 = \true; break;
				}
				$result = $res_61;
				$this->setPos($pos_61);
				$_70 = \null;
				do {
					$res_63 = $result;
					$pos_63 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_70 = \true; break;
					}
					$result = $res_63;
					$this->setPos($pos_63);
					$_68 = \null;
					do {
						$res_65 = $result;
						$pos_65 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_68 = \true; break;
						}
						$result = $res_65;
						$this->setPos($pos_65);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_68 = \true; break;
						}
						$result = $res_65;
						$this->setPos($pos_65);
						$_68 = \false; break;
					}
					while(\false);
					if($_68 === \true) { $_70 = \true; break; }
					$result = $res_63;
					$this->setPos($pos_63);
					$_70 = \false; break;
				}
				while(\false);
				if($_70 === \true) { $_72 = \true; break; }
				$result = $res_61;
				$this->setPos($pos_61);
				$_72 = \false; break;
			}
			while(\false);
			if($_72 === \true) { $_74 = \true; break; }
			$result = $res_59;
			$this->setPos($pos_59);
			$_74 = \false; break;
		}
		while(\false);
		if($_74 === \true) { $_76 = \true; break; }
		$result = $res_57;
		$this->setPos($pos_57);
		$_76 = \false; break;
	}
	while(\false);
	if($_76 === \true) { return $this->finalise($result); }
	if($_76 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_85 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_85 = \false; break; }
		while (\true) {
			$res_84 = $result;
			$pos_84 = $this->pos;
			$_83 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_83 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_83 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_83 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_83 = \false; break; }
				$_83 = \true; break;
			}
			while(\false);
			if($_83 === \false) {
				$result = $res_84;
				$this->setPos($pos_84);
				unset($res_84, $pos_84);
				break;
			}
		}
		$_85 = \true; break;
	}
	while(\false);
	if($_85 === \true) { return $this->finalise($result); }
	if($_85 === \false) { return \false; }
}


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_90 = \null;
	do {
		$res_87 = $result;
		$pos_87 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_90 = \true; break;
		}
		$result = $res_87;
		$this->setPos($pos_87);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_90 = \true; break;
		}
		$result = $res_87;
		$this->setPos($pos_87);
		$_90 = \false; break;
	}
	while(\false);
	if($_90 === \true) { return $this->finalise($result); }
	if($_90 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_99 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_99 = \false; break; }
		while (\true) {
			$res_98 = $result;
			$pos_98 = $this->pos;
			$_97 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_97 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_97 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_97 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_97 = \false; break; }
				$_97 = \true; break;
			}
			while(\false);
			if($_97 === \false) {
				$result = $res_98;
				$this->setPos($pos_98);
				unset($res_98, $pos_98);
				break;
			}
		}
		$_99 = \true; break;
	}
	while(\false);
	if($_99 === \true) { return $this->finalise($result); }
	if($_99 === \false) { return \false; }
}


/* MulOp: "*" | "/" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_104 = \null;
	do {
		$res_101 = $result;
		$pos_101 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_104 = \true; break;
		}
		$result = $res_101;
		$this->setPos($pos_101);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_104 = \true; break;
		}
		$result = $res_101;
		$this->setPos($pos_101);
		$_104 = \false; break;
	}
	while(\false);
	if($_104 === \true) { return $this->finalise($result); }
	if($_104 === \false) { return \false; }
}


/* Primary: val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_119 = \null;
	do {
		$res_106 = $result;
		$pos_106 = $this->pos;
		$key = 'match_'.'Number'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_119 = \true; break;
		}
		$result = $res_106;
		$this->setPos($pos_106);
		$_117 = \null;
		do {
			$res_108 = $result;
			$pos_108 = $this->pos;
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_117 = \true; break;
			}
			$result = $res_108;
			$this->setPos($pos_108);
			$_115 = \null;
			do {
				if (\substr($this->string, $this->pos, 1) === '(') {
					$this->addPos(1);
					$result["text"] .= '(';
				}
				else { $_115 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_115 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
				}
				else { $_115 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_115 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ')') {
					$this->addPos(1);
					$result["text"] .= ')';
				}
				else { $_115 = \false; break; }
				$_115 = \true; break;
			}
			while(\false);
			if($_115 === \true) { $_117 = \true; break; }
			$result = $res_108;
			$this->setPos($pos_108);
			$_117 = \false; break;
		}
		while(\false);
		if($_117 === \true) { $_119 = \true; break; }
		$result = $res_106;
		$this->setPos($pos_106);
		$_119 = \false; break;
	}
	while(\false);
	if($_119 === \true) { return $this->finalise($result); }
	if($_119 === \false) { return \false; }
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
	$_124 = \null;
	do {
		$res_122 = $result;
		$pos_122 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_122;
			$this->setPos($pos_122);
			$_124 = \false; break;
		}
		else {
			$result = $res_122;
			$this->setPos($pos_122);
		}
		if (($subres = $this->rx('/[a-z_][a-z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_124 = \false; break; }
		$_124 = \true; break;
	}
	while(\false);
	if($_124 === \true) { return $this->finalise($result); }
	if($_124 === \false) { return \false; }
}


/* Keyword: ("print" | "and" | "or" | "if" | "while" | "for") !(/[a-z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_152 = \null;
	do {
		$_147 = \null;
		do {
			$_145 = \null;
			do {
				$res_126 = $result;
				$pos_126 = $this->pos;
				if (($subres = $this->literal('print')) !== \false) {
					$result["text"] .= $subres;
					$_145 = \true; break;
				}
				$result = $res_126;
				$this->setPos($pos_126);
				$_143 = \null;
				do {
					$res_128 = $result;
					$pos_128 = $this->pos;
					if (($subres = $this->literal('and')) !== \false) {
						$result["text"] .= $subres;
						$_143 = \true; break;
					}
					$result = $res_128;
					$this->setPos($pos_128);
					$_141 = \null;
					do {
						$res_130 = $result;
						$pos_130 = $this->pos;
						if (($subres = $this->literal('or')) !== \false) {
							$result["text"] .= $subres;
							$_141 = \true; break;
						}
						$result = $res_130;
						$this->setPos($pos_130);
						$_139 = \null;
						do {
							$res_132 = $result;
							$pos_132 = $this->pos;
							if (($subres = $this->literal('if')) !== \false) {
								$result["text"] .= $subres;
								$_139 = \true; break;
							}
							$result = $res_132;
							$this->setPos($pos_132);
							$_137 = \null;
							do {
								$res_134 = $result;
								$pos_134 = $this->pos;
								if (($subres = $this->literal('while')) !== \false) {
									$result["text"] .= $subres;
									$_137 = \true; break;
								}
								$result = $res_134;
								$this->setPos($pos_134);
								if (($subres = $this->literal('for')) !== \false) {
									$result["text"] .= $subres;
									$_137 = \true; break;
								}
								$result = $res_134;
								$this->setPos($pos_134);
								$_137 = \false; break;
							}
							while(\false);
							if($_137 === \true) { $_139 = \true; break; }
							$result = $res_132;
							$this->setPos($pos_132);
							$_139 = \false; break;
						}
						while(\false);
						if($_139 === \true) { $_141 = \true; break; }
						$result = $res_130;
						$this->setPos($pos_130);
						$_141 = \false; break;
					}
					while(\false);
					if($_141 === \true) { $_143 = \true; break; }
					$result = $res_128;
					$this->setPos($pos_128);
					$_143 = \false; break;
				}
				while(\false);
				if($_143 === \true) { $_145 = \true; break; }
				$result = $res_126;
				$this->setPos($pos_126);
				$_145 = \false; break;
			}
			while(\false);
			if($_145 === \false) { $_147 = \false; break; }
			$_147 = \true; break;
		}
		while(\false);
		if($_147 === \false) { $_152 = \false; break; }
		$res_151 = $result;
		$pos_151 = $this->pos;
		$_150 = \null;
		do {
			if (($subres = $this->rx('/[a-z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_150 = \false; break; }
			$_150 = \true; break;
		}
		while(\false);
		if($_150 === \true) {
			$result = $res_151;
			$this->setPos($pos_151);
			$_152 = \false; break;
		}
		if($_150 === \false) {
			$result = $res_151;
			$this->setPos($pos_151);
		}
		$_152 = \true; break;
	}
	while(\false);
	if($_152 === \true) { return $this->finalise($result); }
	if($_152 === \false) { return \false; }
}


/* _: /[ \t\n\r]{0,}/ */
protected $match___typestack = ['_'];
function match__($stack = []) {
	$matchrule = '_';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[ \t\n\r]{0,}/')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}




}
