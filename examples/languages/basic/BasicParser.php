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

/* Statement: alt:FunctionDef _ | alt:IfStatement _ | alt:WhileStatement _ | alt:ForeachStatement _ | alt:MessageStmt _ | alt:AcceptStmt _ | alt:RefuseStmt _ | alt:ReturnStmt _ | alt:LabelStmt _ | alt:GotoStmt _ | alt:Assignment _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_76 = \null;
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
		if($_7 === \true) { $_76 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_74 = \null;
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
			if($_12 === \true) { $_74 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_72 = \null;
			do {
				$res_14 = $result;
				$pos_14 = $this->pos;
				$_17 = \null;
				do {
					$key = 'match_'.'WhileStatement'; $pos = $this->pos;
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
				if($_17 === \true) { $_72 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_70 = \null;
				do {
					$res_19 = $result;
					$pos_19 = $this->pos;
					$_22 = \null;
					do {
						$key = 'match_'.'ForeachStatement'; $pos = $this->pos;
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
					if($_22 === \true) { $_70 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_68 = \null;
					do {
						$res_24 = $result;
						$pos_24 = $this->pos;
						$_27 = \null;
						do {
							$key = 'match_'.'MessageStmt'; $pos = $this->pos;
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
						if($_27 === \true) { $_68 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_66 = \null;
						do {
							$res_29 = $result;
							$pos_29 = $this->pos;
							$_32 = \null;
							do {
								$key = 'match_'.'AcceptStmt'; $pos = $this->pos;
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
							if($_32 === \true) { $_66 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_64 = \null;
							do {
								$res_34 = $result;
								$pos_34 = $this->pos;
								$_37 = \null;
								do {
									$key = 'match_'.'RefuseStmt'; $pos = $this->pos;
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
								if($_37 === \true) { $_64 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_62 = \null;
								do {
									$res_39 = $result;
									$pos_39 = $this->pos;
									$_42 = \null;
									do {
										$key = 'match_'.'ReturnStmt'; $pos = $this->pos;
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
									if($_42 === \true) { $_62 = \true; break; }
									$result = $res_39;
									$this->setPos($pos_39);
									$_60 = \null;
									do {
										$res_44 = $result;
										$pos_44 = $this->pos;
										$_47 = \null;
										do {
											$key = 'match_'.'LabelStmt'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres, "alt");
											}
											else { $_47 = \false; break; }
											$key = 'match_'.'_'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres);
											}
											else { $_47 = \false; break; }
											$_47 = \true; break;
										}
										while(\false);
										if($_47 === \true) { $_60 = \true; break; }
										$result = $res_44;
										$this->setPos($pos_44);
										$_58 = \null;
										do {
											$res_49 = $result;
											$pos_49 = $this->pos;
											$_52 = \null;
											do {
												$key = 'match_'.'GotoStmt'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres, "alt");
												}
												else { $_52 = \false; break; }
												$key = 'match_'.'_'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres);
												}
												else { $_52 = \false; break; }
												$_52 = \true; break;
											}
											while(\false);
											if($_52 === \true) { $_58 = \true; break; }
											$result = $res_49;
											$this->setPos($pos_49);
											$_56 = \null;
											do {
												$key = 'match_'.'Assignment'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres, "alt");
												}
												else { $_56 = \false; break; }
												$key = 'match_'.'_'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres);
												}
												else { $_56 = \false; break; }
												$_56 = \true; break;
											}
											while(\false);
											if($_56 === \true) { $_58 = \true; break; }
											$result = $res_49;
											$this->setPos($pos_49);
											$_58 = \false; break;
										}
										while(\false);
										if($_58 === \true) { $_60 = \true; break; }
										$result = $res_44;
										$this->setPos($pos_44);
										$_60 = \false; break;
									}
									while(\false);
									if($_60 === \true) { $_62 = \true; break; }
									$result = $res_39;
									$this->setPos($pos_39);
									$_62 = \false; break;
								}
								while(\false);
								if($_62 === \true) { $_64 = \true; break; }
								$result = $res_34;
								$this->setPos($pos_34);
								$_64 = \false; break;
							}
							while(\false);
							if($_64 === \true) { $_66 = \true; break; }
							$result = $res_29;
							$this->setPos($pos_29);
							$_66 = \false; break;
						}
						while(\false);
						if($_66 === \true) { $_68 = \true; break; }
						$result = $res_24;
						$this->setPos($pos_24);
						$_68 = \false; break;
					}
					while(\false);
					if($_68 === \true) { $_70 = \true; break; }
					$result = $res_19;
					$this->setPos($pos_19);
					$_70 = \false; break;
				}
				while(\false);
				if($_70 === \true) { $_72 = \true; break; }
				$result = $res_14;
				$this->setPos($pos_14);
				$_72 = \false; break;
			}
			while(\false);
			if($_72 === \true) { $_74 = \true; break; }
			$result = $res_9;
			$this->setPos($pos_9);
			$_74 = \false; break;
		}
		while(\false);
		if($_74 === \true) { $_76 = \true; break; }
		$result = $res_4;
		$this->setPos($pos_4);
		$_76 = \false; break;
	}
	while(\false);
	if($_76 === \true) { return $this->finalise($result); }
	if($_76 === \false) { return \false; }
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
	$_90 = \null;
	do {
		if (($subres = $this->literal('FUNCTION')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "fname");
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_90 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		$res_84 = $result;
		$pos_84 = $this->pos;
		$key = 'match_'.'ParameterList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "params");
		}
		else {
			$result = $res_84;
			$this->setPos($pos_84);
			unset($res_84, $pos_84);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_90 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
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
	$_99 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "param");
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
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_97 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_97 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "param");
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
	$_110 = \null;
	do {
		if (($subres = $this->literal('RETURN')) !== \false) { $result["text"] .= $subres; }
		else { $_110 = \false; break; }
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
			if (\substr($this->string, $this->pos, 1) === '=') {
				$this->addPos(1);
				$result["text"] .= '=';
			}
			else { $_104 = \false; break; }
			$_104 = \true; break;
		}
		while(\false);
		if($_104 === \true) {
			$result = $res_105;
			$this->setPos($pos_105);
			$_110 = \false; break;
		}
		if($_104 === \false) {
			$result = $res_105;
			$this->setPos($pos_105);
		}
		$res_109 = $result;
		$pos_109 = $this->pos;
		$_108 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_108 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_108 = \false; break; }
			$_108 = \true; break;
		}
		while(\false);
		if($_108 === \false) {
			$result = $res_109;
			$this->setPos($pos_109);
			unset($res_109, $pos_109);
		}
		$_110 = \true; break;
	}
	while(\false);
	if($_110 === \true) { return $this->finalise($result); }
	if($_110 === \false) { return \false; }
}


/* Assignment: var:Postfix _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_117 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_117 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_117 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_117 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_117 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_117 = \false; break; }
		$_117 = \true; break;
	}
	while(\false);
	if($_117 === \true) { return $this->finalise($result); }
	if($_117 === \false) { return \false; }
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
	$_127 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
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
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
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
				$key = 'match_'.'Comparison'; $pos = $this->pos;
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
	$_132 = \null;
	do {
		$res_129 = $result;
		$pos_129 = $this->pos;
		if (($subres = $this->literal('AND')) !== \false) {
			$result["text"] .= $subres;
			$_132 = \true; break;
		}
		$result = $res_129;
		$this->setPos($pos_129);
		if (($subres = $this->literal('OR')) !== \false) {
			$result["text"] .= $subres;
			$_132 = \true; break;
		}
		$result = $res_129;
		$this->setPos($pos_129);
		$_132 = \false; break;
	}
	while(\false);
	if($_132 === \true) { return $this->finalise($result); }
	if($_132 === \false) { return \false; }
}


/* Comparison: left:Additive ( _ op:CompOp _ right:Additive )* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_141 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_141 = \false; break; }
		while (\true) {
			$res_140 = $result;
			$pos_140 = $this->pos;
			$_139 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_139 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_139 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_139 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_139 = \false; break; }
				$_139 = \true; break;
			}
			while(\false);
			if($_139 === \false) {
				$result = $res_140;
				$this->setPos($pos_140);
				unset($res_140, $pos_140);
				break;
			}
		}
		$_141 = \true; break;
	}
	while(\false);
	if($_141 === \true) { return $this->finalise($result); }
	if($_141 === \false) { return \false; }
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
	$_162 = \null;
	do {
		$res_143 = $result;
		$pos_143 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_162 = \true; break;
		}
		$result = $res_143;
		$this->setPos($pos_143);
		$_160 = \null;
		do {
			$res_145 = $result;
			$pos_145 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_160 = \true; break;
			}
			$result = $res_145;
			$this->setPos($pos_145);
			$_158 = \null;
			do {
				$res_147 = $result;
				$pos_147 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_158 = \true; break;
				}
				$result = $res_147;
				$this->setPos($pos_147);
				$_156 = \null;
				do {
					$res_149 = $result;
					$pos_149 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_156 = \true; break;
					}
					$result = $res_149;
					$this->setPos($pos_149);
					$_154 = \null;
					do {
						$res_151 = $result;
						$pos_151 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_154 = \true; break;
						}
						$result = $res_151;
						$this->setPos($pos_151);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_154 = \true; break;
						}
						$result = $res_151;
						$this->setPos($pos_151);
						$_154 = \false; break;
					}
					while(\false);
					if($_154 === \true) { $_156 = \true; break; }
					$result = $res_149;
					$this->setPos($pos_149);
					$_156 = \false; break;
				}
				while(\false);
				if($_156 === \true) { $_158 = \true; break; }
				$result = $res_147;
				$this->setPos($pos_147);
				$_158 = \false; break;
			}
			while(\false);
			if($_158 === \true) { $_160 = \true; break; }
			$result = $res_145;
			$this->setPos($pos_145);
			$_160 = \false; break;
		}
		while(\false);
		if($_160 === \true) { $_162 = \true; break; }
		$result = $res_143;
		$this->setPos($pos_143);
		$_162 = \false; break;
	}
	while(\false);
	if($_162 === \true) { return $this->finalise($result); }
	if($_162 === \false) { return \false; }
}


/* Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_171 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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
				$key = 'match_'.'AddOp'; $pos = $this->pos;
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
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
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
	$_176 = \null;
	do {
		$res_173 = $result;
		$pos_173 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_176 = \true; break;
		}
		$result = $res_173;
		$this->setPos($pos_173);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
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


/* Multiplicative: left:Postfix ( _ op:MulOp _ right:Postfix )* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_185 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_185 = \false; break; }
		while (\true) {
			$res_184 = $result;
			$pos_184 = $this->pos;
			$_183 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_183 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_183 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_183 = \false; break; }
				$key = 'match_'.'Postfix'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_183 = \false; break; }
				$_183 = \true; break;
			}
			while(\false);
			if($_183 === \false) {
				$result = $res_184;
				$this->setPos($pos_184);
				unset($res_184, $pos_184);
				break;
			}
		}
		$_185 = \true; break;
	}
	while(\false);
	if($_185 === \true) { return $this->finalise($result); }
	if($_185 === \false) { return \false; }
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
	$_190 = \null;
	do {
		$res_187 = $result;
		$pos_187 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_190 = \true; break;
		}
		$result = $res_187;
		$this->setPos($pos_187);
		if (\substr($this->string, $this->pos, 1) === '/') {
			$this->addPos(1);
			$result["text"] .= '/';
			$_190 = \true; break;
		}
		$result = $res_187;
		$this->setPos($pos_187);
		$_190 = \false; break;
	}
	while(\false);
	if($_190 === \true) { return $this->finalise($result); }
	if($_190 === \false) { return \false; }
}


/* Postfix: base:Unary ( _ "[" _ index:Expression _ "]" )* */
protected $match_Postfix_typestack = ['Postfix'];
function match_Postfix($stack = []) {
	$matchrule = 'Postfix';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_201 = \null;
	do {
		$key = 'match_'.'Unary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "base");
		}
		else { $_201 = \false; break; }
		while (\true) {
			$res_200 = $result;
			$pos_200 = $this->pos;
			$_199 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_199 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === '[') {
					$this->addPos(1);
					$result["text"] .= '[';
				}
				else { $_199 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_199 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "index");
				}
				else { $_199 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_199 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ']') {
					$this->addPos(1);
					$result["text"] .= ']';
				}
				else { $_199 = \false; break; }
				$_199 = \true; break;
			}
			while(\false);
			if($_199 === \false) {
				$result = $res_200;
				$this->setPos($pos_200);
				unset($res_200, $pos_200);
				break;
			}
		}
		$_201 = \true; break;
	}
	while(\false);
	if($_201 === \true) { return $this->finalise($result); }
	if($_201 === \false) { return \false; }
}

