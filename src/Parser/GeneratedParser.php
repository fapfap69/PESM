<?php
namespace PESM\Parser;

class GeneratedParser extends \hafriedlander\Peg\Parser\Packrat {
/* Program: _ stmt:Statement (_ stmt:Statement)* _ !/./ */
protected $match_Program_typestack = ['Program'];
function match_Program($stack = []) {
	$matchrule = 'Program';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_8 = \null;
	do {
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_8 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_8 = \false; break; }
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
		else { $_8 = \false; break; }
		$res_7 = $result;
		$pos_7 = $this->pos;
		if (($subres = $this->rx('/./')) !== \false) {
			$result["text"] .= $subres;
			$result = $res_7;
			$this->setPos($pos_7);
			$_8 = \false; break;
		}
		else {
			$result = $res_7;
			$this->setPos($pos_7);
		}
		$_8 = \true; break;
	}
	while(\false);
	if($_8 === \true) { return $this->finalise($result); }
	if($_8 === \false) { return \false; }
}


/* Statement: alt:Comment _ | alt:CommandDecl _ | alt:StructDef _ | alt:FunctionDef _ | alt:IfStatement _ | alt:SwitchStatement _ | alt:DoWhileStatement _ | alt:RepeatUntilStatement _ | alt:WhileStatement _ | alt:ForeachInStmt _ | alt:ForeachRangeStmt _ | alt:InterruptWithVarStmt _ | alt:InterruptSimpleStmt _ | alt:ReturnStmt _ | alt:BreakStmt _ | alt:ContinueStmt _ | alt:LabelStmt _ | alt:GotoStmt _ | alt:Assignment _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_138 = \null;
	do {
		$res_10 = $result;
		$pos_10 = $this->pos;
		$_13 = \null;
		do {
			$key = 'match_'.'Comment'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
			}
			else { $_13 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_13 = \false; break; }
			$_13 = \true; break;
		}
		while(\false);
		if($_13 === \true) { $_138 = \true; break; }
		$result = $res_10;
		$this->setPos($pos_10);
		$_136 = \null;
		do {
			$res_15 = $result;
			$pos_15 = $this->pos;
			$_18 = \null;
			do {
				$key = 'match_'.'CommandDecl'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
				}
				else { $_18 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_18 = \false; break; }
				$_18 = \true; break;
			}
			while(\false);
			if($_18 === \true) { $_136 = \true; break; }
			$result = $res_15;
			$this->setPos($pos_15);
			$_134 = \null;
			do {
				$res_20 = $result;
				$pos_20 = $this->pos;
				$_23 = \null;
				do {
					$key = 'match_'.'StructDef'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
					}
					else { $_23 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_23 = \false; break; }
					$_23 = \true; break;
				}
				while(\false);
				if($_23 === \true) { $_134 = \true; break; }
				$result = $res_20;
				$this->setPos($pos_20);
				$_132 = \null;
				do {
					$res_25 = $result;
					$pos_25 = $this->pos;
					$_28 = \null;
					do {
						$key = 'match_'.'FunctionDef'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
						}
						else { $_28 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_28 = \false; break; }
						$_28 = \true; break;
					}
					while(\false);
					if($_28 === \true) { $_132 = \true; break; }
					$result = $res_25;
					$this->setPos($pos_25);
					$_130 = \null;
					do {
						$res_30 = $result;
						$pos_30 = $this->pos;
						$_33 = \null;
						do {
							$key = 'match_'.'IfStatement'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "alt");
							}
							else { $_33 = \false; break; }
							$key = 'match_'.'_'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) { $this->store($result, $subres); }
							else { $_33 = \false; break; }
							$_33 = \true; break;
						}
						while(\false);
						if($_33 === \true) { $_130 = \true; break; }
						$result = $res_30;
						$this->setPos($pos_30);
						$_128 = \null;
						do {
							$res_35 = $result;
							$pos_35 = $this->pos;
							$_38 = \null;
							do {
								$key = 'match_'.'SwitchStatement'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
								}
								else { $_38 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_38 = \false; break; }
								$_38 = \true; break;
							}
							while(\false);
							if($_38 === \true) { $_128 = \true; break; }
							$result = $res_35;
							$this->setPos($pos_35);
							$_126 = \null;
							do {
								$res_40 = $result;
								$pos_40 = $this->pos;
								$_43 = \null;
								do {
									$key = 'match_'.'DoWhileStatement'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres, "alt");
									}
									else { $_43 = \false; break; }
									$key = 'match_'.'_'; $pos = $this->pos;
									$subres = $this->packhas($key, $pos)
										? $this->packread($key, $pos)
										: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
									if ($subres !== \false) {
										$this->store($result, $subres);
									}
									else { $_43 = \false; break; }
									$_43 = \true; break;
								}
								while(\false);
								if($_43 === \true) { $_126 = \true; break; }
								$result = $res_40;
								$this->setPos($pos_40);
								$_124 = \null;
								do {
									$res_45 = $result;
									$pos_45 = $this->pos;
									$_48 = \null;
									do {
										$key = 'match_'.'RepeatUntilStatement'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres, "alt");
										}
										else { $_48 = \false; break; }
										$key = 'match_'.'_'; $pos = $this->pos;
										$subres = $this->packhas($key, $pos)
											? $this->packread($key, $pos)
											: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
										if ($subres !== \false) {
											$this->store($result, $subres);
										}
										else { $_48 = \false; break; }
										$_48 = \true; break;
									}
									while(\false);
									if($_48 === \true) { $_124 = \true; break; }
									$result = $res_45;
									$this->setPos($pos_45);
									$_122 = \null;
									do {
										$res_50 = $result;
										$pos_50 = $this->pos;
										$_53 = \null;
										do {
											$key = 'match_'.'WhileStatement'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres, "alt");
											}
											else { $_53 = \false; break; }
											$key = 'match_'.'_'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres);
											}
											else { $_53 = \false; break; }
											$_53 = \true; break;
										}
										while(\false);
										if($_53 === \true) { $_122 = \true; break; }
										$result = $res_50;
										$this->setPos($pos_50);
										$_120 = \null;
										do {
											$res_55 = $result;
											$pos_55 = $this->pos;
											$_58 = \null;
											do {
												$key = 'match_'.'ForeachInStmt'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres, "alt");
												}
												else { $_58 = \false; break; }
												$key = 'match_'.'_'; $pos = $this->pos;
												$subres = $this->packhas($key, $pos)
													? $this->packread($key, $pos)
													: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
												if ($subres !== \false) {
													$this->store($result, $subres);
												}
												else { $_58 = \false; break; }
												$_58 = \true; break;
											}
											while(\false);
											if($_58 === \true) { $_120 = \true; break; }
											$result = $res_55;
											$this->setPos($pos_55);
											$_118 = \null;
											do {
												$res_60 = $result;
												$pos_60 = $this->pos;
												$_63 = \null;
												do {
													$key = 'match_'.'ForeachRangeStmt'; $pos = $this->pos;
													$subres = $this->packhas($key, $pos)
														? $this->packread($key, $pos)
														: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
													if ($subres !== \false) {
														$this->store($result, $subres, "alt");
													}
													else { $_63 = \false; break; }
													$key = 'match_'.'_'; $pos = $this->pos;
													$subres = $this->packhas($key, $pos)
														? $this->packread($key, $pos)
														: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
													if ($subres !== \false) {
														$this->store($result, $subres);
													}
													else { $_63 = \false; break; }
													$_63 = \true; break;
												}
												while(\false);
												if($_63 === \true) { $_118 = \true; break; }
												$result = $res_60;
												$this->setPos($pos_60);
												$_116 = \null;
												do {
													$res_65 = $result;
													$pos_65 = $this->pos;
													$_68 = \null;
													do {
														$key = 'match_'.'InterruptWithVarStmt'; $pos = $this->pos;
														$subres = $this->packhas($key, $pos)
															? $this->packread($key, $pos)
															: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
														if ($subres !== \false) {
															$this->store($result, $subres, "alt");
														}
														else { $_68 = \false; break; }
														$key = 'match_'.'_'; $pos = $this->pos;
														$subres = $this->packhas($key, $pos)
															? $this->packread($key, $pos)
															: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
														if ($subres !== \false) {
															$this->store($result, $subres);
														}
														else { $_68 = \false; break; }
														$_68 = \true; break;
													}
													while(\false);
													if($_68 === \true) { $_116 = \true; break; }
													$result = $res_65;
													$this->setPos($pos_65);
													$_114 = \null;
													do {
														$res_70 = $result;
														$pos_70 = $this->pos;
														$_73 = \null;
														do {
															$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
															$subres = $this->packhas($key, $pos)
																? $this->packread($key, $pos)
																: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
															if ($subres !== \false) {
																$this->store($result, $subres, "alt");
															}
															else { $_73 = \false; break; }
															$key = 'match_'.'_'; $pos = $this->pos;
															$subres = $this->packhas($key, $pos)
																? $this->packread($key, $pos)
																: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
															if ($subres !== \false) {
																$this->store($result, $subres);
															}
															else { $_73 = \false; break; }
															$_73 = \true; break;
														}
														while(\false);
														if($_73 === \true) { $_114 = \true; break; }
														$result = $res_70;
														$this->setPos($pos_70);
														$_112 = \null;
														do {
															$res_75 = $result;
															$pos_75 = $this->pos;
															$_78 = \null;
															do {
																$key = 'match_'.'ReturnStmt'; $pos = $this->pos;
																$subres = $this->packhas($key, $pos)
																	? $this->packread($key, $pos)
																	: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																if ($subres !== \false) {
																	$this->store($result, $subres, "alt");
																}
																else { $_78 = \false; break; }
																$key = 'match_'.'_'; $pos = $this->pos;
																$subres = $this->packhas($key, $pos)
																	? $this->packread($key, $pos)
																	: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																if ($subres !== \false) {
																	$this->store($result, $subres);
																}
																else { $_78 = \false; break; }
																$_78 = \true; break;
															}
															while(\false);
															if($_78 === \true) { $_112 = \true; break; }
															$result = $res_75;
															$this->setPos($pos_75);
															$_110 = \null;
															do {
																$res_80 = $result;
																$pos_80 = $this->pos;
																$_83 = \null;
																do {
																	$key = 'match_'.'BreakStmt'; $pos = $this->pos;
																	$subres = $this->packhas($key, $pos)
																		? $this->packread($key, $pos)
																		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																	if ($subres !== \false) {
																		$this->store($result, $subres, "alt");
																	}
																	else { $_83 = \false; break; }
																	$key = 'match_'.'_'; $pos = $this->pos;
																	$subres = $this->packhas($key, $pos)
																		? $this->packread($key, $pos)
																		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																	if ($subres !== \false) {
																		$this->store($result, $subres);
																	}
																	else { $_83 = \false; break; }
																	$_83 = \true; break;
																}
																while(\false);
																if($_83 === \true) { $_110 = \true; break; }
																$result = $res_80;
																$this->setPos($pos_80);
																$_108 = \null;
																do {
																	$res_85 = $result;
																	$pos_85 = $this->pos;
																	$_88 = \null;
																	do {
																		$key = 'match_'.'ContinueStmt'; $pos = $this->pos;
																		$subres = $this->packhas($key, $pos)
																			? $this->packread($key, $pos)
																			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																		if ($subres !== \false) {
																			$this->store($result, $subres, "alt");
																		}
																		else {
																			$_88 = \false; break;
																		}
																		$key = 'match_'.'_'; $pos = $this->pos;
																		$subres = $this->packhas($key, $pos)
																			? $this->packread($key, $pos)
																			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																		if ($subres !== \false) {
																			$this->store($result, $subres);
																		}
																		else {
																			$_88 = \false; break;
																		}
																		$_88 = \true; break;
																	}
																	while(\false);
																	if($_88 === \true) { $_108 = \true; break; }
																	$result = $res_85;
																	$this->setPos($pos_85);
																	$_106 = \null;
																	do {
																		$res_90 = $result;
																		$pos_90 = $this->pos;
																		$_93 = \null;
																		do {
																			$key = 'match_'.'LabelStmt'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres, "alt");
																			}
																			else {
																				$_93 = \false; break;
																			}
																			$key = 'match_'.'_'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres);
																			}
																			else {
																				$_93 = \false; break;
																			}
																			$_93 = \true; break;
																		}
																		while(\false);
																		if($_93 === \true) {
																			$_106 = \true; break;
																		}
																		$result = $res_90;
																		$this->setPos($pos_90);
																		$_104 = \null;
																		do {
																			$res_95 = $result;
																			$pos_95 = $this->pos;
																			$_98 = \null;
																			do {
																				$key = 'match_'.'GotoStmt'; $pos = $this->pos;
																				$subres = $this->packhas($key, $pos)
																					? $this->packread($key, $pos)
																					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																				if ($subres !== \false) {
																					$this->store($result, $subres, "alt");
																				}
																				else {
																					$_98 = \false; break;
																				}
																				$key = 'match_'.'_'; $pos = $this->pos;
																				$subres = $this->packhas($key, $pos)
																					? $this->packread($key, $pos)
																					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																				if ($subres !== \false) {
																					$this->store($result, $subres);
																				}
																				else {
																					$_98 = \false; break;
																				}
																				$_98 = \true; break;
																			}
																			while(\false);
																			if($_98 === \true) {
																				$_104 = \true; break;
																			}
																			$result = $res_95;
																			$this->setPos($pos_95);
																			$_102 = \null;
																			do {
																				$key = 'match_'.'Assignment'; $pos = $this->pos;
																				$subres = $this->packhas($key, $pos)
																					? $this->packread($key, $pos)
																					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																				if ($subres !== \false) {
																					$this->store($result, $subres, "alt");
																				}
																				else {
																					$_102 = \false; break;
																				}
																				$key = 'match_'.'_'; $pos = $this->pos;
																				$subres = $this->packhas($key, $pos)
																					? $this->packread($key, $pos)
																					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																				if ($subres !== \false) {
																					$this->store($result, $subres);
																				}
																				else {
																					$_102 = \false; break;
																				}
																				$_102 = \true; break;
																			}
																			while(\false);
																			if($_102 === \true) {
																				$_104 = \true; break;
																			}
																			$result = $res_95;
																			$this->setPos($pos_95);
																			$_104 = \false; break;
																		}
																		while(\false);
																		if($_104 === \true) {
																			$_106 = \true; break;
																		}
																		$result = $res_90;
																		$this->setPos($pos_90);
																		$_106 = \false; break;
																	}
																	while(\false);
																	if($_106 === \true) { $_108 = \true; break; }
																	$result = $res_85;
																	$this->setPos($pos_85);
																	$_108 = \false; break;
																}
																while(\false);
																if($_108 === \true) { $_110 = \true; break; }
																$result = $res_80;
																$this->setPos($pos_80);
																$_110 = \false; break;
															}
															while(\false);
															if($_110 === \true) { $_112 = \true; break; }
															$result = $res_75;
															$this->setPos($pos_75);
															$_112 = \false; break;
														}
														while(\false);
														if($_112 === \true) { $_114 = \true; break; }
														$result = $res_70;
														$this->setPos($pos_70);
														$_114 = \false; break;
													}
													while(\false);
													if($_114 === \true) { $_116 = \true; break; }
													$result = $res_65;
													$this->setPos($pos_65);
													$_116 = \false; break;
												}
												while(\false);
												if($_116 === \true) { $_118 = \true; break; }
												$result = $res_60;
												$this->setPos($pos_60);
												$_118 = \false; break;
											}
											while(\false);
											if($_118 === \true) { $_120 = \true; break; }
											$result = $res_55;
											$this->setPos($pos_55);
											$_120 = \false; break;
										}
										while(\false);
										if($_120 === \true) { $_122 = \true; break; }
										$result = $res_50;
										$this->setPos($pos_50);
										$_122 = \false; break;
									}
									while(\false);
									if($_122 === \true) { $_124 = \true; break; }
									$result = $res_45;
									$this->setPos($pos_45);
									$_124 = \false; break;
								}
								while(\false);
								if($_124 === \true) { $_126 = \true; break; }
								$result = $res_40;
								$this->setPos($pos_40);
								$_126 = \false; break;
							}
							while(\false);
							if($_126 === \true) { $_128 = \true; break; }
							$result = $res_35;
							$this->setPos($pos_35);
							$_128 = \false; break;
						}
						while(\false);
						if($_128 === \true) { $_130 = \true; break; }
						$result = $res_30;
						$this->setPos($pos_30);
						$_130 = \false; break;
					}
					while(\false);
					if($_130 === \true) { $_132 = \true; break; }
					$result = $res_25;
					$this->setPos($pos_25);
					$_132 = \false; break;
				}
				while(\false);
				if($_132 === \true) { $_134 = \true; break; }
				$result = $res_20;
				$this->setPos($pos_20);
				$_134 = \false; break;
			}
			while(\false);
			if($_134 === \true) { $_136 = \true; break; }
			$result = $res_15;
			$this->setPos($pos_15);
			$_136 = \false; break;
		}
		while(\false);
		if($_136 === \true) { $_138 = \true; break; }
		$result = $res_10;
		$this->setPos($pos_10);
		$_138 = \false; break;
	}
	while(\false);
	if($_138 === \true) { return $this->finalise($result); }
	if($_138 === \false) { return \false; }
}


/* Comment: '//' /[^\n]+/ */
protected $match_Comment_typestack = ['Comment'];
function match_Comment($stack = []) {
	$matchrule = 'Comment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_142 = \null;
	do {
		if (($subres = $this->literal('//')) !== \false) { $result["text"] .= $subres; }
		else { $_142 = \false; break; }
		if (($subres = $this->rx('/[^\n]+/')) !== \false) { $result["text"] .= $subres; }
		else { $_142 = \false; break; }
		$_142 = \true; break;
	}
	while(\false);
	if($_142 === \true) { return $this->finalise($result); }
	if($_142 === \false) { return \false; }
}


