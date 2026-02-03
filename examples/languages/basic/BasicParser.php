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

/* Statement: alt:LetStmt | alt:PrintStmt | alt:InputStmt | alt:IfStmt | alt:GotoStmt | alt:LabelStmt | alt:ForStmt | alt:NextStmt | alt:EndStmt */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_40 = \null;
	do {
		$res_9 = $result;
		$pos_9 = $this->pos;
		$key = 'match_'.'LetStmt'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "alt");
			$_40 = \true; break;
		}
		$result = $res_9;
		$this->setPos($pos_9);
		$_38 = \null;
		do {
			$res_11 = $result;
			$pos_11 = $this->pos;
			$key = 'match_'.'PrintStmt'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
				$_38 = \true; break;
			}
			$result = $res_11;
			$this->setPos($pos_11);
			$_36 = \null;
			do {
				$res_13 = $result;
				$pos_13 = $this->pos;
				$key = 'match_'.'InputStmt'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
					$_36 = \true; break;
				}
				$result = $res_13;
				$this->setPos($pos_13);
				$_34 = \null;
				do {
					$res_15 = $result;
					$pos_15 = $this->pos;
					$key = 'match_'.'IfStmt'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
						$_34 = \true; break;
					}
					$result = $res_15;
					$this->setPos($pos_15);
					$_32 = \null;
					do {
						$res_17 = $result;
						$pos_17 = $this->pos;
						$key = 'match_'.'GotoStmt'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
							$_32 = \true; break;
						}
						$result = $res_17;
						$this->setPos($pos_17);
						$_30 = \null;
						do {
							$res_19 = $result;
							$pos_19 = $this->pos;
							$key = 'match_'.'LabelStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
								$_30 = \true; break;
							}
							$result = $res_19;
							$this->setPos($pos_19);
							$_28 = \null;
							do {
								$res_21 = $result;
								$pos_21 = $this->pos;
								$key = 'match_'.'ForStmt'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
									$_28 = \true; break;
								}
								$result = $res_21;
								$this->setPos($pos_21);
								$_26 = \null;
								do {
									$res_23 = $result;
									$pos_23 = $this->pos;
									$key = 'match_'.'NextStmt'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres, "alt");
										$_26 = \true; break;
									}
									$result = $res_23;
									$this->setPos($pos_23);
									$key = 'match_'.'EndStmt'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres, "alt");
										$_26 = \true; break;
									}
									$result = $res_23;
									$this->setPos($pos_23);
									$_26 = \false; break;
								}
								while(\false);
								if($_26 === \true) { $_28 = \true; break; }
								$result = $res_21;
								$this->setPos($pos_21);
								$_28 = \false; break;
							}
							while(\false);
							if($_28 === \true) { $_30 = \true; break; }
							$result = $res_19;
							$this->setPos($pos_19);
							$_30 = \false; break;
						}
						while(\false);
						if($_30 === \true) { $_32 = \true; break; }
						$result = $res_17;
						$this->setPos($pos_17);
						$_32 = \false; break;
					}
					while(\false);
					if($_32 === \true) { $_34 = \true; break; }
					$result = $res_15;
					$this->setPos($pos_15);
					$_34 = \false; break;
				}
				while(\false);
				if($_34 === \true) { $_36 = \true; break; }
				$result = $res_13;
				$this->setPos($pos_13);
				$_36 = \false; break;
			}
			while(\false);
			if($_36 === \true) { $_38 = \true; break; }
			$result = $res_11;
			$this->setPos($pos_11);
			$_38 = \false; break;
		}
		while(\false);
		if($_38 === \true) { $_40 = \true; break; }
		$result = $res_9;
		$this->setPos($pos_9);
		$_40 = \false; break;
	}
	while(\false);
	if($_40 === \true) { return $this->finalise($result); }
	if($_40 === \false) { return \false; }
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
	$_49 = \null;
	do {
		$res_42 = $result;
		$pos_42 = $this->pos;
		if (($subres = $this->literal('LET')) !== \false) { $result["text"] .= $subres; }
		else {
			$result = $res_42;
			$this->setPos($pos_42);
			unset($res_42, $pos_42);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_49 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_49 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_49 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_49 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_49 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_49 = \false; break; }
		$_49 = \true; break;
	}
	while(\false);
	if($_49 === \true) { return $this->finalise($result); }
	if($_49 === \false) { return \false; }
}


/* PrintStmt: "PRINT" _ msg:Expression */
protected $match_PrintStmt_typestack = ['PrintStmt'];
function match_PrintStmt($stack = []) {
	$matchrule = 'PrintStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_54 = \null;
	do {
		if (($subres = $this->literal('PRINT')) !== \false) { $result["text"] .= $subres; }
		else { $_54 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_54 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_54 = \false; break; }
		$_54 = \true; break;
	}
	while(\false);
	if($_54 === \true) { return $this->finalise($result); }
	if($_54 === \false) { return \false; }
}


