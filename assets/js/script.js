$(function(){
  function calcularIdade(dataNasc){
    if(!dataNasc) return '';
    const nasc = new Date(dataNasc);
    const hoje = new Date();
    let idade = hoje.getFullYear() - nasc.getFullYear();
    const mes = hoje.getMonth() - nasc.getMonth();
    if (mes < 0 || (mes === 0 && hoje.getDate() < nasc.getDate())) idade--;
    return idade;
  }

  $('#nascimento').on('change', function(){
    $('#idade').val(calcularIdade($(this).val()));
  });

  let contador = 0;
  function adicionarExperiencia(){
    const id = contador++;
    const bloco = `
      <div class="experiencia border rounded p-3 mb-2" data-id="${id}">
        <div class="d-flex justify-content-between">
          <strong>Experiência ${id+1}</strong>
          <button type="button" class="btn btn-sm btn-danger remover">Remover</button>
        </div>
        <div class="row g-2 mt-2">
          <div class="col-md-6"><input name="experiencias[${id}][empresa]" class="form-control" placeholder="Empresa"></div>
          <div class="col-md-6"><input name="experiencias[${id}][cargo]" class="form-control" placeholder="Cargo"></div>
          <div class="col-md-4"><input name="experiencias[${id}][inicio]" class="form-control" placeholder="Início"></div>
          <div class="col-md-4"><input name="experiencias[${id}][fim]" class="form-control" placeholder="Término"></div>
          <div class="col-12"><textarea name="experiencias[${id}][descricao]" class="form-control" placeholder="Descrição"></textarea></div>
        </div>
      </div>`;
    $('#lista-experiencias').append(bloco);
  }

  $('#adicionar-experiencia').on('click', function(){ adicionarExperiencia(); });
  $('#lista-experiencias').on('click', '.remover', function(){
    $(this).closest('.experiencia').remove();
  });

  adicionarExperiencia();
});
