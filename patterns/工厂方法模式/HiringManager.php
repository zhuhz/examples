<?php
include 'Interviewer.php';

/**
 * 工厂方法类
 *
 */
abstract class HiringManager
{
	// Factory method 委派面试官
	abstract public function makeInterviewer();
	
	public function takeInterview()
	{
		$interviewer = $this->makeInterviewer();
		$interviewer->askQuestions();
	}
}

class DevelopmentManager extends HiringManager
{
	public function makeInterviewer()
	{
		return new Developer();
	}
}

class MarketingManager extends HiringManager
{
	public function makeInterviewer()
	{
		return new CommunityExecutive();
	}
}

$devManager = new DevelopmentManager();
$devManager->takeInterview(); // Output: Asking about design patterns

$marketingManager = new MarketingManager();
$marketingManager->takeInterview(); // Output: Asking about community building