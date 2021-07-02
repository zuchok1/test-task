const modalBuy = document.querySelector('#modalBuy');
var buyButton = document.getElementsByClassName('modal-buy-open');


function modalOpen() {
  modalBuy.style.visibility = 'visible';
  modalBuy.style.opacity = '1';
};

function modalClose() {
  modalBuy.style.visibility = 'hidden';
  modalBuy.style.opacity = '0';
};

Array.from(buyButton).forEach(function (buyButton) {
  buyButton.addEventListener('click', modalOpen);
});

document.querySelector('.modal-buy-close').addEventListener('click', (e) => {
  e.preventDefault();
  modalClose();
});

addEventListener('keydown', e => e.key === 'Escape' && modalClose());

$(document).ready(function () {
  // Валидация
  $('.phone-input').mask('+7 (000) 000-00-00');

  $('.modal__form').validate({
    errorClass: "invalid",
    messages: {
      buyName: {
        required: "Введите имя",
        minlength: "Имя не может быть короче двух знаков"
      },
      buyPhone: "Введите телефон",
      buyEmail: {
        required: "Введите email",
        email: "Некорректный формат"
      }
    }
  })
})