public function Postfix_base (&$res, $sub) {
    $res['base'] = $sub;
  }

public function Postfix_index (&$res, $sub) {
    if (!isset($res['indices'])) $res['indices'] = [];
    $res['indices'][] = $sub;
  }

/* Unary: op:UnaryOp _ expr:Unary | val:Primary */
protected $match_Unary_typestack = ['Unary'];
function match_Unary($stack = []) {
	$matchrule = 'Unary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_210 = \null;
	do {
		$res_203 = $result;
		$pos_203 = $this->pos;
		$_207 = \null;
		do {
			$key = 'match_'.'UnaryOp'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "op");
			}
			else { $_207 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_207 = \false; break; }
			$key = 'match_'.'Unary'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_207 = \false; break; }
			$_207 = \true; break;
		}
		while(\false);
		if($_207 === \true) { $_210 = \true; break; }
		$result = $res_203;
		$this->setPos($pos_203);
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_210 = \true; break;
		}
		$result = $res_203;
		$this->setPos($pos_203);
		$_210 = \false; break;
	}
	while(\false);
	if($_210 === \true) { return $this->finalise($result); }
	if($_210 === \false) { return \false; }
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
	$_219 = \null;
	do {
		$res_212 = $result;
		$pos_212 = $this->pos;
		if (($subres = $this->literal('NOT')) !== \false) {
			$result["text"] .= $subres;
			$_219 = \true; break;
		}
		$result = $res_212;
		$this->setPos($pos_212);
		$_217 = \null;
		do {
			$res_214 = $result;
			$pos_214 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '-') {
				$this->addPos(1);
				$result["text"] .= '-';
				$_217 = \true; break;
			}
			$result = $res_214;
			$this->setPos($pos_214);
			if (\substr($this->string, $this->pos, 1) === '+') {
				$this->addPos(1);
				$result["text"] .= '+';
				$_217 = \true; break;
			}
			$result = $res_214;
			$this->setPos($pos_214);
			$_217 = \false; break;
		}
		while(\false);
		if($_217 === \true) { $_219 = \true; break; }
		$result = $res_212;
		$this->setPos($pos_212);
		$_219 = \false; break;
	}
	while(\false);
	if($_219 === \true) { return $this->finalise($result); }
	if($_219 === \false) { return \false; }
}


