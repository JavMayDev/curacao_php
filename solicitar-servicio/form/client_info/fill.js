var clientSenderName = document.getElementsByName('client_sender_name')[0];
var localTel = document.getElementsByName('local_tel')[0];

clientSenderName.value = 'Julio Lorem';
localTel.value = 1234567;

// clientSenderName.onblur = function () {
//     console.log('on blur');
//     console.log('value', clientSenderName.value);
//     if (!clientSenderName.value) {
//         console.log('no value');
//         console.log(!clientSenderName.value);
//         clientSenderName.classList.add('is-invalid');
//         // var inputGroup = document.getElementById(
//         //     'client_sender_name_input_group'
//         // );
//         // var invalidFeedback = document.createElement('div');
//         // invalidFeedback.appendChild(document.createTextNode('required field'));
//         // invalidFeedback.classList.add('text-danger');
//         // inputGroup.appendChild(invalidFeedback);
//     } else {
//         clientSenderName.classList.remove('is-invalid');
//         clientSenderName.classList.add('is-valid');
//     }
// };

// console.log('on fill script');
// var client_sender_name = document.querySelector(
//     'input[name="client_sender_name"]'
// );
// console.log(client_sender_name);
// client_sender_name.blur(function () {
//     console.log('on blur');
// });
