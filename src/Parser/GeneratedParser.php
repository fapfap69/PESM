<?php
namespace PESM\Parser;

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

/* Statement: alt:Assignment _ | alt:IfStatement _ | alt:ForeachStatement _ | alt:MessageStmt _ | alt:AcceptStmt _ | alt:RefuseStmt _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_41 = \null;
	do {
		$res_4 = $result;
		$pos_4 = $this->pos;
		$_7 = \null;
		do {
			$key = 'match_'.'Assignment'; $pos = $this->pos;
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
		if($_7 === \true) { $_41 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_39 = \null;
		do {
			$res_9 = $result;
			$pos_9 = $this->pos;
			$_12 = \null;
			do {
				$key = 'match_'.'IfStatement'; $pos = $this->pos;
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
			if($_12 === \true) { $_39 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_37 = \null;
			do {
				$res_14 = $result;
				$pos_14 = $this->pos;
				$_17 = \null;
				do {
					$key = 'match_'.'ForeachStatement'; $pos = $this->pos;
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
				if($_17 === \true) { $_37 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_35 = \null;
				do {
					$res_19 = $result;
					$pos_19 = $this->pos;
					$_22 = \null;
					do {
						$key = 'match_'.'MessageStmt'; $pos = $this->pos;
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
					if($_22 === \true) { $_35 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_33 = \null;
					do {
						$res_24 = $result;
						$pos_24 = $this->pos;
						$_27 = \null;
						do {
							$key = 'match_'.'AcceptStmt'; $pos = $this->pos;
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
						if($_27 === \true) { $_33 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_31 = \null;
						do {
							$key = 'match_'.'RefuseStmt'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
							}
							else { $_31 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_31 = \false; break; }
							$_31 = \true; break;
						}
						while(\false);
						if($_31 === \true) { $_33 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_33 = \false; break;
					}
					while(\false);
					if($_33 === \true) { $_35 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_35 = \false; break;
				}
				while(\false);
				if($_35 === \true) { $_37 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_37 = \false; break;
			}
			while(\false);
			if($_37 === \true) { $_39 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_39 = \false; break;
		}
		while(\false);
		if($_39 === \true) { $_41 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_41 = \false; break;
	}
	while(\false);
	if($_41 === \true) { return $this->finalise($result); }
	if($_41 === \false) { return \false; }
}

public function Statement_alt (&$res, $sub) {
    $res['node'] = $sub;
  }

/* Assignment: var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_48 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_48 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_48 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_48 = \false; break; }
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
	$_58 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_58 = \false; break; }
		while (\true) {
			$res_57 = $result;
			$pos_57 = $this->pos;
			$_56 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_56 = \false; break; }
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_56 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_56 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_56 = \false; break; }
				$_56 = \true; break;
			}
			while(\false);
			if($_56 === \false) {
				$result = $res_57;
				$this->setPos($pos_57);
				unset($res_57, $pos_57);
				break;
			}
		}
		$_58 = \true; break;
	}
	while(\false);
	if($_58 === \true) { return $this->finalise($result); }
	if($_58 === \false) { return \false; }
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

/* LogicalOp: "AND" | "OR" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_63 = \null;
	do {
		$res_60 = $result;
		$pos_60 = $this->pos;
		if (($subres = $this->literal('AND')) !== \false) {
			$result["text"] .= $subres;
			$_63 = \true; break;
		}
		$result = $res_60;
		$this->setPos($pos_60);
		if (($subres = $this->literal('OR')) !== \false) {
			$result["text"] .= $subres;
			$_63 = \true; break;
		}
		$result = $res_60;
		$this->setPos($pos_60);
		$_63 = \false; break;
	}
	while(\false);
	if($_63 === \true) { return $this->finalise($result); }
	if($_63 === \false) { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_72 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_72 = \false; break; }
		while (\true) {
			$res_71 = $result;
			$pos_71 = $this->pos;
			$_70 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_70 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_70 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_70 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_70 = \false; break; }
				$_70 = \true; break;
			}
			while(\false);
			if($_70 === \false) {
				$result = $res_71;
				$this->setPos($pos_71);
				unset($res_71, $pos_71);
				break;
			}
		}
		$_72 = \true; break;
	}
	while(\false);
	if($_72 === \true) { return $this->finalise($result); }
	if($_72 === \false) { return \false; }
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

/* CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_93 = \null;
	do {
		$res_74 = $result;
		$pos_74 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_93 = \true; break;
		}
		$result = $res_74;
		$this->setPos($pos_74);
		$_91 = \null;
		do {
			$res_76 = $result;
			$pos_76 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_91 = \true; break;
			}
			$result = $res_76;
			$this->setPos($pos_76);
			$_89 = \null;
			do {
				$res_78 = $result;
				$pos_78 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_89 = \true; break;
				}
				$result = $res_78;
				$this->setPos($pos_78);
				$_87 = \null;
				do {
					$res_80 = $result;
					$pos_80 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_87 = \true; break;
					}
					$result = $res_80;
					$this->setPos($pos_80);
					$_85 = \null;
					do {
						$res_82 = $result;
						$pos_82 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_85 = \true; break;
						}
						$result = $res_82;
						$this->setPos($pos_82);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_85 = \true; break;
						}
						$result = $res_82;
						$this->setPos($pos_82);
						$_85 = \false; break;
					}
					while(\false);
					if($_85 === \true) { $_87 = \true; break; }
					$result = $res_80;
					$this->setPos($pos_80);
					$_87 = \false; break;
				}
				while(\false);
				if($_87 === \true) { $_89 = \true; break; }
				$result = $res_78;
				$this->setPos($pos_78);
				$_89 = \false; break;
			}
			while(\false);
			if($_89 === \true) { $_91 = \true; break; }
			$result = $res_76;
			$this->setPos($pos_76);
			$_91 = \false; break;
		}
		while(\false);
		if($_91 === \true) { $_93 = \true; break; }
		$result = $res_74;
		$this->setPos($pos_74);
		$_93 = \false; break;
	}
	while(\false);
	if($_93 === \true) { return $this->finalise($result); }
	if($_93 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_102 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_102 = \false; break; }
		while (\true) {
			$res_101 = $result;
			$pos_101 = $this->pos;
			$_100 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_100 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_100 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_100 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_100 = \false; break; }
				$_100 = \true; break;
			}
			while(\false);
			if($_100 === \false) {
				$result = $res_101;
				$this->setPos($pos_101);
				unset($res_101, $pos_101);
				break;
			}
		}
		$_102 = \true; break;
	}
	while(\false);
	if($_102 === \true) { return $this->finalise($result); }
	if($_102 === \false) { return \false; }
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
	$_107 = \null;
	do {
		$res_104 = $result;
		$pos_104 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_107 = \true; break;
		}
		$result = $res_104;
		$this->setPos($pos_104);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_107 = \true; break;
		}
		$result = $res_104;
		$this->setPos($pos_104);
		$_107 = \false; break;
	}
	while(\false);
	if($_107 === \true) { return $this->finalise($result); }
	if($_107 === \false) { return \false; }
}


/* Multiplicative: left:Unary ( _ op:MulOp _ right:Unary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_116 = \null;
	do {
		$key = 'match_'.'Unary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_116 = \false; break; }
		while (\true) {
			$res_115 = $result;
			$pos_115 = $this->pos;
			$_114 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_114 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_114 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_114 = \false; break; }
				$key = 'match_'.'Unary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_114 = \false; break; }
				$_114 = \true; break;
			}
			while(\false);
			if($_114 === \false) {
				$result = $res_115;
				$this->setPos($pos_115);
				unset($res_115, $pos_115);
				break;
			}
		}
		$_116 = \true; break;
	}
	while(\false);
	if($_116 === \true) { return $this->finalise($result); }
	if($_116 === \false) { return \false; }
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
	$_121 = \null;
	do {
		$res_118 = $result;
		$pos_118 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_121 = \true; break;
		}
		$result = $res_118;
		$this->setPos($pos_118);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_121 = \true; break;
		}
		$result = $res_118;
		$this->setPos($pos_118);
		$_121 = \false; break;
	}
	while(\false);
	if($_121 === \true) { return $this->finalise($result); }
	if($_121 === \false) { return \false; }
}


/* Unary: op:UnaryOp _ expr:Unary | val:Primary */
protected $match_Unary_typestack = ['Unary'];
function match_Unary($stack = []) {
	$matchrule = 'Unary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_130 = \null;
	do {
		$res_123 = $result;
		$pos_123 = $this->pos;
		$_127 = \null;
		do {
			$key = 'match_'.'UnaryOp'; $pos = $this->pos;
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
			$key = 'match_'.'Unary'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_127 = \false; break; }
			$_127 = \true; break;
		}
		while(\false);
		if($_127 === \true) { $_130 = \true; break; }
		$result = $res_123;
		$this->setPos($pos_123);
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_130 = \true; break;
		}
		$result = $res_123;
		$this->setPos($pos_123);
		$_130 = \false; break;
	}
	while(\false);
	if($_130 === \true) { return $this->finalise($result); }
	if($_130 === \false) { return \false; }
}

