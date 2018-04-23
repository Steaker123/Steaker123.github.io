<footer class="footer">
     © 2017 MotorMoney - All Rights Reserved.
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="/js/jquery.min2.js"></script>
<script src="/js/bootstrap.min2.js"></script>
<script src="/js/modernizr.min.js"></script>
<script src="/js/detect.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/jquery.blockUI.js"></script>
<script src="/js/waves.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery.scrollTo.min.js"></script>
<script type="text/javascript">
Number.prototype.toMoney = function(decimals, decimal_sep, thousands_sep)
{
   var n = this,
   c = isNaN(decimals) ? 2 : Math.abs(decimals),
   d = decimal_sep || '.',

   t = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,

   sign = (n < 0) ? '-' : '',

   i = parseInt(n = Math.abs(n).toFixed(c)) + '',

   j = ((j = i.length) > 3) ? j % 3 : 0;
   return sign + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '');
}
</script>

<!--Morris Chart-->
<script src="/js/morris.min.js"></script>
<script src="/js/raphael-min.js"></script>
<script src="/js/dashborad.php"></script>
<script src="/js/app.js"></script>

</body>
</html>