<?php
namespace PYTHON-LIKE;

class GeneratedParser extends \hafriedlander\Peg\Parser\Packrat {
/* Program: _ stmt:Statement+ */
protected $match_Program_typestack = ['Program'];
function match_Program($stack = []) {
	$matchrule = 'Program';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_2 = \null;
	do {
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_2 = \false; break; }
		$count_1 = 0;
		while (\true) {
			$res_1 = $result;
			$pos_1 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "stmt");
			}
			else {
				$result = $res_1;
				$this->setPos($pos_1);
				unset($res_1, $pos_1);
				break;
			}
			$count_1++;
		}
		if ($count_1 >= 1) {  }
		else { $_2 = \false; break; }
		$_2 = \true; break;
	}
	while(\false);
	if($_2 === \true) { return $this->finalise($result); }
	if($_2 === \false) { return \false; }
}

public function Program_stmt (&$res, $sub) {
    if (!isset($res['statements'])) $res['statements'] = [];
    $res['statements'][] = $sub;
  }

/* Statement: alt:IfStmt _ | alt:WhileStmt _ | alt:ForStmt _ | alt:Assignment _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_27 = \null;
	do {
		$res_4 = $result;
		$pos_4 = $this->pos;
		$_7 = \null;
		do {
			$key = 'match_'.'IfStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
			}
			else { $_7 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_7 = \false; break; }
			$_7 = \true; break;
		}
		while(\false);
		if($_7 === \true) { $_27 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_25 = \null;
		do {
			$res_9 = $result;
			$pos_9 = $this->pos;
			$_12 = \null;
			do {
				$key = 'match_'.'WhileStmt'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
				}
				else { $_12 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_12 = \false; break; }
				$_12 = \true; break;
			}
			while(\false);
			if($_12 === \true) { $_25 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_23 = \null;
			do {
				$res_14 = $result;
				$pos_14 = $this->pos;
				$_17 = \null;
				do {
					$key = 'match_'.'ForStmt'; $pos = $this->pos;
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
					$_17 = \true; break;
				}
				while(\false);
				if($_17 === \true) { $_23 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_21 = \null;
				do {
					$key = 'match_'.'Assignment'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
					}
					else { $_21 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_21 = \false; break; }
					$_21 = \true; break;
				}
				while(\false);
				if($_21 === \true) { $_23 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_23 = \false; break;
			}
			while(\false);
			if($_23 === \true) { $_25 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_25 = \false; break;
		}
		while(\false);
		if($_25 === \true) { $_27 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_27 = \false; break;
	}
	while(\false);
	if($_27 === \true) { return $this->finalise($result); }
	if($_27 === \false) { return \false; }
}

public function Statement_alt (&$res, $sub) {
    $res['node'] = $sub;
  }

/* Assignment: var:Postfix _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_34 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_34 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_34 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_34 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_34 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_34 = \false; break; }
		$_34 = \true; break;
	}
	while(\false);
	if($_34 === \true) { return $this->finalise($result); }
	if($_34 === \false) { return \false; }
}


/* IfStmt: "if" _ cond:Expression _ ":" _ body:Statement+ ( _ "else" _ ":" _ else:Statement+ )? ( _ "end" ) */
protected $match_IfStmt_typestack = ['IfStmt'];
function match_IfStmt($stack = []) {
	$matchrule = 'IfStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_55 = \null;
	do {
		if (($subres = $this->literal('if')) !== \false) { $result["text"] .= $subres; }
		else { $_55 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_55 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_55 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_55 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_55 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_55 = \false; break; }
		$count_42 = 0;
		while (\true) {
			$res_42 = $result;
			$pos_42 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_42;
				$this->setPos($pos_42);
				unset($res_42, $pos_42);
				break;
			}
			$count_42++;
		}
		if ($count_42 >= 1) {  }
		else { $_55 = \false; break; }
		$res_50 = $result;
		$pos_50 = $this->pos;
		$_49 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_49 = \false; break; }
			if (($subres = $this->literal('else')) !== \false) { $result["text"] .= $subres; }
			else { $_49 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_49 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ':') {
				$this->addPos(1);
				$result["text"] .= ':';
			}
			else { $_49 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_49 = \false; break; }
			$count_48 = 0;
			while (\true) {
				$res_48 = $result;
				$pos_48 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else {
					$result = $res_48;
					$this->setPos($pos_48);
					unset($res_48, $pos_48);
					break;
				}
				$count_48++;
			}
			if ($count_48 >= 1) {  }
			else { $_49 = \false; break; }
			$_49 = \true; break;
		}
		while(\false);
		if($_49 === \false) {
			$result = $res_50;
			$this->setPos($pos_50);
			unset($res_50, $pos_50);
		}
		$_53 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_53 = \false; break; }
			if (($subres = $this->literal('end')) !== \false) { $result["text"] .= $subres; }
			else { $_53 = \false; break; }
			$_53 = \true; break;
		}
		while(\false);
		if($_53 === \false) { $_55 = \false; break; }
		$_55 = \true; break;
	}
	while(\false);
	if($_55 === \true) { return $this->finalise($result); }
	if($_55 === \false) { return \false; }
}