public function Unary_op (&$res, $sub) {
    $res['operator'] = $sub['text'];
  }

public function Unary_val (&$res, $sub) {
    $res['node'] = $sub;
  }

/* UnaryOp: "NOT" | "-" | "+" */
protected $match_UnaryOp_typestack = ['UnaryOp'];
function match_UnaryOp($stack = []) {
	$matchrule = 'UnaryOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_139 = \null;
	do {
		$res_132 = $result;
		$pos_132 = $this->pos;
		if (($subres = $this->literal('NOT')) !== \false) {
			$result["text"] .= $subres;
			$_139 = \true; break;
		}
		$result = $res_132;
		$this->setPos($pos_132);
		$_137 = \null;
		do {
			$res_134 = $result;
			$pos_134 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '-') {
				$this->addPos(1);
				$result["text"] .= '-';
				$_137 = \true; break;
			}
			$result = $res_134;
			$this->setPos($pos_134);
			if (\substr($this->string, $this->pos, 1) === '+') {
				$this->addPos(1);
				$result["text"] .= '+';
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
	if($_139 === \true) { return $this->finalise($result); }
	if($_139 === \false) { return \false; }
}


/* Primary: val:FunctionCall | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_158 = \null;
	do {
		$res_141 = $result;
		$pos_141 = $this->pos;
		$key = 'match_'.'FunctionCall'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_158 = \true; break;
		}
		$result = $res_141;
		$this->setPos($pos_141);
		$_156 = \null;
		do {
			$res_143 = $result;
			$pos_143 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_156 = \true; break;
			}
			$result = $res_143;
			$this->setPos($pos_143);
			$_154 = \null;
			do {
				$res_145 = $result;
				$pos_145 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_154 = \true; break;
				}
				$result = $res_145;
				$this->setPos($pos_145);
				$_152 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_152 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_152 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_152 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_152 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_152 = \false; break; }
					$_152 = \true; break;
				}
				while(\false);
				if($_152 === \true) { $_154 = \true; break; }
				$result = $res_145;
				$this->setPos($pos_145);
				$_154 = \false; break;
			}
			while(\false);
			if($_154 === \true) { $_156 = \true; break; }
			$result = $res_143;
			$this->setPos($pos_143);
			$_156 = \false; break;
		}
		while(\false);
		if($_156 === \true) { $_158 = \true; break; }
		$result = $res_141;
		$this->setPos($pos_141);
		$_158 = \false; break;
	}
	while(\false);
	if($_158 === \true) { return $this->finalise($result); }
	if($_158 === \false) { return \false; }
}

public function Primary_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* FunctionCall: fname:Identifier _ "(" _ args:ArgumentList? _ ")" */
protected $match_FunctionCall_typestack = ['FunctionCall'];
function match_FunctionCall($stack = []) {
	$matchrule = 'FunctionCall';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_167 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "fname");
		}
		else { $_167 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_167 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_167 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_167 = \false; break; }
		$res_164 = $result;
		$pos_164 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_164;
			$this->setPos($pos_164);
			unset($res_164, $pos_164);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_167 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_167 = \false; break; }
		$_167 = \true; break;
	}
	while(\false);
	if($_167 === \true) { return $this->finalise($result); }
	if($_167 === \false) { return \false; }
}


