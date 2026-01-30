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

/* Statement: alt:FunctionDef _ | alt:IfStatement _ | alt:ForeachStatement _ | alt:MessageStmt _ | alt:AcceptStmt _ | alt:RefuseStmt _ | alt:ReturnStmt _ | alt:Assignment _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_55 = \null;
	do {
		$res_4 = $result;
		$pos_4 = $this->pos;
		$_7 = \null;
		do {
			$key = 'match_'.'FunctionDef'; $pos = $this->pos;
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
		if($_7 === \true) { $_55 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_53 = \null;
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
			if($_12 === \true) { $_53 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_51 = \null;
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
				if($_17 === \true) { $_51 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_49 = \null;
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
					if($_22 === \true) { $_49 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_47 = \null;
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
						if($_27 === \true) { $_47 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_45 = \null;
						do {
							$res_29 = $result;
							$pos_29 = $this->pos;
							$_32 = \null;
							do {
								$key = 'match_'.'RefuseStmt'; $pos = $this->pos;
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
							if($_32 === \true) { $_45 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_43 = \null;
							do {
								$res_34 = $result;
								$pos_34 = $this->pos;
								$_37 = \null;
								do {
									$key = 'match_'.'ReturnStmt'; $pos = $this->pos;
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
								if($_37 === \true) { $_43 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_41 = \null;
								do {
									$key = 'match_'.'Assignment'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres, "alt");
									}
									else { $_41 = \false; break; }
									$key = 'match_'.'_'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres);
									}
									else { $_41 = \false; break; }
									$_41 = \true; break;
								}
								while(\false);
								if($_41 === \true) { $_43 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_43 = \false; break;
							}
							while(\false);
							if($_43 === \true) { $_45 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_45 = \false; break;
						}
						while(\false);
						if($_45 === \true) { $_47 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_47 = \false; break;
					}
					while(\false);
					if($_47 === \true) { $_49 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_49 = \false; break;
				}
				while(\false);
				if($_49 === \true) { $_51 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_51 = \false; break;
			}
			while(\false);
			if($_51 === \true) { $_53 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_53 = \false; break;
		}
		while(\false);
		if($_53 === \true) { $_55 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_55 = \false; break;
	}
	while(\false);
	if($_55 === \true) { return $this->finalise($result); }
	if($_55 === \false) { return \false; }
}

public function Statement_alt (&$res, $sub) {
    $res['node'] = $sub;
  }

/* FunctionDef: "FUNCTION" _ fname:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END" */
protected $match_FunctionDef_typestack = ['FunctionDef'];
function match_FunctionDef($stack = []) {
	$matchrule = 'FunctionDef';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_69 = \null;
	do {
		if (($subres = $this->literal('FUNCTION')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "fname");
		}
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
		$res_63 = $result;
		$pos_63 = $this->pos;
		$key = 'match_'.'ParameterList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "params");
		}
		else {
			$result = $res_63;
			$this->setPos($pos_63);
			unset($res_63, $pos_63);
		}
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
		$count_67 = 0;
		while (\true) {
			$res_67 = $result;
			$pos_67 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_67;
				$this->setPos($pos_67);
				unset($res_67, $pos_67);
				break;
			}
			$count_67++;
		}
		if ($count_67 >= 1) {  }
		else { $_69 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_69 = \false; break; }
		$_69 = \true; break;
	}
	while(\false);
	if($_69 === \true) { return $this->finalise($result); }
	if($_69 === \false) { return \false; }
}

public function FunctionDef_body (&$res, $sub) {
    if (!isset($res['funcBody'])) $res['funcBody'] = [];
    $res['funcBody'][] = $sub;
  }

