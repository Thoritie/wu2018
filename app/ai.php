<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
    
        $findFe = array('ค่ะ','ฉัน','จร้า');
        $findMale = array('ครับ', 'ผม', 'คร้าบ','คับ'); 
      
         
        foreach($findFe as $n ) {
            if(strpos($text,$n)!== false)
            return 'Female';
           
           

        }
         foreach ($findMale as $n) { 
            if (strpos($text, $n) !== false) 
            return 'Male';
            else
            return 'Unknown';
         } 
       
     
  
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {

        if( strpos( $text, "ดี") !== false ) {
            return 'Positive';
        }else if(strpos( $text, "แย่") !== false ) {
            return 'Negative';
        } 
        return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
  

        if(strpos( $text, "เหี้ย") !== false ){
            return ['เหี้ย'];
        }else{
            return ['ไม่พบคำหยาบ'];
        }
        
        
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        
        

        $result = [];

        $en = '/[a-zA-Z]+/u';
        preg_match_all($en, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'EN');
        }
        


        $re = '/[ก-๛]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }
        return $result;
        
        



       // return ['TH', 'EN'];
    }

   
}
