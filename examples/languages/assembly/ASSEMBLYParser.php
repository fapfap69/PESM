<?php
namespace ASSEMBLY;

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

/* Statement: alt:LabelStmt _ | alt:MovStmt _ | alt:AddStmt _ | alt:SubStmt _ | alt:MulStmt _ | alt:CmpStmt _ | alt:JmpStmt _ | alt:JeStmt _ | alt:JneStmt _ | alt:JgStmt _ | alt:OutStmt _ */
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
			$key = 'match_'.'LabelStmt'; $pos = $this->pos;
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
				$key = 'match_'.'MovStmt'; $pos = $this->pos;
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
					$key = 'match_'.'AddStmt'; $pos = $this->pos;
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
						$key = 'match_'.'SubStmt'; $pos = $this->pos;
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
							$key = 'match_'.'MulStmt'; $pos = $this->pos;
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
								$key = 'match_'.'CmpStmt'; $pos = $this->pos;
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
									$key = 'match_'.'JmpStmt'; $pos = $this->pos;
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
										$key = 'match_'.'JeStmt'; $pos = $this->pos;
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
											$key = 'match_'.'JneStmt'; $pos = $this->pos;
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
												$key = 'match_'.'JgStmt'; $pos = $this->pos;
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
												$key = 'match_'.'OutStmt'; $pos = $this->pos;
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

/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_81 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_81 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_81 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_81 = \false; break; }
		$_81 = \true; break;
	}
	while(\false);
	if($_81 === \true) { return $this->finalise($result); }
	if($_81 === \false) { return \false; }
}


/* MovStmt: "MOV" _ var:Identifier _ "," _ expr:Expression */
protected $match_MovStmt_typestack = ['MovStmt'];
function match_MovStmt($stack = []) {
	$matchrule = 'MovStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_90 = \null;
	do {
		if (($subres = $this->literal('MOV')) !== \false) { $result["text"] .= $subres; }
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
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
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
			$this->store($result, $subres, "expr");
		}
		else { $_90 = \false; break; }
		$_90 = \true; break;
	}
	while(\false);
	if($_90 === \true) { return $this->finalise($result); }
	if($_90 === \false) { return \false; }
}


/* AddStmt: "ADD" _ var:Identifier _ "," _ expr:Expression */
protected $match_AddStmt_typestack = ['AddStmt'];
function match_AddStmt($stack = []) {
	$matchrule = 'AddStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_99 = \null;
	do {
		if (($subres = $this->literal('ADD')) !== \false) { $result["text"] .= $subres; }
		else { $_99 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_99 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_99 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_99 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
		}
		else { $_99 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_99 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_99 = \false; break; }
		$_99 = \true; break;
	}
	while(\false);
	if($_99 === \true) { return $this->finalise($result); }
	if($_99 === \false) { return \false; }
}