/* ParameterList: param:Identifier ( _ "," _ param:Identifier )* */
protected $match_ParameterList_typestack = ['ParameterList'];
function match_ParameterList($stack = []) {
	$matchrule = 'ParameterList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_78 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "param");
		}
		else { $_78 = \false; break; }
		while (\true) {
			$res_77 = $result;
			$pos_77 = $this->pos;
			$_76 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_76 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_76 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_76 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "param");
				}
				else { $_76 = \false; break; }
				$_76 = \true; break;
			}
			while(\false);
			if($_76 === \false) {
				$result = $res_77;
				$this->setPos($pos_77);
				unset($res_77, $pos_77);
				break;
			}
		}
		$_78 = \true; break;
	}
	while(\false);
	if($_78 === \true) { return $this->finalise($result); }
	if($_78 === \false) { return \false; }
}

public function ParameterList_param (&$res, $sub) {
    if (!isset($res['parameters'])) $res['parameters'] = [];
    $res['parameters'][] = $sub;
  }

/* ReturnStmt: "RETURN" !(_ "=") ( _ expr:Expression )? */
protected $match_ReturnStmt_typestack = ['ReturnStmt'];
function match_ReturnStmt($stack = []) {
	$matchrule = 'ReturnStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_89 = \null;
	do {
		if (($subres = $this->literal('RETURN')) !== \false) { $result["text"] .= $subres; }
		else { $_89 = \false; break; }
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
			if (\substr($this->string, $this->pos, 1) === '=') {
				$this->addPos(1);
				$result["text"] .= '=';
			}
			else { $_83 = \false; break; }
			$_83 = \true; break;
		}
		while(\false);
		if($_83 === \true) {
			$result = $res_84;
			$this->setPos($pos_84);
			$_89 = \false; break;
		}
		if($_83 === \false) {
			$result = $res_84;
			$this->setPos($pos_84);
		}
		$res_88 = $result;
		$pos_88 = $this->pos;
		$_87 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_87 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_87 = \false; break; }
			$_87 = \true; break;
		}
		while(\false);
		if($_87 === \false) {
			$result = $res_88;
			$this->setPos($pos_88);
			unset($res_88, $pos_88);
		}
		$_89 = \true; break;
	}
	while(\false);
	if($_89 === \true) { return $this->finalise($result); }
	if($_89 === \false) { return \false; }
}


