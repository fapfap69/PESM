<?php
namespace BASIC;

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

/* Statement: alt:LetStmt _ | alt:PrintStmt _ | alt:InputStmt _ | alt:IfStmt _ | alt:GotoStmt _ | alt:LabelStmt _ | alt:ForStmt _ | alt:NextStmt _ | alt:EndStmt _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_62 = \null;
	do {
		$res_4 = $result;
		$pos_4 = $this->pos;
		$_7 = \null;
		do {
			$key = 'match_'.'LetStmt'; $pos = $this->pos;
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
		if($_7 === \true) { $_62 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_60 = \null;
		do {
			$res_9 = $result;
			$pos_9 = $this->pos;
			$_12 = \null;
			do {
				$key = 'match_'.'PrintStmt'; $pos = $this->pos;
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
			if($_12 === \true) { $_60 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_58 = \null;
			do {
				$res_14 = $result;
				$pos_14 = $this->pos;
				$_17 = \null;
				do {
					$key = 'match_'.'InputStmt'; $pos = $this->pos;
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
				if($_17 === \true) { $_58 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_56 = \null;
				do {
					$res_19 = $result;
					$pos_19 = $this->pos;
					$_22 = \null;
					do {
						$key = 'match_'.'IfStmt'; $pos = $this->pos;
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
						$_22 = \true; break;
					}
					while(\false);
					if($_22 === \true) { $_56 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_54 = \null;
					do {
						$res_24 = $result;
						$pos_24 = $this->pos;
						$_27 = \null;
						do {
							$key = 'match_'.'GotoStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
							}
							else { $_27 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_27 = \false; break; }
							$_27 = \true; break;
						}
						while(\false);
						if($_27 === \true) { $_54 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_52 = \null;
						do {
							$res_29 = $result;
							$pos_29 = $this->pos;
							$_32 = \null;
							do {
								$key = 'match_'.'LabelStmt'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
								}
								else { $_32 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_32 = \false; break; }
								$_32 = \true; break;
							}
							while(\false);
							if($_32 === \true) { $_52 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_50 = \null;
							do {
								$res_34 = $result;
								$pos_34 = $this->pos;
								$_37 = \null;
								do {
									$key = 'match_'.'ForStmt'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres, "alt");
									}
									else { $_37 = \false; break; }
									$key = 'match_'.'_'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres);
									}
									else { $_37 = \false; break; }
									$_37 = \true; break;
								}
								while(\false);
								if($_37 === \true) { $_50 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_48 = \null;
								do {
									$res_39 = $result;
									$pos_39 = $this->pos;
									$_42 = \null;
									do {
										$key = 'match_'.'NextStmt'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres, "alt");
										}
										else { $_42 = \false; break; }
										$key = 'match_'.'_'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres);
										}
										else { $_42 = \false; break; }
										$_42 = \true; break;
									}
									while(\false);
									if($_42 === \true) { $_48 = \true; break; }
									$result = $res_39;
									$this->setPos($pos_39);
									$_46 = \null;
									do {
										$key = 'match_'.'EndStmt'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres, "alt");
										}
										else { $_46 = \false; break; }
										$key = 'match_'.'_'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres);
										}
										else { $_46 = \false; break; }
										$_46 = \true; break;
									}
									while(\false);
									if($_46 === \true) { $_48 = \true; break; }
									$result = $res_39;
									$this->setPos($pos_39);
									$_48 = \false; break;
								}
								while(\false);
								if($_48 === \true) { $_50 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_50 = \false; break;
							}
							while(\false);
							if($_50 === \true) { $_52 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_52 = \false; break;
						}
						while(\false);
						if($_52 === \true) { $_54 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_54 = \false; break;
					}
					while(\false);
					if($_54 === \true) { $_56 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_56 = \false; break;
				}
				while(\false);
				if($_56 === \true) { $_58 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_58 = \false; break;
			}
			while(\false);
			if($_58 === \true) { $_60 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_60 = \false; break;
		}
		while(\false);
		if($_60 === \true) { $_62 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_62 = \false; break;
	}
	while(\false);
	if($_62 === \true) { return $this->finalise($result); }
	if($_62 === \false) { return \false; }
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
	$_71 = \null;
	do {
		$res_64 = $result;
		$pos_64 = $this->pos;
		if (($subres = $this->literal('LET')) !== \false) { $result["text"] .= $subres; }
		else {
			$result = $res_64;
			$this->setPos($pos_64);
			unset($res_64, $pos_64);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_71 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_71 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_71 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_71 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_71 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_71 = \false; break; }
		$_71 = \true; break;
	}
	while(\false);
	if($_71 === \true) { return $this->finalise($result); }
	if($_71 === \false) { return \false; }
}


/* PrintStmt: "PRINT" _ msg:Expression */
protected $match_PrintStmt_typestack = ['PrintStmt'];
function match_PrintStmt($stack = []) {
	$matchrule = 'PrintStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_76 = \null;
	do {
		if (($subres = $this->literal('PRINT')) !== \false) { $result["text"] .= $subres; }
		else { $_76 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_76 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_76 = \false; break; }
		$_76 = \true; break;
	}
	while(\false);
	if($_76 === \true) { return $this->finalise($result); }
	if($_76 === \false) { return \false; }
}