/* Primary: val:ObjectLiteral | val:ArrayLiteral | val:FunctionCall | val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_250 = \null;
	do {
		$res_221 = $result;
		$pos_221 = $this->pos;
		$key = 'match_'.'ObjectLiteral'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_250 = \true; break;
		}
		$result = $res_221;
		$this->setPos($pos_221);
		$_248 = \null;
		do {
			$res_223 = $result;
			$pos_223 = $this->pos;
			$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_248 = \true; break;
			}
			$result = $res_223;
			$this->setPos($pos_223);
			$_246 = \null;
			do {
				$res_225 = $result;
				$pos_225 = $this->pos;
				$key = 'match_'.'FunctionCall'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_246 = \true; break;
				}
				$result = $res_225;
				$this->setPos($pos_225);
				$_244 = \null;
				do {
					$res_227 = $result;
					$pos_227 = $this->pos;
					$key = 'match_'.'String'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_244 = \true; break;
					}
					$result = $res_227;
					$this->setPos($pos_227);
					$_242 = \null;
					do {
						$res_229 = $result;
						$pos_229 = $this->pos;
						$key = 'match_'.'Number'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
							$_242 = \true; break;
						}
						$result = $res_229;
						$this->setPos($pos_229);
						$_240 = \null;
						do {
							$res_231 = $result;
							$pos_231 = $this->pos;
							$key = 'match_'.'Identifier'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "val");
								$_240 = \true; break;
							}
							$result = $res_231;
							$this->setPos($pos_231);
							$_238 = \null;
							do {
								if (\substr($this->string, $this->pos, 1) === '(') {
									$this->addPos(1);
									$result["text"] .= '(';
								}
								else { $_238 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_238 = \false; break; }
								$key = 'match_'.'Expression'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "val");
								}
								else { $_238 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_238 = \false; break; }
								if (\substr($this->string, $this->pos, 1) === ')') {
									$this->addPos(1);
									$result["text"] .= ')';
								}
								else { $_238 = \false; break; }
								$_238 = \true; break;
							}
							while(\false);
							if($_238 === \true) { $_240 = \true; break; }
							$result = $res_231;
							$this->setPos($pos_231);
							$_240 = \false; break;
						}
						while(\false);
						if($_240 === \true) { $_242 = \true; break; }
						$result = $res_229;
						$this->setPos($pos_229);
						$_242 = \false; break;
					}
					while(\false);
					if($_242 === \true) { $_244 = \true; break; }
					$result = $res_227;
					$this->setPos($pos_227);
					$_244 = \false; break;
				}
				while(\false);
				if($_244 === \true) { $_246 = \true; break; }
				$result = $res_225;
				$this->setPos($pos_225);
				$_246 = \false; break;
			}
			while(\false);
			if($_246 === \true) { $_248 = \true; break; }
			$result = $res_223;
			$this->setPos($pos_223);
			$_248 = \false; break;
		}
		while(\false);
		if($_248 === \true) { $_250 = \true; break; }
		$result = $res_221;
		$this->setPos($pos_221);
		$_250 = \false; break;
	}
	while(\false);
	if($_250 === \true) { return $this->finalise($result); }
	if($_250 === \false) { return \false; }
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
	$_257 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_257 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_257 = \false; break; }
		$res_254 = $result;
		$pos_254 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elements");
		}
		else {
			$result = $res_254;
			$this->setPos($pos_254);
			unset($res_254, $pos_254);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_257 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_257 = \false; break; }
		$_257 = \true; break;
	}
	while(\false);
	if($_257 === \true) { return $this->finalise($result); }
	if($_257 === \false) { return \false; }
}


/* ArrayElements: elem:Expression ( _ "," _ elem:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_266 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elem");
		}
		else { $_266 = \false; break; }
		while (\true) {
			$res_265 = $result;
			$pos_265 = $this->pos;
			$_264 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_264 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_264 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_264 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "elem");
				}
				else { $_264 = \false; break; }
				$_264 = \true; break;
			}
			while(\false);
			if($_264 === \false) {
				$result = $res_265;
				$this->setPos($pos_265);
				unset($res_265, $pos_265);
				break;
			}
		}
		$_266 = \true; break;
	}
	while(\false);
	if($_266 === \true) { return $this->finalise($result); }
	if($_266 === \false) { return \false; }
}

public function ArrayElements_elem (&$res, $sub) {
    if (!isset($res['elements'])) $res['elements'] = [];
    $res['elements'][] = $sub;
  }

/* ObjectLiteral: "{" _ pairs:ObjectPairs? _ "}" */
protected $match_ObjectLiteral_typestack = ['ObjectLiteral'];
function match_ObjectLiteral($stack = []) {
	$matchrule = 'ObjectLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_273 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '{') {
			$this->addPos(1);
			$result["text"] .= '{';
		}
		else { $_273 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_273 = \false; break; }
		$res_270 = $result;
		$pos_270 = $this->pos;
		$key = 'match_'.'ObjectPairs'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pairs");
		}
		else {
			$result = $res_270;
			$this->setPos($pos_270);
			unset($res_270, $pos_270);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_273 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '}') {
			$this->addPos(1);
			$result["text"] .= '}';
		}
		else { $_273 = \false; break; }
		$_273 = \true; break;
	}
	while(\false);
	if($_273 === \true) { return $this->finalise($result); }
	if($_273 === \false) { return \false; }
}


