<?php
namespace PESM\Parser;

class GeneratedParser extends \hafriedlander\Peg\Parser\Packrat {
/* Program: _ stmt:Statement (_ stmt:Statement)* */
protected $match_Program_typestack = ['Program'];
function match_Program($stack = []) {
	$matchrule = 'Program';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_6 = \null;
	do {
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_6 = \false; break; }
		$key = 'match_'.'Statement'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "stmt");
		}
		else { $_6 = \false; break; }
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
		$_6 = \true; break;
	}
	while(\false);
	if($_6 === \true) { return $this->finalise($result); }
	if($_6 === \false) { return \false; }
}


/* Statement: alt:CommandDecl _ | alt:StructDef _ | alt:FunctionDef _ | alt:IfStatement _ | alt:SwitchStatement _ | alt:DoWhileStatement _ | alt:RepeatUntilStatement _ | alt:WhileStatement _ | alt:ForeachInStmt _ | alt:ForeachRangeStmt _ | alt:InterruptWithVarStmt _ | alt:InterruptSimpleStmt _ | alt:ReturnStmt _ | alt:BreakStmt _ | alt:ContinueStmt _ | alt:LabelStmt _ | alt:GotoStmt _ | alt:Assignment _ */
protected $match_Statement_typestack = ['Statement'];
function match_Statement($stack = []) {
	$matchrule = 'Statement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_129 = \null;
	do {
		$res_8 = $result;
		$pos_8 = $this->pos;
		$_11 = \null;
		do {
			$key = 'match_'.'CommandDecl'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "alt");
			}
			else { $_11 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_11 = \false; break; }
			$_11 = \true; break;
		}
		while(\false);
		if($_11 === \true) { $_129 = \true; break; }
		$result = $res_8;
		$this->setPos($pos_8);
		$_127 = \null;
		do {
			$res_13 = $result;
			$pos_13 = $this->pos;
			$_16 = \null;
			do {
				$key = 'match_'.'StructDef'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "alt");
				}
				else { $_16 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_16 = \false; break; }
				$_16 = \true; break;
			}
			while(\false);
			if($_16 === \true) { $_127 = \true; break; }
			$result = $res_13;
			$this->setPos($pos_13);
			$_125 = \null;
			do {
				$res_18 = $result;
				$pos_18 = $this->pos;
				$_21 = \null;
				do {
					$key = 'match_'.'FunctionDef'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "alt");
					}
					else { $_21 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_21 = \false; break; }
					$_21 = \true; break;
				}
				while(\false);
				if($_21 === \true) { $_125 = \true; break; }
				$result = $res_18;
				$this->setPos($pos_18);
				$_123 = \null;
				do {
					$res_23 = $result;
					$pos_23 = $this->pos;
					$_26 = \null;
					do {
						$key = 'match_'.'IfStatement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "alt");
						}
						else { $_26 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_26 = \false; break; }
						$_26 = \true; break;
					}
					while(\false);
					if($_26 === \true) { $_123 = \true; break; }
					$result = $res_23;
					$this->setPos($pos_23);
					$_121 = \null;
					do {
						$res_28 = $result;
						$pos_28 = $this->pos;
						$_31 = \null;
						do {
							$key = 'match_'.'SwitchStatement'; $pos = $this->pos;
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
						if($_31 === \true) { $_121 = \true; break; }
						$result = $res_28;
						$this->setPos($pos_28);
						$_119 = \null;
						do {
							$res_33 = $result;
							$pos_33 = $this->pos;
							$_36 = \null;
							do {
								$key = 'match_'.'DoWhileStatement'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "alt");
								}
								else { $_36 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_36 = \false; break; }
								$_36 = \true; break;
							}
							while(\false);
							if($_36 === \true) { $_119 = \true; break; }
							$result = $res_33;
							$this->setPos($pos_33);
							$_117 = \null;
							do {
								$res_38 = $result;
								$pos_38 = $this->pos;
								$_41 = \null;
								do {
									$key = 'match_'.'RepeatUntilStatement'; $pos = $this->pos;
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
								if($_41 === \true) { $_117 = \true; break; }
								$result = $res_38;
								$this->setPos($pos_38);
								$_115 = \null;
								do {
									$res_43 = $result;
									$pos_43 = $this->pos;
									$_46 = \null;
									do {
										$key = 'match_'.'WhileStatement'; $pos = $this->pos;
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
									if($_46 === \true) { $_115 = \true; break; }
									$result = $res_43;
									$this->setPos($pos_43);
									$_113 = \null;
									do {
										$res_48 = $result;
										$pos_48 = $this->pos;
										$_51 = \null;
										do {
											$key = 'match_'.'ForeachInStmt'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres, "alt");
											}
											else { $_51 = \false; break; }
											$key = 'match_'.'_'; $pos = $this->pos;
											$subres = $this->packhas($key, $pos)
												? $this->packread($key, $pos)
												: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
											if ($subres !== \false) {
												$this->store($result, $subres);
											}
											else { $_51 = \false; break; }
											$_51 = \true; break;
										}
										while(\false);
										if($_51 === \true) { $_113 = \true; break; }
										$result = $res_48;
										$this->setPos($pos_48);
										$_111 = \null;
										do {
											$res_53 = $result;
											$pos_53 = $this->pos;
											$_56 = \null;
											do {
												$key = 'match_'.'ForeachRangeStmt'; $pos = $this->pos;
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
											if($_56 === \true) { $_111 = \true; break; }
											$result = $res_53;
											$this->setPos($pos_53);
											$_109 = \null;
											do {
												$res_58 = $result;
												$pos_58 = $this->pos;
												$_61 = \null;
												do {
													$key = 'match_'.'InterruptWithVarStmt'; $pos = $this->pos;
													$subres = $this->packhas($key, $pos)
														? $this->packread($key, $pos)
														: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
													if ($subres !== \false) {
														$this->store($result, $subres, "alt");
													}
													else { $_61 = \false; break; }
													$key = 'match_'.'_'; $pos = $this->pos;
													$subres = $this->packhas($key, $pos)
														? $this->packread($key, $pos)
														: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
													if ($subres !== \false) {
														$this->store($result, $subres);
													}
													else { $_61 = \false; break; }
													$_61 = \true; break;
												}
												while(\false);
												if($_61 === \true) { $_109 = \true; break; }
												$result = $res_58;
												$this->setPos($pos_58);
												$_107 = \null;
												do {
													$res_63 = $result;
													$pos_63 = $this->pos;
													$_66 = \null;
													do {
														$key = 'match_'.'InterruptSimpleStmt'; $pos = $this->pos;
														$subres = $this->packhas($key, $pos)
															? $this->packread($key, $pos)
															: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
														if ($subres !== \false) {
															$this->store($result, $subres, "alt");
														}
														else { $_66 = \false; break; }
														$key = 'match_'.'_'; $pos = $this->pos;
														$subres = $this->packhas($key, $pos)
															? $this->packread($key, $pos)
															: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
														if ($subres !== \false) {
															$this->store($result, $subres);
														}
														else { $_66 = \false; break; }
														$_66 = \true; break;
													}
													while(\false);
													if($_66 === \true) { $_107 = \true; break; }
													$result = $res_63;
													$this->setPos($pos_63);
													$_105 = \null;
													do {
														$res_68 = $result;
														$pos_68 = $this->pos;
														$_71 = \null;
														do {
															$key = 'match_'.'ReturnStmt'; $pos = $this->pos;
															$subres = $this->packhas($key, $pos)
																? $this->packread($key, $pos)
																: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
															if ($subres !== \false) {
																$this->store($result, $subres, "alt");
															}
															else { $_71 = \false; break; }
															$key = 'match_'.'_'; $pos = $this->pos;
															$subres = $this->packhas($key, $pos)
																? $this->packread($key, $pos)
																: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
															if ($subres !== \false) {
																$this->store($result, $subres);
															}
															else { $_71 = \false; break; }
															$_71 = \true; break;
														}
														while(\false);
														if($_71 === \true) { $_105 = \true; break; }
														$result = $res_68;
														$this->setPos($pos_68);
														$_103 = \null;
														do {
															$res_73 = $result;
															$pos_73 = $this->pos;
															$_76 = \null;
															do {
																$key = 'match_'.'BreakStmt'; $pos = $this->pos;
																$subres = $this->packhas($key, $pos)
																	? $this->packread($key, $pos)
																	: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																if ($subres !== \false) {
																	$this->store($result, $subres, "alt");
																}
																else { $_76 = \false; break; }
																$key = 'match_'.'_'; $pos = $this->pos;
																$subres = $this->packhas($key, $pos)
																	? $this->packread($key, $pos)
																	: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																if ($subres !== \false) {
																	$this->store($result, $subres);
																}
																else { $_76 = \false; break; }
																$_76 = \true; break;
															}
															while(\false);
															if($_76 === \true) { $_103 = \true; break; }
															$result = $res_73;
															$this->setPos($pos_73);
															$_101 = \null;
															do {
																$res_78 = $result;
																$pos_78 = $this->pos;
																$_81 = \null;
																do {
																	$key = 'match_'.'ContinueStmt'; $pos = $this->pos;
																	$subres = $this->packhas($key, $pos)
																		? $this->packread($key, $pos)
																		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																	if ($subres !== \false) {
																		$this->store($result, $subres, "alt");
																	}
																	else { $_81 = \false; break; }
																	$key = 'match_'.'_'; $pos = $this->pos;
																	$subres = $this->packhas($key, $pos)
																		? $this->packread($key, $pos)
																		: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																	if ($subres !== \false) {
																		$this->store($result, $subres);
																	}
																	else { $_81 = \false; break; }
																	$_81 = \true; break;
																}
																while(\false);
																if($_81 === \true) { $_101 = \true; break; }
																$result = $res_78;
																$this->setPos($pos_78);
																$_99 = \null;
																do {
																	$res_83 = $result;
																	$pos_83 = $this->pos;
																	$_86 = \null;
																	do {
																		$key = 'match_'.'LabelStmt'; $pos = $this->pos;
																		$subres = $this->packhas($key, $pos)
																			? $this->packread($key, $pos)
																			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																		if ($subres !== \false) {
																			$this->store($result, $subres, "alt");
																		}
																		else {
																			$_86 = \false; break;
																		}
																		$key = 'match_'.'_'; $pos = $this->pos;
																		$subres = $this->packhas($key, $pos)
																			? $this->packread($key, $pos)
																			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																		if ($subres !== \false) {
																			$this->store($result, $subres);
																		}
																		else {
																			$_86 = \false; break;
																		}
																		$_86 = \true; break;
																	}
																	while(\false);
																	if($_86 === \true) { $_99 = \true; break; }
																	$result = $res_83;
																	$this->setPos($pos_83);
																	$_97 = \null;
																	do {
																		$res_88 = $result;
																		$pos_88 = $this->pos;
																		$_91 = \null;
																		do {
																			$key = 'match_'.'GotoStmt'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres, "alt");
																			}
																			else {
																				$_91 = \false; break;
																			}
																			$key = 'match_'.'_'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres);
																			}
																			else {
																				$_91 = \false; break;
																			}
																			$_91 = \true; break;
																		}
																		while(\false);
																		if($_91 === \true) { $_97 = \true; break; }
																		$result = $res_88;
																		$this->setPos($pos_88);
																		$_95 = \null;
																		do {
																			$key = 'match_'.'Assignment'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres, "alt");
																			}
																			else {
																				$_95 = \false; break;
																			}
																			$key = 'match_'.'_'; $pos = $this->pos;
																			$subres = $this->packhas($key, $pos)
																				? $this->packread($key, $pos)
																				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
																			if ($subres !== \false) {
																				$this->store($result, $subres);
																			}
																			else {
																				$_95 = \false; break;
																			}
																			$_95 = \true; break;
																		}
																		while(\false);
																		if($_95 === \true) { $_97 = \true; break; }
																		$result = $res_88;
																		$this->setPos($pos_88);
																		$_97 = \false; break;
																	}
																	while(\false);
																	if($_97 === \true) { $_99 = \true; break; }
																	$result = $res_83;
																	$this->setPos($pos_83);
																	$_99 = \false; break;
																}
																while(\false);
																if($_99 === \true) { $_101 = \true; break; }
																$result = $res_78;
																$this->setPos($pos_78);
																$_101 = \false; break;
															}
															while(\false);
															if($_101 === \true) { $_103 = \true; break; }
															$result = $res_73;
															$this->setPos($pos_73);
															$_103 = \false; break;
														}
														while(\false);
														if($_103 === \true) { $_105 = \true; break; }
														$result = $res_68;
														$this->setPos($pos_68);
														$_105 = \false; break;
													}
													while(\false);
													if($_105 === \true) { $_107 = \true; break; }
													$result = $res_63;
													$this->setPos($pos_63);
													$_107 = \false; break;
												}
												while(\false);
												if($_107 === \true) { $_109 = \true; break; }
												$result = $res_58;
												$this->setPos($pos_58);
												$_109 = \false; break;
											}
											while(\false);
											if($_109 === \true) { $_111 = \true; break; }
											$result = $res_53;
											$this->setPos($pos_53);
											$_111 = \false; break;
										}
										while(\false);
										if($_111 === \true) { $_113 = \true; break; }
										$result = $res_48;
										$this->setPos($pos_48);
										$_113 = \false; break;
									}
									while(\false);
									if($_113 === \true) { $_115 = \true; break; }
									$result = $res_43;
									$this->setPos($pos_43);
									$_115 = \false; break;
								}
								while(\false);
								if($_115 === \true) { $_117 = \true; break; }
								$result = $res_38;
								$this->setPos($pos_38);
								$_117 = \false; break;
							}
							while(\false);
							if($_117 === \true) { $_119 = \true; break; }
							$result = $res_33;
							$this->setPos($pos_33);
							$_119 = \false; break;
						}
						while(\false);
						if($_119 === \true) { $_121 = \true; break; }
						$result = $res_28;
						$this->setPos($pos_28);
						$_121 = \false; break;
					}
					while(\false);
					if($_121 === \true) { $_123 = \true; break; }
					$result = $res_23;
					$this->setPos($pos_23);
					$_123 = \false; break;
				}
				while(\false);
				if($_123 === \true) { $_125 = \true; break; }
				$result = $res_18;
				$this->setPos($pos_18);
				$_125 = \false; break;
			}
			while(\false);
			if($_125 === \true) { $_127 = \true; break; }
			$result = $res_13;
			$this->setPos($pos_13);
			$_127 = \false; break;
		}
		while(\false);
		if($_127 === \true) { $_129 = \true; break; }
		$result = $res_8;
		$this->setPos($pos_8);
		$_129 = \false; break;
	}
	while(\false);
	if($_129 === \true) { return $this->finalise($result); }
	if($_129 === \false) { return \false; }
}


