$('#search').on('keyup',function(){
    $value = $(this).val();
    routeSearch =$('.routeSearch').val();
    $.ajax({
        type: 'get',
        url: routeSearch,
        data: {
            'search': $value
        },
        success:function(data){
            $('tbody').html(data);
        }
    });
})
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
