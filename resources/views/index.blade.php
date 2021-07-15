<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="text-form" style="display:flex;justify-content:center;padding-top:40px">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="row justify-content-center" style="padding:20px 10px">
                <form id="register-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="name" id="name" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" maxlength="50" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="18">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" maxlength="9" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" name="street" id="street" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">Number</label>
                            <input type="text" class="form-control" name="number" id="number" maxlength="10" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="district">District</label>
                            <input type="text" class="form-control" name="district" id="district" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" maxlength="50" required>
                        </div>
                    </div>
                    <input type="hidden" name="client-id" value="">
                    <div class="row">
                        <div class="col-md-6" style="display:flex; justify-content:center;">
                            <button id="btn-save" class="btn btn-success" style="width:40%;border-radius:25px">Salvar</button>
                        </div>
                        <div class="col-md-6" style="display:flex; justify-content:center;">
                            <button id="btn-update" class="btn btn-primary" style="width:40%;border-radius:25px" disabled="disabled">Atualizar</button>
                        </div>
                    </div>
                </form>  
            </div>

            <div class="table-responsive" style="margin-top:20px">
                <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 10px;">
                    <thead>
                        <tr>
                        <th style="width: 20%;text-align: center;">Nome</th>
                        <th style="width: 10%;text-align: center;">CPF</th>
                        <th style="width: 15%;text-align: center;">CNPJ</th>
                        <th style="width: 15%;text-align: center;">Rua</th>
                        <th style="width: 15%;text-align: center;">Bairro</th>
                        <th style="width: 15%;text-align: center;">Cidade</th>
                        <th style="width: 10%;text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr class="client-table">
                            <td>{{$client->name}} {{ $client->lastname}}</td>
                            <td class="cpf">{{$client->cpf}}</td>
                            <td class="cnpj">{{$client->cnpj}}</td>
                            <td>{{$client->street}}</td>
                            <td>{{$client->district}}</td>
                            <td>{{$client->city}}</td>
                            <td>
                                

                                <form name="client-form-edit" id="client-form-edit" style="float:left;">
                                    @csrf       
                                    <button class="edit-client opacity-btn" data-id="{{$client->id}}" title="Editar">
                                        <i class="fas fa-edit" style="color:orange;font-size:20px;margin-top:10px"></i>
                                    </button>
                                </form> 
        
                                <form name="client-form-delete" id="client-form-delete">
                                    @csrf       
                                    <button class="delete-client opacity-btn" data-id="{{$client->id}}" title="Excluir">
                                        <i class="fa fa-trash client-delete-icon" aria-hidden="true"></i>
                                    </button>
                                </form>                         
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(function() {
                $("#btn-save").click(function(event) {
                    event.preventDefault();
                    let name = $("input[name='name']").val();
                    let lastname = $("input[name='lastname']").val();
                    let cpf = $("input[name='cpf']").val();
                    let cnpj = $("input[name='cnpj']").val();
                    let zipcode = $("input[name='zipcode']").val();
                    let street = $("input[name='street']").val();
                    let number = $("input[name='number']").val();
                    let district = $("input[name='district']").val();
                    let city = $("input[name='city']").val();
                    let _token = $("input[name='_token']").val();

                    $.ajax({
                        url: "/clients",
                        type:'POST',
                        data: {name:name, lastname:lastname, cpf:cpf, cnpj:cnpj, zipcode:zipcode, street:street, number:number, district:district, city:city, _token:_token},
                        success: function(data) {
                            let icon = 'success';
                            
                            if (data.success === false)
                                icon = 'error'
                            if (data.success === true) {
                                $("input[type='text']").each(function() {
                                    $(this).val('');
                                });
                            }

                            Swal.fire({
                            position: 'top-end',
                            icon: icon,
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                            })

                            document.location.reload(true);
                        }
                    });
                });
            });

            $(".delete-client").click(function(event) {
                event.preventDefault();
                let client_id = $(this).data("id");
                let _token = $("input[name='_token']").val();
            
                $.ajax({
                    url: "/clients/delete/",
                    type:'DELETE',
                    data: {id:client_id, _token:_token},
                    success: function(data) {
                        let icon = 'success';
                            
                        if (data.success === false) {
                            icon = 'error'
                        }

                        Swal.fire({
                        position: 'top-end',
                        icon: icon,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                        })

                        if (data.success === true) {
                            document.location.reload(true);
                        }
                    }
                });
            });

            $(".edit-client").click(function(event) {
                event.preventDefault();
                let client_id = $(this).data("id");
                let _token = $("input[name='_token']").val();
            
                $.ajax({
                    url: "/clients/edit",
                    type:'POST',
                    data: {id:client_id, _token:_token},
                    success: function(data) {

                        $("input[name='name']").val(data.client.name);
                        $("input[name='lastname']").val(data.client.lastname);
                        $("input[name='cpf']").val(data.client.cpf);
                        $("input[name='cnpj']").val(data.client.cnpj);
                        $("input[name='zipcode']").val(data.client.zipcode);
                        $("input[name='street']").val(data.client.street);
                        $("input[name='number']").val(data.client.number);
                        $("input[name='district']").val(data.client.district);
                        $("input[name='city']").val(data.client.city);
                        $("input[name='client-id']").val(data.client.id);

                        console.log(data);
                        $("#btn-save").attr("disabled", true);
                        $("#btn-update").attr("disabled", false);
                        $("#name").focus();
                    }
                });
            });

            $("#btn-update").click(function(event) {
                event.preventDefault();
                let name = $("input[name='name']").val();
                let lastname = $("input[name='lastname']").val();
                let cpf = $("input[name='cpf']").val();
                let cnpj = $("input[name='cnpj']").val();
                let zipcode = $("input[name='zipcode']").val();
                let street = $("input[name='street']").val();
                let number = $("input[name='number']").val();
                let district = $("input[name='district']").val();
                let city = $("input[name='city']").val();
                let id = $("input[name='client-id']").val();
                let _token = $("input[name='_token']").val();

                $.ajax({
                    url: "/clients/update",
                    type:'PUT',
                    data: {name:name, lastname:lastname, cpf:cpf, cnpj:cnpj, zipcode:zipcode, street:street, number:number, district:district, city:city, id:id, _token:_token},
                    success: function(data) {
                        let icon = 'success';
                            
                        if (data.success === false) {
                            icon = 'error'
                        }

                        Swal.fire({
                        position: 'top-end',
                        icon: icon,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                        })

                        if (data.success === true) {
                            document.location.reload(true);
                        }
                    }
                });
            });

            function clearZipcodeForm() {
                $("#street").val("");
                $("#district").val("");
                $("#city").val("");
            }

            $("#zipcode").blur(function() {
                var zipcode = $(this).val().replace(/\D/g, '');

                if (zipcode != "") {
                    var validateZipcode = /^[0-9]{8}$/;

                    if(validateZipcode.test(zipcode)) {
                        $("#street").val("...");
                        $("#district").val("...");
                        $("#city").val("...");

                        $.getJSON("https://viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                $("#street").val(dados.logradouro);
                                $("#district").val(dados.bairro);
                                $("#city").val(dados.localidade);
                            }
                            else {
                                clearZipcodeForm();
                                showMessage('CEP não encontrado.');
                            }
                        });
                    }
                    else {
                        clearZipcodeForm();
                        showMessage('Formato de CEP inválido.');
                    }
                } 
                else {
                    clearZipcodeForm();
                }
            });

            $(function() {
                $("#cpf").blur(function () {
                var exp = /\.|\-/g;
                var cpf = $('#cpf').val().replace(exp,'').toString();
                if (cpf.length == 11 ) {
                
                    var v = [];

                    v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                    v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                    v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                    v[0] = v[0] % 11;
                    v[0] = v[0] % 10;

                    v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                    v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                    v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                    v[1] = v[1] % 11;
                    v[1] = v[1] % 10;
                            
                    if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
                        showMessage('CPF inválido');
                    }
                    else if (cpf[0] == cpf[1] && cpf[1] == cpf[2] && cpf[2] == cpf[3] && cpf[3] == cpf[4] && cpf[4] == cpf[5] && cpf[5] == cpf[6] && cpf[6] == cpf[7] && cpf[7] == cpf[8] && cpf[8] == cpf[9] && cpf[9] == cpf[10]) {
                        showMessage('CPF inválido');
                    }     
                } else {
                    showMessage('CPF inválido');
                }
            });
        })
    
            $(document).ready(function(){
                $('.cpf').inputmask("999.999.999-99");
            });

            $(document).ready(function(){
                $('#cpf').inputmask("999.999.999-99");
            });

            $(document).ready(function(){
                $('.cnpj').inputmask({"mask": "99.999.999/9999-99"});
            });

            $(document).ready(function(){
                $('#cnpj').inputmask({"mask": "99.999.999/9999-99"});
            });

            $(document).ready(function(){
                $('#zipcode').inputmask({"mask": "99999-999"});
            });

            $("#cnpj").blur(function() {
                let exp = /[^\d]+/g;
                let cnpj = $('#cnpj').val().replace(exp, '').toString();

                if (cnpj == '') {
                    showMessage('CNPJ inválido.');
                }
                if (cnpj.length != 14) {
                    showMessage('CNPJ inválido.');
                }
                
                if (cnpj == "00000000000000" ||
                    cnpj == "11111111111111" ||
                    cnpj == "22222222222222" ||
                    cnpj == "33333333333333" ||
                    cnpj == "44444444444444" ||
                    cnpj == "55555555555555" ||
                    cnpj == "66666666666666" ||
                    cnpj == "77777777777777" ||
                    cnpj == "88888888888888" ||
                    cnpj == "99999999999999") {
                        showMessage('CNPJ inválido.');
                }

                cnpjSize = cnpj.length - 2
                numbers = cnpj.substring(0, cnpjSize);
                digits = cnpj.substring(cnpjSize);
                sum = 0;
                pos = cnpjSize - 7;

                for (let i = cnpjSize; i >= 1; i--) {
                    sum += numbers.charAt(cnpjSize - i) * pos--;
                    if (pos < 2)
                        pos = 9;
                }

                result = sum % 11 < 2 ? 0 : 11 - sum % 11;
                if (result != digits.charAt(0)) {
                    showMessage('CNPJ inválido.');
                }

                cnpjSize++;
                numbers = cnpj.substring(0, cnpjSize);
                sum = 0;
                pos = cnpjSize - 7;

                for (let i = cnpjSize; i >= 1; i--) {
                    sum += numbers.charAt(cnpjSize - i) * pos--;
                    if (pos < 2)
                        pos = 9;
                }

                result = sum % 11 < 2 ? 0 : 11 - sum % 11;
                if (result != digits.charAt(1)) {
                    showMessage('CNPJ inválido.');
                }
            });

            function showMessage(message) {
                Swal.fire({
                icon: 'error',
                title: '',
                text: message,
                footer: ''
                })
            }
        </script>
    </body>
</html>
