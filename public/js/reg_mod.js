
$('.toggle').hide()
$('input[type=radio]').on('change', function(){
    $('.toggle').hide()
    let c=$(this).attr('data-name')
    let cl = $(".addRegForm").css("background-color", "yellow");
    if(c == 'ip'){
      cl.empty()
      cl.append(`<div class="input-group over mb-3">
                          <input type="text" class=" psw form-control" placeholder="ФИО индивидуального предпринимателя"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="fio">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="ИНН*" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" name="inn">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Юридический адрес(полный адрес)*"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="legal_address">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Почтовый адрес(полный адрес)* "
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="post_address">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Телефон" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" >
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Хаименование банка*"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="bank_name">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Город банка*"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="bank_city">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="БИК*" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" name="bic">
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class=" psw form-control" placeholder="Корреспандетский счет"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="correspondent_account">
                        </div>`)
    }else{
      cl.empty()
      cl.append(` <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Наименование организации*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="organization_name">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="ИНН*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="inn">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="КПП*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="cpp">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Юридический адрес(полный адрес)*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="legal_address">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Почтовый адрес(полный адрес)*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="post_address">
                      </div>
                      <!-- <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Телефон*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2">
                      </div> -->
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Наименование банка*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="bank_name">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Город банка*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="bank_city">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="БИК*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="bic">
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Корреспандетский счет"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="correspondent_account">
                      </div>
                    </div>`)
    }
    // $('.'+c).show()
})
