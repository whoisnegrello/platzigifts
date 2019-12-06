(function($) {
    console.log('Hola WordPress');
    $("select").change(function(){
        $.ajax({
            url: pg.ajaxurl,
            method: "POST",
            data:{
                "action" : "filtroProductos",
                "categoria" : $(this).find(":selected").val()
            },
            beforeSend: function(){
                $("#resultado").html("Cargando...");
            },
            success:function(data){
                let html = "";
                data.forEach(item => {
                    html += `<div class="col-md-4 col-12 my-3">
                        <figure>${item.imagen}</figure>
                        <h4 class="my-2">
                            <a href="${item.link}">${item.titulo}</a>
                        </h4>
                    </div>`;
                })
                $("#resultado").html(html);
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $(document).ready(function(){
        $.ajax({
            url: pg.apiurl+"novedades/3",
            method: "GET",
            beforeSend: function(){
                $("#resultado-novedades").html("Cargando...");
            },
            success:function(data){
                let html = "";
                data.forEach(item => {
                    html += `<div class="col-md-4 col-12 my-3">
                        <figure>${item.imagen}</figure>
                        <h4 class="my-2">
                            <a href="${item.link}">${item.titulo}</a>
                        </h4>
                    </div>`;
                })
                $("#resultado-novedades").html(html);
            },
            error: function(error){
                console.log(error);
            }
        });
    });
})(jQuery);