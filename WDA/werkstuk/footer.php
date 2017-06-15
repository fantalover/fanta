
<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
      © 2017 fanta lover fool
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/shoppingcart.js"></script>
<script type="text/javascript" src="js/category.js"></script>
<script type="text/javascript">$(".button-collapse").sideNav();</script>
<script type="text/javascript">
 $(document).ready(function() {
  $('select').material_select();
});
 function saveCart(obj) {
  var quantity = $(obj).val();
  var code = $(obj).attr("id");
  $.ajax({
    url: "?action=edit",
    type: "POST",
    data: 'code='+code+'&quantity='+quantity,
    success: function(data, status){$("#total_price").html(data)},
    error: function () {alert("Problem in sending reply!")}
  });
};

function getmodal(id){
 console.log(id);
 if(id==0){
    		//console.log("het id is leeg!!");
    		document.getElementById("insertmodal").innerHTML = "";
    		return;
      }else{
       if(window.XMLHttpRequest){
        console.log("IE7+, Firefox, Chrome, Opera, Safari");
        xmlhttp = new XMLHttpRequest();
      }
      else{
        console.log("IE6, IE5");
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
         console.log("ready state = 4 and status = 200");
         var htmlfromserver = this.responseText;
         
         
         $('#modal_content').html(htmlfromserver);
         $('ul.tabs').tabs();
         $('#modal1').modal('open');

    					//document.getElementById("test").innerHTML = this.responseText;
    					//console.log(this.responseText);

    				}
    			}

    			xmlhttp.open("GET","modal.php?id="+id,true);
    			xmlhttp.send();
    			//console.log(xmlhttp);


    			//modal footer
    			XMLHTTP

    		}
    	}
      
    </script>


