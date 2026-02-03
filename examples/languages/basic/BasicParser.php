<?php
namespace BASIC;

class GeneratedParser extends \hafriedlander\Peg\Parser\Packrat {
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

public function Program_stmt (&$res, $sub) {
    if (!isset($res['statements'])) $res['statements'] = [];
    $res['statements'][] = $sub;
  }

/* Statement: alt:LetStmt | alt:PrintStmt | alt:InputStmt | alt:IfStmt | alt:GotoStmt | alt:LabelStmt | alt:ForStmt | alt:EndStmt */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_36 = \null;
	do {
		$res_9 = $result;
		$pos_9 = $this->pos;
		$key = 'match_'.'LetStmt'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_36 = \true; break;
		}
		$result = $res_9;
		$this->setPos($pos_9);
		$_34 = \null;
		do {
			$res_11 = $result;
			$pos_11 = $this->pos;
			$key = 'match_'.'PrintStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_34 = \true; break;
			}
			$result = $res_11;
			$this->setPos($pos_11);
			$_32 = \null;
			do {
				$res_13 = $result;
				$pos_13 = $this->pos;
				$key = 'match_'.'InputStmt'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
					$_32 = \true; break;
				}
				$result = $res_13;
				$this->setPos($pos_13);
				$_30 = \null;
				do {
					$res_15 = $result;
					$pos_15 = $this->pos;
					$key = 'match_'.'IfStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_30 = \true; break;
					}
					$result = $res_15;
					$this->setPos($pos_15);
					$_28 = \null;
					do {
						$res_17 = $result;
						$pos_17 = $this->pos;
						$key = 'match_'.'GotoStmt'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
							$_28 = \true; break;
						}
						$result = $res_17;
						$this->setPos($pos_17);
						$_26 = \null;
						do {
							$res_19 = $result;
							$pos_19 = $this->pos;
							$key = 'match_'.'LabelStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
								$_26 = \true; break;
							}
							$result = $res_19;
							$this->setPos($pos_19);
							$_24 = \null;
							do {
								$res_21 = $result;
								$pos_21 = $this->pos;
								$key = 'match_'.'ForStmt'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
									$_24 = \true; break;
								}
								$result = $res_21;
								$this->setPos($pos_21);
								$key = 'match_'.'EndStmt'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
									$_24 = \true; break;
								}
								$result = $res_21;
								$this->setPos($pos_21);
								$_24 = \false; break;
							}
							while(\false);
							if($_24 === \true) { $_26 = \true; break; }
							$result = $res_19;
							$this->setPos($pos_19);
							$_26 = \false; break;
						}
						while(\false);
						if($_26 === \true) { $_28 = \true; break; }
						$result = $res_17;
						$this->setPos($pos_17);
						$_28 = \false; break;
					}
					while(\false);
					if($_28 === \true) { $_30 = \true; break; }
					$result = $res_15;
					$this->setPos($pos_15);
					$_30 = \false; break;
				}
				while(\false);
				if($_30 === \true) { $_32 = \true; break; }
				$result = $res_13;
				$this->setPos($pos_13);
				$_32 = \false; break;
			}
			while(\false);
			if($_32 === \true) { $_34 = \true; break; }
			$result = $res_11;
			$this->setPos($pos_11);
			$_34 = \false; break;
		}
		while(\false);
		if($_34 === \true) { $_36 = \true; break; }
		$result = $res_9;
		$this->setPos($pos_9);
		$_36 = \false; break;
	}
	while(\false);
	if($_36 === \true) { return $this->finalise($result); }
	if($_36 === \false) { return \false; }
}

public function Statement_alt (&$res, $sub) {
    $res['node'] = $sub;
  }

/* LetStmt: "LET"? _ var:Identifier _ "=" _ expr:Expression */
protected $match_LetStmt_typestack = ['LetStmt'];
function match_LetStmt($stack = []) {
	$matchrule = 'LetStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_45 = \null;
	do {
		$res_38 = $result;
		$pos_38 = $this->pos;
		if (($subres = $this->literal('LET')) !== \false) { $result["text"] .= $subres; }
		else {
			$result = $res_38;
			$this->setPos($pos_38);
			unset($res_38, $pos_38);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_45 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_45 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_45 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_45 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_45 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_45 = \false; break; }
		$_45 = \true; break;
	}
	while(\false);
	if($_45 === \true) { return $this->finalise($result); }
	if($_45 === \false) { return \false; }
}


