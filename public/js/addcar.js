$('.cartCk').on('click', function(e){
    e.preventDefault();
    var url = window.location.origin;
    var that = $(this);
    $(this).css({'pointer-events': 'none'});
    var setBt =  $(this).prev('.hie');
    setBt.show();
    var total = $('.setTotal').html();
    var id = $(this).attr('id');
    $.ajax({
        url : url + '/add-card',
        data : 'id=' + id,
        type : 'GET',
        success : function(data){
            if(data.success == true){
                var setTotal = Number(total);
                setTotal = setTotal+1;
                $('.setTotal').html(setTotal);
                setTimeout(function(){
                    that.css({'pointer-events': 'auto'});
                    setBt.hide();
                }, 300);
            }
        }
    });
});
