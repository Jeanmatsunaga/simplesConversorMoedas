<html>
  <title> Conversor de Moedas, jeanmatsunaga.com/conversor</title>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Conversor de Moedas">
    <meta name="author" content="Jean Matsunaga">

    <!-- Núcleo do Bootstrap CSS -->
    <link href="http://getbootstrap.com.br/v4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para o template -->
    <link href="http://getbootstrap.com.br/v4/examples/cover/cover.css" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <script>
            // Para eventos quanto a tela carregar
            $(document).ready(function()
            {
                // Armazenará a URL para consulta
                var v_url_moeda = "http://api.promasters.net.br/cotacao/v1/moedas";

                // Carrega os tipos de moedas utilizadas
                $.getJSON(v_url_moeda,function(p_resultado)
                {
                    // Cria um loop para coletar as moedas vigentes
                    $.each(p_resultado.moedas, function(p_registro, p_dado)
                    {
                        $('.moeda').append($('<option>',
                        {
                             value: p_dado.moeda
                            ,text: '[' + p_dado.moeda + '] ' + p_dado.nome
                        }));
                    });
                });



                $( ".botao" ).click(function()
                {
                    
					// Armazenará a URL para consulta
                    var v_tipo_moeda    =   $('.moeda').val();
                    var v_valor_real    =   $('.valor_atual').val();
                    var v_url_moeda  = "http://api.promasters.net.br/cotacao/v1/valores?moedas=" + v_tipo_moeda;

                    // Verifica se o campo está zerado
                    if(v_valor_real === 0)
                    {
                        // Emite um alerta informando o campo não preenchido
                        alert('O campo de valor em reais não foi preenchido! Verifique.');
                        // Finaliza o processo
                        return;
                    }

                    // Carrega os valores à serem processados
                    $.getJSON(v_url_moeda,function(p_resultado)
                    {
                        // Cria um loop para coletar as moedas vigentes
                        $.each(p_resultado.valores, function(p_registro, p_dado)
                        {
                            $('.resultado').val(v_tipo_moeda + " " + (v_valor_real/p_dado.valor));
                        });
                    });
                });
            });
        </script>
	
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h4 class="masthead-brand"><img height=60 border=1 weight=30 src="http://api.promasters.net.br/cotacao/imagens/me.jpg"></h4>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Contato</a>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h4 class="cover-heading">ConversoR$<img height=150 weight=30 src="https://www.anz.com.au/content/anzcomau/en/personal/travel-international/foreign-exchange-rates/currency-by-anz/_jcr_content/anz_default_par/columns_0/anz_default_par2/textimage/image.img.960.high.png/1498636373317.png"></h1>
            <p class="lead">
			
			
			<!-- Escolhe o valor da moeda atual -->
        Valor (R$): <input  class="valor_atual" type="number" placeholder="R$" step="0.01" min="0" max="999999999" value="10.00">
        <select class="moeda" name="moeda"></select>
        <input  class="botao" type="button" value="Converter">

        <br/>
		<br/>
        Resultado: <input class="resultado" type="text"  size="41" disabled>
			
			
			</p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Desenvolvido em javascript + bootstrap utilizando a API de moedas do ProMasters, disponível em: <a href="http://api.promasters.net.br/cotacao/#documentacao">http://api.promasters.net.br/cotacao/#documentacao</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="http://getbootstrap.com.br/v4/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com.br/v4/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
