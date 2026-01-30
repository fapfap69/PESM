<?php
class TestParser extends \hafriedlander\Peg\Parser\Packrat {
/* TestRule: items:Item+ */
protected $match_TestRule_typestack = ['TestRule'];
function match_TestRule($stack = []) {
	$matchrule = 'TestRule';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	$count_0 = 0;
	while (\true) {
		$res_0 = $result;
		$pos_0 = $this->pos;
		$key = 'match_'.'Item'; $pos = $this->pos;
		$subres = $this->packhas($key, $pos)
			? $this->packread($key, $pos)
			: $this->packwrite($key, $pos, $this->{$key}(\array_merge($stack, [$result])));
		if ($subres !== \false) {
			$this->store($result, $subres, "items");
		}
		else {
			$result = $res_0;
			$this->setPos($pos_0);
			unset($res_0, $pos_0);
			break;
		}
		$count_0++;
	}
	if ($count_0 >= 1) { return $this->finalise($result); }
	else { return \false; }
}

public function TestRule_items (&$res, $sub) {
    if (!isset($res['normalized'])) $res['normalized'] = [];
    $res['normalized'][] = $sub;
  }

/* Item: /[a-z]+/ */
protected $match_Item_typestack = ['Item'];
function match_Item($stack = []) {
	$matchrule = 'Item';
	$this->currentRule = $matchrule;
	$result = $this->construct($matchrule, $matchrule);
	if (($subres = $this->rx('/[a-z]+/')) !== \false) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return \false; }
}




}
