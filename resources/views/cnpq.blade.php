<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dados do CNPq</title>


<!-- Styles -->
<style>
html, body {
	background-color: #fff;
	color: #000;
	font-family: 'Raleway', sans-serif;
	font-weight: 100;
	height: 100vh;
	margin: 0;
}

.full-height {
	height: 100vh;
}

.flex-center {
	align-items: center;
	display: flex;
	justify-content: center;
}

.position-ref {
	position: relative;
}

.top-right {
	position: absolute;
	right: 10px;
	top: 18px;
}

.content {
	text-align: center;
}

.title {
	font-size: 84px;
}

.links>a {
	color: #000;
	padding: 0 25px;
	font-size: 12px;
	font-weight: 600;
	letter-spacing: .1rem;
	text-decoration: none;
	text-transform: uppercase;
}

.m-b-md {
	margin-bottom: 30px;
}
</style>
</head>
<body>
	<div class="content">
		<div class="title m-b-md">CNPq - Licitacoes</div>

		<div class="links">
		<div class="links">
			<a href="/">Sebrae</a> 
			<a href="/cnpq">CNPQ</a> 
			<a href="/ssp-df">SSP-DF</a> 
		</div>
		<br>
                
        <?php
        // titulo
        $data = [];
        array_push($data, [
            $crawler->filter('.table-data > tr > td > .licitacoes > .titLicitacao')->each(function ($node) {
                return $node->text();
            })
        ]);
        
        // text
        array_push($data, [
            $crawler->filter('.table-data > tr > td > .licitacoes > .integra > .cont_licitacoes > p')->each(function ($node) {
                return $node->text();
            })
        ]);
        
        // a
        array_push($data, [
            $crawler->filter('.table-data > tr > td > .licitacoes > .integra > .download-list > li > a')->each(function ($node) {
                return $node->text();
            })
        ]);
        
        // a href
        array_push($data, [
            $crawler->filter('.table-data > tr > td > .licitacoes > .integra > .download-list > li > a')->each(function ($node) {
                return $node->attr('href');
            })
        ]);
        
        ?>
    </div>
	<div
		style="width: 800px; border-radius: 5px; backgroud: #CCC; margin-left: 500px; text-align: left;">
		<table>
    		<?php
            $content = [];
            foreach ($data[0] as $ori => $k) {
                for ($i = 0; $i <= count($k); $i ++) {
                    if (isset($k[$i])) {
                        $texto = $data[1];
                        $a = $data[2];
                        $href = $data[3];
                        ?>
                    	<tr style="height: 70px; color: #000 !important;">
        					<td colspan="7"><p style="color: #000 !important;">
        						<b><?=$k[$i]; ?></b> <br><?=$texto[0][$i]?></p>Arquivo: <a href="http://www.cnpq.br/<?=isset($href[0][$i]) ? $href[0][$i] : ''; ?>"><?=isset($a[0][$i]) ? $a[0][$i] : ''; ?></a>
        					</td>
        				</tr> 
                    	<?php
                    }
                }
            }
            ?> 
        </table>
	</div>
</body>
</html>