public function IfStmt_body (&$res, $sub) {
    if (!isset($res['thenBody'])) $res['thenBody'] = [];
    $res['thenBody'][] = $sub;
  }

public function IfStmt_else (&$res, $sub) {
    if (!isset($res['elseBody'])) $res['elseBody'] = [];
    $res['elseBody'][] = $sub;
  }

/* WhileStmt: "while" _ cond:Expression _ ":" _ body:Statement+ "end" */
protected $match_WhileStmt_typestack = ['WhileStmt'];
function match_WhileStmt($stack = []) {
	$matchrule = 'WhileStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_65 = \null;
	do {
		if (($subres = $this->literal('while')) !== \false) { $result["text"] .= $subres; }
		else { $_65 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_65 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_65 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_65 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_65 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_65 = \false; break; }
		$count_63 = 0;
		while (\true) {
			$res_63 = $result;
			$pos_63 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_63;
				$this->setPos($pos_63);
				unset($res_63, $pos_63);
				break;
			}
			$count_63++;
		}
		if ($count_63 >= 1) {  }
		else { $_65 = \false; break; }
		if (($subres = $this->literal('end')) !== \false) { $result["text"] .= $subres; }
		else { $_65 = \false; break; }
		$_65 = \true; break;
	}
	while(\false);
	if($_65 === \true) { return $this->finalise($result); }
	if($_65 === \false) { return \false; }
}