/* Assignment: var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_96 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_96 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_96 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_96 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_96 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_96 = \false; break; }
		$_96 = \true; break;
	}
	while(\false);
	if($_96 === \true) { return $this->finalise($result); }
	if($_96 === \false) { return \false; }
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
	$_106 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_106 = \false; break; }
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
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_104 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_104 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
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
		$_106 = \true; break;
	}
	while(\false);
	if($_106 === \true) { return $this->finalise($result); }
	if($_106 === \false) { return \false; }
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
	$_111 = \null;
	do {
		$res_108 = $result;
		$pos_108 = $this->pos;
		if (($subres = $this->literal('AND')) !== \false) {
			$result["text"] .= $subres;
			$_111 = \true; break;
		}
		$result = $res_108;
		$this->setPos($pos_108);
		if (($subres = $this->literal('OR')) !== \false) {
			$result["text"] .= $subres;
			$_111 = \true; break;
		}
		$result = $res_108;
		$this->setPos($pos_108);
		$_111 = \false; break;
	}
	while(\false);
	if($_111 === \true) { return $this->finalise($result); }
	if($_111 === \false) { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_120 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_120 = \false; break; }
		while (\true) {
			$res_119 = $result;
			$pos_119 = $this->pos;
			$_118 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_118 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_118 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_118 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_118 = \false; break; }
				$_118 = \true; break;
			}
			while(\false);
			if($_118 === \false) {
				$result = $res_119;
				$this->setPos($pos_119);
				unset($res_119, $pos_119);
				break;
			}
		}
		$_120 = \true; break;
	}
	while(\false);
	if($_120 === \true) { return $this->finalise($result); }
	if($_120 === \false) { return \false; }
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
	$_141 = \null;
	do {
		$res_122 = $result;
		$pos_122 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_141 = \true; break;
		}
		$result = $res_122;
		$this->setPos($pos_122);
		$_139 = \null;
		do {
			$res_124 = $result;
			$pos_124 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_139 = \true; break;
			}
			$result = $res_124;
			$this->setPos($pos_124);
			$_137 = \null;
			do {
				$res_126 = $result;
				$pos_126 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_137 = \true; break;
				}
				$result = $res_126;
				$this->setPos($pos_126);
				$_135 = \null;
				do {
					$res_128 = $result;
					$pos_128 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_135 = \true; break;
					}
					$result = $res_128;
					$this->setPos($pos_128);
					$_133 = \null;
					do {
						$res_130 = $result;
						$pos_130 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_133 = \true; break;
						}
						$result = $res_130;
						$this->setPos($pos_130);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_133 = \true; break;
						}
						$result = $res_130;
						$this->setPos($pos_130);
						$_133 = \false; break;
					}
					while(\false);
					if($_133 === \true) { $_135 = \true; break; }
					$result = $res_128;
					$this->setPos($pos_128);
					$_135 = \false; break;
				}
				while(\false);
				if($_135 === \true) { $_137 = \true; break; }
				$result = $res_126;
				$this->setPos($pos_126);
				$_137 = \false; break;
			}
			while(\false);
			if($_137 === \true) { $_139 = \true; break; }
			$result = $res_124;
			$this->setPos($pos_124);
			$_139 = \false; break;
		}
		while(\false);
		if($_139 === \true) { $_141 = \true; break; }
		$result = $res_122;
		$this->setPos($pos_122);
		$_141 = \false; break;
	}
	while(\false);
	if($_141 === \true) { return $this->finalise($result); }
	if($_141 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_150 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_150 = \false; break; }
		while (\true) {
			$res_149 = $result;
			$pos_149 = $this->pos;
			$_148 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_148 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_148 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_148 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_148 = \false; break; }
				$_148 = \true; break;
			}
			while(\false);
			if($_148 === \false) {
				$result = $res_149;
				$this->setPos($pos_149);
				unset($res_149, $pos_149);
				break;
			}
		}
		$_150 = \true; break;
	}
	while(\false);
	if($_150 === \true) { return $this->finalise($result); }
	if($_150 === \false) { return \false; }
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
	$_155 = \null;
	do {
		$res_152 = $result;
		$pos_152 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_155 = \true; break;
		}
		$result = $res_152;
		$this->setPos($pos_152);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_155 = \true; break;
		}
		$result = $res_152;
		$this->setPos($pos_152);
		$_155 = \false; break;
	}
	while(\false);
	if($_155 === \true) { return $this->finalise($result); }
	if($_155 === \false) { return \false; }
}


/* Multiplicative: left:Unary ( _ op:MulOp _ right:Unary )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_164 = \null;
	do {
		$key = 'match_'.'Unary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_164 = \false; break; }
		while (\true) {
			$res_163 = $result;
			$pos_163 = $this->pos;
			$_162 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_162 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_162 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_162 = \false; break; }
				$key = 'match_'.'Unary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_162 = \false; break; }
				$_162 = \true; break;
			}
			while(\false);
			if($_162 === \false) {
				$result = $res_163;
				$this->setPos($pos_163);
				unset($res_163, $pos_163);
				break;
			}
		}
		$_164 = \true; break;
	}
	while(\false);
	if($_164 === \true) { return $this->finalise($result); }
	if($_164 === \false) { return \false; }
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
	$_169 = \null;
	do {
		$res_166 = $result;
		$pos_166 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_169 = \true; break;
		}
		$result = $res_166;
		$this->setPos($pos_166);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_169 = \true; break;
		}
		$result = $res_166;
		$this->setPos($pos_166);
		$_169 = \false; break;
	}
	while(\false);
	if($_169 === \true) { return $this->finalise($result); }
	if($_169 === \false) { return \false; }
}


/* Unary: op:UnaryOp _ expr:Unary | val:Primary */
protected $match_Unary_typestack = ['Unary'];
function match_Unary($stack = []) {
	$matchrule = 'Unary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_178 = \null;
	do {
		$res_171 = $result;
		$pos_171 = $this->pos;
		$_175 = \null;
		do {
			$key = 'match_'.'UnaryOp'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "op");
			}
			else { $_175 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_175 = \false; break; }
			$key = 'match_'.'Unary'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_175 = \false; break; }
			$_175 = \true; break;
		}
		while(\false);
		if($_175 === \true) { $_178 = \true; break; }
		$result = $res_171;
		$this->setPos($pos_171);
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_178 = \true; break;
		}
		$result = $res_171;
		$this->setPos($pos_171);
		$_178 = \false; break;
	}
	while(\false);
	if($_178 === \true) { return $this->finalise($result); }
	if($_178 === \false) { return \false; }
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
	$_187 = \null;
	do {
		$res_180 = $result;
		$pos_180 = $this->pos;
		if (($subres = $this->literal('NOT')) !== \false) {
			$result["text"] .= $subres;
			$_187 = \true; break;
		}
		$result = $res_180;
		$this->setPos($pos_180);
		$_185 = \null;
		do {
			$res_182 = $result;
			$pos_182 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '-') {
				$this->addPos(1);
				$result["text"] .= '-';
				$_185 = \true; break;
			}
			$result = $res_182;
			$this->setPos($pos_182);
			if (\substr($this->string, $this->pos, 1) === '+') {
				$this->addPos(1);
				$result["text"] .= '+';
				$_185 = \true; break;
			}
			$result = $res_182;
			$this->setPos($pos_182);
			$_185 = \false; break;
		}
		while(\false);
		if($_185 === \true) { $_187 = \true; break; }
		$result = $res_180;
		$this->setPos($pos_180);
		$_187 = \false; break;
	}
	while(\false);
	if($_187 === \true) { return $this->finalise($result); }
	if($_187 === \false) { return \false; }
}