/* InputStmt: "INPUT" _ var:Identifier */
protected $match_InputStmt_typestack = ['InputStmt'];
function match_InputStmt($stack = []) {
	$matchrule = 'InputStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_81 = \null;
	do {
		if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
		else { $_81 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_81 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_81 = \false; break; }
		$_81 = \true; break;
	}
	while(\false);
	if($_81 === \true) { return $this->finalise($result); }
	if($_81 === \false) { return \false; }
}


/* IfStmt: "IF" _ cond:Expression _ "THEN" _ stmt:Statement */
protected $match_IfStmt_typestack = ['IfStmt'];
function match_IfStmt($stack = []) {
	$matchrule = 'IfStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_90 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "cond");
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		if (($subres = $this->literal('THEN')) !== \false) { $result["text"] .= $subres; }
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_90 = \false; break; }
		$_90 = \true; break;
	}
	while(\false);
	if($_90 === \true) { return $this->finalise($result); }
	if($_90 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_95 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "label");
		}
		else { $_95 = \false; break; }
		$_95 = \true; break;
	}
	while(\false);
	if($_95 === \true) { return $this->finalise($result); }
	if($_95 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_100 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_100 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_100 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_100 = \false; break; }
		$_100 = \true; break;
	}
	while(\false);
	if($_100 === \true) { return $this->finalise($result); }
	if($_100 === \false) { return \false; }
}


/* ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression */
protected $match_ForStmt_typestack = ['ForStmt'];
function match_ForStmt($stack = []) {
	$matchrule = 'ForStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_113 = \null;
	do {
		if (($subres = $this->literal('FOR')) !== \false) { $result["text"] .= $subres; }
		else { $_113 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_113 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_113 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_113 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_113 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_113 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_113 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_113 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_113 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_113 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_113 = \false; break; }
		$_113 = \true; break;
	}
	while(\false);
	if($_113 === \true) { return $this->finalise($result); }
	if($_113 === \false) { return \false; }
}