/* PrintStmt: "PRINT" _ msg:Expression */
protected $match_PrintStmt_typestack = ['PrintStmt'];
function match_PrintStmt($stack = []) {
	$matchrule = 'PrintStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_50 = \null;
	do {
		if (($subres = $this->literal('PRINT')) !== \false) { $result["text"] .= $subres; }
		else { $_50 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_50 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_50 = \false; break; }
		$_50 = \true; break;
	}
	while(\false);
	if($_50 === \true) { return $this->finalise($result); }
	if($_50 === \false) { return \false; }
}


/* InputStmt: "INPUT" _ var:Identifier */
protected $match_InputStmt_typestack = ['InputStmt'];
function match_InputStmt($stack = []) {
	$matchrule = 'InputStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_55 = \null;
	do {
		if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
		else { $_55 = \false; break; }
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


/* IfStmt: "IF" _ cond:Expression _ "THEN" _ stmt:Statement */
protected $match_IfStmt_typestack = ['IfStmt'];
function match_IfStmt($stack = []) {
	$matchrule = 'IfStmt';
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


/* ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "END" */
protected $match_ForStmt_typestack = ['ForStmt'];
function match_ForStmt($stack = []) {
	$matchrule = 'ForStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_90 = \null;
	do {
		if (($subres = $this->literal('FOR')) !== \false) { $result["text"] .= $subres; }
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$count_88 = 0;
		while (\true) {
			$res_88 = $result;
			$pos_88 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_88;
				$this->setPos($pos_88);
				unset($res_88, $pos_88);
				break;
			}
			$count_88++;
		}
		if ($count_88 >= 1) {  }
		else { $_90 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_90 = \false; break; }
		$_90 = \true; break;
	}
	while(\false);
	if($_90 === \true) { return $this->finalise($result); }
	if($_90 === \false) { return \false; }
}

public function ForStmt_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* EndStmt: "END" */
protected $match_EndStmt_typestack = ['EndStmt'];
function match_EndStmt($stack = []) {
	$matchrule = 'EndStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->literal('END')) !== \false) {
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

public function Expression_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_101 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_101 = \false; break; }
		while (\true) {
			$res_100 = $result;
			$pos_100 = $this->pos;
			$_99 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_99 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_99 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_99 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_99 = \false; break; }
				$_99 = \true; break;
			}
			while(\false);
			if($_99 === \false) {
				$result = $res_100;
				$this->setPos($pos_100);
				unset($res_100, $pos_100);
				break;
			}
		}
		$_101 = \true; break;
	}
	while(\false);
	if($_101 === \true) { return $this->finalise($result); }
	if($_101 === \false) { return \false; }
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

