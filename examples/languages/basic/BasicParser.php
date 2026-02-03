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


/* ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:ForBody ( _ body:ForBody )* _ "END" */
protected $match_ForStmt_typestack = ['ForStmt'];
function match_ForStmt($stack = []) {
	$matchrule = 'ForStmt';
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
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_95 = \false; break; }
		$_95 = \true; break;
	}
	while(\false);
	if($_95 === \true) { return $this->finalise($result); }
	if($_95 === \false) { return \false; }
}

public function ForStmt_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* ForBody: alt:LetStmt | alt:PrintStmt | alt:InputStmt | alt:IfStmt | alt:GotoStmt | alt:LabelStmt */
protected $match_ForBody_typestack = ['ForBody'];
function match_ForBody($stack = []) {
	$matchrule = 'ForBody';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_116 = \null;
	do {
		$res_97 = $result;
		$pos_97 = $this->pos;
		$key = 'match_'.'LetStmt'; $pos = $this->pos;
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
			$key = 'match_'.'PrintStmt'; $pos = $this->pos;
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
				$key = 'match_'.'InputStmt'; $pos = $this->pos;
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
					$key = 'match_'.'IfStmt'; $pos = $this->pos;
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

public function ForBody_alt (&$res, $sub) {
    $res['node'] = $sub;
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
	$_127 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_127 = \false; break; }
		while (\true) {
			$res_126 = $result;
			$pos_126 = $this->pos;
			$_125 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_125 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_125 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_125 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_125 = \false; break; }
				$_125 = \true; break;
			}
			while(\false);
			if($_125 === \false) {
				$result = $res_126;
				$this->setPos($pos_126);
				unset($res_126, $pos_126);
				break;
			}
		}
		$_127 = \true; break;
	}
	while(\false);
	if($_127 === \true) { return $this->finalise($result); }
	if($_127 === \false) { return \false; }
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
	$_148 = \null;
	do {
		$res_129 = $result;
		$pos_129 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
			$_148 = \true; break;
		}
		$result = $res_129;
		$this->setPos($pos_129);
		$_146 = \null;
		do {
			$res_131 = $result;
			$pos_131 = $this->pos;
			if (($subres = $this->literal('<>')) !== \false) {
				$result["text"] .= $subres;
				$_146 = \true; break;
			}
			$result = $res_131;
			$this->setPos($pos_131);
			$_144 = \null;
			do {
				$res_133 = $result;
				$pos_133 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_144 = \true; break;
				}
				$result = $res_133;
				$this->setPos($pos_133);
				$_142 = \null;
				do {
					$res_135 = $result;
					$pos_135 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_142 = \true; break;
					}
					$result = $res_135;
					$this->setPos($pos_135);
					$_140 = \null;
					do {
						$res_137 = $result;
						$pos_137 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_140 = \true; break;
						}
						$result = $res_137;
						$this->setPos($pos_137);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_140 = \true; break;
						}
						$result = $res_137;
						$this->setPos($pos_137);
						$_140 = \false; break;
					}
					while(\false);
					if($_140 === \true) { $_142 = \true; break; }
					$result = $res_135;
					$this->setPos($pos_135);
					$_142 = \false; break;
				}
				while(\false);
				if($_142 === \true) { $_144 = \true; break; }
				$result = $res_133;
				$this->setPos($pos_133);
				$_144 = \false; break;
			}
			while(\false);
			if($_144 === \true) { $_146 = \true; break; }
			$result = $res_131;
			$this->setPos($pos_131);
			$_146 = \false; break;
		}
		while(\false);
		if($_146 === \true) { $_148 = \true; break; }
		$result = $res_129;
		$this->setPos($pos_129);
		$_148 = \false; break;
	}
	while(\false);
	if($_148 === \true) { return $this->finalise($result); }
	if($_148 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_157 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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
				$key = 'match_'.'AddOp'; $pos = $this->pos;
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
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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
	$_162 = \null;
	do {
		$res_159 = $result;
		$pos_159 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_162 = \true; break;
		}
		$result = $res_159;
		$this->setPos($pos_159);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
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


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_171 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_171 = \false; break; }
		while (\true) {
			$res_170 = $result;
			$pos_170 = $this->pos;
			$_169 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_169 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_169 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_169 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_169 = \false; break; }
				$_169 = \true; break;
			}
			while(\false);
			if($_169 === \false) {
				$result = $res_170;
				$this->setPos($pos_170);
				unset($res_170, $pos_170);
				break;
			}
		}
		$_171 = \true; break;
	}
	while(\false);
	if($_171 === \true) { return $this->finalise($result); }
	if($_171 === \false) { return \false; }
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
	$_176 = \null;
	do {
		$res_173 = $result;
		$pos_173 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_176 = \true; break;
		}
		$result = $res_173;
		$this->setPos($pos_173);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_176 = \true; break;
		}
		$result = $res_173;
		$this->setPos($pos_173);
		$_176 = \false; break;
	}
	while(\false);
	if($_176 === \true) { return $this->finalise($result); }
	if($_176 === \false) { return \false; }
}