/* FunctionDef: "FUNCTION" _ funcName:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END" */
protected $match_FunctionDef_typestack = ['FunctionDef'];
function match_FunctionDef($stack = []) {
	$matchrule = 'FunctionDef';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_156 = \null;
	do {
		if (($subres = $this->literal('FUNCTION')) !== \false) { $result["text"] .= $subres; }
		else { $_156 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_156 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "funcName");
		}
		else { $_156 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_156 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_156 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_156 = \false; break; }
		$res_150 = $result;
		$pos_150 = $this->pos;
		$key = 'match_'.'ParameterList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "params");
		}
		else {
			$result = $res_150;
			$this->setPos($pos_150);
			unset($res_150, $pos_150);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_156 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_156 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_156 = \false; break; }
		$count_154 = 0;
		while (\true) {
			$res_154 = $result;
			$pos_154 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_154;
				$this->setPos($pos_154);
				unset($res_154, $pos_154);
				break;
			}
			$count_154++;
		}
		if ($count_154 >= 1) {  }
		else { $_156 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_156 = \false; break; }
		$_156 = \true; break;
	}
	while(\false);
	if($_156 === \true) { return $this->finalise($result); }
	if($_156 === \false) { return \false; }
}


/* ParameterList: head:Identifier ( _ "," _ tail:Identifier )* */
protected $match_ParameterList_typestack = ['ParameterList'];
function match_ParameterList($stack = []) {
	$matchrule = 'ParameterList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_165 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_165 = \false; break; }
		while (\true) {
			$res_164 = $result;
			$pos_164 = $this->pos;
			$_163 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_163 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_163 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_163 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_163 = \false; break; }
				$_163 = \true; break;
			}
			while(\false);
			if($_163 === \false) {
				$result = $res_164;
				$this->setPos($pos_164);
				unset($res_164, $pos_164);
				break;
			}
		}
		$_165 = \true; break;
	}
	while(\false);
	if($_165 === \true) { return $this->finalise($result); }
	if($_165 === \false) { return \false; }
}


