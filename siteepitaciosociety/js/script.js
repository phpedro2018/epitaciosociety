$(function(){
	$('#data').mask('00/00/0000');
	$('#hora').mask('00:00:00');
	$('#telefone').mask('(00) 0000-0000');
	$('#celular').mask('000000000');
	$('#CPF').mask('000.000.000-00');
	$('#IP').mask('000.000.000.000');
	$('#CEP').mask('00000-000');
	$('#preco, #qtdTotal, #qtdMinima').mask('#.##0,00', {reverse:true});
	
	
});