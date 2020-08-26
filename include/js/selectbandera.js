$(document).ready(function(){           
            $("#seleccion").change(function() {
                var num = $(this).val();
               
                if(num == 1){
                    valor = 'getmoney.png';
                }
                if(num == 2){
                    valor = 'home.png';
                }
               $('#caja1').prop("src", "../include/img/Iconos/" + valor);
            });           
        });