/* FunctionDef: "FUNCTION" _ funcName:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END" */
protected $match_FunctionDef_typestack = ['FunctionDef'];
function match_FunctionDef($stack = []) {
	$matchrule = 'FunctionDef';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_143 = \null;
	do {
		if (($subres = $this->literal('FUNCTION')) !== \false) { $result["text"] .= $subres; }
		else { $_143 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_143 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "funcName");
		}
		else { $_143 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_143 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_143 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_143 = \false; break; }
		$res_137 = $result;
		$pos_137 = $this->pos;
		$key = 'match_'.'ParameterList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "params");
		}
		else {
			$result = $res_137;
			$this->setPos($pos_137);
			unset($res_137, $pos_137);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_143 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_143 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_143 = \false; break; }
		$count_141 = 0;
		while (\true) {
			$res_141 = $result;
			$pos_141 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_141;
				$this->setPos($pos_141);
				unset($res_141, $pos_141);
				break;
			}
			$count_141++;
		}
		if ($count_141 >= 1) {  }
		else { $_143 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_143 = \false; break; }
		$_143 = \true; break;
	}
	while(\false);
	if($_143 === \true) { return $this->finalise($result); }
	if($_143 === \false) { return \false; }
}


/* ParameterList: head:Identifier ( _ "," _ tail:Identifier )* */
protected $match_ParameterList_typestack = ['ParameterList'];
function match_ParameterList($stack = []) {
	$matchrule = 'ParameterList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_152 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_152 = \false; break; }
		while (\true) {
			$res_151 = $result;
			$pos_151 = $this->pos;
			$_150 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_150 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_150 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_150 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_150 = \false; break; }
				$_150 = \true; break;
			}
			while(\false);
			if($_150 === \false) {
				$result = $res_151;
				$this->setPos($pos_151);
				unset($res_151, $pos_151);
				break;
			}
		}
		$_152 = \true; break;
	}
	while(\false);
	if($_152 === \true) { return $this->finalise($result); }
	if($_152 === \false) { return \false; }
}


/* ReturnStmt: "RETURN" !(_ "=") ( _ expr:Expression )? */
protected $match_ReturnStmt_typestack = ['ReturnStmt'];
function match_ReturnStmt($stack = []) {
	$matchrule = 'ReturnStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_163 = \null;
	do {
		if (($subres = $this->literal('RETURN')) !== \false) { $result["text"] .= $subres; }
		else { $_163 = \false; break; }
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
			if (\substr($this->string, $this->pos, 1) === '=') {
				$this->addPos(1);
				$result["text"] .= '=';
			}
			else { $_157 = \false; break; }
			$_157 = \true; break;
		}
		while(\false);
		if($_157 === \true) {
			$result = $res_158;
			$this->setPos($pos_158);
			$_163 = \false; break;
		}
		if($_157 === \false) {
			$result = $res_158;
			$this->setPos($pos_158);
		}
		$res_162 = $result;
		$pos_162 = $this->pos;
		$_161 = \null;
		do {
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_161 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_161 = \false; break; }
			$_161 = \true; break;
		}
		while(\false);
		if($_161 === \false) {
			$result = $res_162;
			$this->setPos($pos_162);
			unset($res_162, $pos_162);
		}
		$_163 = \true; break;
	}
	while(\false);
	if($_163 === \true) { return $this->finalise($result); }
	if($_163 === \false) { return \false; }
}


/* Assignment: var:Postfix _ "=" _ expr:Expression */
protected $match_Assignment_typestack = ['Assignment'];
function match_Assignment($stack = []) {
	$matchrule = 'Assignment';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_170 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_170 = \false; break; }
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
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_170 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_170 = \false; break; }
		$_170 = \true; break;
	}
	while(\false);
	if($_170 === \true) { return $this->finalise($result); }
	if($_170 === \false) { return \false; }
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
	$_180 = \null;
	do {
		$key = 'match_'.'Comparison'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_180 = \false; break; }
		while (\true) {
			$res_179 = $result;
			$pos_179 = $this->pos;
			$_178 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_178 = \false; break; }
				$key = 'match_'.'LogicalOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_178 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_178 = \false; break; }
				$key = 'match_'.'Comparison'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_178 = \false; break; }
				$_178 = \true; break;
			}
			while(\false);
			if($_178 === \false) {
				$result = $res_179;
				$this->setPos($pos_179);
				unset($res_179, $pos_179);
				break;
			}
		}
		$_180 = \true; break;
	}
	while(\false);
	if($_180 === \true) { return $this->finalise($result); }
	if($_180 === \false) { return \false; }
}


/* LogicalOp: "AND" | "OR" */
protected $match_LogicalOp_typestack = ['LogicalOp'];
function match_LogicalOp($stack = []) {
	$matchrule = 'LogicalOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_185 = \null;
	do {
		$res_182 = $result;
		$pos_182 = $this->pos;
		if (($subres = $this->literal('AND')) !== \false) {
			$result["text"] .= $subres;
			$_185 = \true; break;
		}
		$result = $res_182;
		$this->setPos($pos_182);
		if (($subres = $this->literal('OR')) !== \false) {
			$result["text"] .= $subres;
			$_185 = \true; break;
		}
		$result = $res_182;
		$this->setPos($pos_182);
		$_185 = \false; break;
	}
	while(\false);
	if($_185 === \true) { return $this->finalise($result); }
	if($_185 === \false) { return \false; }
}


/* Comparison: left:Additive (_ op:CompOp _ right:Additive)* */
protected $match_Comparison_typestack = ['Comparison'];
function match_Comparison($stack = []) {
	$matchrule = 'Comparison';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_194 = \null;
	do {
		$key = 'match_'.'Additive'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_194 = \false; break; }
		while (\true) {
			$res_193 = $result;
			$pos_193 = $this->pos;
			$_192 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_192 = \false; break; }
				$key = 'match_'.'CompOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_192 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_192 = \false; break; }
				$key = 'match_'.'Additive'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_192 = \false; break; }
				$_192 = \true; break;
			}
			while(\false);
			if($_192 === \false) {
				$result = $res_193;
				$this->setPos($pos_193);
				unset($res_193, $pos_193);
				break;
			}
		}
		$_194 = \true; break;
	}
	while(\false);
	if($_194 === \true) { return $this->finalise($result); }
	if($_194 === \false) { return \false; }
}


/* CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<" */
protected $match_CompOp_typestack = ['CompOp'];
function match_CompOp($stack = []) {
	$matchrule = 'CompOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_215 = \null;
	do {
		$res_196 = $result;
		$pos_196 = $this->pos;
		if (($subres = $this->literal('==')) !== \false) {
			$result["text"] .= $subres;
			$_215 = \true; break;
		}
		$result = $res_196;
		$this->setPos($pos_196);
		$_213 = \null;
		do {
			$res_198 = $result;
			$pos_198 = $this->pos;
			if (($subres = $this->literal('!=')) !== \false) {
				$result["text"] .= $subres;
				$_213 = \true; break;
			}
			$result = $res_198;
			$this->setPos($pos_198);
			$_211 = \null;
			do {
				$res_200 = $result;
				$pos_200 = $this->pos;
				if (($subres = $this->literal('>=')) !== \false) {
					$result["text"] .= $subres;
					$_211 = \true; break;
				}
				$result = $res_200;
				$this->setPos($pos_200);
				$_209 = \null;
				do {
					$res_202 = $result;
					$pos_202 = $this->pos;
					if (($subres = $this->literal('<=')) !== \false) {
						$result["text"] .= $subres;
						$_209 = \true; break;
					}
					$result = $res_202;
					$this->setPos($pos_202);
					$_207 = \null;
					do {
						$res_204 = $result;
						$pos_204 = $this->pos;
						if (\substr($this->string, $this->pos, 1) === '>') {
							$this->addPos(1);
							$result["text"] .= '>';
							$_207 = \true; break;
						}
						$result = $res_204;
						$this->setPos($pos_204);
						if (\substr($this->string, $this->pos, 1) === '<') {
							$this->addPos(1);
							$result["text"] .= '<';
							$_207 = \true; break;
						}
						$result = $res_204;
						$this->setPos($pos_204);
						$_207 = \false; break;
					}
					while(\false);
					if($_207 === \true) { $_209 = \true; break; }
					$result = $res_202;
					$this->setPos($pos_202);
					$_209 = \false; break;
				}
				while(\false);
				if($_209 === \true) { $_211 = \true; break; }
				$result = $res_200;
				$this->setPos($pos_200);
				$_211 = \false; break;
			}
			while(\false);
			if($_211 === \true) { $_213 = \true; break; }
			$result = $res_198;
			$this->setPos($pos_198);
			$_213 = \false; break;
		}
		while(\false);
		if($_213 === \true) { $_215 = \true; break; }
		$result = $res_196;
		$this->setPos($pos_196);
		$_215 = \false; break;
	}
	while(\false);
	if($_215 === \true) { return $this->finalise($result); }
	if($_215 === \false) { return \false; }
}


/* Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)* */
protected $match_Additive_typestack = ['Additive'];
function match_Additive($stack = []) {
	$matchrule = 'Additive';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_224 = \null;
	do {
		$key = 'match_'.'Multiplicative'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
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
				$key = 'match_'.'AddOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_222 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_222 = \false; break; }
				$key = 'match_'.'Multiplicative'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
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


/* AddOp: "+" | "-" */
protected $match_AddOp_typestack = ['AddOp'];
function match_AddOp($stack = []) {
	$matchrule = 'AddOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_229 = \null;
	do {
		$res_226 = $result;
		$pos_226 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '+') {
			$this->addPos(1);
			$result["text"] .= '+';
			$_229 = \true; break;
		}
		$result = $res_226;
		$this->setPos($pos_226);
		if (\substr($this->string, $this->pos, 1) === '-') {
			$this->addPos(1);
			$result["text"] .= '-';
			$_229 = \true; break;
		}
		$result = $res_226;
		$this->setPos($pos_226);
		$_229 = \false; break;
	}
	while(\false);
	if($_229 === \true) { return $this->finalise($result); }
	if($_229 === \false) { return \false; }
}


/* Multiplicative: left:Postfix (_ op:MulOp _ right:Postfix)* */
protected $match_Multiplicative_typestack = ['Multiplicative'];
function match_Multiplicative($stack = []) {
	$matchrule = 'Multiplicative';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_238 = \null;
	do {
		$key = 'match_'.'Postfix'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "left");
		}
		else { $_238 = \false; break; }
		while (\true) {
			$res_237 = $result;
			$pos_237 = $this->pos;
			$_236 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_236 = \false; break; }
				$key = 'match_'.'MulOp'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "op");
				}
				else { $_236 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_236 = \false; break; }
				$key = 'match_'.'Postfix'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "right");
				}
				else { $_236 = \false; break; }
				$_236 = \true; break;
			}
			while(\false);
			if($_236 === \false) {
				$result = $res_237;
				$this->setPos($pos_237);
				unset($res_237, $pos_237);
				break;
			}
		}
		$_238 = \true; break;
	}
	while(\false);
	if($_238 === \true) { return $this->finalise($result); }
	if($_238 === \false) { return \false; }
}


/* MulOp: "*" | "/" | "%" */
protected $match_MulOp_typestack = ['MulOp'];
function match_MulOp($stack = []) {
	$matchrule = 'MulOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_247 = \null;
	do {
		$res_240 = $result;
		$pos_240 = $this->pos;
		if (\substr($this->string, $this->pos, 1) === '*') {
			$this->addPos(1);
			$result["text"] .= '*';
			$_247 = \true; break;
		}
		$result = $res_240;
		$this->setPos($pos_240);
		$_245 = \null;
		do {
			$res_242 = $result;
			$pos_242 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '/') {
				$this->addPos(1);
				$result["text"] .= '/';
				$_245 = \true; break;
			}
			$result = $res_242;
			$this->setPos($pos_242);
			if (\substr($this->string, $this->pos, 1) === '%') {
				$this->addPos(1);
				$result["text"] .= '%';
				$_245 = \true; break;
			}
			$result = $res_242;
			$this->setPos($pos_242);
			$_245 = \false; break;
		}
		while(\false);
		if($_245 === \true) { $_247 = \true; break; }
		$result = $res_240;
		$this->setPos($pos_240);
		$_247 = \false; break;
	}
	while(\false);
	if($_247 === \true) { return $this->finalise($result); }
	if($_247 === \false) { return \false; }
}


/* Postfix: base:Unary (_ "[" _ index:Expression _ "]" | _ "." _ prop:Identifier)* */
protected $match_Postfix_typestack = ['Postfix'];
function match_Postfix($stack = []) {
	$matchrule = 'Postfix';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_269 = \null;
	do {
		$key = 'match_'.'Unary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "base");
		}
		else { $_269 = \false; break; }
		while (\true) {
			$res_268 = $result;
			$pos_268 = $this->pos;
			$_267 = \null;
			do {
				$_265 = \null;
				do {
					$res_250 = $result;
					$pos_250 = $this->pos;
					$_257 = \null;
					do {
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_257 = \false; break; }
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
						$key = 'match_'.'Expression'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "index");
						}
						else { $_257 = \false; break; }
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
					if($_257 === \true) { $_265 = \true; break; }
					$result = $res_250;
					$this->setPos($pos_250);
					$_263 = \null;
					do {
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_263 = \false; break; }
						if (\substr($this->string, $this->pos, 1) === '.') {
							$this->addPos(1);
							$result["text"] .= '.';
						}
						else { $_263 = \false; break; }
						$key = 'match_'.'_'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) { $this->store($result, $subres); }
						else { $_263 = \false; break; }
						$key = 'match_'.'Identifier'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "prop");
						}
						else { $_263 = \false; break; }
						$_263 = \true; break;
					}
					while(\false);
					if($_263 === \true) { $_265 = \true; break; }
					$result = $res_250;
					$this->setPos($pos_250);
					$_265 = \false; break;
				}
				while(\false);
				if($_265 === \false) { $_267 = \false; break; }
				$_267 = \true; break;
			}
			while(\false);
			if($_267 === \false) {
				$result = $res_268;
				$this->setPos($pos_268);
				unset($res_268, $pos_268);
				break;
			}
		}
		$_269 = \true; break;
	}
	while(\false);
	if($_269 === \true) { return $this->finalise($result); }
	if($_269 === \false) { return \false; }
}


/* Unary: op:UnaryOp _ expr:Unary | val:Primary */
protected $match_Unary_typestack = ['Unary'];
function match_Unary($stack = []) {
	$matchrule = 'Unary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_278 = \null;
	do {
		$res_271 = $result;
		$pos_271 = $this->pos;
		$_275 = \null;
		do {
			$key = 'match_'.'UnaryOp'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "op");
			}
			else { $_275 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_275 = \false; break; }
			$key = 'match_'.'Unary'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "expr");
			}
			else { $_275 = \false; break; }
			$_275 = \true; break;
		}
		while(\false);
		if($_275 === \true) { $_278 = \true; break; }
		$result = $res_271;
		$this->setPos($pos_271);
		$key = 'match_'.'Primary'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_278 = \true; break;
		}
		$result = $res_271;
		$this->setPos($pos_271);
		$_278 = \false; break;
	}
	while(\false);
	if($_278 === \true) { return $this->finalise($result); }
	if($_278 === \false) { return \false; }
}


/* UnaryOp: "NOT" | "-" | "+" */
protected $match_UnaryOp_typestack = ['UnaryOp'];
function match_UnaryOp($stack = []) {
	$matchrule = 'UnaryOp';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_287 = \null;
	do {
		$res_280 = $result;
		$pos_280 = $this->pos;
		if (($subres = $this->literal('NOT')) !== \false) {
			$result["text"] .= $subres;
			$_287 = \true; break;
		}
		$result = $res_280;
		$this->setPos($pos_280);
		$_285 = \null;
		do {
			$res_282 = $result;
			$pos_282 = $this->pos;
			if (\substr($this->string, $this->pos, 1) === '-') {
				$this->addPos(1);
				$result["text"] .= '-';
				$_285 = \true; break;
			}
			$result = $res_282;
			$this->setPos($pos_282);
			if (\substr($this->string, $this->pos, 1) === '+') {
				$this->addPos(1);
				$result["text"] .= '+';
				$_285 = \true; break;
			}
			$result = $res_282;
			$this->setPos($pos_282);
			$_285 = \false; break;
		}
		while(\false);
		if($_285 === \true) { $_287 = \true; break; }
		$result = $res_280;
		$this->setPos($pos_280);
		$_287 = \false; break;
	}
	while(\false);
	if($_287 === \true) { return $this->finalise($result); }
	if($_287 === \false) { return \false; }
}


