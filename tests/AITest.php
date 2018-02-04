<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Unknown(): void
    {
        $result = AI::getGender('');
        $expected_result = 'Unknown';
        $this->assertEquals($expected_result, $result);
    }

    public function testSentiment_Positive(): void
    {
        $result = AI::getSentiment('ดี');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result,$result);
    }

    public function testSentiment_Neutral(): void
    {
        $result = AI::getSentiment('เฉยๆ');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result,$result);
    }

    public function testSentiment_Negative(): void
    {
        $result = AI::getSentiment('แย่');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result,$result);
    }


    public function testgetRudeWords(): void
    {
        $result = AI::getRudeWords('เหี้ย');
        $expected_result = ['เหี้ย'];
        $this->assertEquals($expected_result,$result);
    }

    public function testgetNoRudeWords(): void
    {
        $result = AI::getRudeWords('ไม่พบคำหยาบ');
        $expected_result = ['ไม่พบคำหยาบ'];
        $this->assertEquals($expected_result,$result);
    }

    public function testTHLanguages(): void
    {
        $result = AI::getLanguages('สวัสดี');
        $expected_result = ['TH'];
        $this->assertEquals($expected_result,$result);

    }

    public function testENLanguages(): void
    {
        $result = AI::getLanguages('hello');
        $expected_result = ['EN'];
        $this->assertEquals($expected_result,$result);

    }
    



}