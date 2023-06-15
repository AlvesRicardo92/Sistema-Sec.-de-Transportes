/*!
* Start Bootstrap - Bare v5.0.7 (https://startbootstrap.com/template/bare)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-bare/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
var path = window.location.pathname;
var page = path.split("/").pop();
if (page=="si.php"){
window.addEventListener("load", function() {
	if (document.getElementById("setor").innerText=="CLD"){
		document.getElementById("novo").setAttribute("disabled","");
	}
});
}
else if (page=="impressaoSI.php"){
    window.print();
}
function voltarPaginaInicial(){
	window.location.href = "index3.php";
}
function inserirLinhaTabela(descricao) {
    if (document.getElementById('tipoAtividade').selectedIndex<=0){
        alert("Selecione o tipo de atividade correto");
    }
    else{
        var tbodyRef = document.getElementById('tabelaAtividade').getElementsByTagName('tbody')[0];
        var newRow = tbodyRef.insertRow();
        var newCell = newRow.insertCell();

        var newText = document.createTextNode(descricao);
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn excluir";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        newCell.appendChild(btn);

        document.getElementById('tipoAtividade').value="0";
    }    
}
function removerLinha() {
    var td = event.target.parentNode; 
    var tr = td.parentNode;
    tr.parentNode.removeChild(tr);
}
function inserirLinhaTabelaMaterial(item,quantidade) {
    var valorRadio;
    if (document.getElementById('tipoMaterial').selectedIndex<=0){
        alert("Selecione o material correto");
    }
    else if(document.getElementById('quantidadeMaterial').value===""){
        alert("Digite a quantidade de material utilizada");
    }
    else if(document.getElementById('quantidadeMaterial').value===" "){
        alert("Digite a quantidade de material utilizada");
    }
    else if (parseInt(document.getElementById('quantidadeMaterial').value) < 1){
        alert("Digite a quantidade de material correta");
    }
    else if (isNaN(parseInt(document.getElementById('quantidadeMaterial').value))){
        alert("Digite a quantidade de material correta");
    }
    else if(!document.getElementById('retirada').checked && !document.getElementById('pmsbc').checked && !document.getElementById('consorcio').checked){
        alert("Informe se o material utilizado é da prefeitura, do consórcio ou foi apenas uma retirada");
    }
    else{
        if(document.getElementById('pmsbc').checked){
            valorRadio="PMSBC";
        }
        else if(document.getElementById('consorcio').checked){
            valorRadio="Consórcio";
        }
        else if(document.getElementById('retirada').checked){
            valorRadio="Retirada";
        }
        /*var qtdeTbody = document.getElementById("tabelaMaterial").tBodies.length;
        if (qtdeTbody===0){
            document.getElementById('tabelaMaterial').innerHTML="<tdoby></tbody>";
            var tbodyRef = document.getElementById('tabelaMaterial').getElementsByTagName('tbody')[0];
            var newRow = tbodyRef.insertRow();
            var newCell = newRow.insertCell();
            var newText = document.createTextNode(item);
        }
        else{
            var tbodyRef = document.getElementById('tabelaMaterial').getElementsByTagName('tbody')[0];
            var newRow = tbodyRef.insertRow();
            var newCell = newRow.insertCell();
            var newText = document.createTextNode(item);
        }*/

        var tbodyRef = document.getElementById('tabelaMaterial').getElementsByTagName('tbody')[0];
        var newRow = tbodyRef.insertRow();
        var newCell = newRow.insertCell();
        var newText = document.createTextNode(item);

        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(parseInt(quantidade));
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(valorRadio);
        newCell.className="align-middle";
        newCell.appendChild(newText);

        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn excluir";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        newCell.appendChild(btn);

        document.getElementById('tipoMaterial').value="0";
        document.getElementById('quantidadeMaterial').value="";
        document.getElementById('pmsbc').checked=false;
        document.getElementById('consorcio').checked=false;
        document.getElementById('retirada').checked=false;
    }    
}
function gerarNovoSi(){
    
    var obj= document.getElementById("urgente");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj= document.getElementById("priorizar");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj = document.getElementById("normal");
    obj.removeAttribute("disabled");
    obj.checked=false;


    obj= document.getElementById("siNumero");
    obj.value="";

    colocarHojeNaData();

    obj = document.getElementById("resp01");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("resp02");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("buscaEndereco");
    obj.removeAttribute("disabled");
    
    obj = document.getElementById("logradouro");
    obj.value="";

    obj = document.getElementById("bairro");
    obj.value="";

    obj = document.getElementById("numEndereco");
    obj.value="";

    obj = document.getElementById("destino");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("solicitante");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("assunto");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("obs");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("anotacoes");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("salvar");
    obj.removeAttribute("disabled");
}

