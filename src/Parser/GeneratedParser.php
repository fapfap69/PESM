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


/* Assignment: var:Identifier _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_117 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
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


/* Primary: val:ArrayLiteral | val:FunctionCall | val:String | val:Number | val:Identifier | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_246 = \null;
	do {
		$res_221 = $result;
		$pos_221 = $this->pos;
		$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_246 = \true; break;
		}
		$result = $res_221;
		$this->setPos($pos_221);
		$_244 = \null;
		do {
			$res_223 = $result;
			$pos_223 = $this->pos;
			$key = 'match_'.'FunctionCall'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_244 = \true; break;
			}
			$result = $res_223;
			$this->setPos($pos_223);
			$_242 = \null;
			do {
				$res_225 = $result;
				$pos_225 = $this->pos;
				$key = 'match_'.'String'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_242 = \true; break;
				}
				$result = $res_225;
				$this->setPos($pos_225);
				$_240 = \null;
				do {
					$res_227 = $result;
					$pos_227 = $this->pos;
					$key = 'match_'.'Number'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_240 = \true; break;
					}
					$result = $res_227;
					$this->setPos($pos_227);
					$_238 = \null;
					do {
						$res_229 = $result;
						$pos_229 = $this->pos;
						$key = 'match_'.'Identifier'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
							$_238 = \true; break;
						}
						$result = $res_229;
						$this->setPos($pos_229);
						$_236 = \null;
						do {
							if (\substr($this->string, $this->pos, 1) === '(') {
								$this->addPos(1);
								$result["text"] .= '(';
							}
							else { $_236 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_236 = \false; break; }
							$key = 'match_'.'Expression'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "val");
							}
							else { $_236 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_236 = \false; break; }
							if (\substr($this->string, $this->pos, 1) === ')') {
								$this->addPos(1);
								$result["text"] .= ')';
							}
							else { $_236 = \false; break; }
							$_236 = \true; break;
						}
						while(\false);
						if($_236 === \true) { $_238 = \true; break; }
						$result = $res_229;
						$this->setPos($pos_229);
						$_238 = \false; break;
					}
					while(\false);
					if($_238 === \true) { $_240 = \true; break; }
					$result = $res_227;
					$this->setPos($pos_227);
					$_240 = \false; break;
				}
				while(\false);
				if($_240 === \true) { $_242 = \true; break; }
				$result = $res_225;
				$this->setPos($pos_225);
				$_242 = \false; break;
			}
			while(\false);
			if($_242 === \true) { $_244 = \true; break; }
			$result = $res_223;
			$this->setPos($pos_223);
			$_244 = \false; break;
		}
		while(\false);
		if($_244 === \true) { $_246 = \true; break; }
		$result = $res_221;
		$this->setPos($pos_221);
		$_246 = \false; break;
	}
	while(\false);
	if($_246 === \true) { return $this->finalise($result); }
	if($_246 === \false) { return \false; }
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
	$_253 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_253 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_253 = \false; break; }
		$res_250 = $result;
		$pos_250 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elements");
		}
		else {
			$result = $res_250;
			$this->setPos($pos_250);
			unset($res_250, $pos_250);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_253 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_253 = \false; break; }
		$_253 = \true; break;
	}
	while(\false);
	if($_253 === \true) { return $this->finalise($result); }
	if($_253 === \false) { return \false; }
}


/* ArrayElements: elem:Expression ( _ "," _ elem:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_262 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elem");
		}
		else { $_262 = \false; break; }
		while (\true) {
			$res_261 = $result;
			$pos_261 = $this->pos;
			$_260 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_260 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_260 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_260 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "elem");
				}
				else { $_260 = \false; break; }
				$_260 = \true; break;
			}
			while(\false);
			if($_260 === \false) {
				$result = $res_261;
				$this->setPos($pos_261);
				unset($res_261, $pos_261);
				break;
			}
		}
		$_262 = \true; break;
	}
	while(\false);
	if($_262 === \true) { return $this->finalise($result); }
	if($_262 === \false) { return \false; }
}

public function ArrayElements_elem (&$res, $sub) {
    if (!isset($res['elements'])) $res['elements'] = [];
    $res['elements'][] = $sub;
  }

/* FunctionCall: fname:Identifier _ "(" _ args:ArgumentList? _ ")" */
protected $match_FunctionCall_typestack = ['FunctionCall'];
function match_FunctionCall($stack = []) {
	$matchrule = 'FunctionCall';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_271 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "fname");
		}
		else { $_271 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_271 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_271 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_271 = \false; break; }
		$res_268 = $result;
		$pos_268 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_268;
			$this->setPos($pos_268);
			unset($res_268, $pos_268);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_271 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_271 = \false; break; }
		$_271 = \true; break;
	}
	while(\false);
	if($_271 === \true) { return $this->finalise($result); }
	if($_271 === \false) { return \false; }
}


