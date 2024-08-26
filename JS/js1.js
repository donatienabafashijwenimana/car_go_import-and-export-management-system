$(document).ready(()=>{
   
   $(".act").click((e)=>{
      e.preventDefault()
      $('.loading').show();

      $('form').hide()
      $(".form").show();
      
      setTimeout(() => {
         // $('.loading').hide();
         $('form').show();
      }, 3000);
   })


   $("#exp").click(()=>{
      $(".formexp").show()

   })
   $(".close").click(()=>{
    $(".form,.formu,.formexp").hide();
   })
   $("#print").click(()=>{
      $("#print,.h").hide()
      $("body").html($("table"))
      print()
   })
        $(".print").click(()=>{
            $("body").html($('table'));
            var x = print()
        })
    
})