/* ReturnStmt: "RETURN" !(_ "=") ( _ expr:Expression )? */
protected $match_ReturnStmt_typestack = ['ReturnStmt'];
function match_ReturnStmt($stack = []) {
	$matchrule = 'ReturnStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_176 = \null;
	do {
		if (($subres = $this->literal('RETURN')) !== \false) { $result["text"] .= $subres; }
		else { $_176 = \false; break; }
		$res_171 = $result;
		$pos_171 = $this->pos;
		$_170 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_170 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '=') {
				$this->addPos(1);
				$result["text"] .= '=';
			}
			else { $_170 = \false; break; }
			$_170 = \true; break;
		}
		while(\false);
		if($_170 === \true) {
			$result = $res_171;
			$this->setPos($pos_171);
			$_176 = \false; break;
		}
		if($_170 === \false) {
			$result = $res_171;
			$this->setPos($pos_171);
		}
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
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_174 = \false; break; }
			$_174 = \true; break;
		}
		while(\false);
		if($_174 === \false) {
			$result = $res_175;
			$this->setPos($pos_175);
			unset($res_175, $pos_175);
		}
		$_176 = \true; break;
	}
	while(\false);
	if($_176 === \true) { return $this->finalise($result); }
	if($_176 === \false) { return \false; }
}


/* Assignment: var:Postfix _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_183 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_183 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_183 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_183 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_183 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_183 = \false; break; }
		$_183 = \true; break;
	}
	while(\false);
	if($_183 === \true) { return $this->finalise($result); }
	if($_183 === \false) { return \false; }
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


/* Logical: left:Comparison (_ op:LogicalOp _ right:Comparison)* */
protected $match_Logical_typestack = ['Logical'];
function match_Logical($stack = []) {
	$matchrule = 'Logical';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_193 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_193 = \false; break; }
		while (\true) {
			$res_192 = $result;
			$pos_192 = $this->pos;
			$_191 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_191 = \false; break; }
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_191 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_191 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_191 = \false; break; }
				$_191 = \true; break;
			}
			while(\false);
			if($_191 === \false) {
				$result = $res_192;
				$this->setPos($pos_192);
				unset($res_192, $pos_192);
				break;
			}
		}
		$_193 = \true; break;
	}
	while(\false);
	if($_193 === \true) { return $this->finalise($result); }
	if($_193 === \false) { return \false; }
}


/* LogicalOp: "AND" | "OR" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_198 = \null;
	do {
		$res_195 = $result;
		$pos_195 = $this->pos;
		if (($subres = $this->literal('AND')) !== \false) {
			$result["text"] .= $subres;
			$_198 = \true; break;
		}
		$result = $res_195;
		$this->setPos($pos_195);
		if (($subres = $this->literal('OR')) !== \false) {
			$result["text"] .= $subres;
			$_198 = \true; break;
		}
		$result = $res_195;
		$this->setPos($pos_195);
		$_198 = \false; break;
	}
	while(\false);
	if($_198 === \true) { return $this->finalise($result); }
	if($_198 === \false) { return \false; }
}


/* Comparison: left:Additive (_ op:CompOp _ right:Additive)* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_207 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_207 = \false; break; }
		while (\true) {
			$res_206 = $result;
			$pos_206 = $this->pos;
			$_205 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_205 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_205 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_205 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_205 = \false; break; }
				$_205 = \true; break;
			}
			while(\false);
			if($_205 === \false) {
				$result = $res_206;
				$this->setPos($pos_206);
				unset($res_206, $pos_206);
				break;
			}
		}
		$_207 = \true; break;
	}
	while(\false);
	if($_207 === \true) { return $this->finalise($result); }
	if($_207 === \false) { return \false; }
}


/* CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_228 = \null;
	do {
		$res_209 = $result;
		$pos_209 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_228 = \true; break;
		}
		$result = $res_209;
		$this->setPos($pos_209);
		$_226 = \null;
		do {
			$res_211 = $result;
			$pos_211 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_226 = \true; break;
			}
			$result = $res_211;
			$this->setPos($pos_211);
			$_224 = \null;
			do {
				$res_213 = $result;
				$pos_213 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_224 = \true; break;
				}
				$result = $res_213;
				$this->setPos($pos_213);
				$_222 = \null;
				do {
					$res_215 = $result;
					$pos_215 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_222 = \true; break;
					}
					$result = $res_215;
					$this->setPos($pos_215);
					$_220 = \null;
					do {
						$res_217 = $result;
						$pos_217 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_220 = \true; break;
						}
						$result = $res_217;
						$this->setPos($pos_217);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_220 = \true; break;
						}
						$result = $res_217;
						$this->setPos($pos_217);
						$_220 = \false; break;
					}
					while(\false);
					if($_220 === \true) { $_222 = \true; break; }
					$result = $res_215;
					$this->setPos($pos_215);
					$_222 = \false; break;
				}
				while(\false);
				if($_222 === \true) { $_224 = \true; break; }
				$result = $res_213;
				$this->setPos($pos_213);
				$_224 = \false; break;
			}
			while(\false);
			if($_224 === \true) { $_226 = \true; break; }
			$result = $res_211;
			$this->setPos($pos_211);
			$_226 = \false; break;
		}
		while(\false);
		if($_226 === \true) { $_228 = \true; break; }
		$result = $res_209;
		$this->setPos($pos_209);
		$_228 = \false; break;
	}
	while(\false);
	if($_228 === \true) { return $this->finalise($result); }
	if($_228 === \false) { return \false; }
}


/* Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_237 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_237 = \false; break; }
		while (\true) {
			$res_236 = $result;
			$pos_236 = $this->pos;
			$_235 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_235 = \false; break; }
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_235 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_235 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_235 = \false; break; }
				$_235 = \true; break;
			}
			while(\false);
			if($_235 === \false) {
				$result = $res_236;
				$this->setPos($pos_236);
				unset($res_236, $pos_236);
				break;
			}
		}
		$_237 = \true; break;
	}
	while(\false);
	if($_237 === \true) { return $this->finalise($result); }
	if($_237 === \false) { return \false; }
}


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_242 = \null;
	do {
		$res_239 = $result;
		$pos_239 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_242 = \true; break;
		}
		$result = $res_239;
		$this->setPos($pos_239);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_242 = \true; break;
		}
		$result = $res_239;
		$this->setPos($pos_239);
		$_242 = \false; break;
	}
	while(\false);
	if($_242 === \true) { return $this->finalise($result); }
	if($_242 === \false) { return \false; }
}


/* Multiplicative: left:Postfix (_ op:MulOp _ right:Postfix)* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_251 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_251 = \false; break; }
		while (\true) {
			$res_250 = $result;
			$pos_250 = $this->pos;
			$_249 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_249 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_249 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_249 = \false; break; }
				$key = 'match_'.'Postfix'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_249 = \false; break; }
				$_249 = \true; break;
			}
			while(\false);
			if($_249 === \false) {
				$result = $res_250;
				$this->setPos($pos_250);
				unset($res_250, $pos_250);
				break;
			}
		}
		$_251 = \true; break;
	}
	while(\false);
	if($_251 === \true) { return $this->finalise($result); }
	if($_251 === \false) { return \false; }
}


/* MulOp: "*" | "/" | "%" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_260 = \null;
	do {
		$res_253 = $result;
		$pos_253 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_260 = \true; break;
		}
		$result = $res_253;
		$this->setPos($pos_253);
		$_258 = \null;
		do {
			$res_255 = $result;
			$pos_255 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '/') {
				$this->addPos(1);
				$result["text"] .= '/';
				$_258 = \true; break;
			}
			$result = $res_255;
			$this->setPos($pos_255);
			if (\substr($this->string, $this->pos, 1) === '%') {
				$this->addPos(1);
				$result["text"] .= '%';
				$_258 = \true; break;
			}
			$result = $res_255;
			$this->setPos($pos_255);
			$_258 = \false; break;
		}
		while(\false);
		if($_258 === \true) { $_260 = \true; break; }
		$result = $res_253;
		$this->setPos($pos_253);
		$_260 = \false; break;
	}
	while(\false);
	if($_260 === \true) { return $this->finalise($result); }
	if($_260 === \false) { return \false; }
}


/* Postfix: base:Unary (_ "[" _ index:Expression _ "]" | _ "." _ prop:Identifier)* */
protected $match_Postfix_typestack = ['Postfix'];
function match_Postfix($stack = []) {
	$matchrule = 'Postfix';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_282 = \null;
	do {
		$key = 'match_'.'Unary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "base");
		}
		else { $_282 = \false; break; }
		while (\true) {
			$res_281 = $result;
			$pos_281 = $this->pos;
			$_280 = \null;
			do {
				$_278 = \null;
				do {
					$res_263 = $result;
					$pos_263 = $this->pos;
					$_270 = \null;
					do {
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_270 = \false; break; }
						if (\substr($this->string, $this->pos, 1) === '[') {
							$this->addPos(1);
							$result["text"] .= '[';
						}
						else { $_270 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_270 = \false; break; }
						$key = 'match_'.'Expression'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "index");
						}
						else { $_270 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_270 = \false; break; }
						if (\substr($this->string, $this->pos, 1) === ']') {
							$this->addPos(1);
							$result["text"] .= ']';
						}
						else { $_270 = \false; break; }
						$_270 = \true; break;
					}
					while(\false);
					if($_270 === \true) { $_278 = \true; break; }
					$result = $res_263;
					$this->setPos($pos_263);
					$_276 = \null;
					do {
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_276 = \false; break; }
						if (\substr($this->string, $this->pos, 1) === '.') {
							$this->addPos(1);
							$result["text"] .= '.';
						}
						else { $_276 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_276 = \false; break; }
						$key = 'match_'.'Identifier'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "prop");
						}
						else { $_276 = \false; break; }
						$_276 = \true; break;
					}
					while(\false);
					if($_276 === \true) { $_278 = \true; break; }
					$result = $res_263;
					$this->setPos($pos_263);
					$_278 = \false; break;
				}
				while(\false);
				if($_278 === \false) { $_280 = \false; break; }
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


