// // SigninForm Component - registration form with username, email, password
// app.component('signin-form', {
//     props: {
//         t: { type: Object, required: true }
//     },

//     methods: {
//         handleSignin() {
//             this.$emit('signin-submit');
//         }
//     },
//     template: /*html*/`

//         < section class= "input-display login-back" >
//         <h1 class="white-color text-king my-xl">Iniciar Sesión</h1>
//         <form id="signinForm" action="{{ route('login.store') }}" method="POST">
//             @csrf
//             <input class="m-xxl text-xl secondary-border white-color user-icon" 
//                    type="email" name="email" placeholder="Email" required>

//             <input class="m-xxl text-xl secondary-border white-color password-icon" 
//                    type="password" name="password" placeholder="Contraseña" required>

//             <p class="white-color text-xl">
//                 ¿No tienes cuenta? 
//                 <a href="{{ route('user.create') }}" class="extra-color underline link cursor">
//                     Regístrate
//                 </a>
//             </p>

//             <button type="submit" class="btn-account text-xl primary-bg white-color my-super">
//                 Ingresar
//             </button>
//         </form>
//     </>
//     `
// });