/* ArgumentList: arg:Expression ( _ "," _ arg:Expression )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_176 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "arg");
		}
		else { $_176 = \false; break; }
		while (\true) {
			$res_175 = $result;
			$pos_175 = $this->pos;
			$_174 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_174 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_174 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_174 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "arg");
				}
				else { $_174 = \false; break; }
				$_174 = \true; break;
			}
			while(\false);
			if($_174 === \false) {
				$result = $res_175;
				$this->setPos($pos_175);
				unset($res_175, $pos_175);
				break;
			}
		}
		$_176 = \true; break;
	}
	while(\false);
	if($_176 === \true) { return $this->finalise($result); }
	if($_176 === \false) { return \false; }
}

public function ArgumentList_arg (&$res, $sub) {
    if (!isset($res['arguments'])) $res['arguments'] = [];
    $res['arguments'][] = $sub;
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


/* Identifier: /[a-zA-Z_][a-zA-Z0-9_]{0,}/ */
protected $match_Identifier_typestack = ['Identifier'];
function match_Identifier($stack = []) {
	$matchrule = 'Identifier';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}


/* IfStatement: "IF" _ cond:Expression _ body:Statement+ ( "ELSE" _ else:Statement+ )? "END" */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_191 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "cond");
		}
		else { $_191 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_191 = \false; break; }
		$count_184 = 0;
		while (\true) {
			$res_184 = $result;
			$pos_184 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_184;
				$this->setPos($pos_184);
				unset($res_184, $pos_184);
				break;
			}
			$count_184++;
		}
		if ($count_184 >= 1) {  }
		else { $_191 = \false; break; }
		$res_189 = $result;
		$pos_189 = $this->pos;
		$_188 = \null;
		do {
			if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
			else { $_188 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_188 = \false; break; }
			$count_187 = 0;
			while (\true) {
				$res_187 = $result;
				$pos_187 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else {
					$result = $res_187;
					$this->setPos($pos_187);
					unset($res_187, $pos_187);
					break;
				}
				$count_187++;
			}
			if ($count_187 >= 1) {  }
			else { $_188 = \false; break; }
			$_188 = \true; break;
		}
		while(\false);
		if($_188 === \false) {
			$result = $res_189;
			$this->setPos($pos_189);
			unset($res_189, $pos_189);
		}
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_191 = \false; break; }
		$_191 = \true; break;
	}
	while(\false);
	if($_191 === \true) { return $this->finalise($result); }
	if($_191 === \false) { return \false; }
}

