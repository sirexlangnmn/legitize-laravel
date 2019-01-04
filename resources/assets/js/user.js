$(document).ready(function(){
    
    $('#add-social-media-platform').on('click', function(){
        platform = $('#socialMediaPlatform').val();

        $("#platform-"+platform).attr('disabled', true);

        noFaIcon = false;
        if( (platform == 'bitcointalks') || (platform == 'altcoinstalks')){
            noFaIcon = true;
        }
        
        formInput  = "<div class='col-md-3 mt-3 smp smp-"+platform+"'>"
        formInput += "<div id='accordion'>"
        formInput += "<div class='card'>"
        formInput += "<div class='card-header "+platform+"'>"
        formInput += "<a class='card-link text-decoration-none text-white' data-toggle='collapse'"
        formInput += "data-parent='#accordion' href='.accordion-platform-"+platform+"'>"
        formInput += "<i class='fa fa-"+(noFaIcon == true ? 'bitcoin' : platform)+" float-left mt-1 mr-2'></i>"+platform+"</a>"
        formInput += "<i class='fa fa-remove float-right mt-1 remove-platform' data-platform='"+platform+"'></i>"
        formInput += "</div>"
        formInput += "<div class='collapse show accordion-platform-"+platform+"'>"
        formInput += "<div class='card-body'>"
        formInput += "Platform: <strong>"+platform+"</strong>"
        formInput += "<input type='hidden' class='form-control' name='social-media-platform-"+platform+"'"
        formInput += "value='"+platform+"' placeholder='Platform name' autofocus >"   
        formInput += "<input type='text' class='form-control mt-2' required name='social-media-key-platform-"+platform+"'"
        formInput += "placeholder='Email, Username or Phone' focused>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"

        if(platform !== null){
            $('#smp-social-detail-div').prepend(formInput);
        } else{
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.warning("You cannot add another social media on the same platform.", "Warning");
        }
    });

    $('#add-crypto-wallet-platform').on('click', function(){

        platform = $('#cryptoWalletPlatform').val();

        $("#platform-"+platform).attr('disabled', true);

        formInput  = "<div class='col-md-3 mt-3 smp smp-"+platform+"'>"
        formInput += "<div id='accordion'>"
        formInput += "<div class='card'>"
        formInput += "<div class='card-header "+platform+"'>"
        formInput += "<a class='card-link text-decoration-none text-dark' data-toggle='collapse'"
        formInput += "data-parent='#accordion' href='.accordion-platform-"+platform+"'>"
        formInput += "<i class='fa fa-"+ platform+" float-left mt-1 mr-2'></i>"+platform+"</a>"
        formInput += "<i class='fa fa-remove float-right mt-1 remove-platform' data-platform='"+platform+"'></i>"
        formInput += "</div>"
        formInput += "<div class='collapse show accordion-platform-"+platform+"'>"
        formInput += "<div class='card-body'>"
        formInput += "Platform: <strong>"+platform+"</strong>"
        formInput += "<input type='hidden' class='form-control' name='crypto-wallet-platform-"+platform+"'"
        formInput += "value='"+platform+"' placeholder='Platform name' autofocus >"   
        formInput += "<input type='text' class='form-control mt-2' required name='crypto-wallet-key-platform-"+platform+"'"
        formInput += "placeholder='Wallet key' focused>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"
        formInput += "</div>"

        if(platform !== null){
            $('#smp-crypto-wallet-div').prepend(formInput);
        } else{
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.warning("You cannot add another cyptowallet on the same platform.", "Warning");
        }
    });

    // $(document).on('click', '#edit-remove-platform', function(){

    //     var platform = $(this).data('platform');
 
    //     $("#platform-"+platform).attr('disabled', false);
        
    //     $(this).closest('.smp').remove();
    // });

    $(document).on('click', '.remove-platform', function(){

        var platform = $(this).data('platform');
 
        $("#platform-"+platform).attr('disabled', false);
        
        $(this).closest('.smp').remove();
    });
});