/* Primary: val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_195 = \null;
	do {
		$res_178 = $result;
		$pos_178 = $this->pos;
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_195 = \true; break;
		}
		$result = $res_178;
		$this->setPos($pos_178);
		$_193 = \null;
		do {
			$res_180 = $result;
			$pos_180 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_193 = \true; break;
			}
			$result = $res_180;
			$this->setPos($pos_180);
			$_191 = \null;
			do {
				$res_182 = $result;
				$pos_182 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_191 = \true; break;
				}
				$result = $res_182;
				$this->setPos($pos_182);
				$_189 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_189 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_189 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_189 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_189 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_189 = \false; break; }
					$_189 = \true; break;
				}
				while(\false);
				if($_189 === \true) { $_191 = \true; break; }
				$result = $res_182;
				$this->setPos($pos_182);
				$_191 = \false; break;
			}
			while(\false);
			if($_191 === \true) { $_193 = \true; break; }
			$result = $res_180;
			$this->setPos($pos_180);
			$_193 = \false; break;
		}
		while(\false);
		if($_193 === \true) { $_195 = \true; break; }
		$result = $res_178;
		$this->setPos($pos_178);
		$_195 = \false; break;
	}
	while(\false);
	if($_195 === \true) { return $this->finalise($result); }
	if($_195 === \false) { return \false; }
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
	$_200 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_200 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_200 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_200 = \false; break; }
		$_200 = \true; break;
	}
	while(\false);
	if($_200 === \true) { return $this->finalise($result); }
	if($_200 === \false) { return \false; }
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
	$_205 = \null;
	do {
		$res_203 = $result;
		$pos_203 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_203;
			$this->setPos($pos_203);
			$_205 = \false; break;
		}
		else {
			$result = $res_203;
			$this->setPos($pos_203);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_205 = \false; break; }
		$_205 = \true; break;
	}
	while(\false);
	if($_205 === \true) { return $this->finalise($result); }
	if($_205 === \false) { return \false; }
}


/* Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "GOTO" | "FOR" | "TO" | "NEXT" | "END") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_249 = \null;
	do {
		$_244 = \null;
		do {
			$_242 = \null;
			do {
				$res_207 = $result;
				$pos_207 = $this->pos;
				if (($subres = $this->literal('LET')) !== \false) {
					$result["text"] .= $subres;
					$_242 = \true; break;
				}
				$result = $res_207;
				$this->setPos($pos_207);
				$_240 = \null;
				do {
					$res_209 = $result;
					$pos_209 = $this->pos;
					if (($subres = $this->literal('PRINT')) !== \false) {
						$result["text"] .= $subres;
						$_240 = \true; break;
					}
					$result = $res_209;
					$this->setPos($pos_209);
					$_238 = \null;
					do {
						$res_211 = $result;
						$pos_211 = $this->pos;
						if (($subres = $this->literal('INPUT')) !== \false) {
							$result["text"] .= $subres;
							$_238 = \true; break;
						}
						$result = $res_211;
						$this->setPos($pos_211);
						$_236 = \null;
						do {
							$res_213 = $result;
							$pos_213 = $this->pos;
							if (($subres = $this->literal('IF')) !== \false) {
								$result["text"] .= $subres;
								$_236 = \true; break;
							}
							$result = $res_213;
							$this->setPos($pos_213);
							$_234 = \null;
							do {
								$res_215 = $result;
								$pos_215 = $this->pos;
								if (($subres = $this->literal('THEN')) !== \false) {
									$result["text"] .= $subres;
									$_234 = \true; break;
								}
								$result = $res_215;
								$this->setPos($pos_215);
								$_232 = \null;
								do {
									$res_217 = $result;
									$pos_217 = $this->pos;
									if (($subres = $this->literal('GOTO')) !== \false) {
										$result["text"] .= $subres;
										$_232 = \true; break;
									}
									$result = $res_217;
									$this->setPos($pos_217);
									$_230 = \null;
									do {
										$res_219 = $result;
										$pos_219 = $this->pos;
										if (($subres = $this->literal('FOR')) !== \false) {
											$result["text"] .= $subres;
											$_230 = \true; break;
										}
										$result = $res_219;
										$this->setPos($pos_219);
										$_228 = \null;
										do {
											$res_221 = $result;
											$pos_221 = $this->pos;
											if (($subres = $this->literal('TO')) !== \false) {
												$result["text"] .= $subres;
												$_228 = \true; break;
											}
											$result = $res_221;
											$this->setPos($pos_221);
											$_226 = \null;
											do {
												$res_223 = $result;
												$pos_223 = $this->pos;
												if (($subres = $this->literal('NEXT')) !== \false) {
													$result["text"] .= $subres;
													$_226 = \true; break;
												}
												$result = $res_223;
												$this->setPos($pos_223);
												if (($subres = $this->literal('END')) !== \false) {
													$result["text"] .= $subres;
													$_226 = \true; break;
												}
												$result = $res_223;
												$this->setPos($pos_223);
												$_226 = \false; break;
											}
											while(\false);
											if($_226 === \true) { $_228 = \true; break; }
											$result = $res_221;
											$this->setPos($pos_221);
											$_228 = \false; break;
										}
										while(\false);
										if($_228 === \true) { $_230 = \true; break; }
										$result = $res_219;
										$this->setPos($pos_219);
										$_230 = \false; break;
									}
									while(\false);
									if($_230 === \true) { $_232 = \true; break; }
									$result = $res_217;
									$this->setPos($pos_217);
									$_232 = \false; break;
								}
								while(\false);
								if($_232 === \true) { $_234 = \true; break; }
								$result = $res_215;
								$this->setPos($pos_215);
								$_234 = \false; break;
							}
							while(\false);
							if($_234 === \true) { $_236 = \true; break; }
							$result = $res_213;
							$this->setPos($pos_213);
							$_236 = \false; break;
						}
						while(\false);
						if($_236 === \true) { $_238 = \true; break; }
						$result = $res_211;
						$this->setPos($pos_211);
						$_238 = \false; break;
					}
					while(\false);
					if($_238 === \true) { $_240 = \true; break; }
					$result = $res_209;
					$this->setPos($pos_209);
					$_240 = \false; break;
				}
				while(\false);
				if($_240 === \true) { $_242 = \true; break; }
				$result = $res_207;
				$this->setPos($pos_207);
				$_242 = \false; break;
			}
			while(\false);
			if($_242 === \false) { $_244 = \false; break; }
			$_244 = \true; break;
		}
		while(\false);
		if($_244 === \false) { $_249 = \false; break; }
		$res_248 = $result;
		$pos_248 = $this->pos;
		$_247 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_247 = \false; break; }
			$_247 = \true; break;
		}
		while(\false);
		if($_247 === \true) {
			$result = $res_248;
			$this->setPos($pos_248);
			$_249 = \false; break;
		}
		if($_247 === \false) {
			$result = $res_248;
			$this->setPos($pos_248);
		}
		$_249 = \true; break;
	}
	while(\false);
	if($_249 === \true) { return $this->finalise($result); }
	if($_249 === \false) { return \false; }
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
