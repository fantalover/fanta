
 function selectCategory(Category) {
    var queryString = "";
    if (Category != "" || Category != 'All') {
      queryString = 'Category='+Category;
      console.log(queryString);
     
      jQuery.ajax({
        url: "Category.php",
        data: queryString,
       
        type: "POST",
        success:function(data){
          $("#products").html(data)

        },
        error:function (){}
      });
    }
      else{
        console.log('all');
      }
    }