/* ObjectPairs: pair:ObjectPair ( _ "," _ pair:ObjectPair )* */
protected $match_ObjectPairs_typestack = ['ObjectPairs'];
function match_ObjectPairs($stack = []) {
	$matchrule = 'ObjectPairs';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_282 = \null;
	do {
		$key = 'match_'.'ObjectPair'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pair");
		}
		else { $_282 = \false; break; }
		while (\true) {
			$res_281 = $result;
			$pos_281 = $this->pos;
			$_280 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_280 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_280 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_280 = \false; break; }
				$key = 'match_'.'ObjectPair'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "pair");
				}
				else { $_280 = \false; break; }
				$_280 = \true; break;
			}
			while(\false);
			if($_280 === \false) {
				$result = $res_281;
				$this->setPos($pos_281);
				unset($res_281, $pos_281);
				break;
			}
		}
		$_282 = \true; break;
	}
	while(\false);
	if($_282 === \true) { return $this->finalise($result); }
	if($_282 === \false) { return \false; }
}

public function ObjectPairs_pair (&$res, $sub) {
    if (!isset($res['pairs'])) $res['pairs'] = [];
    $res['pairs'][] = $sub;
  }

/* ObjectPair: key:String _ ":" _ value:Expression */
protected $match_ObjectPair_typestack = ['ObjectPair'];
function match_ObjectPair($stack = []) {
	$matchrule = 'ObjectPair';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_289 = \null;
	do {
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "key");
		}
		else { $_289 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_289 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_289 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_289 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
		}
		else { $_289 = \false; break; }
		$_289 = \true; break;
	}
	while(\false);
	if($_289 === \true) { return $this->finalise($result); }
	if($_289 === \false) { return \false; }
}


