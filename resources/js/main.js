

$(document).ready(function(){
 $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        $('li').removeClass('active');

            $(this).parent('li').addClass('active');

  
        var page = $(this).attr('href').split('page=')[1];
        
        fetch_data(page);
       });
      

       function fetch_data(page)
       {
        $.ajax({
         url:"/admin/pagination?page="+page,
         type:'get',
         datatype:"html"
        }).done(function(data)
         {
          $('.filterPanel').empty().html(data);
         })
        }
       

$('#delete').on('click',function(){
     $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
if(!confirm("Do you really want to do this?")) {
       return false;
     }
var id=$(this).data('id')

$.ajax({
url:'/admin/film/'+id,
type:'DELETE',
data:{
    "id":id,
}
}).done(function(res){
$.ajax({
         url:"/admin/paginate",
         type:'get',
         datatype:"html"
        }).done(function(data)
         {
          $('.filterPanel').empty().html(data);
         })
  
})

})




$(".reviewbtn").click(function(){
  $(".form").toggle('600','linear',function(){
$(".form textarea").focus()
var txt = $(".reviewbtn").text();
    if(txt == 'Write Review'){
      $(".reviewbtn").text('Hide Review');
    }
    else{
      $(".reviewbtn").text('Write Review');
    }
  });
});
$('.form').submit(function(e){
    e.preventDefault()

 $('.send_review_btn').text('Please wait...')


$.ajax({
url:'/create_review',
type:'POST',
data:$(this).serialize()
}).done(function(response){
  $('.send_review_btn').removeClass('btn-danger')
    $('.send_review_btn').addClass('btn-success')
    $('.send_review_btn').text('Sent successfully!')
   $('.form')[0].reset()
      fetchReview('/reviews/');


}).fail(function(){
  $('.send_review_btn').removeClass('btn-success')
  $('.send_review_btn').addClass('btn-danger')
        $('.send_review_btn').text('Error')

});
})











$('#search').on('keyup',function(e){
    var query = $(this).val();
    if(query.length > 0){
        $.ajax({
            url:"/search",
             type:"GET",
            data:{'search':query},
            success:function(res){
                $('#searchPanel').html(res);
        }
    })
    }
   
 });

















$(window).scroll(function() {
    $.each($('img'), function() {
        if ( $(this).attr('data-src') && $(this).offset().top < ($(window).scrollTop() + $(window).height() + 100) ) {
            var source = $(this).data('src');
            $(this).attr('src', source);
            $(this).removeAttr('data-src');
        }
    })
})

   

function fetchFunc(clas,link){
    $.ajax({
        url:link,
        type:'GET',
        }).done(function(response){
        $.each(response,function(i,value){

         $(clas).append($('<option/>').val(value.id).text(value.name))

        })
        })
   }

function fetchReview(link){
  var id= $('input[name=id]').val()

    $.ajax({
        url:link +id,
        type:'GET',
        }).done(function(res){
$('.reviewPanel').html("<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'><span class='visually-hidden'>Loading...</span></div></div>")

setTimeout(function(){
 $('.reviewPanel').html(res)
   },1000)
        }).fail(function(){

$('.reviewPanel').html("<h3 class=' alert alert-danger'> Fetch Error has Occured</h3>")

        })

   }

   fetchReview('/reviews/');

fetchFunc("#ques_drop2","/admin/get_director")
    fetchFunc("#ques_drop","/admin/get_genre")

$('#post_director').submit(function(e){
    e.preventDefault()

 $('.send_btn').text('Please wait...')


$.ajax({
url:'/admin/create_dire',
type:'POST',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn').addClass('btn-outline-success')
    $('.send_btn').text('Save!')
   $('#post_director')[0].reset()
fetchFunc("#ques_drop2","/admin/get_director")
      $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('Added succesfully')
   setTimeout(function(){

    $('.alert').removeClass('alert-success')
    $('.alert').text('')
   },6000)

}).fail(function(){
        $('.send_btn').text('Error')
        $('.alert').removeClass('alert-success')

        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors while sending the data ')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})

$('#post_director2').submit(function(e){
    e.preventDefault()

 $('.send_btn2').text('Please wait...')


$.ajax({
url:'/admin/create_genre',
type:'POST',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn2').addClass('btn-outline-success')
    $('.send_btn2').text('Save!')

    fetchFunc("#ques_drop","/admin/get_genre")
   $('#post_director2')[0].reset()

   $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('Added succesfully')
   setTimeout(function(){

    $('.alert').removeClass('alert-success')
    $('.alert').text('')
   },6000)

}).fail(function(){
        $('.send_btn2').text('Error')
        $('.alert').removeClass('alert-success')
        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors while sending the data ')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})



















})