/* CompOp: "=" | "<>" | "<=" | ">=" | "<" | ">" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_122 = \null;
	do {
		$res_103 = $result;
		$pos_103 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
			$_122 = \true; break;
		}
		$result = $res_103;
		$this->setPos($pos_103);
		$_120 = \null;
		do {
			$res_105 = $result;
			$pos_105 = $this->pos;
			if (($subres = $this->literal('<>')) !== \false) {
				$result["text"] .= $subres;
				$_120 = \true; break;
			}
			$result = $res_105;
			$this->setPos($pos_105);
			$_118 = \null;
			do {
				$res_107 = $result;
				$pos_107 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_118 = \true; break;
				}
				$result = $res_107;
				$this->setPos($pos_107);
				$_116 = \null;
				do {
					$res_109 = $result;
					$pos_109 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_116 = \true; break;
					}
					$result = $res_109;
					$this->setPos($pos_109);
					$_114 = \null;
					do {
						$res_111 = $result;
						$pos_111 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_114 = \true; break;
						}
						$result = $res_111;
						$this->setPos($pos_111);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_114 = \true; break;
						}
						$result = $res_111;
						$this->setPos($pos_111);
						$_114 = \false; break;
					}
					while(\false);
					if($_114 === \true) { $_116 = \true; break; }
					$result = $res_109;
					$this->setPos($pos_109);
					$_116 = \false; break;
				}
				while(\false);
				if($_116 === \true) { $_118 = \true; break; }
				$result = $res_107;
				$this->setPos($pos_107);
				$_118 = \false; break;
			}
			while(\false);
			if($_118 === \true) { $_120 = \true; break; }
			$result = $res_105;
			$this->setPos($pos_105);
			$_120 = \false; break;
		}
		while(\false);
		if($_120 === \true) { $_122 = \true; break; }
		$result = $res_103;
		$this->setPos($pos_103);
		$_122 = \false; break;
	}
	while(\false);
	if($_122 === \true) { return $this->finalise($result); }
	if($_122 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_131 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_131 = \false; break; }
		while (\true) {
			$res_130 = $result;
			$pos_130 = $this->pos;
			$_129 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_129 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_129 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_129 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_129 = \false; break; }
				$_129 = \true; break;
			}
			while(\false);
			if($_129 === \false) {
				$result = $res_130;
				$this->setPos($pos_130);
				unset($res_130, $pos_130);
				break;
			}
		}
		$_131 = \true; break;
	}
	while(\false);
	if($_131 === \true) { return $this->finalise($result); }
	if($_131 === \false) { return \false; }
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
	$_136 = \null;
	do {
		$res_133 = $result;
		$pos_133 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_136 = \true; break;
		}
		$result = $res_133;
		$this->setPos($pos_133);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_136 = \true; break;
		}
		$result = $res_133;
		$this->setPos($pos_133);
		$_136 = \false; break;
	}
	while(\false);
	if($_136 === \true) { return $this->finalise($result); }
	if($_136 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_145 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_145 = \false; break; }
		while (\true) {
			$res_144 = $result;
			$pos_144 = $this->pos;
			$_143 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_143 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_143 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_143 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_143 = \false; break; }
				$_143 = \true; break;
			}
			while(\false);
			if($_143 === \false) {
				$result = $res_144;
				$this->setPos($pos_144);
				unset($res_144, $pos_144);
				break;
			}
		}
		$_145 = \true; break;
	}
	while(\false);
	if($_145 === \true) { return $this->finalise($result); }
	if($_145 === \false) { return \false; }
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
	$_150 = \null;
	do {
		$res_147 = $result;
		$pos_147 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_150 = \true; break;
		}
		$result = $res_147;
		$this->setPos($pos_147);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_150 = \true; break;
		}
		$result = $res_147;
		$this->setPos($pos_147);
		$_150 = \false; break;
	}
	while(\false);
	if($_150 === \true) { return $this->finalise($result); }
	if($_150 === \false) { return \false; }
}


/* Primary: val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_169 = \null;
	do {
		$res_152 = $result;
		$pos_152 = $this->pos;
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_169 = \true; break;
		}
		$result = $res_152;
		$this->setPos($pos_152);
		$_167 = \null;
		do {
			$res_154 = $result;
			$pos_154 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_167 = \true; break;
			}
			$result = $res_154;
			$this->setPos($pos_154);
			$_165 = \null;
			do {
				$res_156 = $result;
				$pos_156 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_165 = \true; break;
				}
				$result = $res_156;
				$this->setPos($pos_156);
				$_163 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_163 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_163 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_163 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_163 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_163 = \false; break; }
					$_163 = \true; break;
				}
				while(\false);
				if($_163 === \true) { $_165 = \true; break; }
				$result = $res_156;
				$this->setPos($pos_156);
				$_165 = \false; break;
			}
			while(\false);
			if($_165 === \true) { $_167 = \true; break; }
			$result = $res_154;
			$this->setPos($pos_154);
			$_167 = \false; break;
		}
		while(\false);
		if($_167 === \true) { $_169 = \true; break; }
		$result = $res_152;
		$this->setPos($pos_152);
		$_169 = \false; break;
	}
	while(\false);
	if($_169 === \true) { return $this->finalise($result); }
	if($_169 === \false) { return \false; }
}

public function Primary_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_174 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_174 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_174 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_174 = \false; break; }
		$_174 = \true; break;
	}
	while(\false);
	if($_174 === \true) { return $this->finalise($result); }
	if($_174 === \false) { return \false; }
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


/* Identifier: !Keyword /[A-Z][A-Z0-9]{0,}/ */
protected $match_Identifier_typestack = ['Identifier'];
function match_Identifier($stack = []) {
	$matchrule = 'Identifier';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_179 = \null;
	do {
		$res_177 = $result;
		$pos_177 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_177;
			$this->setPos($pos_177);
			$_179 = \false; break;
		}
		else {
			$result = $res_177;
			$this->setPos($pos_177);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_179 = \false; break; }
		$_179 = \true; break;
	}
	while(\false);
	if($_179 === \true) { return $this->finalise($result); }
	if($_179 === \false) { return \false; }
}


/* Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "GOTO" | "FOR" | "TO" | "NEXT" | "END") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_223 = \null;
	do {
		$_218 = \null;
		do {
			$_216 = \null;
			do {
				$res_181 = $result;
				$pos_181 = $this->pos;
				if (($subres = $this->literal('LET')) !== \false) {
					$result["text"] .= $subres;
					$_216 = \true; break;
				}
				$result = $res_181;
				$this->setPos($pos_181);
				$_214 = \null;
				do {
					$res_183 = $result;
					$pos_183 = $this->pos;
					if (($subres = $this->literal('PRINT')) !== \false) {
						$result["text"] .= $subres;
						$_214 = \true; break;
					}
					$result = $res_183;
					$this->setPos($pos_183);
					$_212 = \null;
					do {
						$res_185 = $result;
						$pos_185 = $this->pos;
						if (($subres = $this->literal('INPUT')) !== \false) {
							$result["text"] .= $subres;
							$_212 = \true; break;
						}
						$result = $res_185;
						$this->setPos($pos_185);
						$_210 = \null;
						do {
							$res_187 = $result;
							$pos_187 = $this->pos;
							if (($subres = $this->literal('IF')) !== \false) {
								$result["text"] .= $subres;
								$_210 = \true; break;
							}
							$result = $res_187;
							$this->setPos($pos_187);
							$_208 = \null;
							do {
								$res_189 = $result;
								$pos_189 = $this->pos;
								if (($subres = $this->literal('THEN')) !== \false) {
									$result["text"] .= $subres;
									$_208 = \true; break;
								}
								$result = $res_189;
								$this->setPos($pos_189);
								$_206 = \null;
								do {
									$res_191 = $result;
									$pos_191 = $this->pos;
									if (($subres = $this->literal('GOTO')) !== \false) {
										$result["text"] .= $subres;
										$_206 = \true; break;
									}
									$result = $res_191;
									$this->setPos($pos_191);
									$_204 = \null;
									do {
										$res_193 = $result;
										$pos_193 = $this->pos;
										if (($subres = $this->literal('FOR')) !== \false) {
											$result["text"] .= $subres;
											$_204 = \true; break;
										}
										$result = $res_193;
										$this->setPos($pos_193);
										$_202 = \null;
										do {
											$res_195 = $result;
											$pos_195 = $this->pos;
											if (($subres = $this->literal('TO')) !== \false) {
												$result["text"] .= $subres;
												$_202 = \true; break;
											}
											$result = $res_195;
											$this->setPos($pos_195);
											$_200 = \null;
											do {
												$res_197 = $result;
												$pos_197 = $this->pos;
												if (($subres = $this->literal('NEXT')) !== \false) {
													$result["text"] .= $subres;
													$_200 = \true; break;
												}
												$result = $res_197;
												$this->setPos($pos_197);
												if (($subres = $this->literal('END')) !== \false) {
													$result["text"] .= $subres;
													$_200 = \true; break;
												}
												$result = $res_197;
												$this->setPos($pos_197);
												$_200 = \false; break;
											}
											while(\false);
											if($_200 === \true) { $_202 = \true; break; }
											$result = $res_195;
											$this->setPos($pos_195);
											$_202 = \false; break;
										}
										while(\false);
										if($_202 === \true) { $_204 = \true; break; }
										$result = $res_193;
										$this->setPos($pos_193);
										$_204 = \false; break;
									}
									while(\false);
									if($_204 === \true) { $_206 = \true; break; }
									$result = $res_191;
									$this->setPos($pos_191);
									$_206 = \false; break;
								}
								while(\false);
								if($_206 === \true) { $_208 = \true; break; }
								$result = $res_189;
								$this->setPos($pos_189);
								$_208 = \false; break;
							}
							while(\false);
							if($_208 === \true) { $_210 = \true; break; }
							$result = $res_187;
							$this->setPos($pos_187);
							$_210 = \false; break;
						}
						while(\false);
						if($_210 === \true) { $_212 = \true; break; }
						$result = $res_185;
						$this->setPos($pos_185);
						$_212 = \false; break;
					}
					while(\false);
					if($_212 === \true) { $_214 = \true; break; }
					$result = $res_183;
					$this->setPos($pos_183);
					$_214 = \false; break;
				}
				while(\false);
				if($_214 === \true) { $_216 = \true; break; }
				$result = $res_181;
				$this->setPos($pos_181);
				$_216 = \false; break;
			}
			while(\false);
			if($_216 === \false) { $_218 = \false; break; }
			$_218 = \true; break;
		}
		while(\false);
		if($_218 === \false) { $_223 = \false; break; }
		$res_222 = $result;
		$pos_222 = $this->pos;
		$_221 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_221 = \false; break; }
			$_221 = \true; break;
		}
		while(\false);
		if($_221 === \true) {
			$result = $res_222;
			$this->setPos($pos_222);
			$_223 = \false; break;
		}
		if($_221 === \false) {
			$result = $res_222;
			$this->setPos($pos_222);
		}
		$_223 = \true; break;
	}
	while(\false);
	if($_223 === \true) { return $this->finalise($result); }
	if($_223 === \false) { return \false; }
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