/* Unary: op:UnaryOp _ expr:Unary | val:Primary */
protected $match_Unary_typestack = ['Unary'];
function match_Unary($stack = []) {
	$matchrule = 'Unary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_291 = \null;
	do {
		$res_284 = $result;
		$pos_284 = $this->pos;
		$_288 = \null;
		do {
			$key = 'match_'.'UnaryOp'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "op");
			}
			else { $_288 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_288 = \false; break; }
			$key = 'match_'.'Unary'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_288 = \false; break; }
			$_288 = \true; break;
		}
		while(\false);
		if($_288 === \true) { $_291 = \true; break; }
		$result = $res_284;
		$this->setPos($pos_284);
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_291 = \true; break;
		}
		$result = $res_284;
		$this->setPos($pos_284);
		$_291 = \false; break;
	}
	while(\false);
	if($_291 === \true) { return $this->finalise($result); }
	if($_291 === \false) { return \false; }
}


/* UnaryOp: "NOT" | "-" | "+" */
protected $match_UnaryOp_typestack = ['UnaryOp'];
function match_UnaryOp($stack = []) {
	$matchrule = 'UnaryOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_300 = \null;
	do {
		$res_293 = $result;
		$pos_293 = $this->pos;
		if (($subres = $this->literal('NOT')) !== \false) {
			$result["text"] .= $subres;
			$_300 = \true; break;
		}
		$result = $res_293;
		$this->setPos($pos_293);
		$_298 = \null;
		do {
			$res_295 = $result;
			$pos_295 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '-') {
				$this->addPos(1);
				$result["text"] .= '-';
				$_298 = \true; break;
			}
			$result = $res_295;
			$this->setPos($pos_295);
			if (\substr($this->string, $this->pos, 1) === '+') {
				$this->addPos(1);
				$result["text"] .= '+';
				$_298 = \true; break;
			}
			$result = $res_295;
			$this->setPos($pos_295);
			$_298 = \false; break;
		}
		while(\false);
		if($_298 === \true) { $_300 = \true; break; }
		$result = $res_293;
		$this->setPos($pos_293);
		$_300 = \false; break;
	}
	while(\false);
	if($_300 === \true) { return $this->finalise($result); }
	if($_300 === \false) { return \false; }
}


/* Primary: val:MakeStruct | val:ObjectLiteral | val:ArrayLiteral | val:String | val:Number | val:IdentifierOrCall | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_331 = \null;
	do {
		$res_302 = $result;
		$pos_302 = $this->pos;
		$key = 'match_'.'MakeStruct'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_331 = \true; break;
		}
		$result = $res_302;
		$this->setPos($pos_302);
		$_329 = \null;
		do {
			$res_304 = $result;
			$pos_304 = $this->pos;
			$key = 'match_'.'ObjectLiteral'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_329 = \true; break;
			}
			$result = $res_304;
			$this->setPos($pos_304);
			$_327 = \null;
			do {
				$res_306 = $result;
				$pos_306 = $this->pos;
				$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_327 = \true; break;
				}
				$result = $res_306;
				$this->setPos($pos_306);
				$_325 = \null;
				do {
					$res_308 = $result;
					$pos_308 = $this->pos;
					$key = 'match_'.'String'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_325 = \true; break;
					}
					$result = $res_308;
					$this->setPos($pos_308);
					$_323 = \null;
					do {
						$res_310 = $result;
						$pos_310 = $this->pos;
						$key = 'match_'.'Number'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
							$_323 = \true; break;
						}
						$result = $res_310;
						$this->setPos($pos_310);
						$_321 = \null;
						do {
							$res_312 = $result;
							$pos_312 = $this->pos;
							$key = 'match_'.'IdentifierOrCall'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "val");
								$_321 = \true; break;
							}
							$result = $res_312;
							$this->setPos($pos_312);
							$_319 = \null;
							do {
								if (\substr($this->string, $this->pos, 1) === '(') {
									$this->addPos(1);
									$result["text"] .= '(';
								}
								else { $_319 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_319 = \false; break; }
								$key = 'match_'.'Expression'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "val");
								}
								else { $_319 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_319 = \false; break; }
								if (\substr($this->string, $this->pos, 1) === ')') {
									$this->addPos(1);
									$result["text"] .= ')';
								}
								else { $_319 = \false; break; }
								$_319 = \true; break;
							}
							while(\false);
							if($_319 === \true) { $_321 = \true; break; }
							$result = $res_312;
							$this->setPos($pos_312);
							$_321 = \false; break;
						}
						while(\false);
						if($_321 === \true) { $_323 = \true; break; }
						$result = $res_310;
						$this->setPos($pos_310);
						$_323 = \false; break;
					}
					while(\false);
					if($_323 === \true) { $_325 = \true; break; }
					$result = $res_308;
					$this->setPos($pos_308);
					$_325 = \false; break;
				}
				while(\false);
				if($_325 === \true) { $_327 = \true; break; }
				$result = $res_306;
				$this->setPos($pos_306);
				$_327 = \false; break;
			}
			while(\false);
			if($_327 === \true) { $_329 = \true; break; }
			$result = $res_304;
			$this->setPos($pos_304);
			$_329 = \false; break;
		}
		while(\false);
		if($_329 === \true) { $_331 = \true; break; }
		$result = $res_302;
		$this->setPos($pos_302);
		$_331 = \false; break;
	}
	while(\false);
	if($_331 === \true) { return $this->finalise($result); }
	if($_331 === \false) { return \false; }
}


/* IdentifierOrCall: id:Identifier _ "(" _ args:ExpressionList? _ ")" | val:Identifier */
protected $match_IdentifierOrCall_typestack = ['IdentifierOrCall'];
function match_IdentifierOrCall($stack = []) {
	$matchrule = 'IdentifierOrCall';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_344 = \null;
	do {
		$res_333 = $result;
		$pos_333 = $this->pos;
		$_341 = \null;
		do {
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "id");
			}
			else { $_341 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_341 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_341 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_341 = \false; break; }
			$res_338 = $result;
			$pos_338 = $this->pos;
			$key = 'match_'.'ExpressionList'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "args");
			}
			else {
				$result = $res_338;
				$this->setPos($pos_338);
				unset($res_338, $pos_338);
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_341 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_341 = \false; break; }
			$_341 = \true; break;
		}
		while(\false);
		if($_341 === \true) { $_344 = \true; break; }
		$result = $res_333;
		$this->setPos($pos_333);
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_344 = \true; break;
		}
		$result = $res_333;
		$this->setPos($pos_333);
		$_344 = \false; break;
	}
	while(\false);
	if($_344 === \true) { return $this->finalise($result); }
	if($_344 === \false) { return \false; }
}


/* ExpressionList: head:Expression ( _ "," _ tail:Expression )* */
protected $match_ExpressionList_typestack = ['ExpressionList'];
function match_ExpressionList($stack = []) {
	$matchrule = 'ExpressionList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_353 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_353 = \false; break; }
		while (\true) {
			$res_352 = $result;
			$pos_352 = $this->pos;
			$_351 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_351 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_351 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_351 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_351 = \false; break; }
				$_351 = \true; break;
			}
			while(\false);
			if($_351 === \false) {
				$result = $res_352;
				$this->setPos($pos_352);
				unset($res_352, $pos_352);
				break;
			}
		}
		$_353 = \true; break;
	}
	while(\false);
	if($_353 === \true) { return $this->finalise($result); }
	if($_353 === \false) { return \false; }
}


/* ArgumentList: head:Argument ( _ "," _ tail:Argument )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_362 = \null;
	do {
		$key = 'match_'.'Argument'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_362 = \false; break; }
		while (\true) {
			$res_361 = $result;
			$pos_361 = $this->pos;
			$_360 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_360 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_360 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_360 = \false; break; }
				$key = 'match_'.'Argument'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_360 = \false; break; }
				$_360 = \true; break;
			}
			while(\false);
			if($_360 === \false) {
				$result = $res_361;
				$this->setPos($pos_361);
				unset($res_361, $pos_361);
				break;
			}
		}
		$_362 = \true; break;
	}
	while(\false);
	if($_362 === \true) { return $this->finalise($result); }
	if($_362 === \false) { return \false; }
}


/* Argument: argName:Identifier _ ":" _ value:Expression | value:Expression */
protected $match_Argument_typestack = ['Argument'];
function match_Argument($stack = []) {
	$matchrule = 'Argument';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_373 = \null;
	do {
		$res_364 = $result;
		$pos_364 = $this->pos;
		$_370 = \null;
		do {
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "argName");
			}
			else { $_370 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_370 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ':') {
				$this->addPos(1);
				$result["text"] .= ':';
			}
			else { $_370 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_370 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "value");
			}
			else { $_370 = \false; break; }
			$_370 = \true; break;
		}
		while(\false);
		if($_370 === \true) { $_373 = \true; break; }
		$result = $res_364;
		$this->setPos($pos_364);
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
			$_373 = \true; break;
		}
		$result = $res_364;
		$this->setPos($pos_364);
		$_373 = \false; break;
	}
	while(\false);
	if($_373 === \true) { return $this->finalise($result); }
	if($_373 === \false) { return \false; }
}


