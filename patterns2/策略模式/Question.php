<?php
include 'Marker.php';

/**
 * 问题基类
 *
 */
abstract class Question
{
	protected $prompt;
	protected $marker;
	
	public function __construct($prompt, Marker $marker)
	{
		$this->marker = $marker;
		$this->prompt = $prompt;
	}
	
	public function mark($response)
	{
		return $this->marker->mark($response);
	}
}

class TextQuestion extends Question
{
	// 处理文本问题特有的操作
}

class AVQuestion extends Question
{
	// 处理语音问题特有的操作
}

// 客户端代码示例
$markers = array(new RegexpMarker("/f.ve/"),
		new MatchMarker("five"),
		new MarkLogicMarker('$input equals "five"')	
	);
	
foreach ($markers as $marker) {
	print get_class($marker) . "\n";
	$question = new TextQuestion("how many beans make five", $marker);
	foreach (array("five", "four") as $response) {
		print "\tresponse: $response: ";
		if ($question->mark($response)) {
			print "well done\n";
		} else {
			print "never mind\n";
		}
	}
}

/*
 * 下面是输出结果：
 * --------------------------------------
 *	RegexpMarker
 *		response: five: well done
 *		response: four: never mind
 *	MatchMarker
 *		response: five: well done
 *		response: four: never mind
 *  MarkLogicMarker
 *		response: five: well done
 *		response: four: well done
 * -------------------------------------- 
 */