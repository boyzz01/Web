    $(document).ready(function(){
                "Use Strict";

                $('#slideshow').desoSlide({
                    thumbs: $('ul.slideshow_thumbs li > a'),
                    effect: {
                        provider: 'animate',
                        name: 'fade'
                    }

                })
                
                if($("#datatable").length > 0){
                    $('#datatable').DataTable({
                        'paging'      : true,
                        'lengthChange': false,
                        'searching'   : true,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : false
                      })
                    }

                // if($('#line-chart').length > 0){

                //     var line =  new Morris.Line({
                //             element: 'line-chart',
                //             resize: true,
                //             data: [],
                //             xkey: 'tanggal',
                //             ykeys: ['total'],
                //             labels: ['Total Transaksi'],
                //             parseTime: false, 
                //             lineColors: ['#3c8dbc'],
                //             hideHover: 'auto'
                //         });

                //     var url = window.location.pathname
                //     $.ajax({
                //         url: url+"dashboard/getChart",
                //         type: "POST",
                //         dataType: 'JSON',
                //                 beforeSend: function()
                //                 {
                //                     // <a id="load-more" class="btn btn-info"><i class="fa fa-spinner fa-spin fa-fw"></i> Load More Data</a>
                //                     $("#loader").show();
                //                 }
                //         }).done(function(data){
                //             //console.log(data);
                //             $("#loader").hide();
                //             $("#line-chart").fadeIn(1000)
                //             line.setData(data)
                            
                //         }).fail(function(jqXHR, ajaxOptions, thrownError){
                //             aktif = 0;
                //             alert('server not responding...');
                //         });
                // }
                

    
          
                // $('.select2').select2({
                //     placeholder: "Pilih Username",
                //     allowClear: true
                // })

                $(".alert").hide(5000);
    
                $('#datatable').on('click',".delete-link",function(e){
                e.preventDefault();
                var getLink = $(this).attr('href');
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data yang anda hapus tidak bisa dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = getLink
                    } else {
                        return false;
                    }
                });  
                });

              
            // if($('#table-data').length > 0 ){
            //     var aktif = 0;
            //     $(window).scroll(function(){
            //         if(($(window).scrollTop() + $(window).height() >= $(document).height()) && !aktif){
            //             aktif = 1;
            //             var last_id = $(".table-content:last").data("id");
            //             var last_no = $(".table-content:last").data("no");    
            //             var url = $(".table-content").data("url");
            //             console.log(last_id);
            //             $("#not_found").hide();
            //             $("#loader").hide();

            //             $.ajax({
            //                     url: url,
            //                     type: "POST",
            //                     data:{id: last_id, no: last_no,filter:$("input[name='q']").val()},
            //                     beforeSend: function()
            //                     {
            //                         // <a id="load-more" class="btn btn-info"><i class="fa fa-spinner fa-spin fa-fw"></i> Load More Data</a>
            //                         $("#loader").show();
            //                     }
            //             }).done(function(data){
            //                 setTimeout(function() {
            //                     $("#loader").hide();
            //                     if(data != "404"){
            //                     $("#table-data").append(data);
            //                     data = null;
            //                 }else{
            //                     $("#not_found").show();
            //                 }
            //                 aktif = 0;
            //                 }, 1000);
                            
            //             }).fail(function(jqXHR, ajaxOptions, thrownError){
            //                 aktif = 0;
            //                 alert('server not responding...');
            //             });

            //         }else{
            //             console.log("gagal")
            //         }
               
                    
            //     })

            // }

                
                    $("input[name='q']").on('keyup',function(){
                        // setTimeout(function(){ alert("Hello");    
                        // $("#table-data").empty();
                        var url = window.location.pathname
                        
                        $("#not_found").hide();
                        $.ajax({
                                url: url,
                                type: "POST",
                                data:{filter: $(this).val(), status:'aktif'},
                                beforeSend: function()
                                {
                                    // <a id="load-more" class="btn btn-info"><i class="fa fa-spinner fa-spin fa-fw"></i> Load More Data</a>
                                    $("#loader").show();
                                }
                        }).done(function(data){
                            console.log(data)
                            setTimeout(function() {
                                $("#loader").hide();
                                if(data != "404"){
                                $("#table-data").empty().append(data);
                            }else{
                                $("#table-data").empty();
                                $("#not_found").show();
                            }
                            }, 1000);
   
                           
                        }).fail(function(jqXHR, ajaxOptions, thrownError){
                            alert('server not responding...');
                        });
                    }) 
                    
                    $('.money').mask('#.##0',{reverse: true}); 
                    $('.hp').mask('0000000000000',{reverse: true}); 
                    $('.pin').mask('000000');      

            });