/* ArgumentList: arg:Expression ( _ "," _ arg:Expression )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_280 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "arg");
		}
		else { $_280 = \false; break; }
		while (\true) {
			$res_279 = $result;
			$pos_279 = $this->pos;
			$_278 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_278 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_278 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_278 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "arg");
				}
				else { $_278 = \false; break; }
				$_278 = \true; break;
			}
			while(\false);
			if($_278 === \false) {
				$result = $res_279;
				$this->setPos($pos_279);
				unset($res_279, $pos_279);
				break;
			}
		}
		$_280 = \true; break;
	}
	while(\false);
	if($_280 === \true) { return $this->finalise($result); }
	if($_280 === \false) { return \false; }
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
	$_285 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_285 = \false; break; }
		$stack[] = $result; $result = $this->construct($matchrule, "content");
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) {
			$result["text"] .= $subres;
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'content');
		}
		else {
			$result = \array_pop($stack);
			$_285 = \false; break;
		}
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_285 = \false; break; }
		$_285 = \true; break;
	}
	while(\false);
	if($_285 === \true) { return $this->finalise($result); }
	if($_285 === \false) { return \false; }
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
	$_290 = \null;
	do {
		$res_288 = $result;
		$pos_288 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_288;
			$this->setPos($pos_288);
			$_290 = \false; break;
		}
		else {
			$result = $res_288;
			$this->setPos($pos_288);
		}
		if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_290 = \false; break; }
		$_290 = \true; break;
	}
	while(\false);
	if($_290 === \true) { return $this->finalise($result); }
	if($_290 === \false) { return \false; }
}


/* Keyword: ("GOTO" | "BEGIN" | "WHILE" | "FUNCTION" | "RETURN" | "FOREACH" | "MESSAGE" | "ACCEPT" | "REFUSE" | "ELSE" | "AND" | "OR" | "NOT" | "END" | "IF" | "TO") !(/[a-zA-Z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_358 = \null;
	do {
		$_353 = \null;
		do {
			$_351 = \null;
			do {
				$res_292 = $result;
				$pos_292 = $this->pos;
				if (($subres = $this->literal('GOTO')) !== \false) {
					$result["text"] .= $subres;
					$_351 = \true; break;
				}
				$result = $res_292;
				$this->setPos($pos_292);
				$_349 = \null;
				do {
					$res_294 = $result;
					$pos_294 = $this->pos;
					if (($subres = $this->literal('BEGIN')) !== \false) {
						$result["text"] .= $subres;
						$_349 = \true; break;
					}
					$result = $res_294;
					$this->setPos($pos_294);
					$_347 = \null;
					do {
						$res_296 = $result;
						$pos_296 = $this->pos;
						if (($subres = $this->literal('WHILE')) !== \false) {
							$result["text"] .= $subres;
							$_347 = \true; break;
						}
						$result = $res_296;
						$this->setPos($pos_296);
						$_345 = \null;
						do {
							$res_298 = $result;
							$pos_298 = $this->pos;
							if (($subres = $this->literal('FUNCTION')) !== \false) {
								$result["text"] .= $subres;
								$_345 = \true; break;
							}
							$result = $res_298;
							$this->setPos($pos_298);
							$_343 = \null;
							do {
								$res_300 = $result;
								$pos_300 = $this->pos;
								if (($subres = $this->literal('RETURN')) !== \false) {
									$result["text"] .= $subres;
									$_343 = \true; break;
								}
								$result = $res_300;
								$this->setPos($pos_300);
								$_341 = \null;
								do {
									$res_302 = $result;
									$pos_302 = $this->pos;
									if (($subres = $this->literal('FOREACH')) !== \false) {
										$result["text"] .= $subres;
										$_341 = \true; break;
									}
									$result = $res_302;
									$this->setPos($pos_302);
									$_339 = \null;
									do {
										$res_304 = $result;
										$pos_304 = $this->pos;
										if (($subres = $this->literal('MESSAGE')) !== \false) {
											$result["text"] .= $subres;
											$_339 = \true; break;
										}
										$result = $res_304;
										$this->setPos($pos_304);
										$_337 = \null;
										do {
											$res_306 = $result;
											$pos_306 = $this->pos;
											if (($subres = $this->literal('ACCEPT')) !== \false) {
												$result["text"] .= $subres;
												$_337 = \true; break;
											}
											$result = $res_306;
											$this->setPos($pos_306);
											$_335 = \null;
											do {
												$res_308 = $result;
												$pos_308 = $this->pos;
												if (($subres = $this->literal('REFUSE')) !== \false) {
													$result["text"] .= $subres;
													$_335 = \true; break;
												}
												$result = $res_308;
												$this->setPos($pos_308);
												$_333 = \null;
												do {
													$res_310 = $result;
													$pos_310 = $this->pos;
													if (($subres = $this->literal('ELSE')) !== \false) {
														$result["text"] .= $subres;
														$_333 = \true; break;
													}
													$result = $res_310;
													$this->setPos($pos_310);
													$_331 = \null;
													do {
														$res_312 = $result;
														$pos_312 = $this->pos;
														if (($subres = $this->literal('AND')) !== \false) {
															$result["text"] .= $subres;
															$_331 = \true; break;
														}
														$result = $res_312;
														$this->setPos($pos_312);
														$_329 = \null;
														do {
															$res_314 = $result;
															$pos_314 = $this->pos;
															if (($subres = $this->literal('OR')) !== \false) {
																$result["text"] .= $subres;
																$_329 = \true; break;
															}
															$result = $res_314;
															$this->setPos($pos_314);
															$_327 = \null;
															do {
																$res_316 = $result;
																$pos_316 = $this->pos;
																if (($subres = $this->literal('NOT')) !== \false) {
																	$result["text"] .= $subres;
																	$_327 = \true; break;
																}
																$result = $res_316;
																$this->setPos($pos_316);
																$_325 = \null;
																do {
																	$res_318 = $result;
																	$pos_318 = $this->pos;
																	if (($subres = $this->literal('END')) !== \false) {
																		$result["text"] .= $subres;
																		$_325 = \true; break;
																	}
																	$result = $res_318;
																	$this->setPos($pos_318);
																	$_323 = \null;
																	do {
																		$res_320 = $result;
																		$pos_320 = $this->pos;
																		if (($subres = $this->literal('IF')) !== \false) {
																			$result["text"] .= $subres;
																			$_323 = \true; break;
																		}
																		$result = $res_320;
																		$this->setPos($pos_320);
																		if (($subres = $this->literal('TO')) !== \false) {
																			$result["text"] .= $subres;
																			$_323 = \true; break;
																		}
																		$result = $res_320;
																		$this->setPos($pos_320);
																		$_323 = \false; break;
																	}
																	while(\false);
																	if($_323 === \true) { $_325 = \true; break; }
																	$result = $res_318;
																	$this->setPos($pos_318);
																	$_325 = \false; break;
																}
																while(\false);
																if($_325 === \true) { $_327 = \true; break; }
																$result = $res_316;
																$this->setPos($pos_316);
																$_327 = \false; break;
															}
															while(\false);
															if($_327 === \true) { $_329 = \true; break; }
															$result = $res_314;
															$this->setPos($pos_314);
															$_329 = \false; break;
														}
														while(\false);
														if($_329 === \true) { $_331 = \true; break; }
														$result = $res_312;
														$this->setPos($pos_312);
														$_331 = \false; break;
													}
													while(\false);
													if($_331 === \true) { $_333 = \true; break; }
													$result = $res_310;
													$this->setPos($pos_310);
													$_333 = \false; break;
												}
												while(\false);
												if($_333 === \true) { $_335 = \true; break; }
												$result = $res_308;
												$this->setPos($pos_308);
												$_335 = \false; break;
											}
											while(\false);
											if($_335 === \true) { $_337 = \true; break; }
											$result = $res_306;
											$this->setPos($pos_306);
											$_337 = \false; break;
										}
										while(\false);
										if($_337 === \true) { $_339 = \true; break; }
										$result = $res_304;
										$this->setPos($pos_304);
										$_339 = \false; break;
									}
									while(\false);
									if($_339 === \true) { $_341 = \true; break; }
									$result = $res_302;
									$this->setPos($pos_302);
									$_341 = \false; break;
								}
								while(\false);
								if($_341 === \true) { $_343 = \true; break; }
								$result = $res_300;
								$this->setPos($pos_300);
								$_343 = \false; break;
							}
							while(\false);
							if($_343 === \true) { $_345 = \true; break; }
							$result = $res_298;
							$this->setPos($pos_298);
							$_345 = \false; break;
						}
						while(\false);
						if($_345 === \true) { $_347 = \true; break; }
						$result = $res_296;
						$this->setPos($pos_296);
						$_347 = \false; break;
					}
					while(\false);
					if($_347 === \true) { $_349 = \true; break; }
					$result = $res_294;
					$this->setPos($pos_294);
					$_349 = \false; break;
				}
				while(\false);
				if($_349 === \true) { $_351 = \true; break; }
				$result = $res_292;
				$this->setPos($pos_292);
				$_351 = \false; break;
			}
			while(\false);
			if($_351 === \false) { $_353 = \false; break; }
			$_353 = \true; break;
		}
		while(\false);
		if($_353 === \false) { $_358 = \false; break; }
		$res_357 = $result;
		$pos_357 = $this->pos;
		$_356 = \null;
		do {
			if (($subres = $this->rx('/[a-zA-Z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_356 = \false; break; }
			$_356 = \true; break;
		}
		while(\false);
		if($_356 === \true) {
			$result = $res_357;
			$this->setPos($pos_357);
			$_358 = \false; break;
		}
		if($_356 === \false) {
			$result = $res_357;
			$this->setPos($pos_357);
		}
		$_358 = \true; break;
	}
	while(\false);
	if($_358 === \true) { return $this->finalise($result); }
	if($_358 === \false) { return \false; }
}


/* Block: "{" _ stmts:Statement* _ "}" | "BEGIN" _ stmts:Statement* _ "END" */
protected $match_Block_typestack = ['Block'];
function match_Block($stack = []) {
	$matchrule = 'Block';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_375 = \null;
	do {
		$res_360 = $result;
		$pos_360 = $this->pos;
		$_366 = \null;
		do {
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_366 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_366 = \false; break; }
			while (\true) {
				$res_363 = $result;
				$pos_363 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmts");
				}
				else {
					$result = $res_363;
					$this->setPos($pos_363);
					unset($res_363, $pos_363);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_366 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_366 = \false; break; }
			$_366 = \true; break;
		}
		while(\false);
		if($_366 === \true) { $_375 = \true; break; }
		$result = $res_360;
		$this->setPos($pos_360);
		$_373 = \null;
		do {
			if (($subres = $this->literal('BEGIN')) !== \false) { $result["text"] .= $subres; }
			else { $_373 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_373 = \false; break; }
			while (\true) {
				$res_370 = $result;
				$pos_370 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmts");
				}
				else {
					$result = $res_370;
					$this->setPos($pos_370);
					unset($res_370, $pos_370);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_373 = \false; break; }
			if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
			else { $_373 = \false; break; }
			$_373 = \true; break;
		}
		while(\false);
		if($_373 === \true) { $_375 = \true; break; }
		$result = $res_360;
		$this->setPos($pos_360);
		$_375 = \false; break;
	}
	while(\false);
	if($_375 === \true) { return $this->finalise($result); }
	if($_375 === \false) { return \false; }
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
	$_418 = \null;
	do {
		$res_377 = $result;
		$pos_377 = $this->pos;
		$_389 = \null;
		do {
			if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
			else { $_389 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_389 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_389 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_389 = \false; break; }
			$key = 'match_'.'Block'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else { $_389 = \false; break; }
			$res_388 = $result;
			$pos_388 = $this->pos;
			$_387 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_387 = \false; break; }
				if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
				else { $_387 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_387 = \false; break; }
				$key = 'match_'.'Block'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_387 = \false; break; }
				$_387 = \true; break;
			}
			while(\false);
			if($_387 === \false) {
				$result = $res_388;
				$this->setPos($pos_388);
				unset($res_388, $pos_388);
			}
			$_389 = \true; break;
		}
		while(\false);
		if($_389 === \true) { $_418 = \true; break; }
		$result = $res_377;
		$this->setPos($pos_377);
		$_416 = \null;
		do {
			$res_391 = $result;
			$pos_391 = $this->pos;
			$_407 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_407 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_407 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_407 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_407 = \false; break; }
				$count_396 = 0;
				while (\true) {
					$res_396 = $result;
					$pos_396 = $this->pos;
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "body");
					}
					else {
						$result = $res_396;
						$this->setPos($pos_396);
						unset($res_396, $pos_396);
						break;
					}
					$count_396++;
				}
				if ($count_396 >= 1) {  }
				else { $_407 = \false; break; }
				$res_402 = $result;
				$pos_402 = $this->pos;
				$_401 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_401 = \false; break; }
					if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
					else { $_401 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_401 = \false; break; }
					$count_400 = 0;
					while (\true) {
						$res_400 = $result;
						$pos_400 = $this->pos;
						$key = 'match_'.'Statement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "else");
						}
						else {
							$result = $res_400;
							$this->setPos($pos_400);
							unset($res_400, $pos_400);
							break;
						}
						$count_400++;
					}
					if ($count_400 >= 1) {  }
					else { $_401 = \false; break; }
					$_401 = \true; break;
				}
				while(\false);
				if($_401 === \false) {
					$result = $res_402;
					$this->setPos($pos_402);
					unset($res_402, $pos_402);
				}
				$_405 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_405 = \false; break; }
					if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
					else { $_405 = \false; break; }
					$_405 = \true; break;
				}
				while(\false);
				if($_405 === \false) { $_407 = \false; break; }
				$_407 = \true; break;
			}
			while(\false);
			if($_407 === \true) { $_416 = \true; break; }
			$result = $res_391;
			$this->setPos($pos_391);
			$_414 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_414 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_414 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_414 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_414 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_414 = \false; break; }
				$_414 = \true; break;
			}
			while(\false);
			if($_414 === \true) { $_416 = \true; break; }
			$result = $res_391;
			$this->setPos($pos_391);
			$_416 = \false; break;
		}
		while(\false);
		if($_416 === \true) { $_418 = \true; break; }
		$result = $res_377;
		$this->setPos($pos_377);
		$_418 = \false; break;
	}
	while(\false);
	if($_418 === \true) { return $this->finalise($result); }
	if($_418 === \false) { return \false; }
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
	$_434 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_434 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_434 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_434 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_434 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
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
			$this->store($result, $subres, "from");
		}
		else { $_434 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_434 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
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
			$this->store($result, $subres, "to");
		}
		else { $_434 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_434 = \false; break; }
		$count_432 = 0;
		while (\true) {
			$res_432 = $result;
			$pos_432 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_432;
				$this->setPos($pos_432);
				unset($res_432, $pos_432);
				break;
			}
			$count_432++;
		}
		if ($count_432 >= 1) {  }
		else { $_434 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_434 = \false; break; }
		$_434 = \true; break;
	}
	while(\false);
	if($_434 === \true) { return $this->finalise($result); }
	if($_434 === \false) { return \false; }
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
	$_442 = \null;
	do {
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_442 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_442 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_442 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_442 = \false; break; }
		$count_440 = 0;
		while (\true) {
			$res_440 = $result;
			$pos_440 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_440;
				$this->setPos($pos_440);
				unset($res_440, $pos_440);
				break;
			}
			$count_440++;
		}
		if ($count_440 >= 1) {  }
		else { $_442 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_442 = \false; break; }
		$_442 = \true; break;
	}
	while(\false);
	if($_442 === \true) { return $this->finalise($result); }
	if($_442 === \false) { return \false; }
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
	$_447 = \null;
	do {
		if (($subres = $this->literal('MESSAGE')) !== \false) { $result["text"] .= $subres; }
		else { $_447 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_447 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_447 = \false; break; }
		$_447 = \true; break;
	}
	while(\false);
	if($_447 === \true) { return $this->finalise($result); }
	if($_447 === \false) { return \false; }
}