/* InputStmt: "INPUT" _ var:Identifier */
protected $match_InputStmt_typestack = ['InputStmt'];
function match_InputStmt($stack = []) {
	$matchrule = 'InputStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_59 = \null;
	do {
		if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
		else { $_59 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_59 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_59 = \false; break; }
		$_59 = \true; break;
	}
	while(\false);
	if($_59 === \true) { return $this->finalise($result); }
	if($_59 === \false) { return \false; }
}


/* IfStmt: "IF" _ cond:Expression _ "THEN" _ stmt:Statement */
protected $match_IfStmt_typestack = ['IfStmt'];
function match_IfStmt($stack = []) {
	$matchrule = 'IfStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_68 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
		else { $_68 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_68 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_68 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_68 = \false; break; }
		if (($subres = $this->literal('THEN')) !== \false) { $result["text"] .= $subres; }
		else { $_68 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_68 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_68 = \false; break; }
		$_68 = \true; break;
	}
	while(\false);
	if($_68 === \true) { return $this->finalise($result); }
	if($_68 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_73 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_73 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_73 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_73 = \false; break; }
		$_73 = \true; break;
	}
	while(\false);
	if($_73 === \true) { return $this->finalise($result); }
	if($_73 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_78 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_78 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_78 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_78 = \false; break; }
		$_78 = \true; break;
	}
	while(\false);
	if($_78 === \true) { return $this->finalise($result); }
	if($_78 === \false) { return \false; }
}


/* ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression */
protected $match_ForStmt_typestack = ['ForStmt'];
function match_ForStmt($stack = []) {
	$matchrule = 'ForStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_91 = \null;
	do {
		if (($subres = $this->literal('FOR')) !== \false) { $result["text"] .= $subres; }
		else { $_91 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_91 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_91 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_91 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_91 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_91 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_91 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_91 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_91 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_91 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_91 = \false; break; }
		$_91 = \true; break;
	}
	while(\false);
	if($_91 === \true) { return $this->finalise($result); }
	if($_91 === \false) { return \false; }
}


/* NextStmt: "NEXT" _ var:Identifier? */
protected $match_NextStmt_typestack = ['NextStmt'];
function match_NextStmt($stack = []) {
	$matchrule = 'NextStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_96 = \null;
	do {
		if (($subres = $this->literal('NEXT')) !== \false) { $result["text"] .= $subres; }
		else { $_96 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_96 = \false; break; }
		$res_95 = $result;
		$pos_95 = $this->pos;
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else {
			$result = $res_95;
			$this->setPos($pos_95);
			unset($res_95, $pos_95);
		}
		$_96 = \true; break;
	}
	while(\false);
	if($_96 === \true) { return $this->finalise($result); }
	if($_96 === \false) { return \false; }
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
	$_107 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_107 = \false; break; }
		while (\true) {
			$res_106 = $result;
			$pos_106 = $this->pos;
			$_105 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_105 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_105 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_105 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_105 = \false; break; }
				$_105 = \true; break;
			}
			while(\false);
			if($_105 === \false) {
				$result = $res_106;
				$this->setPos($pos_106);
				unset($res_106, $pos_106);
				break;
			}
		}
		$_107 = \true; break;
	}
	while(\false);
	if($_107 === \true) { return $this->finalise($result); }
	if($_107 === \false) { return \false; }
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
	$_128 = \null;
	do {
		$res_109 = $result;
		$pos_109 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
			$_128 = \true; break;
		}
		$result = $res_109;
		$this->setPos($pos_109);
		$_126 = \null;
		do {
			$res_111 = $result;
			$pos_111 = $this->pos;
			if (($subres = $this->literal('<>')) !== \false) {
				$result["text"] .= $subres;
				$_126 = \true; break;
			}
			$result = $res_111;
			$this->setPos($pos_111);
			$_124 = \null;
			do {
				$res_113 = $result;
				$pos_113 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_124 = \true; break;
				}
				$result = $res_113;
				$this->setPos($pos_113);
				$_122 = \null;
				do {
					$res_115 = $result;
					$pos_115 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_122 = \true; break;
					}
					$result = $res_115;
					$this->setPos($pos_115);
					$_120 = \null;
					do {
						$res_117 = $result;
						$pos_117 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_120 = \true; break;
						}
						$result = $res_117;
						$this->setPos($pos_117);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_120 = \true; break;
						}
						$result = $res_117;
						$this->setPos($pos_117);
						$_120 = \false; break;
					}
					while(\false);
					if($_120 === \true) { $_122 = \true; break; }
					$result = $res_115;
					$this->setPos($pos_115);
					$_122 = \false; break;
				}
				while(\false);
				if($_122 === \true) { $_124 = \true; break; }
				$result = $res_113;
				$this->setPos($pos_113);
				$_124 = \false; break;
			}
			while(\false);
			if($_124 === \true) { $_126 = \true; break; }
			$result = $res_111;
			$this->setPos($pos_111);
			$_126 = \false; break;
		}
		while(\false);
		if($_126 === \true) { $_128 = \true; break; }
		$result = $res_109;
		$this->setPos($pos_109);
		$_128 = \false; break;
	}
	while(\false);
	if($_128 === \true) { return $this->finalise($result); }
	if($_128 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_137 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_137 = \false; break; }
		while (\true) {
			$res_136 = $result;
			$pos_136 = $this->pos;
			$_135 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_135 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_135 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_135 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_135 = \false; break; }
				$_135 = \true; break;
			}
			while(\false);
			if($_135 === \false) {
				$result = $res_136;
				$this->setPos($pos_136);
				unset($res_136, $pos_136);
				break;
			}
		}
		$_137 = \true; break;
	}
	while(\false);
	if($_137 === \true) { return $this->finalise($result); }
	if($_137 === \false) { return \false; }
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
	$_142 = \null;
	do {
		$res_139 = $result;
		$pos_139 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_142 = \true; break;
		}
		$result = $res_139;
		$this->setPos($pos_139);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_142 = \true; break;
		}
		$result = $res_139;
		$this->setPos($pos_139);
		$_142 = \false; break;
	}
	while(\false);
	if($_142 === \true) { return $this->finalise($result); }
	if($_142 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_151 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_151 = \false; break; }
		while (\true) {
			$res_150 = $result;
			$pos_150 = $this->pos;
			$_149 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_149 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_149 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_149 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_149 = \false; break; }
				$_149 = \true; break;
			}
			while(\false);
			if($_149 === \false) {
				$result = $res_150;
				$this->setPos($pos_150);
				unset($res_150, $pos_150);
				break;
			}
		}
		$_151 = \true; break;
	}
	while(\false);
	if($_151 === \true) { return $this->finalise($result); }
	if($_151 === \false) { return \false; }
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
	$_156 = \null;
	do {
		$res_153 = $result;
		$pos_153 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_156 = \true; break;
		}
		$result = $res_153;
		$this->setPos($pos_153);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_156 = \true; break;
		}
		$result = $res_153;
		$this->setPos($pos_153);
		$_156 = \false; break;
	}
	while(\false);
	if($_156 === \true) { return $this->finalise($result); }
	if($_156 === \false) { return \false; }
}


