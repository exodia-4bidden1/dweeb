document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.toggle-password').forEach(function (eye) {
    eye.addEventListener('click', function () {
      const input = document.querySelector(this.getAttribute('toggle'));
      if (input.type === 'password') {
        input.type = 'text';
        this.classList.remove('bx-eye-closed');
        this.classList.add('bx-eye');
      } else {
        input.type = 'password';
        this.classList.remove('bx-eye');
        this.classList.add('bx-eye-closed');
      }
    });
  });
});