/* AcceptStmt: "ACCEPT" _ state:Expression */
protected $match_AcceptStmt_typestack = ['AcceptStmt'];
function match_AcceptStmt($stack = []) {
	$matchrule = 'AcceptStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_452 = \null;
	do {
		if (($subres = $this->literal('ACCEPT')) !== \false) { $result["text"] .= $subres; }
		else { $_452 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_452 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_452 = \false; break; }
		$_452 = \true; break;
	}
	while(\false);
	if($_452 === \true) { return $this->finalise($result); }
	if($_452 === \false) { return \false; }
}


/* RefuseStmt: "REFUSE" _ state:Expression */
protected $match_RefuseStmt_typestack = ['RefuseStmt'];
function match_RefuseStmt($stack = []) {
	$matchrule = 'RefuseStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_457 = \null;
	do {
		if (($subres = $this->literal('REFUSE')) !== \false) { $result["text"] .= $subres; }
		else { $_457 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_457 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "state");
		}
		else { $_457 = \false; break; }
		$_457 = \true; break;
	}
	while(\false);
	if($_457 === \true) { return $this->finalise($result); }
	if($_457 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_462 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_462 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_462 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_462 = \false; break; }
		$_462 = \true; break;
	}
	while(\false);
	if($_462 === \true) { return $this->finalise($result); }
	if($_462 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_467 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_467 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_467 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_467 = \false; break; }
		$_467 = \true; break;
	}
	while(\false);
	if($_467 === \true) { return $this->finalise($result); }
	if($_467 === \false) { return \false; }
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
