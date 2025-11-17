// Header Component - logo, language selector, nav menu
app.component('app-header', {
    props: {
        t: { type: Object, required: true },
        lang: { type: String, required: true },
        ancho: { type: Number, required: true },
        menu: { type: Boolean, required: true },
        isLoggedIn: { type: Boolean, required: true },
        loginUrl: String,
        registerUrl: String,
        logoutUrl: String,
        homeUrl: String,
        gameUrl: String,
        contactUrl: String,
        userName: { type: String, default: '' },
    },

    methods: {
        changeLanguage(newLang) {
            this.$emit('change-language', newLang);
        },
        toggleMenu() {
            this.$emit('toggle-menu');
        }
    },
    template: /*html*/`
    <header class="primary-bg">
        <div class="logo white-color text-xl">
            <img src="assets/Logo.png" alt="Mushroom's Garden Logo">
            <p v-if="isLoggedIn">Bienvenido, <span class="extra-color">{{ userName }}</span></p>


        </div>

        <nav class="text-l bold" v-if="ancho >= 780">
            <a class="white-color secondary-hover" :href="homeUrl">Home</a>
            <a v-if="isLoggedIn" class="white-color secondary-hover" :href="gameUrl">Game</a>
            <a v-if="!isLoggedIn" class="white-color secondary-hover" :href="loginUrl">Login</a>
            <a v-if="!isLoggedIn" class="white-color secondary-hover" :href="registerUrl">Sign In</a>
            <a v-if="isLoggedIn" class="white-color secondary-hover" :href="logoutUrl">Log out</a>

            <a class="white-color secondary-hover" :href="contactUrl">Contact</a>
        </nav>

        <button v-if="ancho <= 779" @click="toggleMenu" class="menu-toggle" id="menu-toggle">
            ☰
        </button>

        <div v-if="menu===true" class="hamMenu primary-bg">
            <button @click="toggleMenu" class="menu-toggle" id="menu-toggle">
                ☰
            </button>
            <nav class="text-l bold">
            <a class="white-color secondary-hover" :href="homeUrl">Home</a>
            <a v-if="isLoggedIn" class="white-color secondary-hover" :href="gameUrl">Game</a>
            <a v-if="!isLoggedIn" class="white-color secondary-hover" :href="loginUrl">Login</a>
            <a v-if="!isLoggedIn" class="white-color secondary-hover" :href="registerUrl">Sign In</a>
            <a v-if="isLoggedIn" class="white-color secondary-hover" :href="logoutUrl">Log out</a>

            <a class="white-color secondary-hover" :href="contactUrl">Contact</a>
            </nav>
        </div>
    </header>
    `
});