public function WhileStmt_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* ForStmt: "for" _ var:Identifier _ "in" _ "range" _ "(" _ from:Expression _ "," _ to:Expression _ ")" _ ":" _ body:Statement+ "end" */
protected $match_ForStmt_typestack = ['ForStmt'];
function match_ForStmt($stack = []) {
	$matchrule = 'ForStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_89 = \null;
	do {
		if (($subres = $this->literal('for')) !== \false) { $result["text"] .= $subres; }
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
		if (($subres = $this->literal('in')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (($subres = $this->literal('range')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
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
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_89 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_89 = \false; break; }
		$count_87 = 0;
		while (\true) {
			$res_87 = $result;
			$pos_87 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_87;
				$this->setPos($pos_87);
				unset($res_87, $pos_87);
				break;
			}
			$count_87++;
		}
		if ($count_87 >= 1) {  }
		else { $_89 = \false; break; }
		if (($subres = $this->literal('end')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
		$_89 = \true; break;
	}
	while(\false);
	if($_89 === \true) { return $this->finalise($result); }
	if($_89 === \false) { return \false; }
}

public function ForStmt_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
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

public function Expression_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* Logical: left:Comparison ( _ op:LogicalOp _ right:Comparison )* */
protected $match_Logical_typestack = ['Logical'];
function match_Logical($stack = []) {
	$matchrule = 'Logical';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_99 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
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
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
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
				$key = 'match_'.'Comparison'; $pos = $this->pos;
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

public function Logical_left (&$res, $sub) {
    $res['left'] = $sub;
  }

public function Logical_op (&$res, $sub) {
    if (!isset($res['ops'])) $res['ops'] = [];
    $res['ops'][] = $sub;
  }

public function Logical_right (&$res, $sub) {
    if (!isset($res['rights'])) $res['rights'] = [];
    $res['rights'][] = $sub;
  }

/* LogicalOp: "and" | "or" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_104 = \null;
	do {
		$res_101 = $result;
		$pos_101 = $this->pos;
		if (($subres = $this->literal('and')) !== \false) {
			$result["text"] .= $subres;
			$_104 = \true; break;
		}
		$result = $res_101;
		$this->setPos($pos_101);
		if (($subres = $this->literal('or')) !== \false) {
			$result["text"] .= $subres;
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


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_113 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_113 = \false; break; }
		while (\true) {
			$res_112 = $result;
			$pos_112 = $this->pos;
			$_111 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_111 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_111 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_111 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_111 = \false; break; }
				$_111 = \true; break;
			}
			while(\false);
			if($_111 === \false) {
				$result = $res_112;
				$this->setPos($pos_112);
				unset($res_112, $pos_112);
				break;
			}
		}
		$_113 = \true; break;
	}
	while(\false);
	if($_113 === \true) { return $this->finalise($result); }
	if($_113 === \false) { return \false; }
}

public function Comparison_left (&$res, $sub) {
    $res['left'] = $sub;
  }

public function Comparison_op (&$res, $sub) {
    if (!isset($res['ops'])) $res['ops'] = [];
    $res['ops'][] = $sub;
  }

public function Comparison_right (&$res, $sub) {
    if (!isset($res['rights'])) $res['rights'] = [];
    $res['rights'][] = $sub;
  }

/* CompOp: "==" | "!=" | "<=" | ">=" | "<" | ">" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_134 = \null;
	do {
		$res_115 = $result;
		$pos_115 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_134 = \true; break;
		}
		$result = $res_115;
		$this->setPos($pos_115);
		$_132 = \null;
		do {
			$res_117 = $result;
			$pos_117 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_132 = \true; break;
			}
			$result = $res_117;
			$this->setPos($pos_117);
			$_130 = \null;
			do {
				$res_119 = $result;
				$pos_119 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_130 = \true; break;
				}
				$result = $res_119;
				$this->setPos($pos_119);
				$_128 = \null;
				do {
					$res_121 = $result;
					$pos_121 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_128 = \true; break;
					}
					$result = $res_121;
					$this->setPos($pos_121);
					$_126 = \null;
					do {
						$res_123 = $result;
						$pos_123 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_126 = \true; break;
						}
						$result = $res_123;
						$this->setPos($pos_123);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_126 = \true; break;
						}
						$result = $res_123;
						$this->setPos($pos_123);
						$_126 = \false; break;
					}
					while(\false);
					if($_126 === \true) { $_128 = \true; break; }
					$result = $res_121;
					$this->setPos($pos_121);
					$_128 = \false; break;
				}
				while(\false);
				if($_128 === \true) { $_130 = \true; break; }
				$result = $res_119;
				$this->setPos($pos_119);
				$_130 = \false; break;
			}
			while(\false);
			if($_130 === \true) { $_132 = \true; break; }
			$result = $res_117;
			$this->setPos($pos_117);
			$_132 = \false; break;
		}
		while(\false);
		if($_132 === \true) { $_134 = \true; break; }
		$result = $res_115;
		$this->setPos($pos_115);
		$_134 = \false; break;
	}
	while(\false);
	if($_134 === \true) { return $this->finalise($result); }
	if($_134 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_143 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_143 = \false; break; }
		while (\true) {
			$res_142 = $result;
			$pos_142 = $this->pos;
			$_141 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_141 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_141 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_141 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_141 = \false; break; }
				$_141 = \true; break;
			}
			while(\false);
			if($_141 === \false) {
				$result = $res_142;
				$this->setPos($pos_142);
				unset($res_142, $pos_142);
				break;
			}
		}
		$_143 = \true; break;
	}
	while(\false);
	if($_143 === \true) { return $this->finalise($result); }
	if($_143 === \false) { return \false; }
}

public function Additive_left (&$res, $sub) {
    $res['left'] = $sub;
  }

public function Additive_op (&$res, $sub) {
    if (!isset($res['ops'])) $res['ops'] = [];
    $res['ops'][] = $sub;
  }

public function Additive_right (&$res, $sub) {
    if (!isset($res['rights'])) $res['rights'] = [];
    $res['rights'][] = $sub;
  }

/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_148 = \null;
	do {
		$res_145 = $result;
		$pos_145 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_148 = \true; break;
		}
		$result = $res_145;
		$this->setPos($pos_145);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_148 = \true; break;
		}
		$result = $res_145;
		$this->setPos($pos_145);
		$_148 = \false; break;
	}
	while(\false);
	if($_148 === \true) { return $this->finalise($result); }
	if($_148 === \false) { return \false; }
}


/* Multiplicative: left:Postfix ( _ op:MulOp _ right:Postfix )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_157 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_157 = \false; break; }
		while (\true) {
			$res_156 = $result;
			$pos_156 = $this->pos;
			$_155 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_155 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_155 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_155 = \false; break; }
				$key = 'match_'.'Postfix'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_155 = \false; break; }
				$_155 = \true; break;
			}
			while(\false);
			if($_155 === \false) {
				$result = $res_156;
				$this->setPos($pos_156);
				unset($res_156, $pos_156);
				break;
			}
		}
		$_157 = \true; break;
	}
	while(\false);
	if($_157 === \true) { return $this->finalise($result); }
	if($_157 === \false) { return \false; }
}

public function Multiplicative_left (&$res, $sub) {
    $res['left'] = $sub;
  }

public function Multiplicative_op (&$res, $sub) {
    if (!isset($res['ops'])) $res['ops'] = [];
    $res['ops'][] = $sub;
  }

public function Multiplicative_right (&$res, $sub) {
    if (!isset($res['rights'])) $res['rights'] = [];
    $res['rights'][] = $sub;
  }

/* MulOp: "*" | "/" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_162 = \null;
	do {
		$res_159 = $result;
		$pos_159 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_162 = \true; break;
		}
		$result = $res_159;
		$this->setPos($pos_159);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_162 = \true; break;
		}
		$result = $res_159;
		$this->setPos($pos_159);
		$_162 = \false; break;
	}
	while(\false);
	if($_162 === \true) { return $this->finalise($result); }
	if($_162 === \false) { return \false; }
}


/* Postfix: base:Primary ( _ "[" _ index:Expression _ "]" )* */
protected $match_Postfix_typestack = ['Postfix'];
function match_Postfix($stack = []) {
	$matchrule = 'Postfix';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_173 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "base");
		}
		else { $_173 = \false; break; }
		while (\true) {
			$res_172 = $result;
			$pos_172 = $this->pos;
			$_171 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_171 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === '[') {
					$this->addPos(1);
					$result["text"] .= '[';
				}
				else { $_171 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_171 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "index");
				}
				else { $_171 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_171 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ']') {
					$this->addPos(1);
					$result["text"] .= ']';
				}
				else { $_171 = \false; break; }
				$_171 = \true; break;
			}
			while(\false);
			if($_171 === \false) {
				$result = $res_172;
				$this->setPos($pos_172);
				unset($res_172, $pos_172);
				break;
			}
		}
		$_173 = \true; break;
	}
	while(\false);
	if($_173 === \true) { return $this->finalise($result); }
	if($_173 === \false) { return \false; }
}

