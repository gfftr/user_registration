const login = document.querySelector('.login')
const register = document.querySelector('.register')
const loginDiv = document.querySelector('.login-section')
const registerDiv = document.querySelector('.register-section')
const registerForm = document.querySelector('.register-form')
const loginForm = document.querySelector('.login-form')
const loginSubmit = document.querySelector('.login-submit')
const registerSubmit = document.querySelector('.register-submit')
const msgSection = document.querySelector('.message-section')

login.addEventListener('click', () => {
  loginDiv.style.display = 'block'
  registerDiv.style.display = 'none'
  msgSection.style.display = 'none'
})
register.addEventListener('click', () => {
  loginDiv.style.display = 'none'
  registerDiv.style.display = 'block'
  msgSection.style.display = 'none'
})

registerSubmit.addEventListener('click', (e) => {
  e.preventDefault()
  fetch('/controler.php', {
    method: 'POST',
    body: new FormData(registerForm),
  })
    .then((res) => res.json())
    .then((data) => {
      loginDiv.style.display = 'none'
      registerDiv.style.display = 'none'
      msgSection.style.display = 'block'
      msgSection.innerHTML = `
    <p>${data.status}</p>
    `
    })
})

loginSubmit.addEventListener('click', (e) => {
  e.preventDefault()
  fetch('/controler.php', {
    method: 'POST',
    body: new FormData(loginForm),
  })
    .then((res) => res.json())
    .then((data) => {
      loginDiv.style.display = 'none'
      registerDiv.style.display = 'none'
      msgSection.style.display = 'block'
      msgSection.innerHTML = `
    <p>${data.status}</p>
    `
    })
})