/* Primary: val:FunctionCall | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_206 = \null;
	do {
		$res_189 = $result;
		$pos_189 = $this->pos;
		$key = 'match_'.'FunctionCall'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_206 = \true; break;
		}
		$result = $res_189;
		$this->setPos($pos_189);
		$_204 = \null;
		do {
			$res_191 = $result;
			$pos_191 = $this->pos;
			$key = 'match_'.'Number'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_204 = \true; break;
			}
			$result = $res_191;
			$this->setPos($pos_191);
			$_202 = \null;
			do {
				$res_193 = $result;
				$pos_193 = $this->pos;
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_202 = \true; break;
				}
				$result = $res_193;
				$this->setPos($pos_193);
				$_200 = \null;
				do {
					if (\substr($this->string, $this->pos, 1) === '(') {
						$this->addPos(1);
						$result["text"] .= '(';
					}
					else { $_200 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_200 = \false; break; }
					$key = 'match_'.'Expression'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
					}
					else { $_200 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_200 = \false; break; }
					if (\substr($this->string, $this->pos, 1) === ')') {
						$this->addPos(1);
						$result["text"] .= ')';
					}
					else { $_200 = \false; break; }
					$_200 = \true; break;
				}
				while(\false);
				if($_200 === \true) { $_202 = \true; break; }
				$result = $res_193;
				$this->setPos($pos_193);
				$_202 = \false; break;
			}
			while(\false);
			if($_202 === \true) { $_204 = \true; break; }
			$result = $res_191;
			$this->setPos($pos_191);
			$_204 = \false; break;
		}
		while(\false);
		if($_204 === \true) { $_206 = \true; break; }
		$result = $res_189;
		$this->setPos($pos_189);
		$_206 = \false; break;
	}
	while(\false);
	if($_206 === \true) { return $this->finalise($result); }
	if($_206 === \false) { return \false; }
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
	$_215 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "fname");
		}
		else { $_215 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_215 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_215 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_215 = \false; break; }
		$res_212 = $result;
		$pos_212 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_212;
			$this->setPos($pos_212);
			unset($res_212, $pos_212);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_215 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_215 = \false; break; }
		$_215 = \true; break;
	}
	while(\false);
	if($_215 === \true) { return $this->finalise($result); }
	if($_215 === \false) { return \false; }
}


/* ArgumentList: arg:Expression ( _ "," _ arg:Expression )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_224 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "arg");
		}
		else { $_224 = \false; break; }
		while (\true) {
			$res_223 = $result;
			$pos_223 = $this->pos;
			$_222 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_222 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_222 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_222 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "arg");
				}
				else { $_222 = \false; break; }
				$_222 = \true; break;
			}
			while(\false);
			if($_222 === \false) {
				$result = $res_223;
				$this->setPos($pos_223);
				unset($res_223, $pos_223);
				break;
			}
		}
		$_224 = \true; break;
	}
	while(\false);
	if($_224 === \true) { return $this->finalise($result); }
	if($_224 === \false) { return \false; }
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


/* Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]{0,}/ */
protected $match_Identifier_typestack = ['Identifier'];
function match_Identifier($stack = []) {
	$matchrule = 'Identifier';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_229 = \null;
	do {
		$res_227 = $result;
		$pos_227 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_227;
			$this->setPos($pos_227);
			$_229 = \false; break;
		}
		else {
			$result = $res_227;
			$this->setPos($pos_227);
		}
		if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_229 = \false; break; }
		$_229 = \true; break;
	}
	while(\false);
	if($_229 === \true) { return $this->finalise($result); }
	if($_229 === \false) { return \false; }
}