public function Postfix_base (&$res, $sub) {
    $res['base'] = $sub;
  }

public function Postfix_index (&$res, $sub) {
    if (!isset($res['indices'])) $res['indices'] = [];
    $res['indices'][] = $sub;
  }

/* Primary: val:ArrayLiteral | val:DictLiteral | val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_200 = \null;
	do {
		$res_175 = $result;
		$pos_175 = $this->pos;
		$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_200 = \true; break;
		}
		$result = $res_175;
		$this->setPos($pos_175);
		$_198 = \null;
		do {
			$res_177 = $result;
			$pos_177 = $this->pos;
			$key = 'match_'.'DictLiteral'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_198 = \true; break;
			}
			$result = $res_177;
			$this->setPos($pos_177);
			$_196 = \null;
			do {
				$res_179 = $result;
				$pos_179 = $this->pos;
				$key = 'match_'.'String'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_196 = \true; break;
				}
				$result = $res_179;
				$this->setPos($pos_179);
				$_194 = \null;
				do {
					$res_181 = $result;
					$pos_181 = $this->pos;
					$key = 'match_'.'Number'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_194 = \true; break;
					}
					$result = $res_181;
					$this->setPos($pos_181);
					$_192 = \null;
					do {
						$res_183 = $result;
						$pos_183 = $this->pos;
						$key = 'match_'.'Identifier'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
							$_192 = \true; break;
						}
						$result = $res_183;
						$this->setPos($pos_183);
						$_190 = \null;
						do {
							if (\substr($this->string, $this->pos, 1) === '(') {
								$this->addPos(1);
								$result["text"] .= '(';
							}
							else { $_190 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_190 = \false; break; }
							$key = 'match_'.'Expression'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "val");
							}
							else { $_190 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_190 = \false; break; }
							if (\substr($this->string, $this->pos, 1) === ')') {
								$this->addPos(1);
								$result["text"] .= ')';
							}
							else { $_190 = \false; break; }
							$_190 = \true; break;
						}
						while(\false);
						if($_190 === \true) { $_192 = \true; break; }
						$result = $res_183;
						$this->setPos($pos_183);
						$_192 = \false; break;
					}
					while(\false);
					if($_192 === \true) { $_194 = \true; break; }
					$result = $res_181;
					$this->setPos($pos_181);
					$_194 = \false; break;
				}
				while(\false);
				if($_194 === \true) { $_196 = \true; break; }
				$result = $res_179;
				$this->setPos($pos_179);
				$_196 = \false; break;
			}
			while(\false);
			if($_196 === \true) { $_198 = \true; break; }
			$result = $res_177;
			$this->setPos($pos_177);
			$_198 = \false; break;
		}
		while(\false);
		if($_198 === \true) { $_200 = \true; break; }
		$result = $res_175;
		$this->setPos($pos_175);
		$_200 = \false; break;
	}
	while(\false);
	if($_200 === \true) { return $this->finalise($result); }
	if($_200 === \false) { return \false; }
}

public function Primary_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* ArrayLiteral: "[" _ elements:ArrayElements? _ "]" */
protected $match_ArrayLiteral_typestack = ['ArrayLiteral'];
function match_ArrayLiteral($stack = []) {
	$matchrule = 'ArrayLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_207 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		$res_204 = $result;
		$pos_204 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elements");
		}
		else {
			$result = $res_204;
			$this->setPos($pos_204);
			unset($res_204, $pos_204);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_207 = \false; break; }
		$_207 = \true; break;
	}
	while(\false);
	if($_207 === \true) { return $this->finalise($result); }
	if($_207 === \false) { return \false; }
}


