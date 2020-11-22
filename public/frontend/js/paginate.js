
$(document).ready(function(){
    $('.pagination a').unbind('click').on('click', function(e) {
         e.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         getPosts(page);
         console.log(page);
    });
  
    function getPosts(page)
    {
        $.ajax({
             type: "GET",
             url: '{{ route("product.detail", $product_id) }}?page='+ page
        })
        .success(function(data) {
             $('body').html(data);
             // console.log(data);
        });
    }
});