<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('verify that home page welcomes me');
$I->amOnPage('/');
$I->see('Welcome');
