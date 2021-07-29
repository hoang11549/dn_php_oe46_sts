
$('#search').on('keyup',function(){
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: "{{ Route('searchUser') }}",
        data: {
            'search': $value
        },
        success:function(data){
            $('tbody').html(data);
        }
    });
})
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