/* Primary: val:MakeStruct | val:ObjectLiteral | val:ArrayLiteral | val:String | val:Number | val:IdentifierOrCall | "(" _ val:Expression _ ")" */
protected $match_Primary_typestack = ['Primary'];
function match_Primary($stack = []) {
	$matchrule = 'Primary';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_318 = \null;
	do {
		$res_289 = $result;
		$pos_289 = $this->pos;
		$key = 'match_'.'MakeStruct'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_318 = \true; break;
		}
		$result = $res_289;
		$this->setPos($pos_289);
		$_316 = \null;
		do {
			$res_291 = $result;
			$pos_291 = $this->pos;
			$key = 'match_'.'ObjectLiteral'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "val");
				$_316 = \true; break;
			}
			$result = $res_291;
			$this->setPos($pos_291);
			$_314 = \null;
			do {
				$res_293 = $result;
				$pos_293 = $this->pos;
				$key = 'match_'.'ArrayLiteral'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "val");
					$_314 = \true; break;
				}
				$result = $res_293;
				$this->setPos($pos_293);
				$_312 = \null;
				do {
					$res_295 = $result;
					$pos_295 = $this->pos;
					$key = 'match_'.'String'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "val");
						$_312 = \true; break;
					}
					$result = $res_295;
					$this->setPos($pos_295);
					$_310 = \null;
					do {
						$res_297 = $result;
						$pos_297 = $this->pos;
						$key = 'match_'.'Number'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "val");
							$_310 = \true; break;
						}
						$result = $res_297;
						$this->setPos($pos_297);
						$_308 = \null;
						do {
							$res_299 = $result;
							$pos_299 = $this->pos;
							$key = 'match_'.'IdentifierOrCall'; $pos = $this->pos;
							$subres = $this->packhas($key, $pos)
								? $this->packread($key, $pos)
								: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
							if ($subres !== \false) {
								$this->store($result, $subres, "val");
								$_308 = \true; break;
							}
							$result = $res_299;
							$this->setPos($pos_299);
							$_306 = \null;
							do {
								if (\substr($this->string, $this->pos, 1) === '(') {
									$this->addPos(1);
									$result["text"] .= '(';
								}
								else { $_306 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_306 = \false; break; }
								$key = 'match_'.'Expression'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres, "val");
								}
								else { $_306 = \false; break; }
								$key = 'match_'.'_'; $pos = $this->pos;
								$subres = $this->packhas($key, $pos)
									? $this->packread($key, $pos)
									: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
								if ($subres !== \false) {
									$this->store($result, $subres);
								}
								else { $_306 = \false; break; }
								if (\substr($this->string, $this->pos, 1) === ')') {
									$this->addPos(1);
									$result["text"] .= ')';
								}
								else { $_306 = \false; break; }
								$_306 = \true; break;
							}
							while(\false);
							if($_306 === \true) { $_308 = \true; break; }
							$result = $res_299;
							$this->setPos($pos_299);
							$_308 = \false; break;
						}
						while(\false);
						if($_308 === \true) { $_310 = \true; break; }
						$result = $res_297;
						$this->setPos($pos_297);
						$_310 = \false; break;
					}
					while(\false);
					if($_310 === \true) { $_312 = \true; break; }
					$result = $res_295;
					$this->setPos($pos_295);
					$_312 = \false; break;
				}
				while(\false);
				if($_312 === \true) { $_314 = \true; break; }
				$result = $res_293;
				$this->setPos($pos_293);
				$_314 = \false; break;
			}
			while(\false);
			if($_314 === \true) { $_316 = \true; break; }
			$result = $res_291;
			$this->setPos($pos_291);
			$_316 = \false; break;
		}
		while(\false);
		if($_316 === \true) { $_318 = \true; break; }
		$result = $res_289;
		$this->setPos($pos_289);
		$_318 = \false; break;
	}
	while(\false);
	if($_318 === \true) { return $this->finalise($result); }
	if($_318 === \false) { return \false; }
}


/* IdentifierOrCall: id:Identifier _ "(" _ args:ExpressionList? _ ")" | val:Identifier */
protected $match_IdentifierOrCall_typestack = ['IdentifierOrCall'];
function match_IdentifierOrCall($stack = []) {
	$matchrule = 'IdentifierOrCall';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_331 = \null;
	do {
		$res_320 = $result;
		$pos_320 = $this->pos;
		$_328 = \null;
		do {
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "id");
			}
			else { $_328 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_328 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '(') {
				$this->addPos(1);
				$result["text"] .= '(';
			}
			else { $_328 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_328 = \false; break; }
			$res_325 = $result;
			$pos_325 = $this->pos;
			$key = 'match_'.'ExpressionList'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "args");
			}
			else {
				$result = $res_325;
				$this->setPos($pos_325);
				unset($res_325, $pos_325);
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_328 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ')') {
				$this->addPos(1);
				$result["text"] .= ')';
			}
			else { $_328 = \false; break; }
			$_328 = \true; break;
		}
		while(\false);
		if($_328 === \true) { $_331 = \true; break; }
		$result = $res_320;
		$this->setPos($pos_320);
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
			$_331 = \true; break;
		}
		$result = $res_320;
		$this->setPos($pos_320);
		$_331 = \false; break;
	}
	while(\false);
	if($_331 === \true) { return $this->finalise($result); }
	if($_331 === \false) { return \false; }
}


/* ExpressionList: head:Expression ( _ "," _ tail:Expression )* */
protected $match_ExpressionList_typestack = ['ExpressionList'];
function match_ExpressionList($stack = []) {
	$matchrule = 'ExpressionList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_340 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_340 = \false; break; }
		while (\true) {
			$res_339 = $result;
			$pos_339 = $this->pos;
			$_338 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_338 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_338 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_338 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_338 = \false; break; }
				$_338 = \true; break;
			}
			while(\false);
			if($_338 === \false) {
				$result = $res_339;
				$this->setPos($pos_339);
				unset($res_339, $pos_339);
				break;
			}
		}
		$_340 = \true; break;
	}
	while(\false);
	if($_340 === \true) { return $this->finalise($result); }
	if($_340 === \false) { return \false; }
}


/* ArgumentList: head:Argument ( _ "," _ tail:Argument )* */
protected $match_ArgumentList_typestack = ['ArgumentList'];
function match_ArgumentList($stack = []) {
	$matchrule = 'ArgumentList';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_349 = \null;
	do {
		$key = 'match_'.'Argument'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_349 = \false; break; }
		while (\true) {
			$res_348 = $result;
			$pos_348 = $this->pos;
			$_347 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_347 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_347 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_347 = \false; break; }
				$key = 'match_'.'Argument'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_347 = \false; break; }
				$_347 = \true; break;
			}
			while(\false);
			if($_347 === \false) {
				$result = $res_348;
				$this->setPos($pos_348);
				unset($res_348, $pos_348);
				break;
			}
		}
		$_349 = \true; break;
	}
	while(\false);
	if($_349 === \true) { return $this->finalise($result); }
	if($_349 === \false) { return \false; }
}


/* Argument: argName:Identifier _ ":" _ value:Expression | value:Expression */
protected $match_Argument_typestack = ['Argument'];
function match_Argument($stack = []) {
	$matchrule = 'Argument';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_360 = \null;
	do {
		$res_351 = $result;
		$pos_351 = $this->pos;
		$_357 = \null;
		do {
			$key = 'match_'.'Identifier'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "argName");
			}
			else { $_357 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_357 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === ':') {
				$this->addPos(1);
				$result["text"] .= ':';
			}
			else { $_357 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_357 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "value");
			}
			else { $_357 = \false; break; }
			$_357 = \true; break;
		}
		while(\false);
		if($_357 === \true) { $_360 = \true; break; }
		$result = $res_351;
		$this->setPos($pos_351);
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
			$_360 = \true; break;
		}
		$result = $res_351;
		$this->setPos($pos_351);
		$_360 = \false; break;
	}
	while(\false);
	if($_360 === \true) { return $this->finalise($result); }
	if($_360 === \false) { return \false; }
}


/* ArrayLiteral: "[" _ elems:ArrayElements? _ "]" */
protected $match_ArrayLiteral_typestack = ['ArrayLiteral'];
function match_ArrayLiteral($stack = []) {
	$matchrule = 'ArrayLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_367 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '[') {
			$this->addPos(1);
			$result["text"] .= '[';
		}
		else { $_367 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_367 = \false; break; }
		$res_364 = $result;
		$pos_364 = $this->pos;
		$key = 'match_'.'ArrayElements'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "elems");
		}
		else {
			$result = $res_364;
			$this->setPos($pos_364);
			unset($res_364, $pos_364);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_367 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ']') {
			$this->addPos(1);
			$result["text"] .= ']';
		}
		else { $_367 = \false; break; }
		$_367 = \true; break;
	}
	while(\false);
	if($_367 === \true) { return $this->finalise($result); }
	if($_367 === \false) { return \false; }
}


/* ArrayElements: head:Expression ( _ "," _ tail:Expression )* */
protected $match_ArrayElements_typestack = ['ArrayElements'];
function match_ArrayElements($stack = []) {
	$matchrule = 'ArrayElements';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_376 = \null;
	do {
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_376 = \false; break; }
		while (\true) {
			$res_375 = $result;
			$pos_375 = $this->pos;
			$_374 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_374 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_374 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_374 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_374 = \false; break; }
				$_374 = \true; break;
			}
			while(\false);
			if($_374 === \false) {
				$result = $res_375;
				$this->setPos($pos_375);
				unset($res_375, $pos_375);
				break;
			}
		}
		$_376 = \true; break;
	}
	while(\false);
	if($_376 === \true) { return $this->finalise($result); }
	if($_376 === \false) { return \false; }
}