/* ArrayLiteral: "[" _ elems:ArrayElements? _ "]" */
protected $match_ArrayLiteral_typestack = ['ArrayLiteral'];
function match_ArrayLiteral($stack = []) {
	$matchrule = 'ArrayLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_380 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_380 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_380 = \false; break; }
		$res_377 = $result;
		$pos_377 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elems");
		}
		else {
			$result = $res_377;
			$this->setPos($pos_377);
			unset($res_377, $pos_377);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_380 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_380 = \false; break; }
		$_380 = \true; break;
	}
	while(\false);
	if($_380 === \true) { return $this->finalise($result); }
	if($_380 === \false) { return \false; }
}


/* ArrayElements: head:Expression ( _ "," _ tail:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_389 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_389 = \false; break; }
		while (\true) {
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
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_387 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_387 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_387 = \false; break; }
				$_387 = \true; break;
			}
			while(\false);
			if($_387 === \false) {
				$result = $res_388;
				$this->setPos($pos_388);
				unset($res_388, $pos_388);
				break;
			}
		}
		$_389 = \true; break;
	}
	while(\false);
	if($_389 === \true) { return $this->finalise($result); }
	if($_389 === \false) { return \false; }
}


/* ObjectLiteral: "{" _ pairs:ObjectPairs? _ "}" */
protected $match_ObjectLiteral_typestack = ['ObjectLiteral'];
function match_ObjectLiteral($stack = []) {
	$matchrule = 'ObjectLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_396 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '{') {
			$this->addPos(1);
			$result["text"] .= '{';
		}
		else { $_396 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_396 = \false; break; }
		$res_393 = $result;
		$pos_393 = $this->pos;
		$key = 'match_'.'ObjectPairs'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pairs");
		}
		else {
			$result = $res_393;
			$this->setPos($pos_393);
			unset($res_393, $pos_393);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_396 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '}') {
			$this->addPos(1);
			$result["text"] .= '}';
		}
		else { $_396 = \false; break; }
		$_396 = \true; break;
	}
	while(\false);
	if($_396 === \true) { return $this->finalise($result); }
	if($_396 === \false) { return \false; }
}


/* ObjectPairs: head:ObjectPair ( _ "," _ tail:ObjectPair )* */
protected $match_ObjectPairs_typestack = ['ObjectPairs'];
function match_ObjectPairs($stack = []) {
	$matchrule = 'ObjectPairs';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_405 = \null;
	do {
		$key = 'match_'.'ObjectPair'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_405 = \false; break; }
		while (\true) {
			$res_404 = $result;
			$pos_404 = $this->pos;
			$_403 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_403 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_403 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_403 = \false; break; }
				$key = 'match_'.'ObjectPair'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_403 = \false; break; }
				$_403 = \true; break;
			}
			while(\false);
			if($_403 === \false) {
				$result = $res_404;
				$this->setPos($pos_404);
				unset($res_404, $pos_404);
				break;
			}
		}
		$_405 = \true; break;
	}
	while(\false);
	if($_405 === \true) { return $this->finalise($result); }
	if($_405 === \false) { return \false; }
}


/* ObjectPair: key:String _ ":" _ value:Expression */
protected $match_ObjectPair_typestack = ['ObjectPair'];
function match_ObjectPair($stack = []) {
	$matchrule = 'ObjectPair';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_412 = \null;
	do {
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "key");
		}
		else { $_412 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_412 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_412 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_412 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
		}
		else { $_412 = \false; break; }
		$_412 = \true; break;
	}
	while(\false);
	if($_412 === \true) { return $this->finalise($result); }
	if($_412 === \false) { return \false; }
}