/* FunctionCall: fname:Identifier _ "(" _ args:ArgumentList? _ ")" */
protected $match_FunctionCall_typestack = ['FunctionCall'];
function match_FunctionCall($stack = []) {
	$matchrule = 'FunctionCall';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_298 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "fname");
		}
		else { $_298 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_298 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_298 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_298 = \false; break; }
		$res_295 = $result;
		$pos_295 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_295;
			$this->setPos($pos_295);
			unset($res_295, $pos_295);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_298 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_298 = \false; break; }
		$_298 = \true; break;
	}
	while(\false);
	if($_298 === \true) { return $this->finalise($result); }
	if($_298 === \false) { return \false; }
}


/* ArgumentList: arg:Expression ( _ "," _ arg:Expression )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_307 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "arg");
		}
		else { $_307 = \false; break; }
		while (\true) {
			$res_306 = $result;
			$pos_306 = $this->pos;
			$_305 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_305 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_305 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_305 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "arg");
				}
				else { $_305 = \false; break; }
				$_305 = \true; break;
			}
			while(\false);
			if($_305 === \false) {
				$result = $res_306;
				$this->setPos($pos_306);
				unset($res_306, $pos_306);
				break;
			}
		}
		$_307 = \true; break;
	}
	while(\false);
	if($_307 === \true) { return $this->finalise($result); }
	if($_307 === \false) { return \false; }
}

public function ArgumentList_arg (&$res, $sub) {
    if (!isset($res['arguments'])) $res['arguments'] = [];
    $res['arguments'][] = $sub;
  }

/* String: '"' content:/[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_312 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_312 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_312 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_312 = \false; break; }
		$_312 = \true; break;
	}
	while(\false);
	if($_312 === \true) { return $this->finalise($result); }
	if($_312 === \false) { return \false; }
}

public function String_content (&$res, $sub) {
    $res['value'] = $sub['text'];
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
	$_317 = \null;
	do {
		$res_315 = $result;
		$pos_315 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_315;
			$this->setPos($pos_315);
			$_317 = \false; break;
		}
		else {
			$result = $res_315;
			$this->setPos($pos_315);
		}
		if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_317 = \false; break; }
		$_317 = \true; break;
	}
	while(\false);
	if($_317 === \true) { return $this->finalise($result); }
	if($_317 === \false) { return \false; }
}


/* Keyword: ("GOTO" | "BEGIN" | "WHILE" | "FUNCTION" | "RETURN" | "FOREACH" | "MESSAGE" | "ACCEPT" | "REFUSE" | "ELSE" | "AND" | "OR" | "NOT" | "END" | "IF" | "TO") !(/[a-zA-Z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_385 = \null;
	do {
		$_380 = \null;
		do {
			$_378 = \null;
			do {
				$res_319 = $result;
				$pos_319 = $this->pos;
				if (($subres = $this->literal('GOTO')) !== \false) {
					$result["text"] .= $subres;
					$_378 = \true; break;
				}
				$result = $res_319;
				$this->setPos($pos_319);
				$_376 = \null;
				do {
					$res_321 = $result;
					$pos_321 = $this->pos;
					if (($subres = $this->literal('BEGIN')) !== \false) {
						$result["text"] .= $subres;
						$_376 = \true; break;
					}
					$result = $res_321;
					$this->setPos($pos_321);
					$_374 = \null;
					do {
						$res_323 = $result;
						$pos_323 = $this->pos;
						if (($subres = $this->literal('WHILE')) !== \false) {
							$result["text"] .= $subres;
							$_374 = \true; break;
						}
						$result = $res_323;
						$this->setPos($pos_323);
						$_372 = \null;
						do {
							$res_325 = $result;
							$pos_325 = $this->pos;
							if (($subres = $this->literal('FUNCTION')) !== \false) {
								$result["text"] .= $subres;
								$_372 = \true; break;
							}
							$result = $res_325;
							$this->setPos($pos_325);
							$_370 = \null;
							do {
								$res_327 = $result;
								$pos_327 = $this->pos;
								if (($subres = $this->literal('RETURN')) !== \false) {
									$result["text"] .= $subres;
									$_370 = \true; break;
								}
								$result = $res_327;
								$this->setPos($pos_327);
								$_368 = \null;
								do {
									$res_329 = $result;
									$pos_329 = $this->pos;
									if (($subres = $this->literal('FOREACH')) !== \false) {
										$result["text"] .= $subres;
										$_368 = \true; break;
									}
									$result = $res_329;
									$this->setPos($pos_329);
									$_366 = \null;
									do {
										$res_331 = $result;
										$pos_331 = $this->pos;
										if (($subres = $this->literal('MESSAGE')) !== \false) {
											$result["text"] .= $subres;
											$_366 = \true; break;
										}
										$result = $res_331;
										$this->setPos($pos_331);
										$_364 = \null;
										do {
											$res_333 = $result;
											$pos_333 = $this->pos;
											if (($subres = $this->literal('ACCEPT')) !== \false) {
												$result["text"] .= $subres;
												$_364 = \true; break;
											}
											$result = $res_333;
											$this->setPos($pos_333);
											$_362 = \null;
											do {
												$res_335 = $result;
												$pos_335 = $this->pos;
												if (($subres = $this->literal('REFUSE')) !== \false) {
													$result["text"] .= $subres;
													$_362 = \true; break;
												}
												$result = $res_335;
												$this->setPos($pos_335);
												$_360 = \null;
												do {
													$res_337 = $result;
													$pos_337 = $this->pos;
													if (($subres = $this->literal('ELSE')) !== \false) {
														$result["text"] .= $subres;
														$_360 = \true; break;
													}
													$result = $res_337;
													$this->setPos($pos_337);
													$_358 = \null;
													do {
														$res_339 = $result;
														$pos_339 = $this->pos;
														if (($subres = $this->literal('AND')) !== \false) {
															$result["text"] .= $subres;
															$_358 = \true; break;
														}
														$result = $res_339;
														$this->setPos($pos_339);
														$_356 = \null;
														do {
															$res_341 = $result;
															$pos_341 = $this->pos;
															if (($subres = $this->literal('OR')) !== \false) {
																$result["text"] .= $subres;
																$_356 = \true; break;
															}
															$result = $res_341;
															$this->setPos($pos_341);
															$_354 = \null;
															do {
																$res_343 = $result;
																$pos_343 = $this->pos;
																if (($subres = $this->literal('NOT')) !== \false) {
																	$result["text"] .= $subres;
																	$_354 = \true; break;
																}
																$result = $res_343;
																$this->setPos($pos_343);
																$_352 = \null;
																do {
																	$res_345 = $result;
																	$pos_345 = $this->pos;
																	if (($subres = $this->literal('END')) !== \false) {
																		$result["text"] .= $subres;
																		$_352 = \true; break;
																	}
																	$result = $res_345;
																	$this->setPos($pos_345);
																	$_350 = \null;
																	do {
																		$res_347 = $result;
																		$pos_347 = $this->pos;
																		if (($subres = $this->literal('IF')) !== \false) {
																			$result["text"] .= $subres;
																			$_350 = \true; break;
																		}
																		$result = $res_347;
																		$this->setPos($pos_347);
																		if (($subres = $this->literal('TO')) !== \false) {
																			$result["text"] .= $subres;
																			$_350 = \true; break;
																		}
																		$result = $res_347;
																		$this->setPos($pos_347);
																		$_350 = \false; break;
																	}
																	while(\false);
																	if($_350 === \true) { $_352 = \true; break; }
																	$result = $res_345;
																	$this->setPos($pos_345);
																	$_352 = \false; break;
																}
																while(\false);
																if($_352 === \true) { $_354 = \true; break; }
																$result = $res_343;
																$this->setPos($pos_343);
																$_354 = \false; break;
															}
															while(\false);
															if($_354 === \true) { $_356 = \true; break; }
															$result = $res_341;
															$this->setPos($pos_341);
															$_356 = \false; break;
														}
														while(\false);
														if($_356 === \true) { $_358 = \true; break; }
														$result = $res_339;
														$this->setPos($pos_339);
														$_358 = \false; break;
													}
													while(\false);
													if($_358 === \true) { $_360 = \true; break; }
													$result = $res_337;
													$this->setPos($pos_337);
													$_360 = \false; break;
												}
												while(\false);
												if($_360 === \true) { $_362 = \true; break; }
												$result = $res_335;
												$this->setPos($pos_335);
												$_362 = \false; break;
											}
											while(\false);
											if($_362 === \true) { $_364 = \true; break; }
											$result = $res_333;
											$this->setPos($pos_333);
											$_364 = \false; break;
										}
										while(\false);
										if($_364 === \true) { $_366 = \true; break; }
										$result = $res_331;
										$this->setPos($pos_331);
										$_366 = \false; break;
									}
									while(\false);
									if($_366 === \true) { $_368 = \true; break; }
									$result = $res_329;
									$this->setPos($pos_329);
									$_368 = \false; break;
								}
								while(\false);
								if($_368 === \true) { $_370 = \true; break; }
								$result = $res_327;
								$this->setPos($pos_327);
								$_370 = \false; break;
							}
							while(\false);
							if($_370 === \true) { $_372 = \true; break; }
							$result = $res_325;
							$this->setPos($pos_325);
							$_372 = \false; break;
						}
						while(\false);
						if($_372 === \true) { $_374 = \true; break; }
						$result = $res_323;
						$this->setPos($pos_323);
						$_374 = \false; break;
					}
					while(\false);
					if($_374 === \true) { $_376 = \true; break; }
					$result = $res_321;
					$this->setPos($pos_321);
					$_376 = \false; break;
				}
				while(\false);
				if($_376 === \true) { $_378 = \true; break; }
				$result = $res_319;
				$this->setPos($pos_319);
				$_378 = \false; break;
			}
			while(\false);
			if($_378 === \false) { $_380 = \false; break; }
			$_380 = \true; break;
		}
		while(\false);
		if($_380 === \false) { $_385 = \false; break; }
		$res_384 = $result;
		$pos_384 = $this->pos;
		$_383 = \null;
		do {
			if (($subres = $this->rx('/[a-zA-Z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_383 = \false; break; }
			$_383 = \true; break;
		}
		while(\false);
		if($_383 === \true) {
			$result = $res_384;
			$this->setPos($pos_384);
			$_385 = \false; break;
		}
		if($_383 === \false) {
			$result = $res_384;
			$this->setPos($pos_384);
		}
		$_385 = \true; break;
	}
	while(\false);
	if($_385 === \true) { return $this->finalise($result); }
	if($_385 === \false) { return \false; }
}


/* Block: "{" _ stmts:Statement* _ "}" | "BEGIN" _ stmts:Statement* _ "END" */
protected $match_Block_typestack = ['Block'];
function match_Block($stack = []) {
	$matchrule = 'Block';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_402 = \null;
	do {
		$res_387 = $result;
		$pos_387 = $this->pos;
		$_393 = \null;
		do {
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_393 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_393 = \false; break; }
			while (\true) {
				$res_390 = $result;
				$pos_390 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmts");
				}
				else {
					$result = $res_390;
					$this->setPos($pos_390);
					unset($res_390, $pos_390);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_393 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_393 = \false; break; }
			$_393 = \true; break;
		}
		while(\false);
		if($_393 === \true) { $_402 = \true; break; }
		$result = $res_387;
		$this->setPos($pos_387);
		$_400 = \null;
		do {
			if (($subres = $this->literal('BEGIN')) !== \false) { $result["text"] .= $subres; }
			else { $_400 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_400 = \false; break; }
			while (\true) {
				$res_397 = $result;
				$pos_397 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmts");
				}
				else {
					$result = $res_397;
					$this->setPos($pos_397);
					unset($res_397, $pos_397);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_400 = \false; break; }
			if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
			else { $_400 = \false; break; }
			$_400 = \true; break;
		}
		while(\false);
		if($_400 === \true) { $_402 = \true; break; }
		$result = $res_387;
		$this->setPos($pos_387);
		$_402 = \false; break;
	}
	while(\false);
	if($_402 === \true) { return $this->finalise($result); }
	if($_402 === \false) { return \false; }
}