/* Primary: val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_175 = \null;
	do {
		$res_158 = $result;
		$pos_158 = $this->pos;
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_175 = \true; break;
		}
		$result = $res_158;
		$this->setPos($pos_158);
		$_173 = \null;
		do {
			$res_160 = $result;
			$pos_160 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_173 = \true; break;
			}
			$result = $res_160;
			$this->setPos($pos_160);
			$_171 = \null;
			do {
				$res_162 = $result;
				$pos_162 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_171 = \true; break;
				}
				$result = $res_162;
				$this->setPos($pos_162);
				$_169 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_169 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_169 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_169 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_169 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_169 = \false; break; }
					$_169 = \true; break;
				}
				while(\false);
				if($_169 === \true) { $_171 = \true; break; }
				$result = $res_162;
				$this->setPos($pos_162);
				$_171 = \false; break;
			}
			while(\false);
			if($_171 === \true) { $_173 = \true; break; }
			$result = $res_160;
			$this->setPos($pos_160);
			$_173 = \false; break;
		}
		while(\false);
		if($_173 === \true) { $_175 = \true; break; }
		$result = $res_158;
		$this->setPos($pos_158);
		$_175 = \false; break;
	}
	while(\false);
	if($_175 === \true) { return $this->finalise($result); }
	if($_175 === \false) { return \false; }
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
	$_180 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_180 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_180 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_180 = \false; break; }
		$_180 = \true; break;
	}
	while(\false);
	if($_180 === \true) { return $this->finalise($result); }
	if($_180 === \false) { return \false; }
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
	$_185 = \null;
	do {
		$res_183 = $result;
		$pos_183 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_183;
			$this->setPos($pos_183);
			$_185 = \false; break;
		}
		else {
			$result = $res_183;
			$this->setPos($pos_183);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_185 = \false; break; }
		$_185 = \true; break;
	}
	while(\false);
	if($_185 === \true) { return $this->finalise($result); }
	if($_185 === \false) { return \false; }
}


/* Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "GOTO" | "FOR" | "TO" | "NEXT" | "END") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_229 = \null;
	do {
		$_224 = \null;
		do {
			$_222 = \null;
			do {
				$res_187 = $result;
				$pos_187 = $this->pos;
				if (($subres = $this->literal('LET')) !== \false) {
					$result["text"] .= $subres;
					$_222 = \true; break;
				}
				$result = $res_187;
				$this->setPos($pos_187);
				$_220 = \null;
				do {
					$res_189 = $result;
					$pos_189 = $this->pos;
					if (($subres = $this->literal('PRINT')) !== \false) {
						$result["text"] .= $subres;
						$_220 = \true; break;
					}
					$result = $res_189;
					$this->setPos($pos_189);
					$_218 = \null;
					do {
						$res_191 = $result;
						$pos_191 = $this->pos;
						if (($subres = $this->literal('INPUT')) !== \false) {
							$result["text"] .= $subres;
							$_218 = \true; break;
						}
						$result = $res_191;
						$this->setPos($pos_191);
						$_216 = \null;
						do {
							$res_193 = $result;
							$pos_193 = $this->pos;
							if (($subres = $this->literal('IF')) !== \false) {
								$result["text"] .= $subres;
								$_216 = \true; break;
							}
							$result = $res_193;
							$this->setPos($pos_193);
							$_214 = \null;
							do {
								$res_195 = $result;
								$pos_195 = $this->pos;
								if (($subres = $this->literal('THEN')) !== \false) {
									$result["text"] .= $subres;
									$_214 = \true; break;
								}
								$result = $res_195;
								$this->setPos($pos_195);
								$_212 = \null;
								do {
									$res_197 = $result;
									$pos_197 = $this->pos;
									if (($subres = $this->literal('GOTO')) !== \false) {
										$result["text"] .= $subres;
										$_212 = \true; break;
									}
									$result = $res_197;
									$this->setPos($pos_197);
									$_210 = \null;
									do {
										$res_199 = $result;
										$pos_199 = $this->pos;
										if (($subres = $this->literal('FOR')) !== \false) {
											$result["text"] .= $subres;
											$_210 = \true; break;
										}
										$result = $res_199;
										$this->setPos($pos_199);
										$_208 = \null;
										do {
											$res_201 = $result;
											$pos_201 = $this->pos;
											if (($subres = $this->literal('TO')) !== \false) {
												$result["text"] .= $subres;
												$_208 = \true; break;
											}
											$result = $res_201;
											$this->setPos($pos_201);
											$_206 = \null;
											do {
												$res_203 = $result;
												$pos_203 = $this->pos;
												if (($subres = $this->literal('NEXT')) !== \false) {
													$result["text"] .= $subres;
													$_206 = \true; break;
												}
												$result = $res_203;
												$this->setPos($pos_203);
												if (($subres = $this->literal('END')) !== \false) {
													$result["text"] .= $subres;
													$_206 = \true; break;
												}
												$result = $res_203;
												$this->setPos($pos_203);
												$_206 = \false; break;
											}
											while(\false);
											if($_206 === \true) { $_208 = \true; break; }
											$result = $res_201;
											$this->setPos($pos_201);
											$_208 = \false; break;
										}
										while(\false);
										if($_208 === \true) { $_210 = \true; break; }
										$result = $res_199;
										$this->setPos($pos_199);
										$_210 = \false; break;
									}
									while(\false);
									if($_210 === \true) { $_212 = \true; break; }
									$result = $res_197;
									$this->setPos($pos_197);
									$_212 = \false; break;
								}
								while(\false);
								if($_212 === \true) { $_214 = \true; break; }
								$result = $res_195;
								$this->setPos($pos_195);
								$_214 = \false; break;
							}
							while(\false);
							if($_214 === \true) { $_216 = \true; break; }
							$result = $res_193;
							$this->setPos($pos_193);
							$_216 = \false; break;
						}
						while(\false);
						if($_216 === \true) { $_218 = \true; break; }
						$result = $res_191;
						$this->setPos($pos_191);
						$_218 = \false; break;
					}
					while(\false);
					if($_218 === \true) { $_220 = \true; break; }
					$result = $res_189;
					$this->setPos($pos_189);
					$_220 = \false; break;
				}
				while(\false);
				if($_220 === \true) { $_222 = \true; break; }
				$result = $res_187;
				$this->setPos($pos_187);
				$_222 = \false; break;
			}
			while(\false);
			if($_222 === \false) { $_224 = \false; break; }
			$_224 = \true; break;
		}
		while(\false);
		if($_224 === \false) { $_229 = \false; break; }
		$res_228 = $result;
		$pos_228 = $this->pos;
		$_227 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_227 = \false; break; }
			$_227 = \true; break;
		}
		while(\false);
		if($_227 === \true) {
			$result = $res_228;
			$this->setPos($pos_228);
			$_229 = \false; break;
		}
		if($_227 === \false) {
			$result = $res_228;
			$this->setPos($pos_228);
		}
		$_229 = \true; break;
	}
	while(\false);
	if($_229 === \true) { return $this->finalise($result); }
	if($_229 === \false) { return \false; }
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