/* SubStmt: "SUB" _ var:Identifier _ "," _ expr:Expression */
protected $match_SubStmt_typestack = ['SubStmt'];
function match_SubStmt($stack = []) {
	$matchrule = 'SubStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_108 = \null;
	do {
		if (($subres = $this->literal('SUB')) !== \false) { $result["text"] .= $subres; }
		else { $_108 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_108 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_108 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_108 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
		}
		else { $_108 = \false; break; }
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
	if($_108 === \true) { return $this->finalise($result); }
	if($_108 === \false) { return \false; }
}


/* MulStmt: "MUL" _ var:Identifier _ "," _ expr:Expression */
protected $match_MulStmt_typestack = ['MulStmt'];
function match_MulStmt($stack = []) {
	$matchrule = 'MulStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_117 = \null;
	do {
		if (($subres = $this->literal('MUL')) !== \false) { $result["text"] .= $subres; }
		else { $_117 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_117 = \false; break; }
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
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
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


/* CmpStmt: "CMP" _ left:Identifier _ "," _ right:Expression */
protected $match_CmpStmt_typestack = ['CmpStmt'];
function match_CmpStmt($stack = []) {
	$matchrule = 'CmpStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_126 = \null;
	do {
		if (($subres = $this->literal('CMP')) !== \false) { $result["text"] .= $subres; }
		else { $_126 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_126 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_126 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_126 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ',') {
			$this->addPos(1);
			$result["text"] .= ',';
		}
		else { $_126 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_126 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "right");
		}
		else { $_126 = \false; break; }
		$_126 = \true; break;
	}
	while(\false);
	if($_126 === \true) { return $this->finalise($result); }
	if($_126 === \false) { return \false; }
}


/* JmpStmt: "JMP" _ label:Identifier */
protected $match_JmpStmt_typestack = ['JmpStmt'];
function match_JmpStmt($stack = []) {
	$matchrule = 'JmpStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_131 = \null;
	do {
		if (($subres = $this->literal('JMP')) !== \false) { $result["text"] .= $subres; }
		else { $_131 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_131 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_131 = \false; break; }
		$_131 = \true; break;
	}
	while(\false);
	if($_131 === \true) { return $this->finalise($result); }
	if($_131 === \false) { return \false; }
}


/* JeStmt: "JE" _ label:Identifier */
protected $match_JeStmt_typestack = ['JeStmt'];
function match_JeStmt($stack = []) {
	$matchrule = 'JeStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_136 = \null;
	do {
		if (($subres = $this->literal('JE')) !== \false) { $result["text"] .= $subres; }
		else { $_136 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_136 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_136 = \false; break; }
		$_136 = \true; break;
	}
	while(\false);
	if($_136 === \true) { return $this->finalise($result); }
	if($_136 === \false) { return \false; }
}


/* JneStmt: "JNE" _ label:Identifier */
protected $match_JneStmt_typestack = ['JneStmt'];
function match_JneStmt($stack = []) {
	$matchrule = 'JneStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_141 = \null;
	do {
		if (($subres = $this->literal('JNE')) !== \false) { $result["text"] .= $subres; }
		else { $_141 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_141 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_141 = \false; break; }
		$_141 = \true; break;
	}
	while(\false);
	if($_141 === \true) { return $this->finalise($result); }
	if($_141 === \false) { return \false; }
}


/* JgStmt: "JG" _ label:Identifier */
protected $match_JgStmt_typestack = ['JgStmt'];
function match_JgStmt($stack = []) {
	$matchrule = 'JgStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_146 = \null;
	do {
		if (($subres = $this->literal('JG')) !== \false) { $result["text"] .= $subres; }
		else { $_146 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_146 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_146 = \false; break; }
		$_146 = \true; break;
	}
	while(\false);
	if($_146 === \true) { return $this->finalise($result); }
	if($_146 === \false) { return \false; }
}


/* OutStmt: "OUT" _ msg:Expression */
protected $match_OutStmt_typestack = ['OutStmt'];
function match_OutStmt($stack = []) {
	$matchrule = 'OutStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_151 = \null;
	do {
		if (($subres = $this->literal('OUT')) !== \false) { $result["text"] .= $subres; }
		else { $_151 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_151 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "msg");
		}
		else { $_151 = \false; break; }
		$_151 = \true; break;
	}
	while(\false);
	if($_151 === \true) { return $this->finalise($result); }
	if($_151 === \false) { return \false; }
}


/* Expression: val:Additive */
protected $match_Expression_typestack = ['Expression'];
function match_Expression($stack = []) {
	$matchrule = 'Expression';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$key = 'match_'.'Additive'; $pos = $this->pos;
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

/* Additive: left:Primary ( _ op:AddOp _ right:Primary )* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_161 = \null;
	do {
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_161 = \false; break; }
		while (\true) {
			$res_160 = $result;
			$pos_160 = $this->pos;
			$_159 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_159 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_159 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_159 = \false; break; }
				$key = 'match_'.'Primary'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_159 = \false; break; }
				$_159 = \true; break;
			}
			while(\false);
			if($_159 === \false) {
				$result = $res_160;
				$this->setPos($pos_160);
				unset($res_160, $pos_160);
				break;
			}
		}
		$_161 = \true; break;
	}
	while(\false);
	if($_161 === \true) { return $this->finalise($result); }
	if($_161 === \false) { return \false; }
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
	$_166 = \null;
	do {
		$res_163 = $result;
		$pos_163 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_166 = \true; break;
		}
		$result = $res_163;
		$this->setPos($pos_163);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_166 = \true; break;
		}
		$result = $res_163;
		$this->setPos($pos_163);
		$_166 = \false; break;
	}
	while(\false);
	if($_166 === \true) { return $this->finalise($result); }
	if($_166 === \false) { return \false; }
}


/* Primary: val:Number | val:Identifier */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_171 = \null;
	do {
		$res_168 = $result;
		$pos_168 = $this->pos;
		$key = 'match_'.'Number'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_171 = \true; break;
		}
		$result = $res_168;
		$this->setPos($pos_168);
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_171 = \true; break;
		}
		$result = $res_168;
		$this->setPos($pos_168);
		$_171 = \false; break;
	}
	while(\false);
	if($_171 === \true) { return $this->finalise($result); }
	if($_171 === \false) { return \false; }
}

public function Primary_val (&$res, $sub) {
    $res['value'] = $sub;
  }