/* ObjectLiteral: "{" _ pairs:ObjectPairs? _ "}" */
protected $match_ObjectLiteral_typestack = ['ObjectLiteral'];
function match_ObjectLiteral($stack = []) {
	$matchrule = 'ObjectLiteral';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_383 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '{') {
			$this->addPos(1);
			$result["text"] .= '{';
		}
		else { $_383 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_383 = \false; break; }
		$res_380 = $result;
		$pos_380 = $this->pos;
		$key = 'match_'.'ObjectPairs'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "pairs");
		}
		else {
			$result = $res_380;
			$this->setPos($pos_380);
			unset($res_380, $pos_380);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_383 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '}') {
			$this->addPos(1);
			$result["text"] .= '}';
		}
		else { $_383 = \false; break; }
		$_383 = \true; break;
	}
	while(\false);
	if($_383 === \true) { return $this->finalise($result); }
	if($_383 === \false) { return \false; }
}


/* ObjectPairs: head:ObjectPair ( _ "," _ tail:ObjectPair )* */
protected $match_ObjectPairs_typestack = ['ObjectPairs'];
function match_ObjectPairs($stack = []) {
	$matchrule = 'ObjectPairs';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_392 = \null;
	do {
		$key = 'match_'.'ObjectPair'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_392 = \false; break; }
		while (\true) {
			$res_391 = $result;
			$pos_391 = $this->pos;
			$_390 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_390 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_390 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_390 = \false; break; }
				$key = 'match_'.'ObjectPair'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_390 = \false; break; }
				$_390 = \true; break;
			}
			while(\false);
			if($_390 === \false) {
				$result = $res_391;
				$this->setPos($pos_391);
				unset($res_391, $pos_391);
				break;
			}
		}
		$_392 = \true; break;
	}
	while(\false);
	if($_392 === \true) { return $this->finalise($result); }
	if($_392 === \false) { return \false; }
}


/* ObjectPair: key:String _ ":" _ value:Expression */
protected $match_ObjectPair_typestack = ['ObjectPair'];
function match_ObjectPair($stack = []) {
	$matchrule = 'ObjectPair';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_399 = \null;
	do {
		$key = 'match_'.'String'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "key");
		}
		else { $_399 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_399 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_399 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_399 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "value");
		}
		else { $_399 = \false; break; }
		$_399 = \true; break;
	}
	while(\false);
	if($_399 === \true) { return $this->finalise($result); }
	if($_399 === \false) { return \false; }
}


/* String: '"' /[^"]{0,}/ '"' */
protected $match_String_typestack = ['String'];
function match_String($stack = []) {
	$matchrule = 'String';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_404 = \null;
	do {
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_404 = \false; break; }
		if (($subres = $this->rx('/[^"]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_404 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '"') {
			$this->addPos(1);
			$result["text"] .= '"';
		}
		else { $_404 = \false; break; }
		$_404 = \true; break;
	}
	while(\false);
	if($_404 === \true) { return $this->finalise($result); }
	if($_404 === \false) { return \false; }
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
	$_409 = \null;
	do {
		$res_407 = $result;
		$pos_407 = $this->pos;
		$key = 'match_'.'Keyword'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres);
			$result = $res_407;
			$this->setPos($pos_407);
			$_409 = \false; break;
		}
		else {
			$result = $res_407;
			$this->setPos($pos_407);
		}
		if (($subres = $this->rx('/[a-zA-Z_][a-zA-Z0-9_]{0,}/')) !== \false) { $result["text"] .= $subres; }
		else { $_409 = \false; break; }
		$_409 = \true; break;
	}
	while(\false);
	if($_409 === \true) { return $this->finalise($result); }
	if($_409 === \false) { return \false; }
}


