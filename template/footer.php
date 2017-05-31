    <!-- START OF FOOTER -->
    <div class="footer">
    	<div class="footerinner">
        	
            <div class="one_fourth about">
            	<h4>About MSA</h4>
                <p class="justify">With more than 15 years of experience, the MSA Group represents leading companies of specialty plastics and recycling solutions industries. Our international team provides excellent commercial and technical support, offering value added services for all of our customers.</p>
            </div><!--one_fourth-->
            
            <div class="one_fourth follow">
            	<h4>Contact Us</h4>
                
                <div class="followrapper">
                    <div class="followcontent">
                        <h4>Call us: +1 (305) 812-5554</h4>
                        <h4>sales&#64;themsagroup.com</h4>
                    </div>
                </div><!--followrapper-->
                    <div class="followcontent">
                        <h4>Marketing Services of America</h4>
                        <p>8855 Collins Ave Suite 1008</p>
                        <p>Surfside, FL 33154</p>
                    </div>
            </div><!--one_fourth-->

            <div class="one_fourth posts">
            	<h4>Latest News</h4>
                <ul>
                    <li>
                    	<a href="hammel.php">New Partnership: Hammel Recycling Technik</a>
                        <span>Mar 06, 2016</span>
                    </li>
                    <li>
                    	<a href="genesis-gdt.php">New Genesis GDT Razer Demolition Tool</a>
                        <span>Feb 03, 2016</span>
                    </li>
                </ul>
            </div><!--one_fourth-->

            <div class="one_fourth last">
                <h4>Sitemap</h4>
                <ul>
                	<li><a href="index.php">Home</a></li>
                	<li><a href="about.php">About Us</a></li>
                	<li><a href="plastics.php">Plastics</a></li>
                	<li><a href="recycling.php">Recycling</a></li>
                	<li><a href="logistics.php">Logistics</a></li>
                	<li><a href="news.php">News</a></li>
                    <li class="last"><a href="contact.php">Contact Us</a></li>
                </ul>
            </div><!--one_fourth-->
            
            <br class="clearall" />
                        
        </div><!--footerinner-->
        
        <div class="footerbottom">
           	<div class="footerbottominner">
            	<div class="left">Copyright &copy; 2013 - MSA. All Rights Reserved. </div>
                <div class="right">Webdesign by <a href="http://www.web40.com.br" target="_blank">Web40</a></div>
                <br class="clearall" />
            </div>
        </div><!--footerbottom-->

    </div><!-- footer -->
    <!-- END OF FOOTER -->

</div><!--mainwrapper-->

<script type="text/javascript">

///// SIDEBAR: MENU SELECTION /////
$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $(".sf-menu a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("current");
        }
    });
});
</script>

