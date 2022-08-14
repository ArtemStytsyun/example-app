import './bootstrap';

// var myModal = document.getElementById('exampleModalLong')
// var myInput = document.getElementById('exampleModalLong')

// myModal.addEventListener('shown.bs.modal', function () {
//   myInput.focus()
// })

// var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
//     keyboard: false,
//     fuck: 1
// })
console.log(1);
// window.$ = require('jquery');

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).on('click', '.edit', function(event) {

    event.preventDefault(); 
    event.stopImmediatePropagation();
    if(!event.isDefaultPrevented()){
        event.returnValue = false;
    }
    console.log(2)
    //Запрашиваем актуальные данные о посте 
    $.ajax({
        cache: false,
        type: 'POST',
        url: event.target.form.action,
        success: function(data) {

            //обрабатываем полученные данные и вставляем в модульное окно
            let data_1 = JSON.parse(data)
  


            $('#title').val(data_1['title'])
            $('#content').val(data_1['content'])
            $('#image').val(data_1['image'])
            console.log(data_1['category'])
            $("#category option[value='"+ data_1['category'] +"']").attr("selected", "selected");
            // $('#category[value'+ data_1['category']+']').attr('selected','selected').on('change');
            $('#editCategory').val(data_1['category'])
            // $('#category').change()
            if(data_1['is_published']==1){
                $('#is_published').prop('checked', true);
            }

            //Только после того, как данные были получены вешааем обработчик событий
            $(document).on('click', '.update', function(e) {
                e.preventDefault(); 
                e.stopImmediatePropagation();
                if(!e.isDefaultPrevented()){
                    e.returnValue = false;
                }
                let modal = $('#updateModal')
                console.log(modal.serialize())
                // $('#title').val(data_1['title'])
                $.ajax({
                    cache: false,
                    type: 'patch',
                    // dataType: 'application/json; charset=utf-8',
                    url: 'posts/'+ data_1['id'] +'/update', //собираем запрос через одно место, надо придумать шо тут
                    data: modal.serialize(),
                    success: function(success){
                    }
                })
                document.location.reload(true);


            })    
        }
    })
})


$(document).on('click', '.delete', function(event) {
    
    event.preventDefault(); 
    event.stopImmediatePropagation();
    if(!event.isDefaultPrevented()){
        event.returnValue = false;
    }
    
    //Запрашиваем актуальные данные о посте 
    $.ajax({
        cache: false,
        type: 'POST',
        // dataType: 'application/json; charset=utf-8',
        url: event.target.form.action,
        success: function(data) {
            console.log('wcgt[')
            //обрабатываем полученные данные и вставляем в модульное окно
            let data_1 = JSON.parse(data)
            $('#deleteModalLabelId').text(data_1['id'])

            //Только после того, как данные были получены вешааем обработчик событий
            $(document).on('click', '.destroy', function(e) {

                e.preventDefault(); 
                e.stopImmediatePropagation();
                if(!e.isDefaultPrevented()){
                    e.returnValue = false;
                }

                $.ajax({
                    cache: false,
                    type: 'POST',
                    // dataType: 'application/json; charset=utf-8',
                    url: 'posts/'+ data_1['id'] +'/destroy', //собираем запрос через одно место, надо придумать шо тут
                    // data: modal.serialize(),
                    success: function(success){
                    }
                })
                document.location.reload(true);


            })
            


        },
        error:function(error){
                console.log(error)
        }
    })
})