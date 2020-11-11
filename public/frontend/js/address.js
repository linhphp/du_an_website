$(document).ready(function(){
    $('select[name="province"]').on('change',function(){
        var cityId = $(this).val();
        console.log(cityId);
        if(cityId){
            $.ajax({
                url: 'index/districts/'+cityId,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="district"]').empty();
                    $('select[name="district"]').append(
                        '<option>'+'----'+'</option>'
                        );
                    $.each(data,function(key,value){
                        $('select[name="district"]').append(
                            '<option value = "'+key+'">'+value+'</option>'
                            );
                    });
                }
            });
        }
        else{
            $('select[name="district"]').empty();
        }
    });
    $('select[name="district"]').on('change',function(){
        var districtId = $(this).val();
        if(districtId != "" && districtId !="----" ) {
            $.ajax({
                url: 'index/wards/'+districtId,
                type: 'GET',
                dataType: 'json',
                success: function(data2){
                    $('select[name="ward"]').empty();
                    $('select[name="ward"]').append(
                        '<option>----</option>'
                        );
                    $.each(data2,function(key,value){
                        $('select[name="ward"]').append(
                            '<option value = "'+key+'">'+value+'</option>'
                            );
                    });
                }
            });
        }
        else{
            $('select[name="ward"]').empty();
        }
    });
});