/* String: '"' /[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_417 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_417 = \false; break; }
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_417 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_417 = \false; break; }
		$_417 = \true; break;
	}
	while(\false);
	if($_417 === \true) { return $this->finalise($result); }
	if($_417 === \false) { return \false; }
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
	$_422 = \null;
	do {
		$res_420 = $result;
		$pos_420 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_420;
			$this->setPos($pos_420);
			$_422 = \false; break;
		}
		else {
			$result = $res_420;
			$this->setPos($pos_420);
		}
		if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_422 = \false; break; }
		$_422 = \true; break;
	}
	while(\false);
	if($_422 === \true) { return $this->finalise($result); }
	if($_422 === \false) { return \false; }
}


/* Keyword: ("COMMAND" | "STRUCT" | "MAKE" | "GOTO" | "BEGIN" | "WHILE" | "DO" | "REPEAT" | "UNTIL" | "FUNCTION" | "RETURN" | "FOREACH" | "MESSAGE" | "ACCEPT" | "REFUSE" | "INPUT" | "SWITCH" | "CASE" | "DEFAULT" | "ELSE" | "AND" | "OR" | "NOT" | "END" | "IF" | "TO" | "IN" | "BREAK" | "CONTINUE") !(/[a-zA-Z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_542 = \null;
	do {
		$_537 = \null;
		do {
			$_535 = \null;
			do {
				$res_424 = $result;
				$pos_424 = $this->pos;
				if (($subres = $this->literal('COMMAND')) !== \false) {
					$result["text"] .= $subres;
					$_535 = \true; break;
				}
				$result = $res_424;
				$this->setPos($pos_424);
				$_533 = \null;
				do {
					$res_426 = $result;
					$pos_426 = $this->pos;
					if (($subres = $this->literal('STRUCT')) !== \false) {
						$result["text"] .= $subres;
						$_533 = \true; break;
					}
					$result = $res_426;
					$this->setPos($pos_426);
					$_531 = \null;
					do {
						$res_428 = $result;
						$pos_428 = $this->pos;
						if (($subres = $this->literal('MAKE')) !== \false) {
							$result["text"] .= $subres;
							$_531 = \true; break;
						}
						$result = $res_428;
						$this->setPos($pos_428);
						$_529 = \null;
						do {
							$res_430 = $result;
							$pos_430 = $this->pos;
							if (($subres = $this->literal('GOTO')) !== \false) {
								$result["text"] .= $subres;
								$_529 = \true; break;
							}
							$result = $res_430;
							$this->setPos($pos_430);
							$_527 = \null;
							do {
								$res_432 = $result;
								$pos_432 = $this->pos;
								if (($subres = $this->literal('BEGIN')) !== \false) {
									$result["text"] .= $subres;
									$_527 = \true; break;
								}
								$result = $res_432;
								$this->setPos($pos_432);
								$_525 = \null;
								do {
									$res_434 = $result;
									$pos_434 = $this->pos;
									if (($subres = $this->literal('WHILE')) !== \false) {
										$result["text"] .= $subres;
										$_525 = \true; break;
									}
									$result = $res_434;
									$this->setPos($pos_434);
									$_523 = \null;
									do {
										$res_436 = $result;
										$pos_436 = $this->pos;
										if (($subres = $this->literal('DO')) !== \false) {
											$result["text"] .= $subres;
											$_523 = \true; break;
										}
										$result = $res_436;
										$this->setPos($pos_436);
										$_521 = \null;
										do {
											$res_438 = $result;
											$pos_438 = $this->pos;
											if (($subres = $this->literal('REPEAT')) !== \false) {
												$result["text"] .= $subres;
												$_521 = \true; break;
											}
											$result = $res_438;
											$this->setPos($pos_438);
											$_519 = \null;
											do {
												$res_440 = $result;
												$pos_440 = $this->pos;
												if (($subres = $this->literal('UNTIL')) !== \false) {
													$result["text"] .= $subres;
													$_519 = \true; break;
												}
												$result = $res_440;
												$this->setPos($pos_440);
												$_517 = \null;
												do {
													$res_442 = $result;
													$pos_442 = $this->pos;
													if (($subres = $this->literal('FUNCTION')) !== \false) {
														$result["text"] .= $subres;
														$_517 = \true; break;
													}
													$result = $res_442;
													$this->setPos($pos_442);
													$_515 = \null;
													do {
														$res_444 = $result;
														$pos_444 = $this->pos;
														if (($subres = $this->literal('RETURN')) !== \false) {
															$result["text"] .= $subres;
															$_515 = \true; break;
														}
														$result = $res_444;
														$this->setPos($pos_444);
														$_513 = \null;
														do {
															$res_446 = $result;
															$pos_446 = $this->pos;
															if (($subres = $this->literal('FOREACH')) !== \false) {
																$result["text"] .= $subres;
																$_513 = \true; break;
															}
															$result = $res_446;
															$this->setPos($pos_446);
															$_511 = \null;
															do {
																$res_448 = $result;
																$pos_448 = $this->pos;
																if (($subres = $this->literal('MESSAGE')) !== \false) {
																	$result["text"] .= $subres;
																	$_511 = \true; break;
																}
																$result = $res_448;
																$this->setPos($pos_448);
																$_509 = \null;
																do {
																	$res_450 = $result;
																	$pos_450 = $this->pos;
																	if (($subres = $this->literal('ACCEPT')) !== \false) {
																		$result["text"] .= $subres;
																		$_509 = \true; break;
																	}
																	$result = $res_450;
																	$this->setPos($pos_450);
																	$_507 = \null;
																	do {
																		$res_452 = $result;
																		$pos_452 = $this->pos;
																		if (($subres = $this->literal('REFUSE')) !== \false) {
																			$result["text"] .= $subres;
																			$_507 = \true; break;
																		}
																		$result = $res_452;
																		$this->setPos($pos_452);
																		$_505 = \null;
																		do {
																			$res_454 = $result;
																			$pos_454 = $this->pos;
																			if (($subres = $this->literal('INPUT')) !== \false) {
																				$result["text"] .= $subres;
																				$_505 = \true; break;
																			}
																			$result = $res_454;
																			$this->setPos($pos_454);
																			$_503 = \null;
																			do {
																				$res_456 = $result;
																				$pos_456 = $this->pos;
																				if (($subres = $this->literal('SWITCH')) !== \false) {
																					$result["text"] .= $subres;
																					$_503 = \true; break;
																				}
																				$result = $res_456;
																				$this->setPos($pos_456);
																				$_501 = \null;
																				do {
																					$res_458 = $result;
																					$pos_458 = $this->pos;
																					if (($subres = $this->literal('CASE')) !== \false) {
																						$result["text"] .= $subres;
																						$_501 = \true; break;
																					}
																					$result = $res_458;
																					$this->setPos($pos_458);
																					$_499 = \null;
																					do {
																						$res_460 = $result;
																						$pos_460 = $this->pos;
																						if (($subres = $this->literal('DEFAULT')) !== \false) {
																							$result["text"] .= $subres;
																							$_499 = \true; break;
																						}
																						$result = $res_460;
																						$this->setPos($pos_460);
																						$_497 = \null;
																						do {
																							$res_462 = $result;
																							$pos_462 = $this->pos;
																							if (($subres = $this->literal('ELSE')) !== \false) {
																								$result["text"] .= $subres;
																								$_497 = \true; break;
																							}
																							$result = $res_462;
																							$this->setPos($pos_462);
																							$_495 = \null;
																							do {
																								$res_464 = $result;
																								$pos_464 = $this->pos;
																								if (($subres = $this->literal('AND')) !== \false) {
																									$result["text"] .= $subres;
																									$_495 = \true; break;
																								}
																								$result = $res_464;
																								$this->setPos($pos_464);
																								$_493 = \null;
																								do {
																									$res_466 = $result;
																									$pos_466 = $this->pos;
																									if (($subres = $this->literal('OR')) !== \false) {
																										$result["text"] .= $subres;
																										$_493 = \true; break;
																									}
																									$result = $res_466;
																									$this->setPos($pos_466);
																									$_491 = \null;
																									do {
																										$res_468 = $result;
																										$pos_468 = $this->pos;
																										if (($subres = $this->literal('NOT')) !== \false) {
																											$result["text"] .= $subres;
																											$_491 = \true; break;
																										}
																										$result = $res_468;
																										$this->setPos($pos_468);
																										$_489 = \null;
																										do {
																											$res_470 = $result;
																											$pos_470 = $this->pos;
																											if (($subres = $this->literal('END')) !== \false) {
																												$result["text"] .= $subres;
																												$_489 = \true; break;
																											}
																											$result = $res_470;
																											$this->setPos($pos_470);
																											$_487 = \null;
																											do {
																												$res_472 = $result;
																												$pos_472 = $this->pos;
																												if (($subres = $this->literal('IF')) !== \false) {
																													$result["text"] .= $subres;
																													$_487 = \true; break;
																												}
																												$result = $res_472;
																												$this->setPos($pos_472);
																												$_485 = \null;
																												do {
																													$res_474 = $result;
																													$pos_474 = $this->pos;
																													if (($subres = $this->literal('TO')) !== \false) {
																														$result["text"] .= $subres;
																														$_485 = \true; break;
																													}
																													$result = $res_474;
																													$this->setPos($pos_474);
																													$_483 = \null;
																													do {
																														$res_476 = $result;
																														$pos_476 = $this->pos;
																														if (($subres = $this->literal('IN')) !== \false) {
																															$result["text"] .= $subres;
																															$_483 = \true; break;
																														}
																														$result = $res_476;
																														$this->setPos($pos_476);
																														$_481 = \null;
																														do {
																															$res_478 = $result;
																															$pos_478 = $this->pos;
																															if (($subres = $this->literal('BREAK')) !== \false) {
																																$result["text"] .= $subres;
																																$_481 = \true; break;
																															}
																															$result = $res_478;
																															$this->setPos($pos_478);
																															if (($subres = $this->literal('CONTINUE')) !== \false) {
																																$result["text"] .= $subres;
																																$_481 = \true; break;
																															}
																															$result = $res_478;
																															$this->setPos($pos_478);
																															$_481 = \false; break;
																														}
																														while(\false);
																														if($_481 === \true) {
																															$_483 = \true; break;
																														}
																														$result = $res_476;
																														$this->setPos($pos_476);
																														$_483 = \false; break;
																													}
																													while(\false);
																													if($_483 === \true) {
																														$_485 = \true; break;
																													}
																													$result = $res_474;
																													$this->setPos($pos_474);
																													$_485 = \false; break;
																												}
																												while(\false);
																												if($_485 === \true) {
																													$_487 = \true; break;
																												}
																												$result = $res_472;
																												$this->setPos($pos_472);
																												$_487 = \false; break;
																											}
																											while(\false);
																											if($_487 === \true) {
																												$_489 = \true; break;
																											}
																											$result = $res_470;
																											$this->setPos($pos_470);
																											$_489 = \false; break;
																										}
																										while(\false);
																										if($_489 === \true) {
																											$_491 = \true; break;
																										}
																										$result = $res_468;
																										$this->setPos($pos_468);
																										$_491 = \false; break;
																									}
																									while(\false);
																									if($_491 === \true) {
																										$_493 = \true; break;
																									}
																									$result = $res_466;
																									$this->setPos($pos_466);
																									$_493 = \false; break;
																								}
																								while(\false);
																								if($_493 === \true) {
																									$_495 = \true; break;
																								}
																								$result = $res_464;
																								$this->setPos($pos_464);
																								$_495 = \false; break;
																							}
																							while(\false);
																							if($_495 === \true) {
																								$_497 = \true; break;
																							}
																							$result = $res_462;
																							$this->setPos($pos_462);
																							$_497 = \false; break;
																						}
																						while(\false);
																						if($_497 === \true) {
																							$_499 = \true; break;
																						}
																						$result = $res_460;
																						$this->setPos($pos_460);
																						$_499 = \false; break;
																					}
																					while(\false);
																					if($_499 === \true) {
																						$_501 = \true; break;
																					}
																					$result = $res_458;
																					$this->setPos($pos_458);
																					$_501 = \false; break;
																				}
																				while(\false);
																				if($_501 === \true) {
																					$_503 = \true; break;
																				}
																				$result = $res_456;
																				$this->setPos($pos_456);
																				$_503 = \false; break;
																			}
																			while(\false);
																			if($_503 === \true) {
																				$_505 = \true; break;
																			}
																			$result = $res_454;
																			$this->setPos($pos_454);
																			$_505 = \false; break;
																		}
																		while(\false);
																		if($_505 === \true) {
																			$_507 = \true; break;
																		}
																		$result = $res_452;
																		$this->setPos($pos_452);
																		$_507 = \false; break;
																	}
																	while(\false);
																	if($_507 === \true) { $_509 = \true; break; }
																	$result = $res_450;
																	$this->setPos($pos_450);
																	$_509 = \false; break;
																}
																while(\false);
																if($_509 === \true) { $_511 = \true; break; }
																$result = $res_448;
																$this->setPos($pos_448);
																$_511 = \false; break;
															}
															while(\false);
															if($_511 === \true) { $_513 = \true; break; }
															$result = $res_446;
															$this->setPos($pos_446);
															$_513 = \false; break;
														}
														while(\false);
														if($_513 === \true) { $_515 = \true; break; }
														$result = $res_444;
														$this->setPos($pos_444);
														$_515 = \false; break;
													}
													while(\false);
													if($_515 === \true) { $_517 = \true; break; }
													$result = $res_442;
													$this->setPos($pos_442);
													$_517 = \false; break;
												}
												while(\false);
												if($_517 === \true) { $_519 = \true; break; }
												$result = $res_440;
												$this->setPos($pos_440);
												$_519 = \false; break;
											}
											while(\false);
											if($_519 === \true) { $_521 = \true; break; }
											$result = $res_438;
											$this->setPos($pos_438);
											$_521 = \false; break;
										}
										while(\false);
										if($_521 === \true) { $_523 = \true; break; }
										$result = $res_436;
										$this->setPos($pos_436);
										$_523 = \false; break;
									}
									while(\false);
									if($_523 === \true) { $_525 = \true; break; }
									$result = $res_434;
									$this->setPos($pos_434);
									$_525 = \false; break;
								}
								while(\false);
								if($_525 === \true) { $_527 = \true; break; }
								$result = $res_432;
								$this->setPos($pos_432);
								$_527 = \false; break;
							}
							while(\false);
							if($_527 === \true) { $_529 = \true; break; }
							$result = $res_430;
							$this->setPos($pos_430);
							$_529 = \false; break;
						}
						while(\false);
						if($_529 === \true) { $_531 = \true; break; }
						$result = $res_428;
						$this->setPos($pos_428);
						$_531 = \false; break;
					}
					while(\false);
					if($_531 === \true) { $_533 = \true; break; }
					$result = $res_426;
					$this->setPos($pos_426);
					$_533 = \false; break;
				}
				while(\false);
				if($_533 === \true) { $_535 = \true; break; }
				$result = $res_424;
				$this->setPos($pos_424);
				$_535 = \false; break;
			}
			while(\false);
			if($_535 === \false) { $_537 = \false; break; }
			$_537 = \true; break;
		}
		while(\false);
		if($_537 === \false) { $_542 = \false; break; }
		$res_541 = $result;
		$pos_541 = $this->pos;
		$_540 = \null;
		do {
			if (($subres = $this->rx('/[a-zA-Z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_540 = \false; break; }
			$_540 = \true; break;
		}
		while(\false);
		if($_540 === \true) {
			$result = $res_541;
			$this->setPos($pos_541);
			$_542 = \false; break;
		}
		if($_540 === \false) {
			$result = $res_541;
			$this->setPos($pos_541);
		}
		$_542 = \true; break;
	}
	while(\false);
	if($_542 === \true) { return $this->finalise($result); }
	if($_542 === \false) { return \false; }
}


/* Block: "{" _ stmt:Statement* _ "}" | "BEGIN" _ stmt:Statement* _ "END" */
protected $match_Block_typestack = ['Block'];
function match_Block($stack = []) {
	$matchrule = 'Block';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_559 = \null;
	do {
		$res_544 = $result;
		$pos_544 = $this->pos;
		$_550 = \null;
		do {
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_550 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_550 = \false; break; }
			while (\true) {
				$res_547 = $result;
				$pos_547 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else {
					$result = $res_547;
					$this->setPos($pos_547);
					unset($res_547, $pos_547);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_550 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_550 = \false; break; }
			$_550 = \true; break;
		}
		while(\false);
		if($_550 === \true) { $_559 = \true; break; }
		$result = $res_544;
		$this->setPos($pos_544);
		$_557 = \null;
		do {
			if (($subres = $this->literal('BEGIN')) !== \false) { $result["text"] .= $subres; }
			else { $_557 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_557 = \false; break; }
			while (\true) {
				$res_554 = $result;
				$pos_554 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else {
					$result = $res_554;
					$this->setPos($pos_554);
					unset($res_554, $pos_554);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_557 = \false; break; }
			if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
			else { $_557 = \false; break; }
			$_557 = \true; break;
		}
		while(\false);
		if($_557 === \true) { $_559 = \true; break; }
		$result = $res_544;
		$this->setPos($pos_544);
		$_559 = \false; break;
	}
	while(\false);
	if($_559 === \true) { return $this->finalise($result); }
	if($_559 === \false) { return \false; }
}


/* IfStatement: "IF" _ cond:Expression _ then:Block ( _ "ELSE" _ else:Block )? | "IF" _ cond:Expression _ then:Statement+ ( _ "ELSE" _ else:Statement+ )? ( _ "END" ) | "IF" _ cond:Expression _ stmt:Statement */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_602 = \null;
	do {
		$res_561 = $result;
		$pos_561 = $this->pos;
		$_573 = \null;
		do {
			if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
			else { $_573 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_573 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_573 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_573 = \false; break; }
			$key = 'match_'.'Block'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "then");
			}
			else { $_573 = \false; break; }
			$res_572 = $result;
			$pos_572 = $this->pos;
			$_571 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_571 = \false; break; }
				if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
				else { $_571 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_571 = \false; break; }
				$key = 'match_'.'Block'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_571 = \false; break; }
				$_571 = \true; break;
			}
			while(\false);
			if($_571 === \false) {
				$result = $res_572;
				$this->setPos($pos_572);
				unset($res_572, $pos_572);
			}
			$_573 = \true; break;
		}
		while(\false);
		if($_573 === \true) { $_602 = \true; break; }
		$result = $res_561;
		$this->setPos($pos_561);
		$_600 = \null;
		do {
			$res_575 = $result;
			$pos_575 = $this->pos;
			$_591 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_591 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_591 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_591 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_591 = \false; break; }
				$count_580 = 0;
				while (\true) {
					$res_580 = $result;
					$pos_580 = $this->pos;
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "then");
					}
					else {
						$result = $res_580;
						$this->setPos($pos_580);
						unset($res_580, $pos_580);
						break;
					}
					$count_580++;
				}
				if ($count_580 >= 1) {  }
				else { $_591 = \false; break; }
				$res_586 = $result;
				$pos_586 = $this->pos;
				$_585 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_585 = \false; break; }
					if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
					else { $_585 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_585 = \false; break; }
					$count_584 = 0;
					while (\true) {
						$res_584 = $result;
						$pos_584 = $this->pos;
						$key = 'match_'.'Statement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "else");
						}
						else {
							$result = $res_584;
							$this->setPos($pos_584);
							unset($res_584, $pos_584);
							break;
						}
						$count_584++;
					}
					if ($count_584 >= 1) {  }
					else { $_585 = \false; break; }
					$_585 = \true; break;
				}
				while(\false);
				if($_585 === \false) {
					$result = $res_586;
					$this->setPos($pos_586);
					unset($res_586, $pos_586);
				}
				$_589 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_589 = \false; break; }
					if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
					else { $_589 = \false; break; }
					$_589 = \true; break;
				}
				while(\false);
				if($_589 === \false) { $_591 = \false; break; }
				$_591 = \true; break;
			}
			while(\false);
			if($_591 === \true) { $_600 = \true; break; }
			$result = $res_575;
			$this->setPos($pos_575);
			$_598 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_598 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_598 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_598 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_598 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_598 = \false; break; }
				$_598 = \true; break;
			}
			while(\false);
			if($_598 === \true) { $_600 = \true; break; }
			$result = $res_575;
			$this->setPos($pos_575);
			$_600 = \false; break;
		}
		while(\false);
		if($_600 === \true) { $_602 = \true; break; }
		$result = $res_561;
		$this->setPos($pos_561);
		$_602 = \false; break;
	}
	while(\false);
	if($_602 === \true) { return $this->finalise($result); }
	if($_602 === \false) { return \false; }
}


