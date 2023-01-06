<?
include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (isset($usernm)) {
header("Location: /index.php");
exit;
}

if (isset($_POST['cfms']))
{


}


?>

<?
include("inc/header.php");
?>

<div class="content-wrapper" style="min-height: 380.266px;">


<div class="relative"> <div id="location_header">  <div class="location-bar location-bar_no-break" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_0" class="location-bar__title no_max_width"> <span>Забыли ник или пароль?</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div>

<div id="main_content" style="min-height: 90.625px;">
<div id="main">   


<div class="widgets-group widgets-group_top wbg">  <div class="content-item3 pdb"> <div class="sub-title mb0"> Забыли ник или пароль? </div> </div>   <form action="#" method="post"> <div class="content-item3 error__item_wrapper pdb">  <div class="js-input_error_wrap">   <div class="text-input__wrap relative">  <input aria-label="Ваш телефон, E-mail или ник" placeholder="Ваш телефон, E-mail или ник" class="text-input" type="text" name="contact" value="" maxlength="80">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  <script type="text/javascript">require('form')</script>   </div>  <div class="content-item3"> <div> <!-- --><!-- --><!-- --><button name="cfms" value="Продолжить" class="  btn btn_green     btn_full btn_full_fix content-bl__sep "><!-- --><!-- --><!-- --><span class="js-ico ico ico_shared_white"></span> <!-- --><!-- --><span class="js-btn_val"><!-- -->Продолжить<!-- --></span><!-- --><!-- --></button><!-- --> </div>  <input type="hidden" name="CK" value="2980">  </div> </form>  <div class="content-item3 nl pdt"> Если вы потеряли доступ к своему номеру или E-mail, обратитесь в <a class="b" href="#">Службу тех. поддержки</a>. </div>   </div>


</div>
</div>


</div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
<center>
	</center>    </div>
    <strong>Copyright © 2014 <a href="https://Wab.ge">Wab.ge</a></strong>
  </footer>
  
  
  
<div class="control-sidebar-bg"></div>

</div>

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/adminlte.js"></script>
<script src="/js/settings.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>





		


<?
include("inc/foot.php");
?>