/* Keyword: ("COMMAND" | "STRUCT" | "MAKE" | "GOTO" | "BEGIN" | "WHILE" | "DO" | "REPEAT" | "UNTIL" | "FUNCTION" | "RETURN" | "FOREACH" | "MESSAGE" | "ACCEPT" | "REFUSE" | "INPUT" | "SWITCH" | "CASE" | "DEFAULT" | "ELSE" | "AND" | "OR" | "NOT" | "END" | "IF" | "TO" | "IN" | "BREAK" | "CONTINUE") !(/[a-zA-Z0-9_]/) */
protected $match_Keyword_typestack = ['Keyword'];
function match_Keyword($stack = []) {
	$matchrule = 'Keyword';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_529 = \null;
	do {
		$_524 = \null;
		do {
			$_522 = \null;
			do {
				$res_411 = $result;
				$pos_411 = $this->pos;
				if (($subres = $this->literal('COMMAND')) !== \false) {
					$result["text"] .= $subres;
					$_522 = \true; break;
				}
				$result = $res_411;
				$this->setPos($pos_411);
				$_520 = \null;
				do {
					$res_413 = $result;
					$pos_413 = $this->pos;
					if (($subres = $this->literal('STRUCT')) !== \false) {
						$result["text"] .= $subres;
						$_520 = \true; break;
					}
					$result = $res_413;
					$this->setPos($pos_413);
					$_518 = \null;
					do {
						$res_415 = $result;
						$pos_415 = $this->pos;
						if (($subres = $this->literal('MAKE')) !== \false) {
							$result["text"] .= $subres;
							$_518 = \true; break;
						}
						$result = $res_415;
						$this->setPos($pos_415);
						$_516 = \null;
						do {
							$res_417 = $result;
							$pos_417 = $this->pos;
							if (($subres = $this->literal('GOTO')) !== \false) {
								$result["text"] .= $subres;
								$_516 = \true; break;
							}
							$result = $res_417;
							$this->setPos($pos_417);
							$_514 = \null;
							do {
								$res_419 = $result;
								$pos_419 = $this->pos;
								if (($subres = $this->literal('BEGIN')) !== \false) {
									$result["text"] .= $subres;
									$_514 = \true; break;
								}
								$result = $res_419;
								$this->setPos($pos_419);
								$_512 = \null;
								do {
									$res_421 = $result;
									$pos_421 = $this->pos;
									if (($subres = $this->literal('WHILE')) !== \false) {
										$result["text"] .= $subres;
										$_512 = \true; break;
									}
									$result = $res_421;
									$this->setPos($pos_421);
									$_510 = \null;
									do {
										$res_423 = $result;
										$pos_423 = $this->pos;
										if (($subres = $this->literal('DO')) !== \false) {
											$result["text"] .= $subres;
											$_510 = \true; break;
										}
										$result = $res_423;
										$this->setPos($pos_423);
										$_508 = \null;
										do {
											$res_425 = $result;
											$pos_425 = $this->pos;
											if (($subres = $this->literal('REPEAT')) !== \false) {
												$result["text"] .= $subres;
												$_508 = \true; break;
											}
											$result = $res_425;
											$this->setPos($pos_425);
											$_506 = \null;
											do {
												$res_427 = $result;
												$pos_427 = $this->pos;
												if (($subres = $this->literal('UNTIL')) !== \false) {
													$result["text"] .= $subres;
													$_506 = \true; break;
												}
												$result = $res_427;
												$this->setPos($pos_427);
												$_504 = \null;
												do {
													$res_429 = $result;
													$pos_429 = $this->pos;
													if (($subres = $this->literal('FUNCTION')) !== \false) {
														$result["text"] .= $subres;
														$_504 = \true; break;
													}
													$result = $res_429;
													$this->setPos($pos_429);
													$_502 = \null;
													do {
														$res_431 = $result;
														$pos_431 = $this->pos;
														if (($subres = $this->literal('RETURN')) !== \false) {
															$result["text"] .= $subres;
															$_502 = \true; break;
														}
														$result = $res_431;
														$this->setPos($pos_431);
														$_500 = \null;
														do {
															$res_433 = $result;
															$pos_433 = $this->pos;
															if (($subres = $this->literal('FOREACH')) !== \false) {
																$result["text"] .= $subres;
																$_500 = \true; break;
															}
															$result = $res_433;
															$this->setPos($pos_433);
															$_498 = \null;
															do {
																$res_435 = $result;
																$pos_435 = $this->pos;
																if (($subres = $this->literal('MESSAGE')) !== \false) {
																	$result["text"] .= $subres;
																	$_498 = \true; break;
																}
																$result = $res_435;
																$this->setPos($pos_435);
																$_496 = \null;
																do {
																	$res_437 = $result;
																	$pos_437 = $this->pos;
																	if (($subres = $this->literal('ACCEPT')) !== \false) {
																		$result["text"] .= $subres;
																		$_496 = \true; break;
																	}
																	$result = $res_437;
																	$this->setPos($pos_437);
																	$_494 = \null;
																	do {
																		$res_439 = $result;
																		$pos_439 = $this->pos;
																		if (($subres = $this->literal('REFUSE')) !== \false) {
																			$result["text"] .= $subres;
																			$_494 = \true; break;
																		}
																		$result = $res_439;
																		$this->setPos($pos_439);
																		$_492 = \null;
																		do {
																			$res_441 = $result;
																			$pos_441 = $this->pos;
																			if (($subres = $this->literal('INPUT')) !== \false) {
																				$result["text"] .= $subres;
																				$_492 = \true; break;
																			}
																			$result = $res_441;
																			$this->setPos($pos_441);
																			$_490 = \null;
																			do {
																				$res_443 = $result;
																				$pos_443 = $this->pos;
																				if (($subres = $this->literal('SWITCH')) !== \false) {
																					$result["text"] .= $subres;
																					$_490 = \true; break;
																				}
																				$result = $res_443;
																				$this->setPos($pos_443);
																				$_488 = \null;
																				do {
																					$res_445 = $result;
																					$pos_445 = $this->pos;
																					if (($subres = $this->literal('CASE')) !== \false) {
																						$result["text"] .= $subres;
																						$_488 = \true; break;
																					}
																					$result = $res_445;
																					$this->setPos($pos_445);
																					$_486 = \null;
																					do {
																						$res_447 = $result;
																						$pos_447 = $this->pos;
																						if (($subres = $this->literal('DEFAULT')) !== \false) {
																							$result["text"] .= $subres;
																							$_486 = \true; break;
																						}
																						$result = $res_447;
																						$this->setPos($pos_447);
																						$_484 = \null;
																						do {
																							$res_449 = $result;
																							$pos_449 = $this->pos;
																							if (($subres = $this->literal('ELSE')) !== \false) {
																								$result["text"] .= $subres;
																								$_484 = \true; break;
																							}
																							$result = $res_449;
																							$this->setPos($pos_449);
																							$_482 = \null;
																							do {
																								$res_451 = $result;
																								$pos_451 = $this->pos;
																								if (($subres = $this->literal('AND')) !== \false) {
																									$result["text"] .= $subres;
																									$_482 = \true; break;
																								}
																								$result = $res_451;
																								$this->setPos($pos_451);
																								$_480 = \null;
																								do {
																									$res_453 = $result;
																									$pos_453 = $this->pos;
																									if (($subres = $this->literal('OR')) !== \false) {
																										$result["text"] .= $subres;
																										$_480 = \true; break;
																									}
																									$result = $res_453;
																									$this->setPos($pos_453);
																									$_478 = \null;
																									do {
																										$res_455 = $result;
																										$pos_455 = $this->pos;
																										if (($subres = $this->literal('NOT')) !== \false) {
																											$result["text"] .= $subres;
																											$_478 = \true; break;
																										}
																										$result = $res_455;
																										$this->setPos($pos_455);
																										$_476 = \null;
																										do {
																											$res_457 = $result;
																											$pos_457 = $this->pos;
																											if (($subres = $this->literal('END')) !== \false) {
																												$result["text"] .= $subres;
																												$_476 = \true; break;
																											}
																											$result = $res_457;
																											$this->setPos($pos_457);
																											$_474 = \null;
																											do {
																												$res_459 = $result;
																												$pos_459 = $this->pos;
																												if (($subres = $this->literal('IF')) !== \false) {
																													$result["text"] .= $subres;
																													$_474 = \true; break;
																												}
																												$result = $res_459;
																												$this->setPos($pos_459);
																												$_472 = \null;
																												do {
																													$res_461 = $result;
																													$pos_461 = $this->pos;
																													if (($subres = $this->literal('TO')) !== \false) {
																														$result["text"] .= $subres;
																														$_472 = \true; break;
																													}
																													$result = $res_461;
																													$this->setPos($pos_461);
																													$_470 = \null;
																													do {
																														$res_463 = $result;
																														$pos_463 = $this->pos;
																														if (($subres = $this->literal('IN')) !== \false) {
																															$result["text"] .= $subres;
																															$_470 = \true; break;
																														}
																														$result = $res_463;
																														$this->setPos($pos_463);
																														$_468 = \null;
																														do {
																															$res_465 = $result;
																															$pos_465 = $this->pos;
																															if (($subres = $this->literal('BREAK')) !== \false) {
																																$result["text"] .= $subres;
																																$_468 = \true; break;
																															}
																															$result = $res_465;
																															$this->setPos($pos_465);
																															if (($subres = $this->literal('CONTINUE')) !== \false) {
																																$result["text"] .= $subres;
																																$_468 = \true; break;
																															}
																															$result = $res_465;
																															$this->setPos($pos_465);
																															$_468 = \false; break;
																														}
																														while(\false);
																														if($_468 === \true) {
																															$_470 = \true; break;
																														}
																														$result = $res_463;
																														$this->setPos($pos_463);
																														$_470 = \false; break;
																													}
																													while(\false);
																													if($_470 === \true) {
																														$_472 = \true; break;
																													}
																													$result = $res_461;
																													$this->setPos($pos_461);
																													$_472 = \false; break;
																												}
																												while(\false);
																												if($_472 === \true) {
																													$_474 = \true; break;
																												}
																												$result = $res_459;
																												$this->setPos($pos_459);
																												$_474 = \false; break;
																											}
																											while(\false);
																											if($_474 === \true) {
																												$_476 = \true; break;
																											}
																											$result = $res_457;
																											$this->setPos($pos_457);
																											$_476 = \false; break;
																										}
																										while(\false);
																										if($_476 === \true) {
																											$_478 = \true; break;
																										}
																										$result = $res_455;
																										$this->setPos($pos_455);
																										$_478 = \false; break;
																									}
																									while(\false);
																									if($_478 === \true) {
																										$_480 = \true; break;
																									}
																									$result = $res_453;
																									$this->setPos($pos_453);
																									$_480 = \false; break;
																								}
																								while(\false);
																								if($_480 === \true) {
																									$_482 = \true; break;
																								}
																								$result = $res_451;
																								$this->setPos($pos_451);
																								$_482 = \false; break;
																							}
																							while(\false);
																							if($_482 === \true) {
																								$_484 = \true; break;
																							}
																							$result = $res_449;
																							$this->setPos($pos_449);
																							$_484 = \false; break;
																						}
																						while(\false);
																						if($_484 === \true) {
																							$_486 = \true; break;
																						}
																						$result = $res_447;
																						$this->setPos($pos_447);
																						$_486 = \false; break;
																					}
																					while(\false);
																					if($_486 === \true) {
																						$_488 = \true; break;
																					}
																					$result = $res_445;
																					$this->setPos($pos_445);
																					$_488 = \false; break;
																				}
																				while(\false);
																				if($_488 === \true) {
																					$_490 = \true; break;
																				}
																				$result = $res_443;
																				$this->setPos($pos_443);
																				$_490 = \false; break;
																			}
																			while(\false);
																			if($_490 === \true) {
																				$_492 = \true; break;
																			}
																			$result = $res_441;
																			$this->setPos($pos_441);
																			$_492 = \false; break;
																		}
																		while(\false);
																		if($_492 === \true) {
																			$_494 = \true; break;
																		}
																		$result = $res_439;
																		$this->setPos($pos_439);
																		$_494 = \false; break;
																	}
																	while(\false);
																	if($_494 === \true) { $_496 = \true; break; }
																	$result = $res_437;
																	$this->setPos($pos_437);
																	$_496 = \false; break;
																}
																while(\false);
																if($_496 === \true) { $_498 = \true; break; }
																$result = $res_435;
																$this->setPos($pos_435);
																$_498 = \false; break;
															}
															while(\false);
															if($_498 === \true) { $_500 = \true; break; }
															$result = $res_433;
															$this->setPos($pos_433);
															$_500 = \false; break;
														}
														while(\false);
														if($_500 === \true) { $_502 = \true; break; }
														$result = $res_431;
														$this->setPos($pos_431);
														$_502 = \false; break;
													}
													while(\false);
													if($_502 === \true) { $_504 = \true; break; }
													$result = $res_429;
													$this->setPos($pos_429);
													$_504 = \false; break;
												}
												while(\false);
												if($_504 === \true) { $_506 = \true; break; }
												$result = $res_427;
												$this->setPos($pos_427);
												$_506 = \false; break;
											}
											while(\false);
											if($_506 === \true) { $_508 = \true; break; }
											$result = $res_425;
											$this->setPos($pos_425);
											$_508 = \false; break;
										}
										while(\false);
										if($_508 === \true) { $_510 = \true; break; }
										$result = $res_423;
										$this->setPos($pos_423);
										$_510 = \false; break;
									}
									while(\false);
									if($_510 === \true) { $_512 = \true; break; }
									$result = $res_421;
									$this->setPos($pos_421);
									$_512 = \false; break;
								}
								while(\false);
								if($_512 === \true) { $_514 = \true; break; }
								$result = $res_419;
								$this->setPos($pos_419);
								$_514 = \false; break;
							}
							while(\false);
							if($_514 === \true) { $_516 = \true; break; }
							$result = $res_417;
							$this->setPos($pos_417);
							$_516 = \false; break;
						}
						while(\false);
						if($_516 === \true) { $_518 = \true; break; }
						$result = $res_415;
						$this->setPos($pos_415);
						$_518 = \false; break;
					}
					while(\false);
					if($_518 === \true) { $_520 = \true; break; }
					$result = $res_413;
					$this->setPos($pos_413);
					$_520 = \false; break;
				}
				while(\false);
				if($_520 === \true) { $_522 = \true; break; }
				$result = $res_411;
				$this->setPos($pos_411);
				$_522 = \false; break;
			}
			while(\false);
			if($_522 === \false) { $_524 = \false; break; }
			$_524 = \true; break;
		}
		while(\false);
		if($_524 === \false) { $_529 = \false; break; }
		$res_528 = $result;
		$pos_528 = $this->pos;
		$_527 = \null;
		do {
			if (($subres = $this->rx('/[a-zA-Z0-9_]/')) !== \false) { $result["text"] .= $subres; }
			else { $_527 = \false; break; }
			$_527 = \true; break;
		}
		while(\false);
		if($_527 === \true) {
			$result = $res_528;
			$this->setPos($pos_528);
			$_529 = \false; break;
		}
		if($_527 === \false) {
			$result = $res_528;
			$this->setPos($pos_528);
		}
		$_529 = \true; break;
	}
	while(\false);
	if($_529 === \true) { return $this->finalise($result); }
	if($_529 === \false) { return \false; }
}


/* Block: "{" _ stmt:Statement* _ "}" | "BEGIN" _ stmt:Statement* _ "END" */
protected $match_Block_typestack = ['Block'];
function match_Block($stack = []) {
	$matchrule = 'Block';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_546 = \null;
	do {
		$res_531 = $result;
		$pos_531 = $this->pos;
		$_537 = \null;
		do {
			if (\substr($this->string, $this->pos, 1) === '{') {
				$this->addPos(1);
				$result["text"] .= '{';
			}
			else { $_537 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_537 = \false; break; }
			while (\true) {
				$res_534 = $result;
				$pos_534 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else {
					$result = $res_534;
					$this->setPos($pos_534);
					unset($res_534, $pos_534);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_537 = \false; break; }
			if (\substr($this->string, $this->pos, 1) === '}') {
				$this->addPos(1);
				$result["text"] .= '}';
			}
			else { $_537 = \false; break; }
			$_537 = \true; break;
		}
		while(\false);
		if($_537 === \true) { $_546 = \true; break; }
		$result = $res_531;
		$this->setPos($pos_531);
		$_544 = \null;
		do {
			if (($subres = $this->literal('BEGIN')) !== \false) { $result["text"] .= $subres; }
			else { $_544 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_544 = \false; break; }
			while (\true) {
				$res_541 = $result;
				$pos_541 = $this->pos;
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else {
					$result = $res_541;
					$this->setPos($pos_541);
					unset($res_541, $pos_541);
					break;
				}
			}
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_544 = \false; break; }
			if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
			else { $_544 = \false; break; }
			$_544 = \true; break;
		}
		while(\false);
		if($_544 === \true) { $_546 = \true; break; }
		$result = $res_531;
		$this->setPos($pos_531);
		$_546 = \false; break;
	}
	while(\false);
	if($_546 === \true) { return $this->finalise($result); }
	if($_546 === \false) { return \false; }
}