/* Number: /[0-9]+/ */
protected $match_Number_typestack = ['Number'];
function match_Number($stack = []) {
	$matchrule = 'Number';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[0-9]+/')) !== \false) {
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
	$_176 = \null;
	do {
		$res_174 = $result;
		$pos_174 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_174;
			$this->setPos($pos_174);
			$_176 = \false; break;
		}
		else {
			$result = $res_174;
			$this->setPos($pos_174);
		}
		if (($subres = $this->rx('/[A-Z][A-Z0-9]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_176 = \false; break; }
		$_176 = \true; break;
	}
	while(\false);
	if($_176 === \true) { return $this->finalise($result); }
	if($_176 === \false) { return \false; }
}


/* Keyword: ("MOV" | "ADD" | "SUB" | "MUL" | "CMP" | "JMP" | "JE" | "JNE" | "JG" | "OUT") !(/[A-Z0-9]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_220 = \null;
	do {
		$_215 = \null;
		do {
			$_213 = \null;
			do {
				$res_178 = $result;
				$pos_178 = $this->pos;
				if (($subres = $this->literal('MOV')) !== \false) {
					$result["text"] .= $subres;
					$_213 = \true; break;
				}
				$result = $res_178;
				$this->setPos($pos_178);
				$_211 = \null;
				do {
					$res_180 = $result;
					$pos_180 = $this->pos;
					if (($subres = $this->literal('ADD')) !== \false) {
						$result["text"] .= $subres;
						$_211 = \true; break;
					}
					$result = $res_180;
					$this->setPos($pos_180);
					$_209 = \null;
					do {
						$res_182 = $result;
						$pos_182 = $this->pos;
						if (($subres = $this->literal('SUB')) !== \false) {
							$result["text"] .= $subres;
							$_209 = \true; break;
						}
						$result = $res_182;
						$this->setPos($pos_182);
						$_207 = \null;
						do {
							$res_184 = $result;
							$pos_184 = $this->pos;
							if (($subres = $this->literal('MUL')) !== \false) {
								$result["text"] .= $subres;
								$_207 = \true; break;
							}
							$result = $res_184;
							$this->setPos($pos_184);
							$_205 = \null;
							do {
								$res_186 = $result;
								$pos_186 = $this->pos;
								if (($subres = $this->literal('CMP')) !== \false) {
									$result["text"] .= $subres;
									$_205 = \true; break;
								}
								$result = $res_186;
								$this->setPos($pos_186);
								$_203 = \null;
								do {
									$res_188 = $result;
									$pos_188 = $this->pos;
									if (($subres = $this->literal('JMP')) !== \false) {
										$result["text"] .= $subres;
										$_203 = \true; break;
									}
									$result = $res_188;
									$this->setPos($pos_188);
									$_201 = \null;
									do {
										$res_190 = $result;
										$pos_190 = $this->pos;
										if (($subres = $this->literal('JE')) !== \false) {
											$result["text"] .= $subres;
											$_201 = \true; break;
										}
										$result = $res_190;
										$this->setPos($pos_190);
										$_199 = \null;
										do {
											$res_192 = $result;
											$pos_192 = $this->pos;
											if (($subres = $this->literal('JNE')) !== \false) {
												$result["text"] .= $subres;
												$_199 = \true; break;
											}
											$result = $res_192;
											$this->setPos($pos_192);
											$_197 = \null;
											do {
												$res_194 = $result;
												$pos_194 = $this->pos;
												if (($subres = $this->literal('JG')) !== \false) {
													$result["text"] .= $subres;
													$_197 = \true; break;
												}
												$result = $res_194;
												$this->setPos($pos_194);
												if (($subres = $this->literal('OUT')) !== \false) {
													$result["text"] .= $subres;
													$_197 = \true; break;
												}
												$result = $res_194;
												$this->setPos($pos_194);
												$_197 = \false; break;
											}
											while(\false);
											if($_197 === \true) { $_199 = \true; break; }
											$result = $res_192;
											$this->setPos($pos_192);
											$_199 = \false; break;
										}
										while(\false);
										if($_199 === \true) { $_201 = \true; break; }
										$result = $res_190;
										$this->setPos($pos_190);
										$_201 = \false; break;
									}
									while(\false);
									if($_201 === \true) { $_203 = \true; break; }
									$result = $res_188;
									$this->setPos($pos_188);
									$_203 = \false; break;
								}
								while(\false);
								if($_203 === \true) { $_205 = \true; break; }
								$result = $res_186;
								$this->setPos($pos_186);
								$_205 = \false; break;
							}
							while(\false);
							if($_205 === \true) { $_207 = \true; break; }
							$result = $res_184;
							$this->setPos($pos_184);
							$_207 = \false; break;
						}
						while(\false);
						if($_207 === \true) { $_209 = \true; break; }
						$result = $res_182;
						$this->setPos($pos_182);
						$_209 = \false; break;
					}
					while(\false);
					if($_209 === \true) { $_211 = \true; break; }
					$result = $res_180;
					$this->setPos($pos_180);
					$_211 = \false; break;
				}
				while(\false);
				if($_211 === \true) { $_213 = \true; break; }
				$result = $res_178;
				$this->setPos($pos_178);
				$_213 = \false; break;
			}
			while(\false);
			if($_213 === \false) { $_215 = \false; break; }
			$_215 = \true; break;
		}
		while(\false);
		if($_215 === \false) { $_220 = \false; break; }
		$res_219 = $result;
		$pos_219 = $this->pos;
		$_218 = \null;
		do {
			if (($subres = $this->rx('/[A-Z0-9]/')) !== \false) { $result["text"] .= $subres; }
			else { $_218 = \false; break; }
			$_218 = \true; break;
		}
		while(\false);
		if($_218 === \true) {
			$result = $res_219;
			$this->setPos($pos_219);
			$_220 = \false; break;
		}
		if($_218 === \false) {
			$result = $res_219;
			$this->setPos($pos_219);
		}
		$_220 = \true; break;
	}
	while(\false);
	if($_220 === \true) { return $this->finalise($result); }
	if($_220 === \false) { return \false; }
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
