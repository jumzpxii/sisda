<?

 session_start();

    if (isset($_SESSION["mid"])):

        else :
                echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php?menu=login\" />"; 
    endif;

?>