public function Block_stmts (&$res, $sub) {
    if (!isset($res['statements'])) $res['statements'] = [];
    $res['statements'][] = $sub;
  }

/* IfStatement: "IF" _ cond:Expression _ body:Block ( _ "ELSE" _ else:Block )? | "IF" _ cond:Expression _ body:Statement+ ( _ "ELSE" _ else:Statement+ )? ( _ "END" ) | "IF" _ cond:Expression _ stmt:Statement */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_445 = \null;
	do {
		$res_404 = $result;
		$pos_404 = $this->pos;
		$_416 = \null;
		do {
			if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
			else { $_416 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_416 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_416 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_416 = \false; break; }
			$key = 'match_'.'Block'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else { $_416 = \false; break; }
			$res_415 = $result;
			$pos_415 = $this->pos;
			$_414 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_414 = \false; break; }
				if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
				else { $_414 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_414 = \false; break; }
				$key = 'match_'.'Block'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_414 = \false; break; }
				$_414 = \true; break;
			}
			while(\false);
			if($_414 === \false) {
				$result = $res_415;
				$this->setPos($pos_415);
				unset($res_415, $pos_415);
			}
			$_416 = \true; break;
		}
		while(\false);
		if($_416 === \true) { $_445 = \true; break; }
		$result = $res_404;
		$this->setPos($pos_404);
		$_443 = \null;
		do {
			$res_418 = $result;
			$pos_418 = $this->pos;
			$_434 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_434 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_434 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_434 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_434 = \false; break; }
				$count_423 = 0;
				while (\true) {
					$res_423 = $result;
					$pos_423 = $this->pos;
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "body");
					}
					else {
						$result = $res_423;
						$this->setPos($pos_423);
						unset($res_423, $pos_423);
						break;
					}
					$count_423++;
				}
				if ($count_423 >= 1) {  }
				else { $_434 = \false; break; }
				$res_429 = $result;
				$pos_429 = $this->pos;
				$_428 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_428 = \false; break; }
					if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
					else { $_428 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_428 = \false; break; }
					$count_427 = 0;
					while (\true) {
						$res_427 = $result;
						$pos_427 = $this->pos;
						$key = 'match_'.'Statement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "else");
						}
						else {
							$result = $res_427;
							$this->setPos($pos_427);
							unset($res_427, $pos_427);
							break;
						}
						$count_427++;
					}
					if ($count_427 >= 1) {  }
					else { $_428 = \false; break; }
					$_428 = \true; break;
				}
				while(\false);
				if($_428 === \false) {
					$result = $res_429;
					$this->setPos($pos_429);
					unset($res_429, $pos_429);
				}
				$_432 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_432 = \false; break; }
					if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
					else { $_432 = \false; break; }
					$_432 = \true; break;
				}
				while(\false);
				if($_432 === \false) { $_434 = \false; break; }
				$_434 = \true; break;
			}
			while(\false);
			if($_434 === \true) { $_443 = \true; break; }
			$result = $res_418;
			$this->setPos($pos_418);
			$_441 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_441 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_441 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_441 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_441 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_441 = \false; break; }
				$_441 = \true; break;
			}
			while(\false);
			if($_441 === \true) { $_443 = \true; break; }
			$result = $res_418;
			$this->setPos($pos_418);
			$_443 = \false; break;
		}
		while(\false);
		if($_443 === \true) { $_445 = \true; break; }
		$result = $res_404;
		$this->setPos($pos_404);
		$_445 = \false; break;
	}
	while(\false);
	if($_445 === \true) { return $this->finalise($result); }
	if($_445 === \false) { return \false; }
}