/* NextStmt: "NEXT" _ var:Identifier? */
protected $match_NextStmt_typestack = ['NextStmt'];
function match_NextStmt($stack = []) {
	$matchrule = 'NextStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_118 = \null;
	do {
		if (($subres = $this->literal('NEXT')) !== \false) { $result["text"] .= $subres; }
		else { $_118 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_118 = \false; break; }
		$res_117 = $result;
		$pos_117 = $this->pos;
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else {
			$result = $res_117;
			$this->setPos($pos_117);
			unset($res_117, $pos_117);
		}
		$_118 = \true; break;
	}
	while(\false);
	if($_118 === \true) { return $this->finalise($result); }
	if($_118 === \false) { return \false; }
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
	$_129 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_129 = \false; break; }
		while (\true) {
			$res_128 = $result;
			$pos_128 = $this->pos;
			$_127 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_127 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_127 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_127 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_127 = \false; break; }
				$_127 = \true; break;
			}
			while(\false);
			if($_127 === \false) {
				$result = $res_128;
				$this->setPos($pos_128);
				unset($res_128, $pos_128);
				break;
			}
		}
		$_129 = \true; break;
	}
	while(\false);
	if($_129 === \true) { return $this->finalise($result); }
	if($_129 === \false) { return \false; }
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
	$_150 = \null;
	do {
		$res_131 = $result;
		$pos_131 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
			$_150 = \true; break;
		}
		$result = $res_131;
		$this->setPos($pos_131);
		$_148 = \null;
		do {
			$res_133 = $result;
			$pos_133 = $this->pos;
			if (($subres = $this->literal('<>')) !== \false) {
				$result["text"] .= $subres;
				$_148 = \true; break;
			}
			$result = $res_133;
			$this->setPos($pos_133);
			$_146 = \null;
			do {
				$res_135 = $result;
				$pos_135 = $this->pos;
				if (($subres = $this->literal('<=')) !== \false) {
					$result["text"] .= $subres;
					$_146 = \true; break;
				}
				$result = $res_135;
				$this->setPos($pos_135);
				$_144 = \null;
				do {
					$res_137 = $result;
					$pos_137 = $this->pos;
					if (($subres = $this->literal('>=')) !== \false) {
						$result["text"] .= $subres;
						$_144 = \true; break;
					}
					$result = $res_137;
					$this->setPos($pos_137);
					$_142 = \null;
					do {
						$res_139 = $result;
						$pos_139 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_142 = \true; break;
						}
						$result = $res_139;
						$this->setPos($pos_139);
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_142 = \true; break;
						}
						$result = $res_139;
						$this->setPos($pos_139);
						$_142 = \false; break;
					}
					while(\false);
					if($_142 === \true) { $_144 = \true; break; }
					$result = $res_137;
					$this->setPos($pos_137);
					$_144 = \false; break;
				}
				while(\false);
				if($_144 === \true) { $_146 = \true; break; }
				$result = $res_135;
				$this->setPos($pos_135);
				$_146 = \false; break;
			}
			while(\false);
			if($_146 === \true) { $_148 = \true; break; }
			$result = $res_133;
			$this->setPos($pos_133);
			$_148 = \false; break;
		}
		while(\false);
		if($_148 === \true) { $_150 = \true; break; }
		$result = $res_131;
		$this->setPos($pos_131);
		$_150 = \false; break;
	}
	while(\false);
	if($_150 === \true) { return $this->finalise($result); }
	if($_150 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_159 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_159 = \false; break; }
		while (\true) {
			$res_158 = $result;
			$pos_158 = $this->pos;
			$_157 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_157 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_157 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_157 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_157 = \false; break; }
				$_157 = \true; break;
			}
			while(\false);
			if($_157 === \false) {
				$result = $res_158;
				$this->setPos($pos_158);
				unset($res_158, $pos_158);
				break;
			}
		}
		$_159 = \true; break;
	}
	while(\false);
	if($_159 === \true) { return $this->finalise($result); }
	if($_159 === \false) { return \false; }
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
	$_164 = \null;
	do {
		$res_161 = $result;
		$pos_161 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_164 = \true; break;
		}
		$result = $res_161;
		$this->setPos($pos_161);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_164 = \true; break;
		}
		$result = $res_161;
		$this->setPos($pos_161);
		$_164 = \false; break;
	}
	while(\false);
	if($_164 === \true) { return $this->finalise($result); }
	if($_164 === \false) { return \false; }
}


/* Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_173 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
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
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_171 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_171 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
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
	$_178 = \null;
	do {
		$res_175 = $result;
		$pos_175 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_178 = \true; break;
		}
		$result = $res_175;
		$this->setPos($pos_175);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_178 = \true; break;
		}
		$result = $res_175;
		$this->setPos($pos_175);
		$_178 = \false; break;
	}
	while(\false);
	if($_178 === \true) { return $this->finalise($result); }
	if($_178 === \false) { return \false; }
}


/* Primary: val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_197 = \null;
	do {
		$res_180 = $result;
		$pos_180 = $this->pos;
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_197 = \true; break;
		}
		$result = $res_180;
		$this->setPos($pos_180);
		$_195 = \null;
		do {
			$res_182 = $result;
			$pos_182 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_195 = \true; break;
			}
			$result = $res_182;
			$this->setPos($pos_182);
			$_193 = \null;
			do {
				$res_184 = $result;
				$pos_184 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_193 = \true; break;
				}
				$result = $res_184;
				$this->setPos($pos_184);
				$_191 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_191 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_191 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_191 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_191 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_191 = \false; break; }
					$_191 = \true; break;
				}
				while(\false);
				if($_191 === \true) { $_193 = \true; break; }
				$result = $res_184;
				$this->setPos($pos_184);
				$_193 = \false; break;
			}
			while(\false);
			if($_193 === \true) { $_195 = \true; break; }
			$result = $res_182;
			$this->setPos($pos_182);
			$_195 = \false; break;
		}
		while(\false);
		if($_195 === \true) { $_197 = \true; break; }
		$result = $res_180;
		$this->setPos($pos_180);
		$_197 = \false; break;
	}
	while(\false);
	if($_197 === \true) { return $this->finalise($result); }
	if($_197 === \false) { return \false; }
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
	$_202 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_202 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_202 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_202 = \false; break; }
		$_202 = \true; break;
	}
	while(\false);
	if($_202 === \true) { return $this->finalise($result); }
	if($_202 === \false) { return \false; }
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
	$_207 = \null;
	do {
		$res_205 = $result;
		$pos_205 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_205;
			$this->setPos($pos_205);
			$_207 = \false; break;
		}
		else {
			$result = $res_205;
			$this->setPos($pos_205);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_207 = \false; break; }
		$_207 = \true; break;
	}
	while(\false);
	if($_207 === \true) { return $this->finalise($result); }
	if($_207 === \false) { return \false; }
}


/* Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "GOTO" | "FOR" | "TO" | "NEXT" | "END") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_251 = \null;
	do {
		$_246 = \null;
		do {
			$_244 = \null;
			do {
				$res_209 = $result;
				$pos_209 = $this->pos;
				if (($subres = $this->literal('LET')) !== \false) {
					$result["text"] .= $subres;
					$_244 = \true; break;
				}
				$result = $res_209;
				$this->setPos($pos_209);
				$_242 = \null;
				do {
					$res_211 = $result;
					$pos_211 = $this->pos;
					if (($subres = $this->literal('PRINT')) !== \false) {
						$result["text"] .= $subres;
						$_242 = \true; break;
					}
					$result = $res_211;
					$this->setPos($pos_211);
					$_240 = \null;
					do {
						$res_213 = $result;
						$pos_213 = $this->pos;
						if (($subres = $this->literal('INPUT')) !== \false) {
							$result["text"] .= $subres;
							$_240 = \true; break;
						}
						$result = $res_213;
						$this->setPos($pos_213);
						$_238 = \null;
						do {
							$res_215 = $result;
							$pos_215 = $this->pos;
							if (($subres = $this->literal('IF')) !== \false) {
								$result["text"] .= $subres;
								$_238 = \true; break;
							}
							$result = $res_215;
							$this->setPos($pos_215);
							$_236 = \null;
							do {
								$res_217 = $result;
								$pos_217 = $this->pos;
								if (($subres = $this->literal('THEN')) !== \false) {
									$result["text"] .= $subres;
									$_236 = \true; break;
								}
								$result = $res_217;
								$this->setPos($pos_217);
								$_234 = \null;
								do {
									$res_219 = $result;
									$pos_219 = $this->pos;
									if (($subres = $this->literal('GOTO')) !== \false) {
										$result["text"] .= $subres;
										$_234 = \true; break;
									}
									$result = $res_219;
									$this->setPos($pos_219);
									$_232 = \null;
									do {
										$res_221 = $result;
										$pos_221 = $this->pos;
										if (($subres = $this->literal('FOR')) !== \false) {
											$result["text"] .= $subres;
											$_232 = \true; break;
										}
										$result = $res_221;
										$this->setPos($pos_221);
										$_230 = \null;
										do {
											$res_223 = $result;
											$pos_223 = $this->pos;
											if (($subres = $this->literal('TO')) !== \false) {
												$result["text"] .= $subres;
												$_230 = \true; break;
											}
											$result = $res_223;
											$this->setPos($pos_223);
											$_228 = \null;
											do {
												$res_225 = $result;
												$pos_225 = $this->pos;
												if (($subres = $this->literal('NEXT')) !== \false) {
													$result["text"] .= $subres;
													$_228 = \true; break;
												}
												$result = $res_225;
												$this->setPos($pos_225);
												if (($subres = $this->literal('END')) !== \false) {
													$result["text"] .= $subres;
													$_228 = \true; break;
												}
												$result = $res_225;
												$this->setPos($pos_225);
												$_228 = \false; break;
											}
											while(\false);
											if($_228 === \true) { $_230 = \true; break; }
											$result = $res_223;
											$this->setPos($pos_223);
											$_230 = \false; break;
										}
										while(\false);
										if($_230 === \true) { $_232 = \true; break; }
										$result = $res_221;
										$this->setPos($pos_221);
										$_232 = \false; break;
									}
									while(\false);
									if($_232 === \true) { $_234 = \true; break; }
									$result = $res_219;
									$this->setPos($pos_219);
									$_234 = \false; break;
								}
								while(\false);
								if($_234 === \true) { $_236 = \true; break; }
								$result = $res_217;
								$this->setPos($pos_217);
								$_236 = \false; break;
							}
							while(\false);
							if($_236 === \true) { $_238 = \true; break; }
							$result = $res_215;
							$this->setPos($pos_215);
							$_238 = \false; break;
						}
						while(\false);
						if($_238 === \true) { $_240 = \true; break; }
						$result = $res_213;
						$this->setPos($pos_213);
						$_240 = \false; break;
					}
					while(\false);
					if($_240 === \true) { $_242 = \true; break; }
					$result = $res_211;
					$this->setPos($pos_211);
					$_242 = \false; break;
				}
				while(\false);
				if($_242 === \true) { $_244 = \true; break; }
				$result = $res_209;
				$this->setPos($pos_209);
				$_244 = \false; break;
			}
			while(\false);
			if($_244 === \false) { $_246 = \false; break; }
			$_246 = \true; break;
		}
		while(\false);
		if($_246 === \false) { $_251 = \false; break; }
		$res_250 = $result;
		$pos_250 = $this->pos;
		$_249 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_249 = \false; break; }
			$_249 = \true; break;
		}
		while(\false);
		if($_249 === \true) {
			$result = $res_250;
			$this->setPos($pos_250);
			$_251 = \false; break;
		}
		if($_249 === \false) {
			$result = $res_250;
			$this->setPos($pos_250);
		}
		$_251 = \true; break;
	}
	while(\false);
	if($_251 === \true) { return $this->finalise($result); }
	if($_251 === \false) { return \false; }
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
