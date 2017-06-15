 $(document).ready(function () {
                $(document).on('mouseenter', '#cardHeader', function () {
                    $(this).find(":button").show();
                }).on('mouseleave', '#cardHeader', function () {
                    $(this).find(":button").hide();
                });
            });

   $(document).ready(function () {
    cartAction('','');
  })

function cartAction(action,product_code) {
	  console.log(product_code);
      var queryString = "";
      if(action != "") {
        switch(action) {
          case "add":
          queryString = 'action='+action+'&id='+ product_code+'&quantity='+$("#qty_"+product_code).val();
          console.log("queryString: "+queryString)
          break;
          case "remove":
          queryString = 'action='+action+'&id='+ product_code;
          break;
          case "empty":
          queryString = 'action='+action;
          break;
        }  
      }
      jQuery.ajax({
        url: "shoppingCartPage.php",
        data:queryString,
        type: "POST",
        success:function(data){
          if(action != "") {
            switch(action) {
              case "add":
              $("#add_"+product_code).hide();
              $("#added_"+product_code).show();
              break;
              case "remove":
              $("#add_"+product_code).show();
              $("#added_"+product_code).hide();
              break;
              case "empty":
              $(".btnAddAction").show();
              $(".btnAdded").hide();
              break;
            }  
          }
        },
        error:function (){}
      });
    }