/* falta ajustar projeto ---------------------------------------
function gerarNovoProj(){
    
    var obj= document.getElementById("urgente");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj= document.getElementById("priorizar");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj = document.getElementById("normal");
    obj.removeAttribute("disabled");
    obj.checked=false;


    obj= document.getElementById("siNumero");
    obj.value="";

    colocarHojeNaData();

    obj = document.getElementById("resp01");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("resp02");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("buscaEndereco");
    obj.removeAttribute("disabled");
    
    obj = document.getElementById("logradouro");
    obj.value="";

    obj = document.getElementById("bairro");
    obj.value="";

    obj = document.getElementById("numEndereco");
    obj.value="";

    obj = document.getElementById("destino");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("solicitante");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("assunto");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("obs");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("anotacoes");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("salvar");
    obj.removeAttribute("disabled");
	
}
*/
function colocarHojeNaData(){
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;    

       $('#siData').val(today);
}
function enviarForm(){
    /*var table = document.getElementById("tabelaAtividade");
    var contador =0;
    var contadorErro=0;

    for (let i in table.rows) {
        let row = table.rows[i]
        for (let j in row.cells) {
            let col = row.cells[j]
            if (col.innerText==="Monitoramento via Central"){
                contador=1;
                break;
            }
        }  
        if (contador==1){
            break;
        }
    }
    if (contador==0 && document.getElementById('veiculo').value=="0"){
        document.getElementById('veiculo').style.border = "3px solid #FF0000"
        contadorErro+=1;
    }
    else{
        document.getElementById('veiculo').style.border = "1px solid #ced4da"
    }
    if (parseInt(document.getElementById('veiculo').value) > 0 && (document.getElementById('kmInicial').value=='' || parseInt(document.getElementById('kmInicial').value) < 1 || document.getElementById('kmInicial').value==' ' || isNaN(parseInt(document.getElementById('kmInicial').value)) || (parseInt(document.getElementById('kmInicial').value)>parseInt(document.getElementById('kmFinal').value)))){
        document.getElementById('kmInicial').style.border = "3px solid #FF0000"
        contadorErro+=1;
    }
    else{
        document.getElementById('kmInicial').style.border = "1px solid #ced4da";
    }
    if(parseInt(document.getElementById('veiculo').value) > 0 && (document.getElementById('kmFinal').value=="" || parseInt(document.getElementById('kmFinal').value) < 1 || document.getElementById('kmFinal').value==' ' || isNaN(parseInt(document.getElementById('kmFinal').value))|| (parseInt(document.getElementById('kmFinal').value)<parseInt(document.getElementById('kmInicial').value)))){
        document.getElementById('kmFinal').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('kmFinal').style.border = "1px solid #ced4da";
    }
    if (document.getElementById('tipoServico').value=='0'){
        document.getElementById('tipoServico').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('tipoServico').style.border = "1px solid #ced4da";
    }
    if (document.getElementById("tabelaAtividade").rows.length==0){
        document.getElementById('tipoAtividade').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('tipoAtividade').style.border = "1px solid #ced4da";
    }
    
    if (document.getElementById('logradouro').value==''){
        document.getElementById('buscaEndereco').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('buscaEndereco').style.border = "none";
    }
    if (document.getElementById('origem').value=='0'){
        document.getElementById('origem').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('origem').style.border = "1px solid #ced4da";
    }
    if (document.getElementById('ocorrencia').value=='' || document.getElementById('ocorrencia').value==' ' ){
        document.getElementById('ocorrencia').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('ocorrencia').style.border = "1px solid #ced4da";
    }
    if (isNaN(parseInt(document.getElementById('horaInicio').value))){
        document.getElementById('horaInicio').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaInicio').style.border = "1px solid #ced4da";
    }
    if (isNaN(parseInt(document.getElementById('horaFim').value))){
        document.getElementById('horaFim').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaFim').style.border = "1px solid #ced4da";
    }
    if (document.getElementById("numEndereco").value===""||document.getElementById("numEndereco").value===" "){
        document.getElementById("numEndereco").value="S/N"
    }
    if (document.getElementById('horaRecebeu').value > document.getElementById('horaChegou').value && document.getElementById('horaRecebeu').value < "17:00" && document.getElementById('horaChegou').value > "12:00"){
        document.getElementById('horaRecebeu').style.border = "3px solid #FF0000";
        document.getElementById('horaChegou').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaRecebeu').style.border = "1px solid #ced4da";
        document.getElementById('horaChegou').style.border = "1px solid #ced4da";
    }
    if (document.getElementById('horaChegou').value > document.getElementById('horaInicio').value && document.getElementById('horaChegou').value < "17:00" && document.getElementById('horaInicio').value > "12:00"){
        document.getElementById('horaChegou').style.border = "3px solid #FF0000";
        document.getElementById('horaInicio').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaChegou').style.border = "1px solid #ced4da";
        document.getElementById('horaInicio').style.border = "1px solid #ced4da";
    }
    if (document.getElementById('horaInicio').value > document.getElementById('horaFim').value && document.getElementById('horaInicio').value < "17:00" && document.getElementById('horaFim').value > "12:00"){
        document.getElementById('horaInicio').style.border = "3px solid #FF0000";
        document.getElementById('horaFim').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('horaInicio').style.border = "1px solid #ced4da";
        document.getElementById('horaFim').style.border = "1px solid #ced4da";
    }
    if(isNaN(parseInt(document.getElementById('numTalao').value))){
        document.getElementById('numTalao').style.border = "3px solid #FF0000";
        contadorErro+=1;
    }
    else{
        document.getElementById('numTalao').style.border = "1px solid #ced4da";
    }
    if(document.getElementById('numTalao').value=="" || document.getElementById('numTalao').value==" "){
        document.getElementById('numTalao').value=0;
    }
    if(contadorErro>0){
        alert("Erro no preenchimento\nCorriga os campos destacados em vermelho");
    }*/
	var tabela = "";
	var form = document.getElementById("formulario");
	//form.submit();
	var diaria = document.getElementById("diariaNumero").value;
	var data = dovalue;
	var logradouro = document.getElementById("logradouro").value;
	var origem = $("#origem option:selected").text();
	var talao = document.getElementById("numTalao").value;
	var responsavel = document.getElementById("responsavel").value;
	var bairro = document.getElementById("bairro").value;
	var numEndereco = document.getElementById("numEndereco").value;
	var logradouroCruzamento = document.getElementById("logradouroCruzamento").value;
	var ocorrencia = document.getElementById("ocorrencia").value;
	var tipoServico = $("#tipoServico option:selected").text();
	var atividades = "";

	tabela=document.getElementById("tabelaAtividade");
	for (var i = 0, row; row = tabela.rows[i]; i++) {
		for (var j = 0, col; col = row.cells[j]; j++) {
			if (j==0){
				atividades+=row.cells[j].innerText+";";
			}
		}  
	}

	var materialUtilizado = "";
	var quantidadeUtilizada = "";
	var retiradaOuOrigemMaterial = "";
	tabela=document.getElementById("tabelaMaterial");
	for (var i = 0, row; row = tabela.rows[i]; i++) {
		for (var j = 0, col; col = row.cells[j]; j++) {
			if(j==0){
				materialUtilizado+=row.cells[j].innerText+";";
			}
			if(j==1){
				quantidadeUtilizada+=row.cells[j].innerText+";";
			}
			if(j==2){
				retiradaOuOrigemMaterial+=row.cells[j].innerText+";";
			}
		}  
	}
	
	var horaRecebeu = document.getElementById("horaRecebeu").value;
	var horaChegou = document.getElementById("horaChegou").value;;
	var horaInicio = document.getElementById("horaInicio").value;;
	var horaFim = document.getElementById("horaFim").value;;
	var veiculo = $("#veiculo option:selected").text();
	var kmInicial = document.getElementById("kmInicial").value;
	var kmFinal = document.getElementById("kmFinal").value;
	var obs = document.getElementById("obs").value;
	var dt = new Date();
	var hora = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	console.log("Número da diária: " + diaria+"\n" +
				"Data: " + data+"\n" +
				"Hora: " + hora+"\n" +
				"Origem: " + origem+"\n" +
				"Número do talão: " + talao+"\n" +
				"Responsável: " + responsavel+"\n" +
				"Logradouro: " + logradouro+"\n" +
				"Bairro: " + bairro+"\n" +
				"Número do endereço: " + numEndereco+"\n" +
				"Logradouro do Cruzamento: " + logradouroCruzamento+"\n" +
				"Descrição: " + ocorrencia+"\n" + 
				"Tipo de serviço: " + tipoServico+"\n" + 
				"Atividades: " + atividades+"\n" + 
				"Materiais utilizados: " + materialUtilizado+"\n" + 
				"Quantidades utilizadas: " + quantidadeUtilizada+"\n" + 
				"Retirada ou Origem do Material: " + retiradaOuOrigemMaterial+"\n" + 
				"Hora que recebeu o serviço: " + horaRecebeu+"\n" + 
				"Hora que chegou no local: " + horaChegou+"\n" + 
				"Hora que iniciou o serviço: " + horaInicio+"\n" + 
				"Hora que terminou o serviço: " + horaFim+"\n" + 
				"Veículo: " + veiculo+"\n" + 
				"KM Inicial: " + kmInicial+"\n" + 
				"KM Final: " + kmFinal+"\n" + 
				"OBS: " + obs+"\n"
				)
	
	$.ajax({
		url: 'enviaForm.php',
		async:false,
		type: 'POST',
		data: { numeroDiaria: diaria,
				data: data,
				hora: hora,
				origemOcorrencia: origem,
				numeroTalao: talao,
				responsavelCadastro: responsavel,
				logradouroOcorrencia: logradouro,
				bairroOcorrencia: bairro,
				numeroEndereco: numEndereco,
				logradouroCruzamento: logradouroCruzamento,
				descricaoOcorrencia: ocorrencia,
				tipoServico: tipoServico,
				atividadesExecutadas: atividades,
				materiaisUtilizados: materialUtilizado,
				quantidadeMateriaisUtilizados: quantidadeUtilizada,
				retiradaOuOrigemMaterial: retiradaOuOrigemMaterial,
				horaRecebeuServico: horaRecebeu,
				horaChegouLocal: horaChegou,
				horaIniciouServico: horaInicio,
				horaTerminouServico: horaFim,
				veiculoUtilizado: veiculo,
				kmInicialVeiculo: kmInicial,
				kmFinalVeiculo: kmFinal,
				obs: obs},
		dataType:'text',
		done: function () {
			alert("feito");
		},
		success: function (resultado) {
			/*if (resultado!="Não encontrado"){
				var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
				tabelaEndereco.innerHTML=resultado;
			}
			else{
				alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
			}
			alert(resultado);*/
			if (resultado==1){
				alert("Informações salvas com sucesso!");
			}
			else{
				console.log("resultado= " + resultado);
				alert("Erro ao salvar as informações\nVerifique se há algum erro de preenchimento ou entre em contato com o Administrador do Sistema");
			}
		},
		fail: function(){
			alert("falha");
		},
		error: function(){
			alert("error");
		}
	}); 
}
function buscarEndereco(enderecoDigitado){
    if (document.getElementById('endereco').value==="" || document.getElementById('endereco').value===" "){
        alert("Digite primeiro o logradouro ou parte dele");
    }
    else{
        $.ajax({
            url: 'buscarEndereco.php',
            async:false,
            type: 'POST',
            data: {endereco: enderecoDigitado},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado!="Não encontrado"){
                    var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML=resultado;
                }
                else{
                    var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML="";
                    alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
                    /*var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML="<tr><td>Endereço não encontrado</td></tr><tr><td>Digite parte do endereço ou</td></tr><tr><td><button type='button' class='btn escolherEndereco'><i class='fas fa-check' style='font-size:16px;'>Cadastre um endereço novo</i></button></td></tr>";*/
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
    }
}
function buscarSI(dados){
	var tipoPesquisa;
    if(document.getElementById("numeroPesquisa").checked){
        tipoPesquisa="numero";
    }
    if(document.getElementById("enderecoPesquisa").checked){
        tipoPesquisa="endereco";
    }
    if(document.getElementById("funcionarioPesquisa").checked){
        tipoPesquisa="funcionario";
    }
    if (document.getElementById('numeroPesquisa').value===false && document.getElementById('enderecoPesquisa').value===false && document.getElementById('funcionarioPesquisa').value===false){
        alert("Selecione o tipo de busca: Número, Endereço ou Funcionário");
    }
    if (document.getElementById('textoBusca').value==="" || document.getElementById('textoBusca').value===" "){
        alert("Digite os dados para pesquisa");
    }
    else{
        $.ajax({
            url: 'buscarSI.php',
            async:false,
            type: 'POST',
            data: {tipoPesquisa: tipoPesquisa,
                    valorPesquisado:document.getElementById('textoBusca').value },
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado!="Não encontrado"){
                    var tabelaEndereco = document.getElementById('tabelaResultadoSI').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML=resultado;
                }
                else{
                    alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
    }
}
/*function pegarEnderecoEscolhido() {
    var id =event.target.parentNode.parentNode.parentNode.id;
    var data = document.getElementById(id).querySelectorAll(".end"); 
    var data2 = document.getElementById(id).querySelectorAll(".bai");   
    var logradouro = data[0].innerHTML;
    var bairro = data2[0].innerHTML;
    
    if (document.getElementById("chamada").innerText==="L1"){
        document.getElementById('logradouro').value= logradouro;
        document.getElementById('bairro').value=bairro;
        document.getElementById("numEndereco").removeAttribute("disabled");
        document.getElementById('fecharModal').click();
    }
    else{
        document.getElementById('logradouroCruzamento').value= logradouro;
        document.getElementById('fecharModal').click();
    }
}*/
function passaChamada(valor){
    document.getElementById('chamada').innerText= valor;
}
function enviarSI(){
	var resp1 = $("#resp01 option:selected").text();
	var destino = $("#destino option:selected").text()
	var assunto = document.getElementById('assunto').value;
	var logradouro = document.getElementById('logradouro').value;
	var prioridade;
	if(document.getElementById('urgente').checked == true){
		prioridade="URGENCIAR";
	}
	else if(document.getElementById('priorizar').checked == true){
		prioridade="PRIORIZAR";
	}
	else if(document.getElementById('normal').checked == true){
		prioridade="NORMAL";
	}
	else{
		prioridade="";
	}
	
	//console.log(resp1 + "|" + destino + "|" + assunto + "|" + logradouro + "|" + prioridade);
	if (resp1 == 0 || 
		destino == 0 || 
		assunto == "" || 
		assunto== " " || 
		logradouro== "" || 
		prioridade== ""){
			document.getElementById('resp01').style.border = "3px solid #FF0000";
			document.getElementById('destino').style.border = "3px solid #FF0000";
			document.getElementById('assunto').style.border = "3px solid #FF0000";
			document.getElementById('logradouro').style.border = "3px solid #FF0000";
			document.getElementById('urgente').style.border = "3px solid #FF0000";
			document.getElementById('priorizar').style.border = "3px solid #FF0000";
			document.getElementById('normal').style.border = "3px solid #FF0000";
			alert("OS campos em destaque são obrigatórios. Verifique se há algum sem preenchimento");
	}
	else{
			$.ajax({
            url: 'retornaMaximoSI.php',
            async:false,
            type: 'POST',
            data: {},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado>0){
                    //alert("Informações salvas com sucesso!");
					//salvar
                    var numeroSI = resultado;
					$.ajax({
						url: 'enviaSI.php',
						async:false,
						type: 'POST',
						data: { numeroSI: numeroSI,
								siData: document.getElementById('siData').value,
								responsavel1: resp1,
								responsavel2: $("#resp02 option:selected").text(),
								destino: destino,
								solicitante: document.getElementById('solicitante').value,
								assunto: assunto,
								logradouro: logradouro,
								bairro: document.getElementById('bairro').value,
								numeroEndereco: document.getElementById('numEndereco').value,
								obs: document.getElementById('obs').value,
								anotacoes: document.getElementById('anotacoes').value,
								prioridade: prioridade,
                                iniciais: document.getElementById('iniciais').innerText},
						dataType:'text',
						done: function () {
							alert("feito");
						},
						success: function (resultado) {
							 if(isNaN(resultado)){
								console.log("resultado= " + resultado);
							 }
							 else{
                                document.getElementById('siNumero').value= numeroSI;
                                var resposta = confirm("Salvo com sucesso!\n S.I. nº: "+numeroSI+"\nDeseja imprimir?");
								if (resposta) {
                                    document.cookie = "numeroSI=" + numeroSI + "; expires=600000; path=/";
                                    var dataArray = document.getElementById('siData').value.split("-");
                                    document.cookie = "anoSI=" + dataArray[0] + "; expires=600000; path=/";
                                    imprimirSI();
                                }
							 }
						},
						fail: function(){
							alert("falha");
						},
						error: function(){
							alert("error");
						}
					});
                }
                else{
                    console.log("resultado= " + resultado);
                    alert("Erro ao salvar as informações\nVerifique se há algum erro de preenchimento ou entre em contato com o Administrador do Sistema");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
	}	
}
function logar(){
	var usuario = document.getElementById('typeEmailX').value;
	var senha = document.getElementById('typePasswordX').value;
	$.ajax({
            url: 'checarLogin.php',
            async:false,
            type: 'POST',
            data: {usuario:usuario,senha:senha},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado>0){
                    window.location.href="index3.php";
                }
                else{
                    console.log("resultado= " + resultado);
                    alert("Erro ao logar. Verifique o console");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
}
function imprimirSI(){
    window.location.href = "impressaoSI.php";
}
function desbloquearAlteracaoSI(){
    /*
    Fazer procedimento para desbloquear os campos para o usuário alterar o conteúda da SI, quando for a mesma pessoa que criou
    Fazer procedimento para quando clicar no salvar, atualizar ao invés de salvar denovo. 
    Algo como 
        if(siNumero!=""){
            Fazer Update
        }
        else{
            Fazer insert
        }
    
    */
}
$(document).ready(function() {
    $(document).on('click', '.excluir', function() {
        $(this).closest('tr').remove();
     });
     $(document).on('click', '.escolherEndereco', function() {
        var linhaSelecionada = $(this).closest('tr');
        var primeiroTD = "";
        var segundoTD = "";
        $.each(linhaSelecionada , function() {
            primeiroTD = $(this).find('td:first');
            segundoTD = $(this).find('td:eq(1)');
          });
        $('#logradouro').val(primeiroTD.text());
        $('#bairro').val(segundoTD.text());
        $("#numEndereco").removeAttr("disabled");
        $('#fecharModal').click();
        /*if ($("#chamada").text()==="L1"){
            $('#logradouro').val(primeiroTD.text());
            $('#bairro').val(segundoTD.text());
            $("#numEndereco").removeAttr("disabled");
            $('#fecharModal').click();
        }
        else{
            $('#logradouroCruzamento').val(primeiroTD.text());
            $('#fecharModal').click();
        }*/
    });
    $(document).on('click', '.escolherSI', function() {
        var linhaSelecionada = $(this).closest('tr');
        var primeiroTD = "";
        var siNumeroAno;
        $.each(linhaSelecionada , function() {
            primeiroTD = $(this).find('td:first');
            siNumeroAno = primeiroTD.text().split("/");
            //segundoTD = $(this).find('td:eq(1)');
        });
        $.ajax({
            url: 'trazInfoSI.php',
            async:false,
            type: 'POST',
            data: {idSI:siNumeroAno[0],
                   anoSI:siNumeroAno[1]},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                //console.log("resultado " + resultado);
                var retorno = resultado.split('|');
                //console.log("retorno " + retorno);
                if (Array.isArray(retorno)){
                    if(retorno[0]>0){
                        $('#siNumero').val(retorno[0]);
                        $('#siData').val(retorno[1].substring(0,10));
                        $('#resp01 option:contains("'+$.trim(retorno[3])+'")').prop('selected', true);
                        $('#resp02 option:contains("'+$.trim(retorno[4])+'")').prop('selected', true);
                        $('#destino option:contains("'+$.trim(retorno[5])+'")').prop('selected', true);
                        $('#solicitante').val(retorno[6]);
                        $('#assunto').val(retorno[7]);
                        $('#logradouro').val(retorno[8]);
                        $('#numEndereco').val(retorno[9]);
                        $('#bairro').val(retorno[10]);
                        $('#obs').val(retorno[11]);
                        $('#anotacoes').val(retorno[12]);
                        if(retorno[2]=="URGENCIAR"){
                            document.getElementById("urgente").checked=true;
                        }
                        else if(retorno[2]=="PRIORIZAR"){
                            document.getElementById("priorizar").checked=true;
                        }
                        else if(retorno[2]=="NORMAL"){
                            document.getElementById("normal").checked=true;
                        }
                        $('#fecharModalPesquisa').click();
                        if(retorno[13]===document.getElementById("iniciais").innerText){
                            //desbloquearAlteracaoSI();
                            alert("Mesmo usuário da criação");
                        }
                        else{
                            alert("Não é o mesmo usuário da criação");
                        }
                    }
                    else{
                        console.log("primeiro item não é >0 = " + retorno);
                        alert("Erro ao pesquisar a SI. Verifique o console");
                    }
                }
                else{
                    console.log("retorno não é um array = " + retorno);
                    alert("Erro ao pesquisar a SI. Verifique o console");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
        $('#fecharModalPesquisa').click();
    });
});