/* IfStatement: "IF" _ cond:Expression _ then:Block ( _ "ELSE" _ else:Block )? | "IF" _ cond:Expression _ then:Statement+ ( _ "ELSE" _ else:Statement+ )? ( _ "END" ) | "IF" _ cond:Expression _ stmt:Statement */
protected $match_IfStatement_typestack = ['IfStatement'];
function match_IfStatement($stack = []) {
	$matchrule = 'IfStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_589 = \null;
	do {
		$res_548 = $result;
		$pos_548 = $this->pos;
		$_560 = \null;
		do {
			if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
			else { $_560 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_560 = \false; break; }
			$key = 'match_'.'Expression'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cond");
			}
			else { $_560 = \false; break; }
			$key = 'match_'.'_'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) { $this->store($result, $subres); }
			else { $_560 = \false; break; }
			$key = 'match_'.'Block'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "then");
			}
			else { $_560 = \false; break; }
			$res_559 = $result;
			$pos_559 = $this->pos;
			$_558 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_558 = \false; break; }
				if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
				else { $_558 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_558 = \false; break; }
				$key = 'match_'.'Block'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "else");
				}
				else { $_558 = \false; break; }
				$_558 = \true; break;
			}
			while(\false);
			if($_558 === \false) {
				$result = $res_559;
				$this->setPos($pos_559);
				unset($res_559, $pos_559);
			}
			$_560 = \true; break;
		}
		while(\false);
		if($_560 === \true) { $_589 = \true; break; }
		$result = $res_548;
		$this->setPos($pos_548);
		$_587 = \null;
		do {
			$res_562 = $result;
			$pos_562 = $this->pos;
			$_578 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_578 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_578 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_578 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_578 = \false; break; }
				$count_567 = 0;
				while (\true) {
					$res_567 = $result;
					$pos_567 = $this->pos;
					$key = 'match_'.'Statement'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) {
						$this->store($result, $subres, "then");
					}
					else {
						$result = $res_567;
						$this->setPos($pos_567);
						unset($res_567, $pos_567);
						break;
					}
					$count_567++;
				}
				if ($count_567 >= 1) {  }
				else { $_578 = \false; break; }
				$res_573 = $result;
				$pos_573 = $this->pos;
				$_572 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_572 = \false; break; }
					if (($subres = $this->literal('ELSE')) !== \false) { $result["text"] .= $subres; }
					else { $_572 = \false; break; }
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_572 = \false; break; }
					$count_571 = 0;
					while (\true) {
						$res_571 = $result;
						$pos_571 = $this->pos;
						$key = 'match_'.'Statement'; $pos = $this->pos;
						$subres = $this->packhas($key, $pos)
							? $this->packread($key, $pos)
							: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
						if ($subres !== \false) {
							$this->store($result, $subres, "else");
						}
						else {
							$result = $res_571;
							$this->setPos($pos_571);
							unset($res_571, $pos_571);
							break;
						}
						$count_571++;
					}
					if ($count_571 >= 1) {  }
					else { $_572 = \false; break; }
					$_572 = \true; break;
				}
				while(\false);
				if($_572 === \false) {
					$result = $res_573;
					$this->setPos($pos_573);
					unset($res_573, $pos_573);
				}
				$_576 = \null;
				do {
					$key = 'match_'.'_'; $pos = $this->pos;
					$subres = $this->packhas($key, $pos)
						? $this->packread($key, $pos)
						: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
					if ($subres !== \false) { $this->store($result, $subres); }
					else { $_576 = \false; break; }
					if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
					else { $_576 = \false; break; }
					$_576 = \true; break;
				}
				while(\false);
				if($_576 === \false) { $_578 = \false; break; }
				$_578 = \true; break;
			}
			while(\false);
			if($_578 === \true) { $_587 = \true; break; }
			$result = $res_562;
			$this->setPos($pos_562);
			$_585 = \null;
			do {
				if (($subres = $this->literal('IF')) !== \false) { $result["text"] .= $subres; }
				else { $_585 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_585 = \false; break; }
				$key = 'match_'.'Expression'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "cond");
				}
				else { $_585 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_585 = \false; break; }
				$key = 'match_'.'Statement'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "stmt");
				}
				else { $_585 = \false; break; }
				$_585 = \true; break;
			}
			while(\false);
			if($_585 === \true) { $_587 = \true; break; }
			$result = $res_562;
			$this->setPos($pos_562);
			$_587 = \false; break;
		}
		while(\false);
		if($_587 === \true) { $_589 = \true; break; }
		$result = $res_548;
		$this->setPos($pos_548);
		$_589 = \false; break;
	}
	while(\false);
	if($_589 === \true) { return $this->finalise($result); }
	if($_589 === \false) { return \false; }
}


/* ForeachInStmt: "FOREACH" _ var:Identifier _ "IN" _ iter:Expression _ body:Statement+ "END" */
protected $match_ForeachInStmt_typestack = ['ForeachInStmt'];
function match_ForeachInStmt($stack = []) {
	$matchrule = 'ForeachInStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_601 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_601 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_601 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_601 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_601 = \false; break; }
		if (($subres = $this->literal('IN')) !== \false) { $result["text"] .= $subres; }
		else { $_601 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_601 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "iter");
		}
		else { $_601 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_601 = \false; break; }
		$count_599 = 0;
		while (\true) {
			$res_599 = $result;
			$pos_599 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_599;
				$this->setPos($pos_599);
				unset($res_599, $pos_599);
				break;
			}
			$count_599++;
		}
		if ($count_599 >= 1) {  }
		else { $_601 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_601 = \false; break; }
		$_601 = \true; break;
	}
	while(\false);
	if($_601 === \true) { return $this->finalise($result); }
	if($_601 === \false) { return \false; }
}


/* ForeachRangeStmt: "FOREACH" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "END" */
protected $match_ForeachRangeStmt_typestack = ['ForeachRangeStmt'];
function match_ForeachRangeStmt($stack = []) {
	$matchrule = 'ForeachRangeStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_617 = \null;
	do {
		if (($subres = $this->literal('FOREACH')) !== \false) { $result["text"] .= $subres; }
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '=') {
			$this->addPos(1);
			$result["text"] .= '=';
		}
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "from");
		}
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		if (($subres = $this->literal('TO')) !== \false) { $result["text"] .= $subres; }
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "to");
		}
		else { $_617 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_617 = \false; break; }
		$count_615 = 0;
		while (\true) {
			$res_615 = $result;
			$pos_615 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_615;
				$this->setPos($pos_615);
				unset($res_615, $pos_615);
				break;
			}
			$count_615++;
		}
		if ($count_615 >= 1) {  }
		else { $_617 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_617 = \false; break; }
		$_617 = \true; break;
	}
	while(\false);
	if($_617 === \true) { return $this->finalise($result); }
	if($_617 === \false) { return \false; }
}


/* WhileStatement: "WHILE" _ cond:Expression _ body:Statement+ "END" */
protected $match_WhileStatement_typestack = ['WhileStatement'];
function match_WhileStatement($stack = []) {
	$matchrule = 'WhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_625 = \null;
	do {
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_625 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_625 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_625 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_625 = \false; break; }
		$count_623 = 0;
		while (\true) {
			$res_623 = $result;
			$pos_623 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_623;
				$this->setPos($pos_623);
				unset($res_623, $pos_623);
				break;
			}
			$count_623++;
		}
		if ($count_623 >= 1) {  }
		else { $_625 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_625 = \false; break; }
		$_625 = \true; break;
	}
	while(\false);
	if($_625 === \true) { return $this->finalise($result); }
	if($_625 === \false) { return \false; }
}


/* DoWhileStatement: "DO" _ body:Statement+ "WHILE" _ cond:Expression */
protected $match_DoWhileStatement_typestack = ['DoWhileStatement'];
function match_DoWhileStatement($stack = []) {
	$matchrule = 'DoWhileStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_633 = \null;
	do {
		if (($subres = $this->literal('DO')) !== \false) { $result["text"] .= $subres; }
		else { $_633 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_633 = \false; break; }
		$count_629 = 0;
		while (\true) {
			$res_629 = $result;
			$pos_629 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_629;
				$this->setPos($pos_629);
				unset($res_629, $pos_629);
				break;
			}
			$count_629++;
		}
		if ($count_629 >= 1) {  }
		else { $_633 = \false; break; }
		if (($subres = $this->literal('WHILE')) !== \false) { $result["text"] .= $subres; }
		else { $_633 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_633 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_633 = \false; break; }
		$_633 = \true; break;
	}
	while(\false);
	if($_633 === \true) { return $this->finalise($result); }
	if($_633 === \false) { return \false; }
}


/* RepeatUntilStatement: "REPEAT" _ body:Statement+ "UNTIL" _ cond:Expression */
protected $match_RepeatUntilStatement_typestack = ['RepeatUntilStatement'];
function match_RepeatUntilStatement($stack = []) {
	$matchrule = 'RepeatUntilStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_641 = \null;
	do {
		if (($subres = $this->literal('REPEAT')) !== \false) { $result["text"] .= $subres; }
		else { $_641 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_641 = \false; break; }
		$count_637 = 0;
		while (\true) {
			$res_637 = $result;
			$pos_637 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_637;
				$this->setPos($pos_637);
				unset($res_637, $pos_637);
				break;
			}
			$count_637++;
		}
		if ($count_637 >= 1) {  }
		else { $_641 = \false; break; }
		if (($subres = $this->literal('UNTIL')) !== \false) { $result["text"] .= $subres; }
		else { $_641 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_641 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "cond");
		}
		else { $_641 = \false; break; }
		$_641 = \true; break;
	}
	while(\false);
	if($_641 === \true) { return $this->finalise($result); }
	if($_641 === \false) { return \false; }
}


/* SwitchStatement: "SWITCH" _ expr:Expression _ cases:CaseClause+ def:DefaultClause? _ "END" */
protected $match_SwitchStatement_typestack = ['SwitchStatement'];
function match_SwitchStatement($stack = []) {
	$matchrule = 'SwitchStatement';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_651 = \null;
	do {
		if (($subres = $this->literal('SWITCH')) !== \false) { $result["text"] .= $subres; }
		else { $_651 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_651 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_651 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_651 = \false; break; }
		$count_647 = 0;
		while (\true) {
			$res_647 = $result;
			$pos_647 = $this->pos;
			$key = 'match_'.'CaseClause'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "cases");
			}
			else {
				$result = $res_647;
				$this->setPos($pos_647);
				unset($res_647, $pos_647);
				break;
			}
			$count_647++;
		}
		if ($count_647 >= 1) {  }
		else { $_651 = \false; break; }
		$res_648 = $result;
		$pos_648 = $this->pos;
		$key = 'match_'.'DefaultClause'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "def");
		}
		else {
			$result = $res_648;
			$this->setPos($pos_648);
			unset($res_648, $pos_648);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_651 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_651 = \false; break; }
		$_651 = \true; break;
	}
	while(\false);
	if($_651 === \true) { return $this->finalise($result); }
	if($_651 === \false) { return \false; }
}


