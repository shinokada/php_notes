<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('add a new user and see it in the database');
$I->amOnPage('/');
$I->fillField('email','sokada@gmail.com');
$I->click('Add User');
$I->seeInDatabase('users',['email'=>'sokada@gmail.com']);
$I->see('sokada@gmail.com', 'li');