/* ForeachInStmt: "FOREACH" _ var:Identifier _ "IN" _ iter:Expression _ body:Statement+ "END" */
protected $match_ForeachInStmt_typestack = ['ForeachInStmt'];
function match_ForeachInStmt($stack = []) {
	$matchrule = 'ForeachInStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_614 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_614 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_614 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_614 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_614 = \false; break; }
		if (($subres = $this->literal('IN')) !== \false) { $result["text"] .= $subres; }
		else { $_614 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_614 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "iter");
		}
		else { $_614 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_614 = \false; break; }
		$count_612 = 0;
		while (\true) {
			$res_612 = $result;
			$pos_612 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_612;
				$this->setPos($pos_612);
				unset($res_612, $pos_612);
				break;
			}
			$count_612++;
		}
		if ($count_612 >= 1) {  }
		else { $_614 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_614 = \false; break; }
		$_614 = \true; break;
	}
	while(\false);
	if($_614 === \true) { return $this->finalise($result); }
	if($_614 === \false) { return \false; }
}


/* ForeachRangeStmt: "FOREACH" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "END" */
protected $match_ForeachRangeStmt_typestack = ['ForeachRangeStmt'];
function match_ForeachRangeStmt($stack = []) {
	$matchrule = 'ForeachRangeStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_630 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_630 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_630 = \false; break; }
		$count_628 = 0;
		while (\true) {
			$res_628 = $result;
			$pos_628 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_628;
				$this->setPos($pos_628);
				unset($res_628, $pos_628);
				break;
			}
			$count_628++;
		}
		if ($count_628 >= 1) {  }
		else { $_630 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_630 = \false; break; }
		$_630 = \true; break;
	}
	while(\false);
	if($_630 === \true) { return $this->finalise($result); }
	if($_630 === \false) { return \false; }
}


/* WhileStatement: "WHILE" _ cond:Expression _ body:Statement+ "END" */
protected $match_WhileStatement_typestack = ['WhileStatement'];
function match_WhileStatement($stack = []) {
	$matchrule = 'WhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_638 = \null;
	do {
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_638 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_638 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_638 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_638 = \false; break; }
		$count_636 = 0;
		while (\true) {
			$res_636 = $result;
			$pos_636 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_636;
				$this->setPos($pos_636);
				unset($res_636, $pos_636);
				break;
			}
			$count_636++;
		}
		if ($count_636 >= 1) {  }
		else { $_638 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_638 = \false; break; }
		$_638 = \true; break;
	}
	while(\false);
	if($_638 === \true) { return $this->finalise($result); }
	if($_638 === \false) { return \false; }
}


/* DoWhileStatement: "DO" _ body:Statement+ "WHILE" _ cond:Expression */
protected $match_DoWhileStatement_typestack = ['DoWhileStatement'];
function match_DoWhileStatement($stack = []) {
	$matchrule = 'DoWhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_646 = \null;
	do {
		if (($subres = $this->literal('DO')) !== \false) { $result["text"] .= $subres; }
		else { $_646 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_646 = \false; break; }
		$count_642 = 0;
		while (\true) {
			$res_642 = $result;
			$pos_642 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_642;
				$this->setPos($pos_642);
				unset($res_642, $pos_642);
				break;
			}
			$count_642++;
		}
		if ($count_642 >= 1) {  }
		else { $_646 = \false; break; }
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_646 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_646 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_646 = \false; break; }
		$_646 = \true; break;
	}
	while(\false);
	if($_646 === \true) { return $this->finalise($result); }
	if($_646 === \false) { return \false; }
}


