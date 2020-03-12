<?php
include "nutrition_python_command.php";
$food = $_POST['food_name'] ;
#$output = exec('C:/Users/clara/AppData/Local/Programs/Python/Python37-32/python.exe ../python/fetch_food_data.py '.$food.' 2>&1');
$output = exec('C:/Users/"Akshai P S"/AppData/Local/Programs/Python/Python36-32/python.exe ../python/fetch_food_data.py '.$food.' 2>&1');
echo "<br>";
echo $output;
echo '<br>Thank you</div>';

echo '<br>
<br>
</section>
  </section>
  <section> 
  <h1 class="hero_header">
  <footer class="footer">
    <p style="margin-top: 0px;margin-bottom: 0px; text-align: center">Contact us! <br/>
    <a href="http://facebook.com"><img src="../images/facebook_icon.png" alt="facebook icon" height="30" width="30" /></a> &nbsp
    <a href="http://gmail.com"><img src="../images/gmail_icon.png" alt="gmail icon" height="30" width="30" /></a> &nbsp
    <a href="http://instagram.com"><img src="../images/instagram_icon.png" alt="instagram icon" height="30" width="30" /></a> &nbsp
    <a href="http://linkedin.com"><img src="../images/linkedin_icon.png" alt="linkedin icon" height="30" width="30" /></a> &nbsp
    <a href="http://twitter.com"><img src="../images/twitter_icon.png" alt="twitter icon" height="30" width="30" /></a> &nbsp
    </p>
  </footer>
  </h1> 
  </section> 
</div>
</body>
</html> ' ;
?>