/* CaseClause: "CASE" _ val:Expression _ body:Statement+ */
protected $match_CaseClause_typestack = ['CaseClause'];
function match_CaseClause($stack = []) {
	$matchrule = 'CaseClause';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_658 = \null;
	do {
		if (($subres = $this->literal('CASE')) !== \false) { $result["text"] .= $subres; }
		else { $_658 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_658 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "val");
		}
		else { $_658 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_658 = \false; break; }
		$count_657 = 0;
		while (\true) {
			$res_657 = $result;
			$pos_657 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_657;
				$this->setPos($pos_657);
				unset($res_657, $pos_657);
				break;
			}
			$count_657++;
		}
		if ($count_657 >= 1) {  }
		else { $_658 = \false; break; }
		$_658 = \true; break;
	}
	while(\false);
	if($_658 === \true) { return $this->finalise($result); }
	if($_658 === \false) { return \false; }
}


/* DefaultClause: "DEFAULT" _ body:Statement+ */
protected $match_DefaultClause_typestack = ['DefaultClause'];
function match_DefaultClause($stack = []) {
	$matchrule = 'DefaultClause';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_663 = \null;
	do {
		if (($subres = $this->literal('DEFAULT')) !== \false) { $result["text"] .= $subres; }
		else { $_663 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_663 = \false; break; }
		$count_662 = 0;
		while (\true) {
			$res_662 = $result;
			$pos_662 = $this->pos;
			$key = 'match_'.'Statement'; $pos = $this->pos;
			$subres = $this->packhas($key, $pos)
				? $this->packread($key, $pos)
				: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
			if ($subres !== \false) {
				$this->store($result, $subres, "body");
			}
			else {
				$result = $res_662;
				$this->setPos($pos_662);
				unset($res_662, $pos_662);
				break;
			}
			$count_662++;
		}
		if ($count_662 >= 1) {  }
		else { $_663 = \false; break; }
		$_663 = \true; break;
	}
	while(\false);
	if($_663 === \true) { return $this->finalise($result); }
	if($_663 === \false) { return \false; }
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
	$_674 = \null;
	do {
		$_668 = \null;
		do {
			if (($subres = $this->literal('INPUT')) !== \false) { $result["text"] .= $subres; }
			else { $_668 = \false; break; }
			$_668 = \true; break;
		}
		while(\false);
		if($_668 === \false) { $_674 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_674 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_674 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_674 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "var");
		}
		else { $_674 = \false; break; }
		$_674 = \true; break;
	}
	while(\false);
	if($_674 === \true) { return $this->finalise($result); }
	if($_674 === \false) { return \false; }
}


/* InterruptSimpleStmt: type:("MESSAGE" | "ACCEPT" | "REFUSE") _ expr:Expression */
protected $match_InterruptSimpleStmt_typestack = ['InterruptSimpleStmt'];
function match_InterruptSimpleStmt($stack = []) {
	$matchrule = 'InterruptSimpleStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_689 = \null;
	do {
		$stack[] = $result; $result = $this->construct($matchrule, "type");
		$_685 = \null;
		do {
			$_683 = \null;
			do {
				$res_676 = $result;
				$pos_676 = $this->pos;
				if (($subres = $this->literal('MESSAGE')) !== \false) {
					$result["text"] .= $subres;
					$_683 = \true; break;
				}
				$result = $res_676;
				$this->setPos($pos_676);
				$_681 = \null;
				do {
					$res_678 = $result;
					$pos_678 = $this->pos;
					if (($subres = $this->literal('ACCEPT')) !== \false) {
						$result["text"] .= $subres;
						$_681 = \true; break;
					}
					$result = $res_678;
					$this->setPos($pos_678);
					if (($subres = $this->literal('REFUSE')) !== \false) {
						$result["text"] .= $subres;
						$_681 = \true; break;
					}
					$result = $res_678;
					$this->setPos($pos_678);
					$_681 = \false; break;
				}
				while(\false);
				if($_681 === \true) { $_683 = \true; break; }
				$result = $res_676;
				$this->setPos($pos_676);
				$_683 = \false; break;
			}
			while(\false);
			if($_683 === \false) { $_685 = \false; break; }
			$_685 = \true; break;
		}
		while(\false);
		if($_685 === \true) {
			$subres = $result; $result = \array_pop($stack);
			$this->store($result, $subres, 'type');
		}
		if($_685 === \false) {
			$result = \array_pop($stack);
			$_689 = \false; break;
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_689 = \false; break; }
		$key = 'match_'.'Expression'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "expr");
		}
		else { $_689 = \false; break; }
		$_689 = \true; break;
	}
	while(\false);
	if($_689 === \true) { return $this->finalise($result); }
	if($_689 === \false) { return \false; }
}


/* LabelStmt: label:Identifier _ ":" */
protected $match_LabelStmt_typestack = ['LabelStmt'];
function match_LabelStmt($stack = []) {
	$matchrule = 'LabelStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_694 = \null;
	do {
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_694 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_694 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ':') {
			$this->addPos(1);
			$result["text"] .= ':';
		}
		else { $_694 = \false; break; }
		$_694 = \true; break;
	}
	while(\false);
	if($_694 === \true) { return $this->finalise($result); }
	if($_694 === \false) { return \false; }
}


/* GotoStmt: "GOTO" _ label:Identifier */
protected $match_GotoStmt_typestack = ['GotoStmt'];
function match_GotoStmt($stack = []) {
	$matchrule = 'GotoStmt';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_699 = \null;
	do {
		if (($subres = $this->literal('GOTO')) !== \false) { $result["text"] .= $subres; }
		else { $_699 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_699 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "label");
		}
		else { $_699 = \false; break; }
		$_699 = \true; break;
	}
	while(\false);
	if($_699 === \true) { return $this->finalise($result); }
	if($_699 === \false) { return \false; }
}


/* StructDef: "STRUCT" _ structName:Identifier (_ field:Identifier)* _ "END" */
protected $match_StructDef_typestack = ['StructDef'];
function match_StructDef($stack = []) {
	$matchrule = 'StructDef';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_710 = \null;
	do {
		if (($subres = $this->literal('STRUCT')) !== \false) { $result["text"] .= $subres; }
		else { $_710 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_710 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "structName");
		}
		else { $_710 = \false; break; }
		while (\true) {
			$res_707 = $result;
			$pos_707 = $this->pos;
			$_706 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_706 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "field");
				}
				else { $_706 = \false; break; }
				$_706 = \true; break;
			}
			while(\false);
			if($_706 === \false) {
				$result = $res_707;
				$this->setPos($pos_707);
				unset($res_707, $pos_707);
				break;
			}
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_710 = \false; break; }
		if (($subres = $this->literal('END')) !== \false) { $result["text"] .= $subres; }
		else { $_710 = \false; break; }
		$_710 = \true; break;
	}
	while(\false);
	if($_710 === \true) { return $this->finalise($result); }
	if($_710 === \false) { return \false; }
}


/* MakeStruct: "MAKE" _ structName:Identifier _ "(" _ args:ArgumentList? _ ")" */
protected $match_MakeStruct_typestack = ['MakeStruct'];
function match_MakeStruct($stack = []) {
	$matchrule = 'MakeStruct';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_721 = \null;
	do {
		if (($subres = $this->literal('MAKE')) !== \false) { $result["text"] .= $subres; }
		else { $_721 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_721 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "structName");
		}
		else { $_721 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_721 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === '(') {
			$this->addPos(1);
			$result["text"] .= '(';
		}
		else { $_721 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_721 = \false; break; }
		$res_718 = $result;
		$pos_718 = $this->pos;
		$key = 'match_'.'ArgumentList'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "args");
		}
		else {
			$result = $res_718;
			$this->setPos($pos_718);
			unset($res_718, $pos_718);
		}
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_721 = \false; break; }
		if (\substr($this->string, $this->pos, 1) === ')') {
			$this->addPos(1);
			$result["text"] .= ')';
		}
		else { $_721 = \false; break; }
		$_721 = \true; break;
	}
	while(\false);
	if($_721 === \true) { return $this->finalise($result); }
	if($_721 === \false) { return \false; }
}


/* CommandDecl: "COMMAND" _ head:Identifier ( _ "," _ tail:Identifier )* */
protected $match_CommandDecl_typestack = ['CommandDecl'];
function match_CommandDecl($stack = []) {
	$matchrule = 'CommandDecl';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$_732 = \null;
	do {
		if (($subres = $this->literal('COMMAND')) !== \false) { $result["text"] .= $subres; }
		else { $_732 = \false; break; }
		$key = 'match_'.'_'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) { $this->store($result, $subres); }
		else { $_732 = \false; break; }
		$key = 'match_'.'Identifier'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "head");
		}
		else { $_732 = \false; break; }
		while (\true) {
			$res_731 = $result;
			$pos_731 = $this->pos;
			$_730 = \null;
			do {
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_730 = \false; break; }
				if (\substr($this->string, $this->pos, 1) === ',') {
					$this->addPos(1);
					$result["text"] .= ',';
				}
				else { $_730 = \false; break; }
				$key = 'match_'.'_'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) { $this->store($result, $subres); }
				else { $_730 = \false; break; }
				$key = 'match_'.'Identifier'; $pos = $this->pos;
				$subres = $this->packhas($key, $pos)
					? $this->packread($key, $pos)
					: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
				if ($subres !== \false) {
					$this->store($result, $subres, "tail");
				}
				else { $_730 = \false; break; }
				$_730 = \true; break;
			}
			while(\false);
			if($_730 === \false) {
				$result = $res_731;
				$this->setPos($pos_731);
				unset($res_731, $pos_731);
				break;
			}
		}
		$_732 = \true; break;
	}
	while(\false);
	if($_732 === \true) { return $this->finalise($result); }
	if($_732 === \false) { return \false; }
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