/* Keyword: ("FUNCTION" | "RETURN" | "FOREACH" | "MESSAGE" | "ACCEPT" | "REFUSE" | "ELSE" | "AND" | "OR" | "NOT" | "END" | "IF" | "TO") !(/[a-zA-Z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_285 = \null;
	do {
		$_280 = \null;
		do {
			$_278 = \null;
			do {
				$res_231 = $result;
				$pos_231 = $this->pos;
				if (($subres = $this->literal('FUNCTION')) !== \false) {
					$result["text"] .= $subres;
					$_278 = \true; break;
				}
				$result = $res_231;
				$this->setPos($pos_231);
				$_276 = \null;
				do {
					$res_233 = $result;
					$pos_233 = $this->pos;
					if (($subres = $this->literal('RETURN')) !== \false) {
						$result["text"] .= $subres;
						$_276 = \true; break;
					}
					$result = $res_233;
					$this->setPos($pos_233);
					$_274 = \null;
					do {
						$res_235 = $result;
						$pos_235 = $this->pos;
						if (($subres = $this->literal('FOREACH')) !== \false) {
							$result["text"] .= $subres;
							$_274 = \true; break;
						}
						$result = $res_235;
						$this->setPos($pos_235);
						$_272 = \null;
						do {
							$res_237 = $result;
							$pos_237 = $this->pos;
							if (($subres = $this->literal('MESSAGE')) !== \false) {
								$result["text"] .= $subres;
								$_272 = \true; break;
							}
							$result = $res_237;
							$this->setPos($pos_237);
							$_270 = \null;
							do {
								$res_239 = $result;
								$pos_239 = $this->pos;
								if (($subres = $this->literal('ACCEPT')) !== \false) {
									$result["text"] .= $subres;
									$_270 = \true; break;
								}
								$result = $res_239;
								$this->setPos($pos_239);
								$_268 = \null;
								do {
									$res_241 = $result;
									$pos_241 = $this->pos;
									if (($subres = $this->literal('REFUSE')) !== \false) {
										$result["text"] .= $subres;
										$_268 = \true; break;
									}
									$result = $res_241;
									$this->setPos($pos_241);
									$_266 = \null;
									do {
										$res_243 = $result;
										$pos_243 = $this->pos;
										if (($subres = $this->literal('ELSE')) !== \false) {
											$result["text"] .= $subres;
											$_266 = \true; break;
										}
										$result = $res_243;
										$this->setPos($pos_243);
										$_264 = \null;
										do {
											$res_245 = $result;
											$pos_245 = $this->pos;
											if (($subres = $this->literal('AND')) !== \false) {
												$result["text"] .= $subres;
												$_264 = \true; break;
											}
											$result = $res_245;
											$this->setPos($pos_245);
											$_262 = \null;
											do {
												$res_247 = $result;
												$pos_247 = $this->pos;
												if (($subres = $this->literal('OR')) !== \false) {
													$result["text"] .= $subres;
													$_262 = \true; break;
												}
												$result = $res_247;
												$this->setPos($pos_247);
												$_260 = \null;
												do {
													$res_249 = $result;
													$pos_249 = $this->pos;
													if (($subres = $this->literal('NOT')) !== \false) {
														$result["text"] .= $subres;
														$_260 = \true; break;
													}
													$result = $res_249;
													$this->setPos($pos_249);
													$_258 = \null;
													do {
														$res_251 = $result;
														$pos_251 = $this->pos;
														if (($subres = $this->literal('END')) !== \false) {
															$result["text"] .= $subres;
															$_258 = \true; break;
														}
														$result = $res_251;
														$this->setPos($pos_251);
														$_256 = \null;
														do {
															$res_253 = $result;
															$pos_253 = $this->pos;
															if (($subres = $this->literal('IF')) !== \false) {
																$result["text"] .= $subres;
																$_256 = \true; break;
															}
															$result = $res_253;
															$this->setPos($pos_253);
															if (($subres = $this->literal('TO')) !== \false) {
																$result["text"] .= $subres;
																$_256 = \true; break;
															}
															$result = $res_253;
															$this->setPos($pos_253);
															$_256 = \false; break;
														}
														while(\false);
														if($_256 === \true) { $_258 = \true; break; }
														$result = $res_251;
														$this->setPos($pos_251);
														$_258 = \false; break;
													}
													while(\false);
													if($_258 === \true) { $_260 = \true; break; }
													$result = $res_249;
													$this->setPos($pos_249);
													$_260 = \false; break;
												}
												while(\false);
												if($_260 === \true) { $_262 = \true; break; }
												$result = $res_247;
												$this->setPos($pos_247);
												$_262 = \false; break;
											}
											while(\false);
											if($_262 === \true) { $_264 = \true; break; }
											$result = $res_245;
											$this->setPos($pos_245);
											$_264 = \false; break;
										}
										while(\false);
										if($_264 === \true) { $_266 = \true; break; }
										$result = $res_243;
										$this->setPos($pos_243);
										$_266 = \false; break;
									}
									while(\false);
									if($_266 === \true) { $_268 = \true; break; }
									$result = $res_241;
									$this->setPos($pos_241);
									$_268 = \false; break;
								}
								while(\false);
								if($_268 === \true) { $_270 = \true; break; }
								$result = $res_239;
								$this->setPos($pos_239);
								$_270 = \false; break;
							}
							while(\false);
							if($_270 === \true) { $_272 = \true; break; }
							$result = $res_237;
							$this->setPos($pos_237);
							$_272 = \false; break;
						}
						while(\false);
						if($_272 === \true) { $_274 = \true; break; }
						$result = $res_235;
						$this->setPos($pos_235);
						$_274 = \false; break;
					}
					while(\false);
					if($_274 === \true) { $_276 = \true; break; }
					$result = $res_233;
					$this->setPos($pos_233);
					$_276 = \false; break;
				}
				while(\false);
				if($_276 === \true) { $_278 = \true; break; }
				$result = $res_231;
				$this->setPos($pos_231);
				$_278 = \false; break;
			}
			while(\false);
			if($_278 === \false) { $_280 = \false; break; }
			$_280 = \true; break;
		}
		while(\false);
		if($_280 === \false) { $_285 = \false; break; }
		$res_284 = $result;
		$pos_284 = $this->pos;
		$_283 = \null;
		do {
			if (($subres = $this->rx('/[a-zA-Z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_283 = \false; break; }
			$_283 = \true; break;
		}
		while(\false);
		if($_283 === \true) {
			$result = $res_284;
			$this->setPos($pos_284);
			$_285 = \false; break;
		}
		if($_283 === \false) {
			$result = $res_284;
			$this->setPos($pos_284);
		}
		$_285 = \true; break;
	}
	while(\false);
	if($_285 === \true) { return $this->finalise($result); }
	if($_285 === \false) { return \false; }
}


/* IfStatement: "IF" _ cond:Expression _ body:Statement+ ( "ELSE" _ else:Statement+ )? "END" */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_298 = \null;
	do {
		if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
		else { $_298 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_298 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_298 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_298 = \false; break; }
		$count_291 = 0;
		while (\true) {
			$res_291 = $result;
			$pos_291 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_291;
				$this->setPos($pos_291);
				unset($res_291, $pos_291);
				break;
			}
			$count_291++;
		}
		if ($count_291 >= 1) {  }
		else { $_298 = \false; break; }
		$res_296 = $result;
		$pos_296 = $this->pos;
		$_295 = \null;
		do {
			if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
			else { $_295 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_295 = \false; break; }
			$count_294 = 0;
			while (\true) {
				$res_294 = $result;
				$pos_294 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else {
					$result = $res_294;
					$this->setPos($pos_294);
					unset($res_294, $pos_294);
					break;
				}
				$count_294++;
			}
			if ($count_294 >= 1) {  }
			else { $_295 = \false; break; }
			$_295 = \true; break;
		}
		while(\false);
		if($_295 === \false) {
			$result = $res_296;
			$this->setPos($pos_296);
			unset($res_296, $pos_296);
		}
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_298 = \false; break; }
		$_298 = \true; break;
	}
	while(\false);
	if($_298 === \true) { return $this->finalise($result); }
	if($_298 === \false) { return \false; }
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
	$_314 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_314 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_314 = \false; break; }
		$count_312 = 0;
		while (\true) {
			$res_312 = $result;
			$pos_312 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_312;
				$this->setPos($pos_312);
				unset($res_312, $pos_312);
				break;
			}
			$count_312++;
		}
		if ($count_312 >= 1) {  }
		else { $_314 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_314 = \false; break; }
		$_314 = \true; break;
	}
	while(\false);
	if($_314 === \true) { return $this->finalise($result); }
	if($_314 === \false) { return \false; }
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
	$_319 = \null;
	do {
		if (($subres = $this->literal('MESSAGE')) !== \false) { $result["text"] .= $subres; }
		else { $_319 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_319 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_319 = \false; break; }
		$_319 = \true; break;
	}
	while(\false);
	if($_319 === \true) { return $this->finalise($result); }
	if($_319 === \false) { return \false; }
}