/* ArrayElements: elem:Expression ( _ "," _ elem:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_216 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elem");
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
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
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
					$this->store($result, $subres, "elem");
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

public function ArrayElements_elem (&$res, $sub) {
    if (!isset($res['elements'])) $res['elements'] = [];
    $res['elements'][] = $sub;
  }

/* DictLiteral: "{" _ pairs:DictPairs? _ "}" */
protected $match_DictLiteral_typestack = ['DictLiteral'];
function match_DictLiteral($stack = []) {
	$matchrule = 'DictLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_223 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '{') {
			$this->addPos(1);
			$result["text"] .= '{';
		}
		else { $_223 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_223 = \false; break; }
		$res_220 = $result;
		$pos_220 = $this->pos;
		$key = 'match_'.'DictPairs'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pairs");
		}
		else {
			$result = $res_220;
			$this->setPos($pos_220);
			unset($res_220, $pos_220);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_223 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '}') {
			$this->addPos(1);
			$result["text"] .= '}';
		}
		else { $_223 = \false; break; }
		$_223 = \true; break;
	}
	while(\false);
	if($_223 === \true) { return $this->finalise($result); }
	if($_223 === \false) { return \false; }
}


/* DictPairs: pair:DictPair ( _ "," _ pair:DictPair )* */
protected $match_DictPairs_typestack = ['DictPairs'];
function match_DictPairs($stack = []) {
	$matchrule = 'DictPairs';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_232 = \null;
	do {
		$key = 'match_'.'DictPair'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pair");
		}
		else { $_232 = \false; break; }
		while (\true) {
			$res_231 = $result;
			$pos_231 = $this->pos;
			$_230 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_230 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_230 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_230 = \false; break; }
				$key = 'match_'.'DictPair'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "pair");
				}
				else { $_230 = \false; break; }
				$_230 = \true; break;
			}
			while(\false);
			if($_230 === \false) {
				$result = $res_231;
				$this->setPos($pos_231);
				unset($res_231, $pos_231);
				break;
			}
		}
		$_232 = \true; break;
	}
	while(\false);
	if($_232 === \true) { return $this->finalise($result); }
	if($_232 === \false) { return \false; }
}

