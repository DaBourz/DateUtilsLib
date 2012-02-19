#DateUtilsLib
**Name: DateUtilsLib 1.0**  
**Released: Feb 19, 2012**  
**CI Version: Tested with CodeIgniter 2.1.0**  
**Author: Stéphane Bourzeix**  

* ChangeLog:  
  * Changed default functions to return current date.
  * Added French as datefr.
  * Added Spanish as datees.  

The DateUtilsLib is a very simple Code Igniter Lib to help you to format Dates in correct language and local format. The idea is to avoid to have to rely on Php Locale implementation to display correctly dates in various languages. The DateUtilsLib function will work just with a simple Timestamp provided.

Installation and configuration:  
Copy DateUtils.php to your application/libraries directory.

* Currently supported languages:  
  * French: Use datefr()
  * Spanish: Use datees() 

Usage:  

    // load the library
    $this->load->library('dateutils');
    
    Function has 4 params:
    - timestamp: date/time (UNIX format)
    - modejour: l:long (lundi 23) ; c:short (lun 23) ; n:day number (23) ; h:nothing
      L or C in Caps puts the first letter of the day in Caps (ex C : Lun)
    - modemois: l:long (septembre) ; c:short (sept) ; n:number (09) ; h:nothing
      L or C in Caps puts the first letter of the day in Caps (ex C : Lun)
    - modeheure: l:long (7 heures 35) ; c:short (7h35) ; n:nothing

    If you don't provide the TimeStamp or any param it will still display the 
    current date abbr in the correct format of the correct language

    Examples :
    $this->load->library('dateutils');

    echo $this->dateutils->datefr()	=	27/04/1980
    echo $this->dateutils->datefr(325689845,'C','L','n');	=	Dim 27 Avril 1980
    echo $this->dateutils->datefr(325689845,'n','c','n');	=	27 avr 1980
    echo $this->dateutils->datefr(325689845,'l','n','l');	=	dimanche 27/04/1980 7 heures 35
    echo $this->dateutils->datefr(325689845,'h','h','l');	=	7 heures 35 


_Credits_  
_DateUtilsLib version 1.0, for Code Igniter II by Stéphane Bourzeix 2012._
