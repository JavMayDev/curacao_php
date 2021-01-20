$('#userOptionsModal').on('show.bs.modal', function (event) {
    var userData = $(event.relatedTarget).data()
    var modal = $(this)

    modal.find('#user-name').val(userData.name)
    modal.find('#user-email').val(userData.email)
    modal.find('#user-password').val('')
    modal.find('#user-password').attr('placeholder', 'dejese vacia para no alterar')
    modal.find('#user-access_level').val(userData.access_level)
    modal.find('#user-country').val(userData.country)

    modal.find('form').attr('action', '.?id=' + userData.id)

    console.log( 'user data:', userData )
})