/* RepeatUntilStatement: "REPEAT" _ body:Statement+ "UNTIL" _ cond:Expression */
protected $match_RepeatUntilStatement_typestack = ['RepeatUntilStatement'];
function match_RepeatUntilStatement($stack = []) {
	$matchrule = 'RepeatUntilStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_654 = \null;
	do {
		if (($subres = $this->literal('REPEAT')) !== \false) { $result["text"] .= $subres; }
		else { $_654 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_654 = \false; break; }
		$count_650 = 0;
		while (\true) {
			$res_650 = $result;
			$pos_650 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_650;
				$this->setPos($pos_650);
				unset($res_650, $pos_650);
				break;
			}
			$count_650++;
		}
		if ($count_650 >= 1) {  }
		else { $_654 = \false; break; }
		if (($subres = $this->literal('UNTIL')) !== \false) { $result["text"] .= $subres; }
		else { $_654 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_654 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_654 = \false; break; }
		$_654 = \true; break;
	}
	while(\false);
	if($_654 === \true) { return $this->finalise($result); }
	if($_654 === \false) { return \false; }
}


/* SwitchStatement: "SWITCH" _ expr:Expression _ cases:CaseClause+ def:DefaultClause? _ "END" */
protected $match_SwitchStatement_typestack = ['SwitchStatement'];
function match_SwitchStatement($stack = []) {
	$matchrule = 'SwitchStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_664 = \null;
	do {
		if (($subres = $this->literal('SWITCH')) !== \false) { $result["text"] .= $subres; }
		else { $_664 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_664 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_664 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_664 = \false; break; }
		$count_660 = 0;
		while (\true) {
			$res_660 = $result;
			$pos_660 = $this->pos;
			$key = 'match_'.'CaseClause'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cases");
			}
			else {
				$result = $res_660;
				$this->setPos($pos_660);
				unset($res_660, $pos_660);
				break;
			}
			$count_660++;
		}
		if ($count_660 >= 1) {  }
		else { $_664 = \false; break; }
		$res_661 = $result;
		$pos_661 = $this->pos;
		$key = 'match_'.'DefaultClause'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "def");
		}
		else {
			$result = $res_661;
			$this->setPos($pos_661);
			unset($res_661, $pos_661);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_664 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_664 = \false; break; }
		$_664 = \true; break;
	}
	while(\false);
	if($_664 === \true) { return $this->finalise($result); }
	if($_664 === \false) { return \false; }
}


/* CaseClause: "CASE" _ val:Expression _ body:Statement+ */
protected $match_CaseClause_typestack = ['CaseClause'];
function match_CaseClause($stack = []) {
	$matchrule = 'CaseClause';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_671 = \null;
	do {
		if (($subres = $this->literal('CASE')) !== \false) { $result["text"] .= $subres; }
		else { $_671 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_671 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
		}
		else { $_671 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_671 = \false; break; }
		$count_670 = 0;
		while (\true) {
			$res_670 = $result;
			$pos_670 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_670;
				$this->setPos($pos_670);
				unset($res_670, $pos_670);
				break;
			}
			$count_670++;
		}
		if ($count_670 >= 1) {  }
		else { $_671 = \false; break; }
		$_671 = \true; break;
	}
	while(\false);
	if($_671 === \true) { return $this->finalise($result); }
	if($_671 === \false) { return \false; }
}


/* DefaultClause: "DEFAULT" _ body:Statement+ */
protected $match_DefaultClause_typestack = ['DefaultClause'];
function match_DefaultClause($stack = []) {
	$matchrule = 'DefaultClause';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_676 = \null;
	do {
		if (($subres = $this->literal('DEFAULT')) !== \false) { $result["text"] .= $subres; }
		else { $_676 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_676 = \false; break; }
		$count_675 = 0;
		while (\true) {
			$res_675 = $result;
			$pos_675 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_675;
				$this->setPos($pos_675);
				unset($res_675, $pos_675);
				break;
			}
			$count_675++;
		}
		if ($count_675 >= 1) {  }
		else { $_676 = \false; break; }
		$_676 = \true; break;
	}
	while(\false);
	if($_676 === \true) { return $this->finalise($result); }
	if($_676 === \false) { return \false; }
}


/* BreakStmt: "BREAK" */
protected $match_BreakStmt_typestack = ['BreakStmt'];
function match_BreakStmt($stack = []) {
	$matchrule = 'BreakStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->literal('BREAK')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}


/* ContinueStmt: "CONTINUE" */
protected $match_ContinueStmt_typestack = ['ContinueStmt'];
function match_ContinueStmt($stack = []) {
	$matchrule = 'ContinueStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->literal('CONTINUE')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}


/* InterruptWithVarStmt: ("INPUT") _ expr:Expression _ var:Identifier */
protected $match_InterruptWithVarStmt_typestack = ['InterruptWithVarStmt'];
function match_InterruptWithVarStmt($stack = []) {
	$matchrule = 'InterruptWithVarStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_687 = \null;
	do {
		$_681 = \null;
		do {
			if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
			else { $_681 = \false; break; }
			$_681 = \true; break;
		}
		while(\false);
		if($_681 === \false) { $_687 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_687 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_687 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_687 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_687 = \false; break; }
		$_687 = \true; break;
	}
	while(\false);
	if($_687 === \true) { return $this->finalise($result); }
	if($_687 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("MESSAGE" | "ACCEPT" | "REFUSE") _ expr:Expression */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_702 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_698 = \null;
		do {
			$_696 = \null;
			do {
				$res_689 = $result;
				$pos_689 = $this->pos;
				if (($subres = $this->literal('MESSAGE')) !== \false) {
					$result["text"] .= $subres;
					$_696 = \true; break;
				}
				$result = $res_689;
				$this->setPos($pos_689);
				$_694 = \null;
				do {
					$res_691 = $result;
					$pos_691 = $this->pos;
					if (($subres = $this->literal('ACCEPT')) !== \false) {
						$result["text"] .= $subres;
						$_694 = \true; break;
					}
					$result = $res_691;
					$this->setPos($pos_691);
					if (($subres = $this->literal('REFUSE')) !== \false) {
						$result["text"] .= $subres;
						$_694 = \true; break;
					}
					$result = $res_691;
					$this->setPos($pos_691);
					$_694 = \false; break;
				}
				while(\false);
				if($_694 === \true) { $_696 = \true; break; }
				$result = $res_689;
				$this->setPos($pos_689);
				$_696 = \false; break;
			}
			while(\false);
			if($_696 === \false) { $_698 = \false; break; }
			$_698 = \true; break;
		}
		while(\false);
		if($_698 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_698 === \false) {
			$result = \array_pop($stack);
			$_702 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_702 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_702 = \false; break; }
		$_702 = \true; break;
	}
	while(\false);
	if($_702 === \true) { return $this->finalise($result); }
	if($_702 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_707 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_707 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_707 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_707 = \false; break; }
		$_707 = \true; break;
	}
	while(\false);
	if($_707 === \true) { return $this->finalise($result); }
	if($_707 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_712 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_712 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_712 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_712 = \false; break; }
		$_712 = \true; break;
	}
	while(\false);
	if($_712 === \true) { return $this->finalise($result); }
	if($_712 === \false) { return \false; }
}


/* StructDef: "STRUCT" _ structName:Identifier (_ field:Identifier)* _ "END" */
protected $match_StructDef_typestack = ['StructDef'];
function match_StructDef($stack = []) {
	$matchrule = 'StructDef';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_723 = \null;
	do {
		if (($subres = $this->literal('STRUCT')) !== \false) { $result["text"] .= $subres; }
		else { $_723 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_723 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "structName");
		}
		else { $_723 = \false; break; }
		while (\true) {
			$res_720 = $result;
			$pos_720 = $this->pos;
			$_719 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_719 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "field");
				}
				else { $_719 = \false; break; }
				$_719 = \true; break;
			}
			while(\false);
			if($_719 === \false) {
				$result = $res_720;
				$this->setPos($pos_720);
				unset($res_720, $pos_720);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_723 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_723 = \false; break; }
		$_723 = \true; break;
	}
	while(\false);
	if($_723 === \true) { return $this->finalise($result); }
	if($_723 === \false) { return \false; }
}


/* MakeStruct: "MAKE" _ structName:Identifier _ "(" _ args:ArgumentList? _ ")" */
protected $match_MakeStruct_typestack = ['MakeStruct'];
function match_MakeStruct($stack = []) {
	$matchrule = 'MakeStruct';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_734 = \null;
	do {
		if (($subres = $this->literal('MAKE')) !== \false) { $result["text"] .= $subres; }
		else { $_734 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_734 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "structName");
		}
		else { $_734 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_734 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_734 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_734 = \false; break; }
		$res_731 = $result;
		$pos_731 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_731;
			$this->setPos($pos_731);
			unset($res_731, $pos_731);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_734 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_734 = \false; break; }
		$_734 = \true; break;
	}
	while(\false);
	if($_734 === \true) { return $this->finalise($result); }
	if($_734 === \false) { return \false; }
}


/* CommandDecl: "COMMAND" _ head:Identifier ( _ "," _ tail:Identifier )* */
protected $match_CommandDecl_typestack = ['CommandDecl'];
function match_CommandDecl($stack = []) {
	$matchrule = 'CommandDecl';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_745 = \null;
	do {
		if (($subres = $this->literal('COMMAND')) !== \false) { $result["text"] .= $subres; }
		else { $_745 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_745 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_745 = \false; break; }
		while (\true) {
			$res_744 = $result;
			$pos_744 = $this->pos;
			$_743 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_743 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_743 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_743 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_743 = \false; break; }
				$_743 = \true; break;
			}
			while(\false);
			if($_743 === \false) {
				$result = $res_744;
				$this->setPos($pos_744);
				unset($res_744, $pos_744);
				break;
			}
		}
		$_745 = \true; break;
	}
	while(\false);
	if($_745 === \true) { return $this->finalise($result); }
	if($_745 === \false) { return \false; }
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