public function IfStatement_body (&$res, $sub) {
    if (!isset($res['thenBody'])) $res['thenBody'] = [];
    $res['thenBody'][] = $sub;
  }

public function IfStatement_else (&$res, $sub) {
    if (!isset($res['elseBody'])) $res['elseBody'] = [];
    $res['elseBody'][] = $sub;
  }

/* ForeachStatement: "FOREACH" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "END" */
protected $match_ForeachStatement_typestack = ['ForeachStatement'];
function match_ForeachStatement($stack = []) {
	$matchrule = 'ForeachStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_207 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_207 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_207 = \false; break; }
		$count_205 = 0;
		while (\true) {
			$res_205 = $result;
			$pos_205 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_205;
				$this->setPos($pos_205);
				unset($res_205, $pos_205);
				break;
			}
			$count_205++;
		}
		if ($count_205 >= 1) {  }
		else { $_207 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_207 = \false; break; }
		$_207 = \true; break;
	}
	while(\false);
	if($_207 === \true) { return $this->finalise($result); }
	if($_207 === \false) { return \false; }
}

public function ForeachStatement_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* MessageStmt: "MESSAGE" _ msg:String */
protected $match_MessageStmt_typestack = ['MessageStmt'];
function match_MessageStmt($stack = []) {
	$matchrule = 'MessageStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_212 = \null;
	do {
		if (($subres = $this->literal('MESSAGE')) !== \false) { $result["text"] .= $subres; }
		else { $_212 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_212 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_212 = \false; break; }
		$_212 = \true; break;
	}
	while(\false);
	if($_212 === \true) { return $this->finalise($result); }
	if($_212 === \false) { return \false; }
}


/* AcceptStmt: "ACCEPT" _ state:String */
protected $match_AcceptStmt_typestack = ['AcceptStmt'];
function match_AcceptStmt($stack = []) {
	$matchrule = 'AcceptStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_217 = \null;
	do {
		if (($subres = $this->literal('ACCEPT')) !== \false) { $result["text"] .= $subres; }
		else { $_217 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_217 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_217 = \false; break; }
		$_217 = \true; break;
	}
	while(\false);
	if($_217 === \true) { return $this->finalise($result); }
	if($_217 === \false) { return \false; }
}


/* RefuseStmt: "REFUSE" _ state:String */
protected $match_RefuseStmt_typestack = ['RefuseStmt'];
function match_RefuseStmt($stack = []) {
	$matchrule = 'RefuseStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_222 = \null;
	do {
		if (($subres = $this->literal('REFUSE')) !== \false) { $result["text"] .= $subres; }
		else { $_222 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_222 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_222 = \false; break; }
		$_222 = \true; break;
	}
	while(\false);
	if($_222 === \true) { return $this->finalise($result); }
	if($_222 === \false) { return \false; }
}


/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_227 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_227 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_227 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_227 = \false; break; }
		$_227 = \true; break;
	}
	while(\false);
	if($_227 === \true) { return $this->finalise($result); }
	if($_227 === \false) { return \false; }
}

public function String_content (&$res, $sub) {
    $res['value'] = $sub['text'];
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