/* AcceptStmt: "ACCEPT" _ state:String */
protected $match_AcceptStmt_typestack = ['AcceptStmt'];
function match_AcceptStmt($stack = []) {
	$matchrule = 'AcceptStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_324 = \null;
	do {
		if (($subres = $this->literal('ACCEPT')) !== \false) { $result["text"] .= $subres; }
		else { $_324 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_324 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_324 = \false; break; }
		$_324 = \true; break;
	}
	while(\false);
	if($_324 === \true) { return $this->finalise($result); }
	if($_324 === \false) { return \false; }
}


/* RefuseStmt: "REFUSE" _ state:String */
protected $match_RefuseStmt_typestack = ['RefuseStmt'];
function match_RefuseStmt($stack = []) {
	$matchrule = 'RefuseStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_329 = \null;
	do {
		if (($subres = $this->literal('REFUSE')) !== \false) { $result["text"] .= $subres; }
		else { $_329 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_329 = \false; break; }
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_329 = \false; break; }
		$_329 = \true; break;
	}
	while(\false);
	if($_329 === \true) { return $this->finalise($result); }
	if($_329 === \false) { return \false; }
}


/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_334 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_334 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_334 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_334 = \false; break; }
		$_334 = \true; break;
	}
	while(\false);
	if($_334 === \true) { return $this->finalise($result); }
	if($_334 === \false) { return \false; }
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
