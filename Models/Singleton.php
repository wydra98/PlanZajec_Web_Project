<?php
 require_once 'User.php';
 require_once 'Day.php';
 require_once 'Lesson.php';
 require_once 'Week.php';
class Singleton
{
   private static $instance;
   private static $x=0;
 
   public static function getInstance()
   {
         return self::$instance;
   }

   public static function getX()
   {
         self::$x++;
         return self::$x;
   }

   public static function setInstance($instance)
   {
       self::$instance = $instance;
   }

}