public function IfStatement_body (&$res, $sub) {
    if (!isset($res['thenBody'])) $res['thenBody'] = [];
    $res['thenBody'][] = $sub;
  }

public function IfStatement_else (&$res, $sub) {
    if (!isset($res['elseBody'])) $res['elseBody'] = [];
    $res['elseBody'][] = $sub;
  }

public function IfStatement_stmt (&$res, $sub) {
    if (!isset($res['thenBody'])) $res['thenBody'] = [];
    $res['thenBody'][] = $sub;
  }

/* ForeachStatement: "FOREACH" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "END" */
protected $match_ForeachStatement_typestack = ['ForeachStatement'];
function match_ForeachStatement($stack = []) {
	$matchrule = 'ForeachStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_461 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_461 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_461 = \false; break; }
		$count_459 = 0;
		while (\true) {
			$res_459 = $result;
			$pos_459 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_459;
				$this->setPos($pos_459);
				unset($res_459, $pos_459);
				break;
			}
			$count_459++;
		}
		if ($count_459 >= 1) {  }
		else { $_461 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_461 = \false; break; }
		$_461 = \true; break;
	}
	while(\false);
	if($_461 === \true) { return $this->finalise($result); }
	if($_461 === \false) { return \false; }
}

public function ForeachStatement_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* WhileStatement: "WHILE" _ cond:Expression _ body:Statement+ "END" */
protected $match_WhileStatement_typestack = ['WhileStatement'];
function match_WhileStatement($stack = []) {
	$matchrule = 'WhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_469 = \null;
	do {
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_469 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_469 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_469 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_469 = \false; break; }
		$count_467 = 0;
		while (\true) {
			$res_467 = $result;
			$pos_467 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_467;
				$this->setPos($pos_467);
				unset($res_467, $pos_467);
				break;
			}
			$count_467++;
		}
		if ($count_467 >= 1) {  }
		else { $_469 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_469 = \false; break; }
		$_469 = \true; break;
	}
	while(\false);
	if($_469 === \true) { return $this->finalise($result); }
	if($_469 === \false) { return \false; }
}