public function DictPairs_pair (&$res, $sub) {
    if (!isset($res['pairs'])) $res['pairs'] = [];
    $res['pairs'][] = $sub;
  }

/* DictPair: key:String _ ":" _ value:Expression */
protected $match_DictPair_typestack = ['DictPair'];
function match_DictPair($stack = []) {
	$matchrule = 'DictPair';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_239 = \null;
	do {
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "key");
		}
		else { $_239 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_239 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_239 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_239 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
		}
		else { $_239 = \false; break; }
		$_239 = \true; break;
	}
	while(\false);
	if($_239 === \true) { return $this->finalise($result); }
	if($_239 === \false) { return \false; }
}


/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_244 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_244 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_244 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_244 = \false; break; }
		$_244 = \true; break;
	}
	while(\false);
	if($_244 === \true) { return $this->finalise($result); }
	if($_244 === \false) { return \false; }
}

public function String_content (&$res, $sub) {
    $res['value'] = $sub['text'];
  }

/* Number: /[0-9]+(\\.[0-9]+)?/ */
protected $match_Number_typestack = ['Number'];
function match_Number($stack = []) {
	$matchrule = 'Number';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[0-9]+(\\\\.[0-9]+)?/')) !== \false) {
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
	$_249 = \null;
	do {
		$res_247 = $result;
		$pos_247 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_247;
			$this->setPos($pos_247);
			$_249 = \false; break;
		}
		else {
			$result = $res_247;
			$this->setPos($pos_247);
		}
		if (($subres = $this->rx('/[a-z_][a-z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_249 = \false; break; }
		$_249 = \true; break;
	}
	while(\false);
	if($_249 === \true) { return $this->finalise($result); }
	if($_249 === \false) { return \false; }
}


/* Keyword: ("if" | "else" | "while" | "for" | "in" | "range" | "and" | "or" | "end") !(/[a-z0-9_]/) */
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
				$res_251 = $result;
				$pos_251 = $this->pos;
				if (($subres = $this->literal('if')) !== \false) {
					$result["text"] .= $subres;
					$_282 = \true; break;
				}
				$result = $res_251;
				$this->setPos($pos_251);
				$_280 = \null;
				do {
					$res_253 = $result;
					$pos_253 = $this->pos;
					if (($subres = $this->literal('else')) !== \false) {
						$result["text"] .= $subres;
						$_280 = \true; break;
					}
					$result = $res_253;
					$this->setPos($pos_253);
					$_278 = \null;
					do {
						$res_255 = $result;
						$pos_255 = $this->pos;
						if (($subres = $this->literal('while')) !== \false) {
							$result["text"] .= $subres;
							$_278 = \true; break;
						}
						$result = $res_255;
						$this->setPos($pos_255);
						$_276 = \null;
						do {
							$res_257 = $result;
							$pos_257 = $this->pos;
							if (($subres = $this->literal('for')) !== \false) {
								$result["text"] .= $subres;
								$_276 = \true; break;
							}
							$result = $res_257;
							$this->setPos($pos_257);
							$_274 = \null;
							do {
								$res_259 = $result;
								$pos_259 = $this->pos;
								if (($subres = $this->literal('in')) !== \false) {
									$result["text"] .= $subres;
									$_274 = \true; break;
								}
								$result = $res_259;
								$this->setPos($pos_259);
								$_272 = \null;
								do {
									$res_261 = $result;
									$pos_261 = $this->pos;
									if (($subres = $this->literal('range')) !== \false) {
										$result["text"] .= $subres;
										$_272 = \true; break;
									}
									$result = $res_261;
									$this->setPos($pos_261);
									$_270 = \null;
									do {
										$res_263 = $result;
										$pos_263 = $this->pos;
										if (($subres = $this->literal('and')) !== \false) {
											$result["text"] .= $subres;
											$_270 = \true; break;
										}
										$result = $res_263;
										$this->setPos($pos_263);
										$_268 = \null;
										do {
											$res_265 = $result;
											$pos_265 = $this->pos;
											if (($subres = $this->literal('or')) !== \false) {
												$result["text"] .= $subres;
												$_268 = \true; break;
											}
											$result = $res_265;
											$this->setPos($pos_265);
											if (($subres = $this->literal('end')) !== \false) {
												$result["text"] .= $subres;
												$_268 = \true; break;
											}
											$result = $res_265;
											$this->setPos($pos_265);
											$_268 = \false; break;
										}
										while(\false);
										if($_268 === \true) { $_270 = \true; break; }
										$result = $res_263;
										$this->setPos($pos_263);
										$_270 = \false; break;
									}
									while(\false);
									if($_270 === \true) { $_272 = \true; break; }
									$result = $res_261;
									$this->setPos($pos_261);
									$_272 = \false; break;
								}
								while(\false);
								if($_272 === \true) { $_274 = \true; break; }
								$result = $res_259;
								$this->setPos($pos_259);
								$_274 = \false; break;
							}
							while(\false);
							if($_274 === \true) { $_276 = \true; break; }
							$result = $res_257;
							$this->setPos($pos_257);
							$_276 = \false; break;
						}
						while(\false);
						if($_276 === \true) { $_278 = \true; break; }
						$result = $res_255;
						$this->setPos($pos_255);
						$_278 = \false; break;
					}
					while(\false);
					if($_278 === \true) { $_280 = \true; break; }
					$result = $res_253;
					$this->setPos($pos_253);
					$_280 = \false; break;
				}
				while(\false);
				if($_280 === \true) { $_282 = \true; break; }
				$result = $res_251;
				$this->setPos($pos_251);
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


/* _: /[ \\t\\n\\r]{0,}/ */
protected $match___typestack = ['_'];
function match__($stack = []) {
	$matchrule = '_';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[ \\\\t\\\\n\\\\r]{0,}/')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}




}