public function WhileStatement_body (&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

/* MessageStmt: "MESSAGE" _ msg:Expression */
protected $match_MessageStmt_typestack = ['MessageStmt'];
function match_MessageStmt($stack = []) {
	$matchrule = 'MessageStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_474 = \null;
	do {
		if (($subres = $this->literal('MESSAGE')) !== \false) { $result["text"] .= $subres; }
		else { $_474 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_474 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_474 = \false; break; }
		$_474 = \true; break;
	}
	while(\false);
	if($_474 === \true) { return $this->finalise($result); }
	if($_474 === \false) { return \false; }
}


/* AcceptStmt: "ACCEPT" _ state:Expression */
protected $match_AcceptStmt_typestack = ['AcceptStmt'];
function match_AcceptStmt($stack = []) {
	$matchrule = 'AcceptStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_479 = \null;
	do {
		if (($subres = $this->literal('ACCEPT')) !== \false) { $result["text"] .= $subres; }
		else { $_479 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_479 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_479 = \false; break; }
		$_479 = \true; break;
	}
	while(\false);
	if($_479 === \true) { return $this->finalise($result); }
	if($_479 === \false) { return \false; }
}


/* RefuseStmt: "REFUSE" _ state:Expression */
protected $match_RefuseStmt_typestack = ['RefuseStmt'];
function match_RefuseStmt($stack = []) {
	$matchrule = 'RefuseStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_484 = \null;
	do {
		if (($subres = $this->literal('REFUSE')) !== \false) { $result["text"] .= $subres; }
		else { $_484 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_484 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_484 = \false; break; }
		$_484 = \true; break;
	}
	while(\false);
	if($_484 === \true) { return $this->finalise($result); }
	if($_484 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_489 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_489 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_489 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_489 = \false; break; }
		$_489 = \true; break;
	}
	while(\false);
	if($_489 === \true) { return $this->finalise($result); }
	if($_489 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_494 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_494 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_494 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_494 = \false; break; }
		$_494 = \true; break;
	}
	while(\false);
	if($_494 === \true) { return $this->finalise($result); }
	if($_494 === \false) { return \false; }
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
